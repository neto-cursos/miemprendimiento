<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fina_id') }}
            {{ Form::text('fina_id', $financiamiento->fina_id, ['class' => 'form-control' . ($errors->has('fina_id') ? ' is-invalid' : ''), 'placeholder' => 'Fina Id']) }}
            {!! $errors->first('fina_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empr_id') }}
            {{ Form::text('empr_id', $financiamiento->empr_id, ['class' => 'form-control' . ($errors->has('empr_id') ? ' is-invalid' : ''), 'placeholder' => 'Empr Id']) }}
            {!! $errors->first('empr_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fuen_fina_id') }}
            {{ Form::text('fuen_fina_id', $financiamiento->fuen_fina_id, ['class' => 'form-control' . ($errors->has('fuen_fina_id') ? ' is-invalid' : ''), 'placeholder' => 'Fuen Fina Id']) }}
            {!! $errors->first('fuen_fina_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fina_activ') }}
            {{ Form::text('fina_activ', $financiamiento->fina_activ, ['class' => 'form-control' . ($errors->has('fina_activ') ? ' is-invalid' : ''), 'placeholder' => 'Fina Activ']) }}
            {!! $errors->first('fina_activ', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fina_cant') }}
            {{ Form::text('fina_cant', $financiamiento->fina_cant, ['class' => 'form-control' . ($errors->has('fina_cant') ? ' is-invalid' : ''), 'placeholder' => 'Fina Cant']) }}
            {!! $errors->first('fina_cant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fina_unid') }}
            {{ Form::text('fina_unid', $financiamiento->fina_unid, ['class' => 'form-control' . ($errors->has('fina_unid') ? ' is-invalid' : ''), 'placeholder' => 'Fina Unid']) }}
            {!! $errors->first('fina_unid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fina_mone') }}
            {{ Form::text('fina_mone', $financiamiento->fina_mone, ['class' => 'form-control' . ($errors->has('fina_mone') ? ' is-invalid' : ''), 'placeholder' => 'Fina Mone']) }}
            {!! $errors->first('fina_mone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fina_mont') }}
            {{ Form::text('fina_mont', $financiamiento->fina_mont, ['class' => 'form-control' . ($errors->has('fina_mont') ? ' is-invalid' : ''), 'placeholder' => 'Fina Mont']) }}
            {!! $errors->first('fina_mont', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>