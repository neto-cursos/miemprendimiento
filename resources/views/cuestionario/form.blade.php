<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cuest_id') }}
            {{ Form::text('cuest_id', $cuestionario->cuest_id, ['class' => 'form-control' . ($errors->has('cuest_id') ? ' is-invalid' : ''), 'placeholder' => 'Cuest Id']) }}
            {!! $errors->first('cuest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modu_id') }}
            {{ Form::text('modu_id', $cuestionario->modu_id, ['class' => 'form-control' . ($errors->has('modu_id') ? ' is-invalid' : ''), 'placeholder' => 'Modu Id']) }}
            {!! $errors->first('modu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuest_text') }}
            {{ Form::text('cuest_text', $cuestionario->cuest_text, ['class' => 'form-control' . ($errors->has('cuest_text') ? ' is-invalid' : ''), 'placeholder' => 'Cuest Text']) }}
            {!! $errors->first('cuest_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuest_desc') }}
            {{ Form::text('cuest_desc', $cuestionario->cuest_desc, ['class' => 'form-control' . ($errors->has('cuest_desc') ? ' is-invalid' : ''), 'placeholder' => 'Cuest Desc']) }}
            {!! $errors->first('cuest_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>