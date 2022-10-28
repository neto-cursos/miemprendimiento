<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cron_id') }}
            {{ Form::text('cron_id', $cronActividade->cron_id, ['class' => 'form-control' . ($errors->has('cron_id') ? ' is-invalid' : ''), 'placeholder' => 'Cron Id']) }}
            {!! $errors->first('cron_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empr_id') }}
            {{ Form::text('empr_id', $cronActividade->empr_id, ['class' => 'form-control' . ($errors->has('empr_id') ? ' is-invalid' : ''), 'placeholder' => 'Empr Id']) }}
            {!! $errors->first('empr_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_acti_padr') }}
            {{ Form::text('cron_acti_padr', $cronActividade->cron_acti_padr, ['class' => 'form-control' . ($errors->has('cron_acti_padr') ? ' is-invalid' : ''), 'placeholder' => 'Cron Acti Padr']) }}
            {!! $errors->first('cron_acti_padr', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type') }}
            {{ Form::text('type', $cronActividade->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('project') }}
            {{ Form::text('project', $cronActividade->project, ['class' => 'form-control' . ($errors->has('project') ? ' is-invalid' : ''), 'placeholder' => 'Project']) }}
            {!! $errors->first('project', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('displayorder') }}
            {{ Form::text('displayorder', $cronActividade->displayorder, ['class' => 'form-control' . ($errors->has('displayorder') ? ' is-invalid' : ''), 'placeholder' => 'Displayorder']) }}
            {!! $errors->first('displayorder', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $cronActividade->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start') }}
            {{ Form::text('start', $cronActividade->start, ['class' => 'form-control' . ($errors->has('start') ? ' is-invalid' : ''), 'placeholder' => 'Start']) }}
            {!! $errors->first('start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end') }}
            {{ Form::text('end', $cronActividade->end, ['class' => 'form-control' . ($errors->has('end') ? ' is-invalid' : ''), 'placeholder' => 'End']) }}
            {!! $errors->first('end', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('responsable') }}
            {{ Form::text('responsable', $cronActividade->responsable, ['class' => 'form-control' . ($errors->has('responsable') ? ' is-invalid' : ''), 'placeholder' => 'Responsable']) }}
            {!! $errors->first('responsable', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dependencies') }}
            {{ Form::text('dependencies', $cronActividade->dependencies, ['class' => 'form-control' . ($errors->has('dependencies') ? ' is-invalid' : ''), 'placeholder' => 'Dependencies']) }}
            {!! $errors->first('dependencies', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $cronActividade->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unidad') }}
            {{ Form::text('unidad', $cronActividade->unidad, ['class' => 'form-control' . ($errors->has('unidad') ? ' is-invalid' : ''), 'placeholder' => 'Unidad']) }}
            {!! $errors->first('unidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costounitario') }}
            {{ Form::text('costounitario', $cronActividade->costounitario, ['class' => 'form-control' . ($errors->has('costounitario') ? ' is-invalid' : ''), 'placeholder' => 'Costounitario']) }}
            {!! $errors->first('costounitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $cronActividade->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('notas') }}
            {{ Form::text('notas', $cronActividade->notas, ['class' => 'form-control' . ($errors->has('notas') ? ' is-invalid' : ''), 'placeholder' => 'Notas']) }}
            {!! $errors->first('notas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('progress') }}
            {{ Form::text('progress', $cronActividade->progress, ['class' => 'form-control' . ($errors->has('progress') ? ' is-invalid' : ''), 'placeholder' => 'Progress']) }}
            {!! $errors->first('progress', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_done') }}
            {{ Form::text('cron_done', $cronActividade->cron_done, ['class' => 'form-control' . ($errors->has('cron_done') ? ' is-invalid' : ''), 'placeholder' => 'Cron Done']) }}
            {!! $errors->first('cron_done', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $cronActividade->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>