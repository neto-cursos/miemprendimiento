<?php

namespace App\Http\Controllers\admin;

use App\Models\Cuestionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class CuestionarioController
 * @package App\Http\Controllers
 */
class CuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuestionarios = Cuestionario::paginate();

        return view('cuestionario.index', compact('cuestionarios'))
            ->with('i', (request()->input('page', 1) - 1) * $cuestionarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuestionario = new Cuestionario();
        return view('cuestionario.create', compact('cuestionario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cuestionario::$rules);

        $cuestionario = Cuestionario::create($request->all());

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuestionario = Cuestionario::find($id);

        return view('cuestionario.show', compact('cuestionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuestionario = Cuestionario::find($id);

        return view('cuestionario.edit', compact('cuestionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cuestionario $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuestionario $cuestionario)
    {
        request()->validate(Cuestionario::$rules);

        $cuestionario->update($request->all());

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cuestionario = Cuestionario::find($id)->delete();

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario se eliminó exitosamente');
    }
}
