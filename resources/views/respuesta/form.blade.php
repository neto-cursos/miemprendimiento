<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label class="" for="canv_id">
                Canva
            </label>
            <select name="canv_id" id="canv_id" class="form-control" data-placeholder="canvas" required>
                @foreach ($canvas as $item)
                    @if ($respuesta->canv_id == $item['canv_id'])
                        <option value="{{ $item['canv_id'] }}" selected>
                            {{ $item['emprendimiento'] }}</option>
                    @else
                        <option value="{{ $item['canv_id'] }}">
                            {{ $item['emprendimiento'] }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('canv_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label class="" for="resp_nume">
                Número De Respuesta
            </label>

            <select name="resp_nume" id="resp_nume" class="form-control" data-placeholder="Número de respuesta" required>
                @for ($i = 1; $i < 10; $i++)
                    @if ($respuesta->resp_nume == $i)
                        <option value="{{ $i }}" selected>&nbsp; {{ $i }} &nbsp;</option>
                    @else
                        <option value="{{ $i }}">&nbsp; {{ $i }} &nbsp;</option>
                    @endif
                @endfor

            </select>
            {!! $errors->first('resp_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Titulo Respuesta') }}
            {{ Form::text('resp_text', $respuesta->resp_text, ['class' => 'form-control' . ($errors->has('resp_text') ? ' is-invalid' : ''), 'placeholder' => 'Titulo respuesta']) }}
            {!! $errors->first('resp_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Descripción de Respuesta') }}
            {{ Form::text('resp_desc', $respuesta->resp_desc, ['class' => 'form-control' . ($errors->has('resp_desc') ? ' is-invalid' : ''), 'placeholder' => 'Descripción de la respuesta']) }}
            {!! $errors->first('resp_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="" for="modu_nume">
                Módulo
            </label>
            <select name="modu_nume" id="modu_nume" class="form-control" data-placeholder="módulo" required>
                @foreach ($modulo as $item)
                    @if ($respuesta->modu_nume == $item['modu_nume'])
                        <option value="{{ $item['modu_nume'] }}" selected>
                            {{ $item['modu_nomb'] }}</option>
                    @else
                        <option value="{{ $item['modu_nume'] }}">
                            {{ $item['modu_nomb'] }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('modu_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

        <label class="" for="preg_id">
                Pregunta Asociada
            </label>
            <select name="preg_id" id="preg_id" class="form-control" data-placeholder="pregunta" required>
            <option value="40">{{""}}</option>
                @foreach ($pregunta as $item)
                    @if ($respuesta->preg_id == $item['preg_id'])
                        <option value="{{ $item['preg_id'] }}" selected>
                            {{ $item['preg_text'] }}</option>
                    @else
                        <option value="{{ $item['preg_id'] }}">
                            {{ $item['preg_text'] }}</option>
                    @endif
                @endforeach
            </select>

            {!! $errors->first('preg_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::text('resp_esta', $respuesta->resp_esta, ['class' => 'form-control' . ($errors->has('resp_esta') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('resp_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
