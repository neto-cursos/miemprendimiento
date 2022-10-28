<?php

namespace App\Http\Controllers\admin;

use App\Models\CronDependencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class CronDependenciaController
 * @package App\Http\Controllers
 */
class CronDependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cronDependencias = CronDependencia::paginate();

        return view('cron-dependencia.index', compact('cronDependencias'))
            ->with('i', (request()->input('page', 1) - 1) * $cronDependencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cronDependencia = new CronDependencia();
        return view('cron-dependencia.create', compact('cronDependencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CronDependencia::$rules);

        $cronDependencia = CronDependencia::create($request->all());

        return redirect()->route('cron-dependencias.index')
            ->with('success', 'CronDependencia creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cronDependencia = CronDependencia::find($id);

        return view('cron-dependencia.show', compact('cronDependencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cronDependencia = CronDependencia::find($id);

        return view('cron-dependencia.edit', compact('cronDependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CronDependencia $cronDependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CronDependencia $cronDependencia)
    {
        request()->validate(CronDependencia::$rules);

        $cronDependencia->update($request->all());

        return redirect()->route('cron-dependencias.index')
            ->with('success', 'CronDependencia Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cronDependencia = CronDependencia::find($id)->delete();

        return redirect()->route('cron-dependencias.index')
            ->with('success', 'CronDependencia se eliminó exitosamente');
    }
}
