<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
/**
 * Class EmprendimientoController
 * @package App\Http\Controllers
 */
class EmprendimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$emprendimientos = Emprendimiento::paginate();
        $emprendimientos = Emprendimiento::join('users','users.id','=','emprendimientos.id')
        ->select(
            'users.id as id',
            'users.name as name',
            'users.apellido as apellido',
            'emprendimientos.*'
        )->paginate();


        return view('emprendimiento.index', compact('emprendimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $emprendimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user=User::select('id','name','apellido')->get('id','name','apellido');
        $emprendimiento = new Emprendimiento();
        return view('emprendimiento.create', compact('emprendimiento','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Emprendimiento::$rules);

        $request->validate([
            'id' => 'required|numeric|digits_between:1,5',
            'empr_nomb' => 'required|string|min:3|max:70',
            'empr_rubro' => 'required|string|min:4',
            'empr_tipo' => 'required|string|min:4',
        ]);

        $consulta=Emprendimiento::select('empr_id')
        ->where('empr_nomb','=',$request->empr_nomb)
        ->where('id','=',$request->id)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Registro Duplicado');
        }
        

        
        $emprendimiento = Emprendimiento::create($request->all());

        return redirect()->route('emprendimientos.index')
            ->with('success', 'Emprendimiento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emprendimiento = Emprendimiento::find($id);

        return view('emprendimiento.show', compact('emprendimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emprendimiento = Emprendimiento::find($id);
        $user=User::select('id','name','apellido')->get('id','name','apellido');

        return view('emprendimiento.edit', compact('emprendimiento','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Emprendimiento $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprendimiento $emprendimiento)
    {
        request()->validate(Emprendimiento::$rules);

        $request->validate([
            'id' => 'required|numeric|digits_between:1,5',
            'empr_nomb' => 'required|string|min:3|max:70',
            'empr_rubro' => 'required|string|min:4',
            'empr_tipo' => 'required|string|min:4',
        ]);

        $consulta=Emprendimiento::select('empr_id')
        ->where('empr_nomb','=',$request->empr_nomb)
        ->where('id','=',$request->id)
        ->get()->count();
        if($consulta>0){
            return redirect()->back()->with('error', 'Registro Duplicado');
        }

        $emprendimiento->update($request->all());

        return redirect()->route('emprendimientos.index')
            ->with('success', 'Emprendimiento Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $emprendimiento = Emprendimiento::find($id)->delete();

        return redirect()->route('emprendimientos.index')
            ->with('success', 'Emprendimiento se eliminó exitosamente');
    }
}
