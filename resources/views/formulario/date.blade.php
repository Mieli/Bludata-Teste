<div class="{{$class ?? 'form-group' }}">
    {!! Form::label($label ?? $input ?? "ERRO") !!}
    {!! Form::date($input, $value ?? null, $attributes) !!}
</div>

