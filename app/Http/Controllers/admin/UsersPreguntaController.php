<?php

namespace App\Http\Controllers\admin;

use App\Models\UsersPregunta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * Class UsersPreguntaController
 * @package App\Http\Controllers
 */
class UsersPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersPreguntas = UsersPregunta::paginate();

        return view('users-pregunta.index', compact('usersPreguntas'))
            ->with('i', (request()->input('page', 1) - 1) * $usersPreguntas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersPregunta = new UsersPregunta();
        return view('users-pregunta.create', compact('usersPregunta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UsersPregunta::$rules);

        $usersPregunta = UsersPregunta::create($request->all());

        return redirect()->route('users-preguntas.index')
            ->with('success', 'UsersPregunta creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usersPregunta = UsersPregunta::find($id);

        return view('users-pregunta.show', compact('usersPregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usersPregunta = UsersPregunta::find($id);

        return view('users-pregunta.edit', compact('usersPregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UsersPregunta $usersPregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersPregunta $usersPregunta)
    {
        request()->validate(UsersPregunta::$rules);

        $usersPregunta->update($request->all());

        return redirect()->route('users-preguntas.index')
            ->with('success', 'UsersPregunta Se actualizó exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usersPregunta = UsersPregunta::find($id)->delete();

        return redirect()->route('users-preguntas.index')
            ->with('success', 'UsersPregunta se eliminó exitosamente');
    }
}
