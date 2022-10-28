<?php

namespace App\Http\Controllers\admin;

use App\Models\Canva;
use App\Models\Modulo;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Emprendimiento;

/**
 * Class RespuestaController
 * @package App\Http\Controllers
 */
class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $respuestas = Respuesta::join('canvas','canvas.canv_id','=','respuestas.canv_id')
        ->join('emprendimientos','emprendimientos.empr_id','=','canvas.empr_id')
        ->join('preguntas','preguntas.preg_id','=','respuestas.preg_id')
        ->join('modulos','modulos.modu_nume','=','respuestas.modu_nume')
        ->select(
            'emprendimientos.empr_nomb as emprendimiento',
            'preguntas.preg_nume as preguntas_nume',
            'canvas.canv_id as canvas_id',
            'modulos.modu_nomb as modulos_nomb',
            'respuestas.*'
        )->paginate();


        return view('respuesta.index', compact('respuestas'))
            ->with('i', (request()->input('page', 1) - 1) * $respuestas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta = new Respuesta();
        $modulo=Modulo::select('modu_id','modu_nume','modu_nomb')->get('modu_id','modu_nume','modu_nomb');
        $pregunta=Pregunta::select('preg_id','preg_nume','preg_text')->get('preg_id','preg_nume','preg_text');
        $canvas=Canva::Join('emprendimientos','canvas.empr_id','=','emprendimientos.empr_id')
        ->select('emprendimientos.empr_nomb as emprendimiento','canv_id')->get('canv_id');
        return view('respuesta.create', compact('respuesta','modulo','pregunta','canvas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        request()->validate(Respuesta::$rules);
        
        $request->validate([
            'canv_id' => 'required|numeric|digits_between:1,5',
            'resp_nume' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'resp_text' => 'required'
        ]);

        $consulta=Respuesta::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Numero de Respuesta ya asignado para este modulo');
        }

        $respuesta = Respuesta::create($request->all());

        return redirect()->route('respuestas.index')
            ->with('success', 'Respuesta creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respuesta = Respuesta::find($id);
        return view('respuesta.show', compact('respuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = Respuesta::find($id);
        $modulo=Modulo::select('modu_id','modu_nume','modu_nomb')->get('modu_id','modu_nume','modu_nomb');
        $pregunta=Pregunta::select('preg_id','preg_nume','preg_text','modu_id')->get('preg_id','preg_nume','preg_text','modu_id');
        $canvas=Canva::Join('emprendimientos','canvas.empr_id','=','emprendimientos.empr_id');
        return view('respuesta.edit', compact('respuesta','modulo','pregunta','canvas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Respuesta $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        request()->validate(Respuesta::$rules);
        $request->validate([
            'canv_id' => 'required|numeric|digits_between:1,5',
            'resp_nume' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'resp_text' => 'required'
        ]);

        $consulta=Respuesta::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>1){
            return redirect()->back()->with('error', 'Numero de Respuesta ya asignado para este modulo');
        }


        $respuesta->update($request->all());

        return redirect()->route('respuestas.index')
            ->with('success', 'Respuesta Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $respuesta = Respuesta::find($id)->delete();

        return redirect()->route('respuestas.index')
            ->with('success', 'Respuesta se eliminó exitosamente');
    }
}
