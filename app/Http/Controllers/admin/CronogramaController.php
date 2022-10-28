<?php

namespace App\Http\Controllers\admin;

use App\Models\Cronograma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class CronogramaController
 * @package App\Http\Controllers
 */
class CronogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cronogramas = Cronograma::paginate();

        return view('cronograma.index', compact('cronogramas'))
            ->with('i', (request()->input('page', 1) - 1) * $cronogramas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cronograma = new Cronograma();
        return view('cronograma.create', compact('cronograma'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cronograma::$rules);

        $cronograma = Cronograma::create($request->all());

        return redirect()->route('cronogramas.index')
            ->with('success', 'Cronograma creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cronograma = Cronograma::find($id);

        return view('cronograma.show', compact('cronograma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cronograma = Cronograma::find($id);

        return view('cronograma.edit', compact('cronograma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cronograma $cronograma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cronograma $cronograma)
    {
        request()->validate(Cronograma::$rules);

        $cronograma->update($request->all());

        return redirect()->route('cronogramas.index')
            ->with('success', 'Cronograma Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cronograma = Cronograma::find($id)->delete();

        return redirect()->route('cronogramas.index')
            ->with('success', 'Cronograma se eliminó exitosamente');
    }
}
