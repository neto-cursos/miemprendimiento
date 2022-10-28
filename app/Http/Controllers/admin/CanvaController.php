<?php

namespace App\Http\Controllers\admin;

use App\Models\Canva;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
/**
 * Class CanvaController
 * @package App\Http\Controllers
 */
class CanvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$canvas = Canva::paginate();
        $canvas = Canva::join('emprendimientos','canvas.empr_id','=','emprendimientos.empr_id')
        ->join('users','users.id','=','emprendimientos.id')
        ->select(
            'users.name as name',
            'users.apellido as apellido',
            'emprendimientos.empr_nomb as empr_nomb',
            'canvas.*'
        )->paginate();

        return view('canva.index', compact('canvas'))
            ->with('i', (request()->input('page', 1) - 1) * $canvas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emprendimiento=Emprendimiento::select('empr_id','empr_nomb')->get('empr_id','empr_nomb');
        $canva = new Canva();
        return view('canva.create', compact('canva','emprendimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Canva::$rules);

        $request->validate([
            'empr_id' => 'required|numeric|digits_between:1,5',
        ]);

        $consulta=Canva::select('empr_id')
        ->where('empr_id','=',$request->empr_id)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Emprendimiento con modelo de negocios ya asignado');
        }
               

        $canva = Canva::create($request->all());

        return redirect()->route('canvas.index')
            ->with('success', 'Canva creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $canva = Canva::find($id);

        return view('canva.show', compact('canva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emprendimiento=Emprendimiento::select('empr_id','empr_nomb')->get('empr_id','empr_nomb');
        $canva = Canva::find($id);

        return view('canva.edit', compact('canva','emprendimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Canva $canva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canva $canva)
    {
        request()->validate(Canva::$rules);

        $request->validate([
            'empr_id' => 'required|numeric|digits_between:1,5',
        ]);

        $consulta=Canva::select('empr_id')
        ->where('empr_id','=',$request->empr_id)
        ->get()->count();
        if($consulta>1){
            return redirect()->back()->with('error', 'Emprendimiento con modelo de negocios ya asignado');
        }

        $canva->update($request->all());

        return redirect()->route('canvas.index')
            ->with('success', 'Canva Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $canva = Canva::find($id)->delete();

        return redirect()->route('canvas.index')
            ->with('success', 'Canva se eliminó exitosamente');
    }
}
