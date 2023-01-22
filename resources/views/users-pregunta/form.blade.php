<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('usr_preg_id') }}
            {{ Form::text('usr_preg_id', $usersPregunta->usr_preg_id, ['class' => 'form-control' . ($errors->has('usr_preg_id') ? ' is-invalid' : ''), 'placeholder' => 'Usr Preg Id']) }}
            {!! $errors->first('usr_preg_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modu_id') }}
            {{ Form::text('modu_id', $usersPregunta->modu_id, ['class' => 'form-control' . ($errors->has('modu_id') ? ' is-invalid' : ''), 'placeholder' => 'Modu Id']) }}
            {!! $errors->first('modu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empr_id') }}
            {{ Form::text('empr_id', $usersPregunta->empr_id, ['class' => 'form-control' . ($errors->has('empr_id') ? ' is-invalid' : ''), 'placeholder' => 'Empr Id']) }}
            {!! $errors->first('empr_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usr_preg_own') }}
            {{ Form::text('usr_preg_own', $usersPregunta->usr_preg_own, ['class' => 'form-control' . ($errors->has('usr_preg_own') ? ' is-invalid' : ''), 'placeholder' => 'Usr Preg Own']) }}
            {!! $errors->first('usr_preg_own', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usr_repl_preg_id') }}
            {{ Form::text('usr_repl_preg_id', $usersPregunta->usr_repl_preg_id, ['class' => 'form-control' . ($errors->has('usr_repl_preg_id') ? ' is-invalid' : ''), 'placeholder' => 'Usr Repl Preg Id']) }}
            {!! $errors->first('usr_repl_preg_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usr_preg_nume') }}
            {{ Form::text('usr_preg_nume', $usersPregunta->usr_preg_nume, ['class' => 'form-control' . ($errors->has('usr_preg_nume') ? ' is-invalid' : ''), 'placeholder' => 'Usr Preg Nume']) }}
            {!! $errors->first('usr_preg_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usr_preg_text') }}
            {{ Form::text('usr_preg_text', $usersPregunta->usr_preg_text, ['class' => 'form-control' . ($errors->has('usr_preg_text') ? ' is-invalid' : ''), 'placeholder' => 'Usr Preg Text']) }}
            {!! $errors->first('usr_preg_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usr_preg_desc') }}
            {{ Form::text('usr_preg_desc', $usersPregunta->usr_preg_desc, ['class' => 'form-control' . ($errors->has('usr_preg_desc') ? ' is-invalid' : ''), 'placeholder' => 'Usr Preg Desc']) }}
            {!! $errors->first('usr_preg_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usr_preg_esta') }}
            {{ Form::text('usr_preg_esta', $usersPregunta->usr_preg_esta, ['class' => 'form-control' . ($errors->has('usr_preg_esta') ? ' is-invalid' : ''), 'placeholder' => 'Usr Preg Esta']) }}
            {!! $errors->first('usr_preg_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>