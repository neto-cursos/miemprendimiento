<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('acti_clav_id') }}
            {{ Form::text('acti_clav_id', $actividadesclafe->acti_clav_id, ['class' => 'form-control' . ($errors->has('acti_clav_id') ? ' is-invalid' : ''), 'placeholder' => 'Acti Clav Id']) }}
            {!! $errors->first('acti_clav_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cate_acti_id') }}
            {{ Form::text('cate_acti_id', $actividadesclafe->cate_acti_id, ['class' => 'form-control' . ($errors->has('cate_acti_id') ? ' is-invalid' : ''), 'placeholder' => 'Cate Acti Id']) }}
            {!! $errors->first('cate_acti_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empr_id') }}
            {{ Form::text('empr_id', $actividadesclafe->empr_id, ['class' => 'form-control' . ($errors->has('empr_id') ? ' is-invalid' : ''), 'placeholder' => 'Empr Id']) }}
            {!! $errors->first('empr_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rubr_acti_id') }}
            {{ Form::text('rubr_acti_id', $actividadesclafe->rubr_acti_id, ['class' => 'form-control' . ($errors->has('rubr_acti_id') ? ' is-invalid' : ''), 'placeholder' => 'Rubr Acti Id']) }}
            {!! $errors->first('rubr_acti_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('acti_clav_desc') }}
            {{ Form::text('acti_clav_desc', $actividadesclafe->acti_clav_desc, ['class' => 'form-control' . ($errors->has('acti_clav_desc') ? ' is-invalid' : ''), 'placeholder' => 'Acti Clav Desc']) }}
            {!! $errors->first('acti_clav_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>