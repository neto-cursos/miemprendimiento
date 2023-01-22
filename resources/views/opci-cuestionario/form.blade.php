<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('opci_cuest_id') }}
            {{ Form::text('opci_cuest_id', $opciCuestionario->opci_cuest_id, ['class' => 'form-control' . ($errors->has('opci_cuest_id') ? ' is-invalid' : ''), 'placeholder' => 'Opci Cuest Id']) }}
            {!! $errors->first('opci_cuest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuest_id') }}
            {{ Form::text('cuest_id', $opciCuestionario->cuest_id, ['class' => 'form-control' . ($errors->has('cuest_id') ? ' is-invalid' : ''), 'placeholder' => 'Cuest Id']) }}
            {!! $errors->first('cuest_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modu_nume') }}
            {{ Form::text('modu_nume', $opciCuestionario->modu_nume, ['class' => 'form-control' . ($errors->has('modu_nume') ? ' is-invalid' : ''), 'placeholder' => 'Modu Nume']) }}
            {!! $errors->first('modu_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('opci_cuest_type') }}
            {{ Form::text('opci_cuest_type', $opciCuestionario->opci_cuest_type, ['class' => 'form-control' . ($errors->has('opci_cuest_type') ? ' is-invalid' : ''), 'placeholder' => 'Opci Cuest Type']) }}
            {!! $errors->first('opci_cuest_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('opci_cuest_text') }}
            {{ Form::text('opci_cuest_text', $opciCuestionario->opci_cuest_text, ['class' => 'form-control' . ($errors->has('opci_cuest_text') ? ' is-invalid' : ''), 'placeholder' => 'Opci Cuest Text']) }}
            {!! $errors->first('opci_cuest_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('opci_cuest_desc') }}
            {{ Form::text('opci_cuest_desc', $opciCuestionario->opci_cuest_desc, ['class' => 'form-control' . ($errors->has('opci_cuest_desc') ? ' is-invalid' : ''), 'placeholder' => 'Opci Cuest Desc']) }}
            {!! $errors->first('opci_cuest_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('opci_cuest_esta') }}
            {{ Form::text('opci_cuest_esta', $opciCuestionario->opci_cuest_esta, ['class' => 'form-control' . ($errors->has('opci_cuest_esta') ? ' is-invalid' : ''), 'placeholder' => 'Opci Cuest Esta']) }}
            {!! $errors->first('opci_cuest_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>