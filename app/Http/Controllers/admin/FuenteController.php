<?php

namespace App\Http\Controllers\admin;

use App\Models\Fuente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class FuenteController
 * @package App\Http\Controllers
 */
class FuenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuentes = Fuente::paginate();

        return view('fuente.index', compact('fuentes'))
            ->with('i', (request()->input('page', 1) - 1) * $fuentes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuente = new Fuente();
        return view('fuente.create', compact('fuente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fuente::$rules);

        $fuente = Fuente::create($request->all());

        return redirect()->route('fuentes.index')
            ->with('success', 'Fuente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fuente = Fuente::find($id);

        return view('fuente.show', compact('fuente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuente = Fuente::find($id);

        return view('fuente.edit', compact('fuente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fuente $fuente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuente $fuente)
    {
        request()->validate(Fuente::$rules);

        $fuente->update($request->all());

        return redirect()->route('fuentes.index')
            ->with('success', 'Fuente Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fuente = Fuente::find($id)->delete();

        return redirect()->route('fuentes.index')
            ->with('success', 'Fuente se eliminó exitosamente');
    }
}
