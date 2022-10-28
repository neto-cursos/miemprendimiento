<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fuen_id') }}
            {{ Form::text('fuen_id', $fuente->fuen_id, ['class' => 'form-control' . ($errors->has('fuen_id') ? ' is-invalid' : ''), 'placeholder' => 'Fuen Id']) }}
            {!! $errors->first('fuen_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fuen_nomb') }}
            {{ Form::text('fuen_nomb', $fuente->fuen_nomb, ['class' => 'form-control' . ($errors->has('fuen_nomb') ? ' is-invalid' : ''), 'placeholder' => 'Fuen Nomb']) }}
            {!! $errors->first('fuen_nomb', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fue_desc') }}
            {{ Form::text('fue_desc', $fuente->fue_desc, ['class' => 'form-control' . ($errors->has('fue_desc') ? ' is-invalid' : ''), 'placeholder' => 'Fue Desc']) }}
            {!! $errors->first('fue_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>