<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Image;
use Alert;
use Caffeinated\Shinobi\Models\Role;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        // $users->each(function($users){
        //     $users->rol = $users->roles()->value('name');
        // });

        return view('admin.user.index',[
            'users' => $users
        ]);
    }

    public function create()
    {
        // $roles = Role::all();

        // return view('admin.user.create',[
        //     'roles' => $roles
        // ]);
        return view('admin.user.create');
    }

    public function store(UserRequest $request) 
    {
        $fileNameCover = null;
        if($request->hasFile('avatar'))
        {  
            $cover =$request->file('avatar');
            $fileNameCover = $cover->hashName();
            Image::make($cover)->resize(500,500)->save('img_web/user/' .$fileNameCover);
        }

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'celphone' => $request->celphone,
            'avatar' => $fileNameCover,
            'email' => $request->email,
            'actived' => 1,
            'password' => bcrypt($request->password),

        ]);
        $user->remember_token =str_random(25);
        // $user->assignRole($request->roles);
        Alert::success('Empleado creado correctamente');
        return redirect('admin/user');
    }

    public function edit($id)  
    {
        $user = User::findOrFail($id);
        // $roles = Role::all();
        // $user->rolId = $user->roles()->first();

        return view('admin.user.edit',[
            'user' => $user,
            // 'roles' => $roles
        ]);
    }
    public function update(UserRequest $request, $id)   
    {
        $user = User::findOrFail($id);
        if($request->hasFile('avatar'))
        {  
            $cover =$request->file('avatar');
            $fileNameCover = $cover->hashName();
            Image::make($cover)->resize(500,500)->save('img_web/user/' .$fileNameCover);
            
            if($user->avatar != 'img_web/user/user.png')
            {
                \File::delete($user->avatar);            
            }
            $user->avatar = $fileNameCover;
        }

        $user->name = $request->name;
        $user->celphone = $request->celphone;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if($request->password != null)   
        {
            $user->password = bcrypt($request->password);            
        }
        $user->save();
        // $user->roles()->sync($request->roles);
        Alert::success('Empleado actualizado correctamente');
        return redirect("/admin/user");
    }
    // public function show(){
    //     return redirect("/admin/users");
    // }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return response()->json($user);
    }

    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.profile',
        [
            'user' => $user
        ]);
    }

    public function updateProfile(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->hasFile('avatar'))
        {  
            $cover =$request->file('avatar');
            $fileNameCover = $cover->hashName();
            Image::make($cover)->resize(500,500)->save('img_web/user/' .$fileNameCover);
            if($user->avatar != 'img_web/user/user.png')
            {
                \File::delete($user->avatar);            
            }
            $user->avatar = $fileNameCover;
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->celphone = $request->celphone;

        $user->save();
        Alert::success('Perfil actualizado correctamente');
        return redirect()->back();
    }
    
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        if (!(Hash::check($request->get('current-password'), Auth('user')->user()->password))) {
            // The passwords matches
            return response()->json(['error' => 'Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.']);
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return response()->json(['error'=>'La nueva contraseña no puede ser igual a su contraseña actual. Por favor, elija una contraseña diferente.']);
        }


        //Change Password
        $user = Auth('user')->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return response()->json(['success' => 'Contraseña cambiada correctamente']);

    }
  
}
