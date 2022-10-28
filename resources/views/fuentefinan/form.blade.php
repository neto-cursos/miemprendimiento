<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fuen_fina_id') }}
            {{ Form::text('fuen_fina_id', $fuentefinan->fuen_fina_id, ['class' => 'form-control' . ($errors->has('fuen_fina_id') ? ' is-invalid' : ''), 'placeholder' => 'Fuen Fina Id']) }}
            {!! $errors->first('fuen_fina_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fuen_id') }}
            {{ Form::text('fuen_id', $fuentefinan->fuen_id, ['class' => 'form-control' . ($errors->has('fuen_id') ? ' is-invalid' : ''), 'placeholder' => 'Fuen Id']) }}
            {!! $errors->first('fuen_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fuen_fina_notas') }}
            {{ Form::text('fuen_fina_notas', $fuentefinan->fuen_fina_notas, ['class' => 'form-control' . ($errors->has('fuen_fina_notas') ? ' is-invalid' : ''), 'placeholder' => 'Fuen Fina Notas']) }}
            {!! $errors->first('fuen_fina_notas', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>