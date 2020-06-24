<div class="floating-labels my-3 {{ $col ?? 'col-md-12' }}" >
    <div class="form-group {{ $errors->has($name) ? 'has-danger has-error has-feedback' : '' }}" style="margin-bottom:{{ $margin ?? '35px'}}">
        <textarea {{ $attributes ?? null }}  class="form-control {{ $errors->has($name) ? 'form-control-danger' : '' }}" rows="{{ $row ?? '4' }}" id="Component{{ $name }}" name="{{ $name }}">{{ old($name,$value ?? null) }}</textarea>
        <span class="bar"></span>
        <label for="Component{{ $name }}">{{ $title}}</label>
        @if ($errors->has($name))
            <span class="form-control-feedback text-danger">
                <small>{{ $errors->first($name) }}</small>
            </span>
        @endif
    </div>
</div>