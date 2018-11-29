<div class="form-group col-sm-12">
    {!! Form::label('parameter_category_id', 'Categoria:') !!}
    {!! Form::select('parameter_category_id', $categories,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        <label for="">
            {!! Form::radio('type','b', ['class' => 'form-control']) !!} Checkbox
        </label>
    </div>
    <div class="form-group col-sm-6">
        <label for="">
            {!! Form::radio('type','t', ['class' => 'form-control']) !!} Texto
        </label>
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parameters.index') !!}" class="btn btn-default">Cancelar</a>
</div>