<?php

namespace App\Http\Controllers\Api;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PreguntasController extends Controller
{
    //
    public function createPreg(Request $request)
    {
        //'id'=>Auth::user()->id,
        request()->validate(Pregunta::$rules);    
        
        $request->validate([
            'preg_id' => 'required|numeric|digits_between:1,5',
            'modu_id' => 'required|numeric|digits_between:1,5',
            'preg_nume' => 'required',
            'preg_text' => 'required',
            'preg_desc' => 'required',
        ]);

        $respuesta = Pregunta::create([
            'preg_id' => $request->get('preg_id'),
            'modu_id' => $request->get('modu_id'),
            'preg_nume' => $request->get('preg_nume'),
            'preg_text' => $request->get('preg_text'),
            'preg_desc' => $request->get('preg_desc'),
        ]);
        /*$preguntas = Pregunta::where('id', $request->get('id'))
            ->where('empr_nomb', $request->get('empr_nomb'))->firstOrFail();*/
        /*return response()->json([
            'empr_id' => $preguntas->empr_id,
            'empr_nomb' => $request->get('empr_nomb'),
        ], 201)*/
        return response()->json([
            'resultado' => 'exito'
        ], 201);
    }


    public function getPreg(Request $request)
    {
        if ($request->get('modu_nume')) {
            $preguntas = Pregunta::where('modu_id', $request->get('modu_nume'))
            ->get();
            if ($preguntas != null) {
                return response()->json($preguntas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function updatePreg(Request $request)
    {
        request()->validate(Pregunta::$rules);    
        $request->validate([
            'preg_id' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'suge_tipo' => 'required',
            'suge_text' => 'required',
        ]);
        /*$consulta=Pregunta::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>1){
            return response()->json(['error', 'Numero de Pregunta ya asignado para este modulo']);
        }*/
        if ($request->get('suge_id')) {
            $preguntas = Pregunta::find($request->suge_id);
            if ($preguntas != null) {
                $preguntas->update($request->all());
                return response()->json($preguntas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function deletePreg(Request $request)
    {
        if ($request->get('suge_id')) {
            $preguntas = Pregunta::find($request->get('suge_id'))->delete();
            if ($preguntas != null) {
                
                return response()->json($preguntas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function listPreg()
    {
        //$emprendimiento=[];
        
            $preguntas = Pregunta::select('preg_id','modu_id','preg_text','preg_nume')->get('preg_id','modu_id','preg_text','preg_nume');
            if ($preguntas != null) {
                return response()->json($preguntas, 201);
            }
        
        return response()->json([
            'error' => 'el número de módulo o pregunta no fue encontrado',
        ], 401);
    }
}
