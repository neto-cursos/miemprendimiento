<?php

namespace App\Http\Controllers\admin;

use App\Models\Modulo;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class PreguntaController
 * @package App\Http\Controllers
 */
class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$preguntas = Pregunta::paginate();
        $preguntas = Pregunta::join('modulos','modulos.modu_id','=','preguntas.modu_id')
        ->select(
            'modulos.modu_id as modu_id',
            'modulos.modu_nomb as modu_nomb',
            'modulos.modu_nume as modu_nume',
            'preguntas.*'
        )->paginate();

        return view('pregunta.index', compact('preguntas'))
            ->with('i', (request()->input('page', 1) - 1) * $preguntas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pregunta = new Pregunta();
        $modulo=Modulo::select('modu_id','modu_nomb','modu_nume')->get('modu_id','modu_nomb','modu_nume');
        return view('pregunta.create', compact('pregunta','modulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pregunta::$rules);
        $request->validate([
            'modu_id' => 'required|numeric|digits_between:1,5',
            'preg_text'=> 'required',
        ]);

        /*$consulta=Pregunta::select('empr_id')
        ->where('empr_nomb','=',$request->empr_nomb)
        ->where('id','=',$request->id)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Registro Duplicado');
        }*/       

        $pregunta = Pregunta::create($request->all());

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregunta = Pregunta::find($id);

        return view('pregunta.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        $modulo=Modulo::select('modu_id','modu_nomb','modu_nume')->get('modu_id','modu_nomb','modu_nume');
        return view('pregunta.edit', compact('pregunta','modulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        request()->validate(Pregunta::$rules);
        $request->validate([
            'modu_id' => 'required|numeric|digits_between:1,5',
            'preg_text'=> 'required',
        ]);

        /*$consulta=Pregunta::select('empr_id')
        ->where('empr_nomb','=',$request->empr_nomb)
        ->where('id','=',$request->id)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Registro Duplicado');
        }*/
        $pregunta->update($request->all());

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pregunta = Pregunta::find($id)->delete();

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta se eliminó exitosamente');
    }
}
