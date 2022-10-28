<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Sugerencia;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SugerenciasController extends Controller
{
    //
    public function createSuge(Request $request)
    {
        //'id'=>Auth::user()->id,
        request()->validate(Sugerencia::$rules);    
        
        $request->validate([
            'preg_id' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'suge_tipo' => 'required',
            'suge_text' => 'required',
        ]);

        $respuesta = Sugerencia::create([
            'preg_id' => $request->get('preg_id'),
            'modu_nume' => $request->get('modu_nume'),
            'suge_tipo' => $request->get('suge_tipo'),
            'suge_rubro' => $request->get('suge_rubro'),
            'suge_text' => $request->get('suge_text'),
            'suge_link' => $request->get('suge_link'),
        ]);
        /*$sugerencias = Sugerencia::where('id', $request->get('id'))
            ->where('empr_nomb', $request->get('empr_nomb'))->firstOrFail();*/
        /*return response()->json([
            'empr_id' => $sugerencias->empr_id,
            'empr_nomb' => $request->get('empr_nomb'),
        ], 201)*/
        return response()->json([
            'resultado' => 'exito'
        ], 201);
    }


    public function getsuge(Request $request)
    {
        //if ($request->get('modu_nume')&&($request->get('preg_id'))&&($request->get('suge_tipo'))) {
        if ($request->get('modu_nume')) {
            $sugerencias = Sugerencia::where('modu_nume', $request->get('modu_nume'))
            ->get();
            if ($sugerencias != null) {
                return response()->json($sugerencias, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function updateResp(Request $request)
    {
        request()->validate(Sugerencia::$rules);    
        $request->validate([
            'preg_id' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'suge_tipo' => 'required',
            'suge_text' => 'required',
        ]);
        /*$consulta=Sugerencia::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>1){
            return response()->json(['error', 'Numero de Sugerencia ya asignado para este modulo']);
        }*/
        if ($request->get('suge_id')) {
            $sugerencias = Sugerencia::find($request->suge_id);
            if ($sugerencias != null) {
                $sugerencias->update($request->all());
                return response()->json($sugerencias, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function deleteResp(Request $request)
    {
        if ($request->get('suge_id')) {
            $sugerencias = Sugerencia::find($request->get('suge_id'))->delete();
            if ($sugerencias != null) {
                
                return response()->json($sugerencias, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function listSuge(Request $request)
    {
        //$emprendimiento=[];
        if ($request->get('modu_nume')&&$request->get('preg_id')) {
            $sugerencias = Sugerencia::where('modu_nume', $request->get('modu_nume'))->
            where('preg_id',$request->get('preg_id'))
            ->get();
            if ($sugerencias != null) {
                return response()->json($sugerencias, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo o pregunta no fue encontrado',
        ], 401);
    }
}
