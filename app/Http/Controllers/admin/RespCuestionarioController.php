<?php

namespace App\Http\Controllers\admin;

use App\Models\RespCuestionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class RespCuestionarioController
 * @package App\Http\Controllers
 */
class RespCuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respCuestionarios = RespCuestionario::paginate();

        return view('resp-cuestionario.index', compact('respCuestionarios'))
            ->with('i', (request()->input('page', 1) - 1) * $respCuestionarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respCuestionario = new RespCuestionario();
        return view('resp-cuestionario.create', compact('respCuestionario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RespCuestionario::$rules);

        $respCuestionario = RespCuestionario::create($request->all());

        return redirect()->route('resp-cuestionarios.index')
            ->with('success', 'RespCuestionario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respCuestionario = RespCuestionario::find($id);

        return view('resp-cuestionario.show', compact('respCuestionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respCuestionario = RespCuestionario::find($id);

        return view('resp-cuestionario.edit', compact('respCuestionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RespCuestionario $respCuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RespCuestionario $respCuestionario)
    {
        request()->validate(RespCuestionario::$rules);

        $respCuestionario->update($request->all());

        return redirect()->route('resp-cuestionarios.index')
            ->with('success', 'RespCuestionario Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $respCuestionario = RespCuestionario::find($id)->delete();

        return redirect()->route('resp-cuestionarios.index')
            ->with('success', 'RespCuestionario se eliminó exitosamente');
    }
}
