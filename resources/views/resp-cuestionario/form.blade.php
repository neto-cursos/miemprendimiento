<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('resp_cuest_id') }}
            {{ Form::text('resp_cuest_id', $respCuestionario->resp_cuest_id, ['class' => 'form-control' . ($errors->has('resp_cuest_id') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cuest Id']) }}
            {!! $errors->first('resp_cuest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('canv_id') }}
            {{ Form::text('canv_id', $respCuestionario->canv_id, ['class' => 'form-control' . ($errors->has('canv_id') ? ' is-invalid' : ''), 'placeholder' => 'Canv Id']) }}
            {!! $errors->first('canv_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuest_id') }}
            {{ Form::text('cuest_id', $respCuestionario->cuest_id, ['class' => 'form-control' . ($errors->has('cuest_id') ? ' is-invalid' : ''), 'placeholder' => 'Cuest Id']) }}
            {!! $errors->first('cuest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('opci_cuest_id') }}
            {{ Form::text('opci_cuest_id', $respCuestionario->opci_cuest_id, ['class' => 'form-control' . ($errors->has('opci_cuest_id') ? ' is-invalid' : ''), 'placeholder' => 'Opci Cuest Id']) }}
            {!! $errors->first('opci_cuest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modu_nume') }}
            {{ Form::text('modu_nume', $respCuestionario->modu_nume, ['class' => 'form-control' . ($errors->has('modu_nume') ? ' is-invalid' : ''), 'placeholder' => 'Modu Nume']) }}
            {!! $errors->first('modu_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resp_cuest_desc') }}
            {{ Form::text('resp_cuest_desc', $respCuestionario->resp_cuest_desc, ['class' => 'form-control' . ($errors->has('resp_cuest_desc') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cuest Desc']) }}
            {!! $errors->first('resp_cuest_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resp_cuest_text') }}
            {{ Form::text('resp_cuest_text', $respCuestionario->resp_cuest_text, ['class' => 'form-control' . ($errors->has('resp_cuest_text') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cuest Text']) }}
            {!! $errors->first('resp_cuest_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resp_cuest_esta') }}
            {{ Form::text('resp_cuest_esta', $respCuestionario->resp_cuest_esta, ['class' => 'form-control' . ($errors->has('resp_cuest_esta') ? ' is-invalid' : ''), 'placeholder' => 'Resp Cuest Esta']) }}
            {!! $errors->first('resp_cuest_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>