<?php

namespace App\Http\Controllers\admin;

use App\Models\Categoriasact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class CategoriasactController
 * @package App\Http\Controllers
 */
class CategoriasactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasacts = Categoriasact::paginate();

        return view('categoriasact.index', compact('categoriasacts'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriasacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasact = new Categoriasact();
        return view('categoriasact.create', compact('categoriasact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Categoriasact::$rules);

        $categoriasact = Categoriasact::create($request->all());

        return redirect()->route('categoriasacts.index')
            ->with('success', 'Categoriasact creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasact = Categoriasact::find($id);

        return view('categoriasact.show', compact('categoriasact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasact = Categoriasact::find($id);

        return view('categoriasact.edit', compact('categoriasact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoriasact $categoriasact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriasact $categoriasact)
    {
        request()->validate(Categoriasact::$rules);

        $categoriasact->update($request->all());

        return redirect()->route('categoriasacts.index')
            ->with('success', 'Categoriasact Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriasact = Categoriasact::find($id)->delete();

        return redirect()->route('categoriasacts.index')
            ->with('success', 'Categoriasact se eliminó exitosamente');
    }
}
