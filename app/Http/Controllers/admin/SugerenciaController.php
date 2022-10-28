<?php

namespace App\Http\Controllers\admin;

use App\Models\Modulo;
use App\Models\Pregunta;
use App\Models\Sugerencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class SugerenciaController
 * @package App\Http\Controllers
 */
class SugerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sugerencias = Sugerencia::join('preguntas','preguntas.preg_id','=','sugerencias.preg_id')
        ->join('modulos','modulos.modu_nume','=','sugerencias.modu_nume')
        ->select(
            'preguntas.preg_text as preguntas_text',
            'modulos.modu_nomb as modulos_nomb',
            'sugerencias.*'
        )->paginate();

        return view('sugerencia.index', compact('sugerencias'))
            ->with('i', (request()->input('page', 1) - 1) * $sugerencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sugerencia = new Sugerencia();
        
        $modulos=Modulo::select('modu_id','modu_nume','modu_nomb')->get('modu_id','modu_nume','modu_nomb');
        $preguntas=Pregunta::select('preg_id','preg_nume','preg_text')->get('preg_id','preg_nume','preg_text');
        $tipo_sugerencias=array('Ejemplo','Video','Link');
        return view('sugerencia.create', compact('sugerencia','modulos','preguntas','tipo_sugerencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sugerencia::$rules);

        $request->validate([
            'preg_id' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'suge_tipo' => 'required',
            'suge_text' => 'required',
            //'suge_link' => 'required',
        ]);

        /*$consulta=Sugerencia::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Numero de Respuesta ya asignado para este modulo');
        }*/

        $sugerencia = Sugerencia::create($request->all());

        return redirect()->route('sugerencias.index')
            ->with('success', 'Sugerencia creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sugerencia = Sugerencia::find($id);

        return view('sugerencia.show', compact('sugerencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sugerencia = Sugerencia::find($id);
        $modulos=Modulo::select('modu_id','modu_nume','modu_nomb')->get('modu_id','modu_nume','modu_nomb');
        $preguntas=Pregunta::select('preg_id','preg_nume','preg_text')->get('preg_id','preg_nume','preg_text');
        $tipo_sugerencias=array('Ejemplo','Video','Link');
        return view('sugerencia.edit', compact('sugerencia','modulos','preguntas','tipo_sugerencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sugerencia $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sugerencia $sugerencia)
    {
        request()->validate(Sugerencia::$rules);

        
        $request->validate([
            'preg_id' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'suge_tipo' => 'required',
            'suge_text' => 'required',
            //'suge_link' => 'required',
        ]);

        /*$consulta=Sugerencia::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Numero de Respuesta ya asignado para este modulo');
        }*/


        $sugerencia->update($request->all());

        return redirect()->route('sugerencias.index')
            ->with('success', 'Sugerencia Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sugerencia = Sugerencia::find($id)->delete();

        return redirect()->route('sugerencias.index')
            ->with('success', 'Sugerencia se eliminó exitosamente');
    }
}
