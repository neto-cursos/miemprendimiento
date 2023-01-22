<?php

namespace App\Http\Controllers\admin;

use App\Models\RespCosto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class RespCostoController
 * @package App\Http\Controllers
 */
class RespCostoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respCostos = RespCosto::paginate();

        return view('resp-costo.index', compact('respCostos'))
            ->with('i', (request()->input('page', 1) - 1) * $respCostos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respCosto = new RespCosto();
        return view('resp-costo.create', compact('respCosto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RespCosto::$rules);

        $respCosto = RespCosto::create($request->all());

        return redirect()->route('resp-costos.index')
            ->with('success', 'RespCosto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respCosto = RespCosto::find($id);

        return view('resp-costo.show', compact('respCosto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respCosto = RespCosto::find($id);

        return view('resp-costo.edit', compact('respCosto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RespCosto $respCosto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RespCosto $respCosto)
    {
        request()->validate(RespCosto::$rules);

        $respCosto->update($request->all());

        return redirect()->route('resp-costos.index')
            ->with('success', 'RespCosto Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $respCosto = RespCosto::find($id)->delete();

        return redirect()->route('resp-costos.index')
            ->with('success', 'RespCosto se eliminó exitosamente');
    }
}
