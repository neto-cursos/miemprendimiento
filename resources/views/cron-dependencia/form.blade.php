<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cron_dep_id') }}
            {{ Form::text('cron_dep_id', $cronDependencia->cron_dep_id, ['class' => 'form-control' . ($errors->has('cron_dep_id') ? ' is-invalid' : ''), 'placeholder' => 'Cron Dep Id']) }}
            {!! $errors->first('cron_dep_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cron_dep_tareas') }}
            {{ Form::text('cron_dep_tareas', $cronDependencia->cron_dep_tareas, ['class' => 'form-control' . ($errors->has('cron_dep_tareas') ? ' is-invalid' : ''), 'placeholder' => 'Cron Dep Tareas']) }}
            {!! $errors->first('cron_dep_tareas', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>