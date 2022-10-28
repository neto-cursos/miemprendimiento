<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('rubr_acti_id') }}
            {{ Form::text('rubr_acti_id', $rubroact->rubr_acti_id, ['class' => 'form-control' . ($errors->has('rubr_acti_id') ? ' is-invalid' : ''), 'placeholder' => 'Rubr Acti Id']) }}
            {!! $errors->first('rubr_acti_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rubr_acti_nomb') }}
            {{ Form::text('rubr_acti_nomb', $rubroact->rubr_acti_nomb, ['class' => 'form-control' . ($errors->has('rubr_acti_nomb') ? ' is-invalid' : ''), 'placeholder' => 'Rubr Acti Nomb']) }}
            {!! $errors->first('rubr_acti_nomb', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rubr_acti_desc') }}
            {{ Form::text('rubr_acti_desc', $rubroact->rubr_acti_desc, ['class' => 'form-control' . ($errors->has('rubr_acti_desc') ? ' is-invalid' : ''), 'placeholder' => 'Rubr Acti Desc']) }}
            {!! $errors->first('rubr_acti_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>