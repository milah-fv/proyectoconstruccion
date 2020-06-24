<div class="floating-labels my-3 {{ $col ?? 'col-md-12' }}">
    <div class="form-group" style="margin-bottom:35px">
        <select class="form-control p-0" @isset($id)  id="{{ $id }}" @else id="Select{{ $name }}" @endisset name="{{ $name }}">
            @isset($items)
                @foreach ($items as $item)        
                    @isset($compare)
                        @if(is_object($item))
                            @if($compare == $item->id)
                                <option selected="true" value="{{ $item->id ?? null }}" >{{$item->name}}</option>  
                            @else
                                <option value="{{ $item->id ?? null }}" >{{$item->name}}</option>
                            @endif
                        @else
                            @if($compare == $item)
                                <option selected="true"  >{{$item}}</option>  
                            @else
                                <option>{{$item}}</option>
                            @endif
                        @endif
                    @else
                        @if(is_object($item))
                            <option value="{{ $item->id ?? null }}" {{ isset($data) == true ? ('data-'.$data.'='.$item->$data):'sd'  }}>{{$item->name}}</option>
                        @else
                            <option>{{$item}}</option>
                        @endif                            
                    @endisset
                @endforeach
            @endisset            
        </select><span class="bar"></span>
        <label @isset($id)  for="{{ $id }}" @else for="Select{{ $name }}" @endisset>{{ $title }}</label>
    </div>
</div>