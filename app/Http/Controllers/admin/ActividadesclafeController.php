<?php

namespace App\Http\Controllers\admin;

use App\Models\Actividadesclafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class ActividadesclafeController
 * @package App\Http\Controllers
 */
class ActividadesclafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividadesclaves = Actividadesclafe::paginate();

        return view('actividadesclafe.index', compact('actividadesclaves'))
            ->with('i', (request()->input('page', 1) - 1) * $actividadesclaves->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividadesclafe = new Actividadesclafe();
        return view('actividadesclafe.create', compact('actividadesclafe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Actividadesclafe::$rules);

        $actividadesclafe = Actividadesclafe::create($request->all());

        return redirect()->route('actividadesclaves.index')
            ->with('success', 'Actividadesclafe creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividadesclafe = Actividadesclafe::find($id);

        return view('actividadesclafe.show', compact('actividadesclafe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividadesclafe = Actividadesclafe::find($id);

        return view('actividadesclafe.edit', compact('actividadesclafe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Actividadesclafe $actividadesclafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividadesclafe $actividadesclafe)
    {
        request()->validate(Actividadesclafe::$rules);

        $actividadesclafe->update($request->all());

        return redirect()->route('actividadesclaves.index')
            ->with('success', 'Actividadesclafe Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $actividadesclafe = Actividadesclafe::find($id)->delete();

        return redirect()->route('actividadesclaves.index')
            ->with('success', 'Actividadesclafe se eliminó exitosamente');
    }
}
