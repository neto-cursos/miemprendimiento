<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cron_id') }}
            {{ Form::text('cron_id', $cronograma->cron_id, ['class' => 'form-control' . ($errors->has('cron_id') ? ' is-invalid' : ''), 'placeholder' => 'Cron Id']) }}
            {!! $errors->first('cron_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empr_id') }}
            {{ Form::text('empr_id', $cronograma->empr_id, ['class' => 'form-control' . ($errors->has('empr_id') ? ' is-invalid' : ''), 'placeholder' => 'Empr Id']) }}
            {!! $errors->first('empr_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_fech_inic') }}
            {{ Form::text('cron_fech_inic', $cronograma->cron_fech_inic, ['class' => 'form-control' . ($errors->has('cron_fech_inic') ? ' is-invalid' : ''), 'placeholder' => 'Cron Fech Inic']) }}
            {!! $errors->first('cron_fech_inic', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_fech_fin') }}
            {{ Form::text('cron_fech_fin', $cronograma->cron_fech_fin, ['class' => 'form-control' . ($errors->has('cron_fech_fin') ? ' is-invalid' : ''), 'placeholder' => 'Cron Fech Fin']) }}
            {!! $errors->first('cron_fech_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_proy') }}
            {{ Form::text('cron_proy', $cronograma->cron_proy, ['class' => 'form-control' . ($errors->has('cron_proy') ? ' is-invalid' : ''), 'placeholder' => 'Cron Proy']) }}
            {!! $errors->first('cron_proy', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_desc') }}
            {{ Form::text('cron_desc', $cronograma->cron_desc, ['class' => 'form-control' . ($errors->has('cron_desc') ? ' is-invalid' : ''), 'placeholder' => 'Cron Desc']) }}
            {!! $errors->first('cron_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_type') }}
            {{ Form::text('cron_type', $cronograma->cron_type, ['class' => 'form-control' . ($errors->has('cron_type') ? ' is-invalid' : ''), 'placeholder' => 'Cron Type']) }}
            {!! $errors->first('cron_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_hide_child') }}
            {{ Form::text('cron_hide_child', $cronograma->cron_hide_child, ['class' => 'form-control' . ($errors->has('cron_hide_child') ? ' is-invalid' : ''), 'placeholder' => 'Cron Hide Child']) }}
            {!! $errors->first('cron_hide_child', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_done') }}
            {{ Form::text('cron_done', $cronograma->cron_done, ['class' => 'form-control' . ($errors->has('cron_done') ? ' is-invalid' : ''), 'placeholder' => 'Cron Done']) }}
            {!! $errors->first('cron_done', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_esta') }}
            {{ Form::text('cron_esta', $cronograma->cron_esta, ['class' => 'form-control' . ($errors->has('cron_esta') ? ' is-invalid' : ''), 'placeholder' => 'Cron Esta']) }}
            {!! $errors->first('cron_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>