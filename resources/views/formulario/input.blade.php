<div class="{{$class ?? 'form-group' }}">
    {!! Form::label($label ?? $input ?? "ERRO") !!}
    {!! Form::text($input, $value ?? null, $attributes) !!}
</div>

