<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cost_id') }}
            {{ Form::text('cost_id', $costo->cost_id, ['class' => 'form-control' . ($errors->has('cost_id') ? ' is-invalid' : ''), 'placeholder' => 'Cost Id']) }}
            {!! $errors->first('cost_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modu_id') }}
            {{ Form::text('modu_id', $costo->modu_id, ['class' => 'form-control' . ($errors->has('modu_id') ? ' is-invalid' : ''), 'placeholder' => 'Modu Id']) }}
            {!! $errors->first('modu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cost_text') }}
            {{ Form::text('cost_text', $costo->cost_text, ['class' => 'form-control' . ($errors->has('cost_text') ? ' is-invalid' : ''), 'placeholder' => 'Cost Text']) }}
            {!! $errors->first('cost_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cost_desc') }}
            {{ Form::text('cost_desc', $costo->cost_desc, ['class' => 'form-control' . ($errors->has('cost_desc') ? ' is-invalid' : ''), 'placeholder' => 'Cost Desc']) }}
            {!! $errors->first('cost_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>