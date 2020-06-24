<?php

namespace App;
use Jenssegers\Date\Date;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;

class Customer extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'customers';

    protected $fillable = [
        'id','name', 'last_name', 'email', 'password','password','actived','verified','dni','celphone','phone','address','district','province','department','remember_token','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

    public function customerVerify()
    {
        return $this->hasOne(CustomerVerify::class);
    }

    public function orders()
    {
      return $this->hasMany(Order::class);
  
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }

    public function verifiedData()
    {
        if($this->attributes['last_name'] === null ||
        $this->attributes['celphone'] === null ||
        $this->attributes['dni'] === null)
        {
            return false;
        }
        return true;
    }
}
