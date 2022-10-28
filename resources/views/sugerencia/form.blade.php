<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label class="" for="preg_id">
                Preguntas
            </label>
            <select name="preg_id" id="preg_id" class="form-control" data-placeholder="Preguntas" required>
                @foreach ($preguntas as $item)
                    @if ($sugerencia->preg_id == $item['preg_id'])
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
            <label class="" for="modu_nume">
                Módulo
            </label>
            <select name="modu_nume" id="modu_nume" class="form-control" data-placeholder="módulo" required>
                @foreach ($modulos as $item)
                    @if ($sugerencia->modu_nume == $item['modu_nume'])
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
            <label class="" for="suge_tipo">
                Tipo Sugerencia
            </label>

            <select name="suge_tipo" id="suge_tipo" class="form-control" data-placeholder="Tipo de sugerencia" required>
                @foreach ($tipo_sugerencias as $item)
                    @if ($item == $sugerencia->suge_tipo)
                        <option value="{{ $item }}" selected>
                            {{ $item }}</option>
                    @else
                        <option value="{{ $item }}">
                            {{ $item }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('suge_tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Rubro') }}
            {{ Form::text('suge_rubro', $sugerencia->suge_rubro, ['class' => 'form-control' . ($errors->has('suge_rubro') ? ' is-invalid' : ''), 'placeholder' => 'Rubro de sugerencia']) }}
            {!! $errors->first('suge_rubro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Sugerencia') }}
            {{ Form::text('suge_text', $sugerencia->suge_text, ['class' => 'form-control' . ($errors->has('suge_text') ? ' is-invalid' : ''), 'placeholder' => 'Sugerencia']) }}
            {!! $errors->first('suge_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Enlace Sugerencia') }}
            {{ Form::text('suge_link', $sugerencia->suge_link, ['class' => 'form-control' . ($errors->has('suge_link') ? ' is-invalid' : ''), 'placeholder' => 'Link De Sugerencia']) }}
            {!! $errors->first('suge_link', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
