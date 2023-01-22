<?php

namespace App\Http\Controllers\Api;

use App\Models\UsersPregunta;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersPreguntasController extends Controller
{
    //
    public function copyPreg(Request $request)
    {        
        if ($request->get('empr_id')) {
            // print_r($request->get('empr_id'));
            $usuarioPreguntas = new UsersPregunta();
            $preguntas = Pregunta::select('preg_id', 'modu_id', 'preg_text', 'preg_nume')->get('preg_id', 'modu_id', 'preg_text', 'preg_nume');
            if ($preguntas != null) {
                foreach ($preguntas as $key => $value) {
                    // print_r($value);
                    $usuarioPreguntas->modu_id = $value['modu_id'];
                    $usuarioPreguntas->usr_empr_id = $request->get('empr_id');
                    $usuarioPreguntas->usr_preg_nume = $value['preg_nume'];
                    $usuarioPreguntas->usr_preg_text = $value['preg_text'];
                    $usuarioPreguntas->usr_preg_desc = $value['preg_desc'];
                    $usuarioPreguntas->usr_preg_esta = $value['preg_esta'];
                    $respuesta = UsersPregunta::create([
                        // 'preg_id' => $request->get('preg_id'),
                        'modu_id' => $usuarioPreguntas->modu_id,
                        // 'id' => $request->get('id'),
                        'empr_id' => $usuarioPreguntas->usr_empr_id,
                        'usr_preg_nume' => $usuarioPreguntas->usr_preg_nume,
                        'usr_preg_text' => $usuarioPreguntas->usr_preg_text,
                        'usr_preg_desc' => $usuarioPreguntas->usr_preg_desc,
                        'usr_preg_esta' => $usuarioPreguntas->usr_preg_esta,
                    ]);
                }

                return response()->json([
                    'resultado' => 'exito'
                ], 201);
            }
        } else {
            return response()->json([
                'error' => 'Algo Falló',
            ], 401);
        }
    }
    public function createUsersPreg(Request $request)
    {
        //'id'=>Auth::user()->id,
        request()->validate(UsersPregunta::$rules);

        $request->validate([
            // 'preg_id' => 'required|numeric|digits_between:1,5',
            'modu_id' => 'required|numeric|digits_between:1,5',
            'id' => 'required|numeric|digits_between:1,5',
            'empr_id' => 'required|numeric|digits_between:1,5',
            'usr_preg_nume' => 'required',
            'usr_preg_text' => 'required',
            'usr_preg_desc' => 'required',
        ]);

        $respuesta = UsersPregunta::create([
            // 'preg_id' => $request->get('preg_id'),
            'modu_id' => $request->get('modu_id'),
            'id' => $request->get('id'),
            'empr_id' => $request->get('empr_id'),
            'usr_preg_nume' => $request->get('usr_preg_nume'),
            'usr_preg_text' => $request->get('usr_preg_text'),
            'usr_preg_desc' => $request->get('usr_preg_desc'),
        ]);
        /*$preguntas = UsersPregunta::where('id', $request->get('id'))
            ->where('empr_nomb', $request->get('empr_nomb'))->firstOrFail();*/
        /*return response()->json([
            'empr_id' => $preguntas->empr_id,
            'empr_nomb' => $request->get('empr_nomb'),
        ], 201)*/
        return response()->json([
            'resultado' => 'exito'
        ], 201);
    }


    public function getUsersPreg(Request $request)
    {
        if ($request->get('modu_id') && $request->get('empr_id')) {
            $preguntas = UsersPregunta::where('modu_id', $request->get('modu_id'))
                ->where('empr_id', $request->get('emmpr_id'))
                ->get();
            if ($preguntas != null) {
                return response()->json($preguntas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function checkInitUsersPreg(Request $request)
    {
        if ($request->get('empr_id')) {
            $consulta = UsersPregunta::where('empr_id', $request->get('empr_id'))
                ->count();
            // if ($consulta>0) {
                return response()->json(['count'=>$consulta], 201);
            // }
        }
        return response()->json([
            'error' => 'el número de emprendimiento no es válido',
        ], 401);
    }

    public function updateUsersPreg(Request $request)
    {
        request()->validate(UsersPregunta::$rules);
        $request->validate([
            'modu_id' => 'required|numeric|digits_between:1,5',
            'id' => 'numeric|digits_between:1,5',
            'empr_id' => 'required|numeric|digits_between:1,5',
            'usr_preg_nume' => 'required',
            'usr_preg_text' => 'required',
            'usr_preg_desc' => 'required',
        ]);
        if ($request->get('usr_preg_id')) {
            $preguntas = UsersPregunta::find($request->usr_preg_id);
            if ($preguntas != null) {
                $preguntas->update($request->all());
                return response()->json($preguntas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de pregunta de usuario no fue encontrado',
        ], 401);
    }

    public function deleteUsersPreg(Request $request)
    {
        if ($request->get('usr_preg_id')) {
            $preguntas = UsersPregunta::find($request->get('usr_preg_id'))->delete();
            if ($preguntas != null) {

                return response()->json($preguntas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de pregunta de usuario no fue encontrado',
        ], 401);
    }

    public function listUsersPreg(Request $request)
    {
        //$emprendimiento=[];
        if ($request->get('empr_id')) {
            $preguntas = UsersPregunta::select('usr_preg_id', 'modu_id', 'id', 'empr_id', 'usr_preg_text', 'usr_preg_nume')
                ->where('empr_id', '=', $request->get('empr_id'))
                ->get();
            if ($preguntas != null) {
                return response()->json($preguntas, 201);
            }
        } else
            return response()->json([
                'error' => 'el número de emprendimiento no fue encontrado',
            ], 401);
    }
}
