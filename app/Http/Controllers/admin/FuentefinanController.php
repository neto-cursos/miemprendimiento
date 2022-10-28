<?php

namespace App\Http\Controllers\admin;

use App\Models\Fuentefinan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class FuentefinanController
 * @package App\Http\Controllers
 */
class FuentefinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuentefinans = Fuentefinan::paginate();

        return view('fuentefinan.index', compact('fuentefinans'))
            ->with('i', (request()->input('page', 1) - 1) * $fuentefinans->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuentefinan = new Fuentefinan();
        return view('fuentefinan.create', compact('fuentefinan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fuentefinan::$rules);

        $fuentefinan = Fuentefinan::create($request->all());

        return redirect()->route('fuentefinans.index')
            ->with('success', 'Fuentefinan creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fuentefinan = Fuentefinan::find($id);

        return view('fuentefinan.show', compact('fuentefinan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuentefinan = Fuentefinan::find($id);

        return view('fuentefinan.edit', compact('fuentefinan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fuentefinan $fuentefinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuentefinan $fuentefinan)
    {
        request()->validate(Fuentefinan::$rules);

        $fuentefinan->update($request->all());

        return redirect()->route('fuentefinans.index')
            ->with('success', 'Fuentefinan Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fuentefinan = Fuentefinan::find($id)->delete();

        return redirect()->route('fuentefinans.index')
            ->with('success', 'Fuentefinan se eliminó exitosamente');
    }
}
