<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cate_acti_id') }}
            {{ Form::text('cate_acti_id', $categoriasact->cate_acti_id, ['class' => 'form-control' . ($errors->has('cate_acti_id') ? ' is-invalid' : ''), 'placeholder' => 'Cate Acti Id']) }}
            {!! $errors->first('cate_acti_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cate_acti_nomb') }}
            {{ Form::text('cate_acti_nomb', $categoriasact->cate_acti_nomb, ['class' => 'form-control' . ($errors->has('cate_acti_nomb') ? ' is-invalid' : ''), 'placeholder' => 'Cate Acti Nomb']) }}
            {!! $errors->first('cate_acti_nomb', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cate_acti_desc') }}
            {{ Form::text('cate_acti_desc', $categoriasact->cate_acti_desc, ['class' => 'form-control' . ($errors->has('cate_acti_desc') ? ' is-invalid' : ''), 'placeholder' => 'Cate Acti Desc']) }}
            {!! $errors->first('cate_acti_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>