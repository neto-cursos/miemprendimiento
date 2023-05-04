<?php

namespace App\Http\Controllers\Api;

use App\Models\RespCosto;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RespCostosController extends Controller
{
    //
    public function createRespCosto(Request $request)
    {
        //'id'=>Auth::user()->id,
        request()->validate(RespCosto::$rules);

        $request->validate([
            //'resp_cost_id' => 'required|numeric|digits_between:1,5',
            'canv_id' => 'required|numeric|digits_between:1,5',
            'cost_id' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            //'resp_cost_nume' => 'required',
            'resp_cost_acti' => 'required',
            'resp_cost_monto' => 'required',
            //'resp_cost_desc' => 'required',
            //'resp_cost_esta'=>'required',
        ]);
        // $resp_id_ref=isset($request->get('resp_id_ref')) ? $request->get('resp_id_ref') : null;
        $respuesta = RespCosto::create([
            'canv_id' => $request->get('canv_id'),
            'cost_id' => $request->get('cost_id'),
            'modu_nume' => $request->get('modu_nume'),
            //'resp_cost_nume' => $request->get('resp_cost_nume'),
            //'resp_cost_desc' => $request->get('resp_cost_desc'),
            'resp_cost_acti' => $request->get('resp_cost_acti'),
            'resp_cost_monto' => $request->get('resp_cost_monto'),
            'resp_id_ref' => ($request->get('resp_id_ref'!=null)) ? $request->get('resp_id_ref') : null,
            //'resp_cost_esta' => $request->get('resp_cost_esta'),
        ]);
        /*$RespCostos = RespCosto::where('id', $request->get('id'))
            ->where('empr_nomb', $request->get('empr_nomb'))->firstOrFail();*/
        /*return response()->json([
            'empr_id' => $RespCostos->empr_id,
            'empr_nomb' => $request->get('empr_nomb'),
        ], 201)*/
        return response()->json([
            'resultado' => 'exito'
        ], 201);
    }


    public function getRespCosto(Request $request)
    {
        if ($request->get('modu_nume')) {
            $RespCostos = RespCosto::where('modu_nume', $request->get('modu_nume'))
                ->get();
            if ($RespCostos != null) {
                return response()->json($RespCostos, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function updateRespCostoBasic(Request $request)
    {
        request()->validate(RespCosto::$rules);
        $request->validate([
            //'resp_cost_id' => 'required|numeric|digits_between:1,5',
            'canv_id' => 'required|numeric|digits_between:1,5',
            'cost_id' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            //'resp_cost_nume' => 'required',
            'resp_cost_acti' => 'required',
            'resp_cost_monto' => 'required',
            //'resp_cost_desc' => 'required',
            //'resp_cost_esta'=>'required',
        ]);
        /*$consulta=RespCosto::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>1){
            return response()->json(['error', 'Numero de RespCosto ya asignado para este modulo']);
        }*/
        if ($request->get('resp_cost_id')) {
            $RespCostos = RespCosto::find($request->resp_cost_id);
            if ($RespCostos != null) {
                $RespCostos->update($request->all());
                return response()->json($RespCostos, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function deleteRespCosto(Request $request)
    {
        if ($request->get('resp_cost_id')) {
            $RespCostos = RespCosto::find($request->get('resp_cost_id'))->delete();
            if ($RespCostos != null) {

                return response()->json($RespCostos, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function listRespCosto(Request $request)
    {
        //$emprendimiento=[];

        if ($request->get('canv_id')) {
            $respCostos = RespCosto::where('canv_id', $request->get('canv_id'))->get();
            if ($respCostos != null) {
                return response()->json($respCostos, 201);
            }
        }
        // $RespCostos = RespCosto::select('resp_cost_id', 'canv_id', 'cost_id', 'modu_nume', 'resp_cost_acti', 'resp_cost_monto')->get('resp_cost_id', 'canv_id', 'cost_id', 'modu_nume', 'resp_cost_acti', 'resp_cost_monto');
        // if ($RespCostos != null) {
        //     return response()->json($RespCostos, 201);
        // }

        return response()->json([
            'error' => 'el número de módulo o RespCosto no fue encontrado',
        ], 401);
    }

    private function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    public function updateRespCosto(Request $request)
    {
        $input = $request->all();
        $valores = new RespCosto();
        $id = null;
        $indices = array();
        $inicio = true;
        foreach ($input as $key => $value) {
            $valores = (object)$value;
            $id = (isset($valores->resp_cost_id) ? $valores->resp_cost_id : null);
            if ($id !== null) {
                $resp_cost_id = isset($valores->resp_cost_id) ? $valores->resp_cost_id : null;
                $request2 = new Request([
                    'cost_id' => isset($valores->cost_id) ? $valores->cost_id : null,
                    'modu_nume' => isset($valores->modu_nume) ? $valores->modu_nume : null,
                    'canv_id' => isset($valores->canv_id) ? $valores->canv_id : null,
                    'resp_cost_desc' => isset($valores->resp_cost_desc) ? $valores->resp_cost_desc : null,
                    'resp_cost_nume' => isset($valores->resp_cost_nume) ? $valores->resp_cost_nume : null,
                    'resp_cost_acti' => isset($valores->resp_cost_acti) ? $valores->resp_cost_acti : null,
                    'resp_cost_monto' => isset($valores->resp_cost_monto) ? $valores->resp_cost_monto : null,
                    'resp_id_ref' => isset($valores->resp_id_ref) ? $valores->resp_id_ref : null,
                    'resp_cost_esta' => 1,
                ]);
                $request2->validate([
                    'canv_id' => 'required|numeric|digits_between:1,11',
                    //'resp_nume' => 'required|numeric|digits_between:1,5',
                    'modu_nume' => 'required|numeric|digits_between:1,5',
                    'resp_cost_acti' => 'required',
                    'resp_cost_monto' => 'required',
                ]);
                $respuestas = RespCosto::find($resp_cost_id);
                if ($inicio === true) {
                    $indices = $this->getIndexArray($request2->get('canv_id'));
                    $inicio = false;
                }
                $indices = $this->deleteRespNotFound($indices, $resp_cost_id);

                //return response()->json(['indices'=>$indices,'momi'=>$request2->get('canv_id')], 201);
                if ($respuestas != null) {

                    $respuestas->update($request2->all());
                    //return response()->json($respuestas, 201);
                } else {
                    $respuesta3 = RespCosto::create($request2->all());
                    //return response()->json($respuesta3, 201);
                }
            } else {
                $resp_cost_id = isset($valores->resp_cost_id) ? $valores->resp_cost_id : null;
                $request2 = new Request([
                    'canv_id' => isset($valores->canv_id) ? $valores->canv_id : null,
                ]);
                $indices = $this->getIndexArray($request2->get('canv_id'));
                $indices = $this->deleteRespNotFound($indices, $resp_cost_id);
            }
        }
        //return response()->json(['indices' => $indices,], 201);
        $this->removeResps($indices);
        $uniqId = $this->unique_code(9);
        return response()->json([
            'error' => $id,
        ]);
    }

    /**
     * Remove each instance of an object within an array (matched on a given property, $prop)
     * @param array $array
     * @param mixed $value
     * @param string $prop
     * @return array
     */
    public function removeResps($array)
    {
        foreach ($array as $key => $value) {
            if (isset($value['resp_cost_id'])) {
                $respuestas = RespCosto::find($value['resp_cost_id'])->delete();
                if ($respuestas != null) {
                }
            }
        }
        //return response()->json($respuestas, 201);
    }

    public function getIndexArray($canv_id)
    {
        $consulta2 = array();
        if ($canv_id !== null) {
            $index = 0;
            $consulta = RespCosto::select('resp_cost_id')->where('canv_id', $canv_id)->get('resp_cost_id');
            foreach ($consulta as $key => $value) {
                $consulta2[$index]['resp_cost_id'] = $value->resp_cost_id;
                $index++;
            }
        }
        return $consulta2;
    }
    public function deleteRespNotFound($indices, $resp_cost_id)
    {
        if ($resp_cost_id !== null) {
            $consulta3 = $indices;
            foreach ($indices as $key => $value) {
                if ($value['resp_cost_id'] == $resp_cost_id) {
                    $consulta3 = array_filter($consulta3, function ($a) use ($value) {
                        return $a['resp_cost_id'] !== $value['resp_cost_id'];
                    });
                }
            }
            $indices = $consulta3;
        }
        return $indices;
    }

    public function queryResp(Request $request)
    {
        if ($request->filled('resp_cost_id')) {
            $respuestas = RespCosto::where('resp_cost_id', $request->get('resp_cost_id'))->firstOrFail();
            return response()->json([
                'resp_cost_acti' => $respuestas->resp_cost_acti,
                'resp_cost_monto' => $respuestas->resp_cost_monto,
            ], 201);
        } else {
            return response()->json([
                'error' => 'No se envió el resp_id',
            ]);
        }
    }
}
