<?php

namespace App\Http\Controllers\admin;

use App\Models\CronActividade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class CronActividadeController
 * @package App\Http\Controllers
 */
class CronActividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cronActividades = CronActividade::paginate();

        return view('cron-actividade.index', compact('cronActividades'))
            ->with('i', (request()->input('page', 1) - 1) * $cronActividades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cronActividade = new CronActividade();
        return view('cron-actividade.create', compact('cronActividade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CronActividade::$rules);

        $cronActividade = CronActividade::create($request->all());

        return redirect()->route('cron-actividades.index')
            ->with('success', 'CronActividade creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cronActividade = CronActividade::find($id);

        return view('cron-actividade.show', compact('cronActividade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cronActividade = CronActividade::find($id);

        return view('cron-actividade.edit', compact('cronActividade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CronActividade $cronActividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CronActividade $cronActividade)
    {
        request()->validate(CronActividade::$rules);

        $cronActividade->update($request->all());

        return redirect()->route('cron-actividades.index')
            ->with('success', 'CronActividade Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cronActividade = CronActividade::find($id)->delete();

        return redirect()->route('cron-actividades.index')
            ->with('success', 'CronActividade se eliminó exitosamente');
    }
}
