@if($errors->has($field))
    <label id="{{ $field }}-error" class="error" for="{{ $field }}">
        <i class="fa fa-times-circle-o"></i> 
        {{ $errors->first($field) }}
    </label>
@endif