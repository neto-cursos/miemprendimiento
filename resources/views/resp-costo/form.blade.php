<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('resp_cost_id') }}
            {{ Form::text('resp_cost_id', $respCosto->resp_cost_id, ['class' => 'form-control' . ($errors->has('resp_cost_id') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cost Id']) }}
            {!! $errors->first('resp_cost_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('canv_id') }}
            {{ Form::text('canv_id', $respCosto->canv_id, ['class' => 'form-control' . ($errors->has('canv_id') ? ' is-invalid' : ''), 'placeholder' => 'Canv Id']) }}
            {!! $errors->first('canv_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cost_id') }}
            {{ Form::text('cost_id', $respCosto->cost_id, ['class' => 'form-control' . ($errors->has('cost_id') ? ' is-invalid' : ''), 'placeholder' => 'Cost Id']) }}
            {!! $errors->first('cost_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modu_nume') }}
            {{ Form::text('modu_nume', $respCosto->modu_nume, ['class' => 'form-control' . ($errors->has('modu_nume') ? ' is-invalid' : ''), 'placeholder' => 'Modu Nume']) }}
            {!! $errors->first('modu_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resp_cost_desc') }}
            {{ Form::text('resp_cost_desc', $respCosto->resp_cost_desc, ['class' => 'form-control' . ($errors->has('resp_cost_desc') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cost Desc']) }}
            {!! $errors->first('resp_cost_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resp_cost_acti') }}
            {{ Form::text('resp_cost_acti', $respCosto->resp_cost_acti, ['class' => 'form-control' . ($errors->has('resp_cost_acti') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cost Acti']) }}
            {!! $errors->first('resp_cost_acti', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resp_cost_monto') }}
            {{ Form::text('resp_cost_monto', $respCosto->resp_cost_monto, ['class' => 'form-control' . ($errors->has('resp_cost_monto') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cost Monto']) }}
            {!! $errors->first('resp_cost_monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resp_cost_esta') }}
            {{ Form::text('resp_cost_esta', $respCosto->resp_cost_esta, ['class' => 'form-control' . ($errors->has('resp_cost_esta') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cost Esta']) }}
            {!! $errors->first('resp_cost_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>