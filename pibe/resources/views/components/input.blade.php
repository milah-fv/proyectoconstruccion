<div class="floating-labels my-3 {{ $col ?? 'col-md-12' }}" id="{{ $divId ?? null }}">
    <div class="form-group {{ $errors->has($name) ? 'has-danger has-error has-feedback' : '' }} " style="margin-bottom:{{ $margin ?? '35px'}}" >
        <input type="{{ $type ?? 'text' }}" {{ $attributes ?? null }} 
            class="form-control {{ $errors->has($name) ? 'form-control-danger' : '' }}" 
            @isset($id)  id="{{ $id }}" @else id="Component{{ $name }}" @endisset
            value="{{ old($name,$value ?? null) }}" name="{{ $name ?? null }}" > 
        <span class="bar"></span>
        <label @isset($id)  for="{{ $id }}" @else for="Component{{ $name }}" @endisset id="{{ $labelId ?? null }}"><i class="{{ $icon ?? null}}"></i> {{ $title}}</label>     
        @if ($errors->has($name))
            <span class="help-block text-danger">
                <small>{{ $errors->first($name) }}</small>
            </span>
        @endif  
    </div>
</div>