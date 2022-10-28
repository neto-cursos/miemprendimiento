<?php

namespace App\Http\Controllers\admin;

use App\Models\Rubroact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class RubroactController
 * @package App\Http\Controllers
 */
class RubroactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubroacts = Rubroact::paginate();

        return view('rubroact.index', compact('rubroacts'))
            ->with('i', (request()->input('page', 1) - 1) * $rubroacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubroact = new Rubroact();
        return view('rubroact.create', compact('rubroact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rubroact::$rules);

        $rubroact = Rubroact::create($request->all());

        return redirect()->route('rubroacts.index')
            ->with('success', 'Rubroact creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rubroact = Rubroact::find($id);

        return view('rubroact.show', compact('rubroact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubroact = Rubroact::find($id);

        return view('rubroact.edit', compact('rubroact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rubroact $rubroact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubroact $rubroact)
    {
        request()->validate(Rubroact::$rules);

        $rubroact->update($request->all());

        return redirect()->route('rubroacts.index')
            ->with('success', 'Rubroact Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rubroact = Rubroact::find($id)->delete();

        return redirect()->route('rubroacts.index')
            ->with('success', 'Rubroact se eliminó exitosamente');
    }
}
