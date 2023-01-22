<?php

namespace App\Http\Controllers\Api;

use App\Models\Costo;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CostosController extends Controller
{
    //
    public function createCosto(Request $request)
    {
        //'id'=>Auth::user()->id,
        request()->validate(Costo::$rules);    
        
        $request->validate([
            //'cost_id' => 'required|numeric|digits_between:1,5',
            'modu_id' => 'required|numeric|digits_between:1,5',
            'cost_text' => 'required',
            //'cost_desc' => 'required',
        ]);

        $respuesta = Costo::create([
            //'cost_id' => $request->get('cost_id'),
            'modu_id' => $request->get('modu_id'),
            //'cost_nume' => $request->get('cost_nume'),
            'cost_text' => $request->get('cost_text'),
            //'cost_desc' => $request->get('cost_desc'),
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


    public function getCosto(Request $request)
    {
        if ($request->get('modu_nume')) {
            $costos = Costo::where('modu_id', $request->get('modu_id'))
            ->get();
            if ($costos != null) {
                return response()->json($costos, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function updateCosto(Request $request)
    {
        request()->validate(Costo::$rules);    
        $request->validate([
            //'cost_id' => 'required|numeric|digits_between:1,5',
            'modu_id' => 'required|numeric|digits_between:1,5',
            'cost_text' => 'required',
            //'cost_desc' => 'required',
        ]);
        
        if ($request->get('cost_id')) {
            $costos = Costo::find($request->cost_id);
            if ($costos != null) {
                $costos->update($request->all());
                return response()->json($costos, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function deleteCosto(Request $request)
    {
        if ($request->get('cost_id')) {
            $costos = Costo::find($request->get('cost_id'))->delete();
            if ($costos != null) {
                
                return response()->json($costos, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function listCosto()
    {
        //$emprendimiento=[];
        
            $costos = Costo::select('cost_id','modu_id','cost_text','cost_desc')->get('cost_id','modu_id','cost_text','cost_desc');
            if ($costos != null) {
                return response()->json($costos, 201);
            }
        
        return response()->json([
            'error' => 'el número de módulo o pregunta no fue encontrado',
        ], 401);
    }
}
