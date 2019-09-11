<div class="{{$class ?? 'form-group' }}">
    {!! Form::label($label ?? $select ?? "ERRO") !!}
    {!! Form::select($select, $data ?? [], $value ?? [], $attributes) !!}
</div>

