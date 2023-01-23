<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Canva;
use App\Models\RespCosto;
use App\Models\Respuesta;
use App\Models\Cronograma;
use Illuminate\Http\Request;
use App\Models\UsersPregunta;
use App\Models\CronActividade;
use App\Models\Emprendimiento;
use App\Models\CronDependencia;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmprendimientosController extends Controller
{
    //
    public function createEmpr(Request $request)
    {
        //'id'=>Auth::user()->id,
        request()->validate(Emprendimiento::$rules);
        $validator = validator($request->all(), [
            'empr_nomb' => 'required|unique:emprendimientos,empr_nomb',
            //'message' => 'required|max:1000',
            //'img' => 'mimes:jpeg,png,gif|max:3000',
        ]);

        if ($validator->fails()) {
            // return as appropriate
            return response()->json(['errores' => $validator->errors()], 201);
        }
        // $request->validate([
        //     'empr_nomb' => 'required|unique:emprendimientos,empr_nomb',
        // ]);
        $emprendimiento = Emprendimiento::create([
            'id' => $request->get('id'),
            'empr_nomb' => $request->get('empr_nomb'),
            'empr_rubro' => $request->get('empr_rubro'),
            'empr_tipo' => $request->get('empr_tipo'),
        ]);
        $emprendimientos = Emprendimiento::where('id', $request->get('id'))
            ->where('empr_nomb', $request->get('empr_nomb'))->firstOrFail();
        return response()->json([
            'empr_id' => $emprendimientos->empr_id,
            'empr_nomb' => $request->get('empr_nomb'),
        ], 201);
    }


    public function updateEmpr(Request $request)
    {
        //'id'=>Auth::user()->id,
        $pass = false;
        $emprendimientos = Emprendimiento::where('empr_id', $request->get('empr_id'))->firstOrFail();
        if ($emprendimientos) {
            if ($emprendimientos->empr_nomb == $request->empr_nomb)
                $pass = true;
            else {
                request()->validate(Emprendimiento::$rules);
                $validator = validator($request->all(), [
                    'empr_nomb' => 'required|unique:emprendimientos,empr_nomb',
                    //'message' => 'required|max:1000',
                    //'img' => 'mimes:jpeg,png,gif|max:3000',
                ]);
                if ($validator->fails()) {
                    // return as appropriate
                    return response()->json(['errores' => $validator->errors()], 201);
                } else
                    $pass = true;
            }
        }

        if ($pass = true) {
            $empr = Emprendimiento::find($request->empr_id);
            if ($empr) {
                $empr->update($request->all());
            }
            return response()->json([
                'empr_id' => $emprendimientos->empr_id,
                'empr_nomb' => $request->get('empr_nomb'),
            ], 201);
        }
        
    }

    public function listEmpr(Request $request)
    {
        //$emprendimiento=[];
        if ($request->get('id')) {
            $emprendimiento = Emprendimiento::where('id', $request->get('id'))->get();
            if ($emprendimiento != null) {
                return response()->json($emprendimiento, 201);
            }
        }
        return response()->json([
            'error' => 'La id del usuario no fue encontrada',
        ], 401);
        /*return response()->json([
            'error' => $request->id,
        ], 201);*/
    }

    public function queryEmpr(Request $request)
    {
        if ($request->filled('empr_id')) {
            $emprendimientos = Emprendimiento::where('empr_id', $request->get('empr_id'))->firstOrFail();
            return response()->json([
                'empr_nomb' => $emprendimientos->empr_nomb,
            ], 201);
        } else {
            return response()->json([
                'error' => 'No se envió el empr_id',
            ]);
        }
        /*
        return response()->json([
            'empr_nomb'=>$request->get('empr_id'),
        ],201);*/
    }

    public function removeEmpr(Request $request)
    {
        if ($request->filled('empr_id')) {
            $consultaRespCostos = RespCosto::join('canvas', 'canvas.canv_id', '=', 'resp_costos.canv_id')
                ->select('resp_cost_id')->where('canvas.empr_id', '=', $request->get('empr_id'))->get('resp_cost_id');
            foreach ($consultaRespCostos as $key => $value) {
                $consultaRespCostosAux = RespCosto::find($value->resp_cost_id)->delete();
            }

            $consultaCronDep = CronDependencia::join('cron_actividades', 'cron_actividades.id', '=', 'cron_dependencias.id')
                ->select('cron_dep_id')->where('cron_actividades.empr_id', '=', $request->get('empr_id'))->get('cron_dep_id');
            foreach ($consultaCronDep as $key => $value) {
                $consultaCronDepAux = CronDependencia::find($value->cron_dep_id)->delete();
            }

            $consultaCronActi = CronActividade::Select('id')->where('empr_id', '=', $request->get('empr_id'))
            ->get('id');
            foreach ($consultaCronActi as $key => $value) {
                $consultaCronActi = CronActividade::find($value->id)->delete();
            }

            $consultaCronos = Cronograma::Select('cron_id')->where('empr_id', '=', $request->get('empr_id'))
            ->get('cron_id');
            foreach ($consultaCronos as $key => $value) {
                $consultaCronosAux = Cronograma::find($value->cron_id)->delete();
            }
            $consulta = Respuesta::join('canvas', 'canvas.canv_id', '=', 'respuestas.canv_id')
                ->select('resp_id')->where('canvas.empr_id', '=', $request->get('empr_id'))->get('resp_id');
            foreach ($consulta as $key => $value) {
                $consulta4 = Respuesta::find($value->resp_id)->delete();
            }

            $consultaPreg = UsersPregunta::Select('usr_preg_id')->where('empr_id', '=', $request->get('empr_id'))
            ->get('usr_preg_id');
            foreach ($consultaPreg as $key => $value) {
                $consultaPregAux = UsersPregunta::find($value->usr_preg_id)->delete();
            }

            $consulta2 = Canva::select('canv_id')->where('empr_id', '=', $request->get('empr_id'))
                ->get('canv_id');
            foreach ($consulta2 as $key => $value) {
                $consulta5 = Canva::find($value->canv_id)->delete();
            }
            $consulta3 = Emprendimiento::find($request->get('empr_id'))->delete();
            return response()->json([
                'exito' => 'se eliminó el emprendimiento',
            ], 201);
        } else {
            return response()->json([
                'error' => 'No se envió el empr_id',
            ]);
        }
    }
}
