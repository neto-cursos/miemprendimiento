<?php

namespace App\Http\Controllers\admin;

use App\Models\OpciCuestionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class OpciCuestionarioController
 * @package App\Http\Controllers
 */
class OpciCuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opciCuestionarios = OpciCuestionario::paginate();

        return view('opci-cuestionario.index', compact('opciCuestionarios'))
            ->with('i', (request()->input('page', 1) - 1) * $opciCuestionarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opciCuestionario = new OpciCuestionario();
        return view('opci-cuestionario.create', compact('opciCuestionario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OpciCuestionario::$rules);

        $opciCuestionario = OpciCuestionario::create($request->all());

        return redirect()->route('opci-cuestionarios.index')
            ->with('success', 'OpciCuestionario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opciCuestionario = OpciCuestionario::find($id);

        return view('opci-cuestionario.show', compact('opciCuestionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opciCuestionario = OpciCuestionario::find($id);

        return view('opci-cuestionario.edit', compact('opciCuestionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OpciCuestionario $opciCuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpciCuestionario $opciCuestionario)
    {
        request()->validate(OpciCuestionario::$rules);

        $opciCuestionario->update($request->all());

        return redirect()->route('opci-cuestionarios.index')
            ->with('success', 'OpciCuestionario Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $opciCuestionario = OpciCuestionario::find($id)->delete();

        return redirect()->route('opci-cuestionarios.index')
            ->with('success', 'OpciCuestionario se eliminó exitosamente');
    }
}
