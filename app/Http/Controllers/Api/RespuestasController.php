<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

class RespuestasController extends Controller
{
    //
    public function createResp(Request $request)
    {
        //'id'=>Auth::user()->id,
        request()->validate(Respuesta::$rules);
        $request->validate([
            'canv_id' => 'required|numeric|digits_between:1,10',
            'resp_nume' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'resp_text' => 'required'
        ]);

        $consulta = Respuesta::select('resp_nume')
            ->where('modu_nume', '=', $request->modu_nume)
            ->where('canv_id', '=', $request->canv_id)
            ->where('resp_nume', '=', $request->resp_nume)
            ->get()->count();
        if ($consulta > 0) {
            return response()->json(['error', 'Numero de Respuesta ya asignado para este modulo']);
        }
        $respuesta = Respuesta::create([
            'preg_id' => $request->get('preg_id'),
            'modu_nume' => $request->get('modu_nume'),
            'canv_id' => $request->get('canv_id'),
            'resp_nume' => $request->get('resp_nume'),
            'resp_text' => $request->get('resp_text'),
            'resp_desc' => $request->get('resp_desc'),
        ]);
        /*$respuestas = Respuesta::where('id', $request->get('id'))
            ->where('empr_nomb', $request->get('empr_nomb'))->firstOrFail();*/
        /*return response()->json([
            'empr_id' => $respuestas->empr_id,
            'empr_nomb' => $request->get('empr_nomb'),
        ], 201)*/
        return response()->json([
            'resultado' => 'exito'
        ], 201);
    }
    public function getResp(Request $request)
    {
        if ($request->get('modu_nume')) {
            $respuestas = Respuesta::where('modu_nume', $request->get('modu_nume'))->get();
            if ($respuestas != null) {
                return response()->json($respuestas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    public function listResp(Request $request)
    {
        if ($request->get('canv_id')) {
            $respuestas = Respuesta::where('canv_id', $request->get('canv_id'))->get();
            if ($respuestas != null) {
                return response()->json($respuestas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }

    private function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }


    public function updateResp(Request $request)
    {
        //$input=$request->input()

        $input = $request->all();
        $valores = new Respuesta;
        $id = null;
        $indices = array();
        $inicio = true;
        // return response()->json([
        //     'input' => $input,
        // ]);
            foreach ($input as $key => $value) {
                $valores = (object)$value;
                $id = (isset($valores->resp_id) ? $valores->resp_id : null);
                if ($id !== null) {
                    $resp_id = isset($valores->resp_id) ? $valores->resp_id : null;
                    $request2 = new Request([
                        'preg_id' => isset($valores->preg_id) ? $valores->preg_id : null,
                        //'resp_desc' => isset($valores->resp_id) ? $valores->resp_id : null,
                        'modu_nume' => isset($valores->modu_nume) ? $valores->modu_nume : null,
                        'canv_id' => isset($valores->canv_id) ? $valores->canv_id : null,
                        'resp_nume' => isset($valores->resp_nume) ? $valores->resp_nume : null,
                        'resp_text' => isset($valores->resp_text) ? $valores->resp_text : null,
                        'resp_desc' => isset($valores->resp_desc) ? $valores->resp_desc : null,
                        'resp_esta' => 1,
                    ]);
                    $request2->validate([
                        'canv_id' => 'required|numeric|digits_between:1,11',
                        //'resp_nume' => 'required|numeric|digits_between:1,5',
                        'modu_nume' => 'required|numeric|digits_between:1,5',
                        'resp_text' => 'required'
                    ]);
                    $respuestas = Respuesta::find($id);
                    if ($inicio === true) {
                        $indices = $this->getIndexArray($request2->get('canv_id'));
                        $inicio = false;
                    }
                    $indices = $this->deleteRespNotFound($indices, $resp_id);

                    //return response()->json(['indices'=>$indices,'momi'=>$request2->get('canv_id')], 201);
                    if ($respuestas != null) {

                        $respuestas->update($request2->all());
                        //return response()->json($respuestas, 201);
                    } else {
                        $respuesta3 = Respuesta::create($request2->all());
                        //return response()->json($respuesta3, 201);
                    }
                }else{
                    $resp_id = isset($valores->resp_id) ? $valores->resp_id : null;
                    $request2 = new Request([
                        'canv_id' => isset($valores->canv_id) ? $valores->canv_id : null,
                    ]);
                    $indices = $this->getIndexArray($request2->get('canv_id'));
                    $indices = $this->deleteRespNotFound($indices, $resp_id);
                }
            }
        //return response()->json(['indices' => $indices,], 201);
        $this->removeResps($indices);
        $uniqId = $this->unique_code(9);
        return response()->json([
            'error' => $id,
        ]);


        /*
        
        request()->validate(Respuesta::$rules);    
        $request->validate([
            'canv_id' => 'required|numeric|digits_between:1,5',
            'resp_nume' => 'required|numeric|digits_between:1,5',
            'modu_nume' => 'required|numeric|digits_between:1,5',
            'resp_text' => 'required'
        ]);
        $consulta=Respuesta::select('resp_nume')
        ->where('modu_nume','=',$request->modu_nume)
        ->where('canv_id','=',$request->canv_id)
        ->where('resp_nume','=',$request->resp_nume)
        ->get()->count();
        if($consulta>1){
            return response()->json(['error', 'Numero de Respuesta ya asignado para este modulo']);
        }
        if ($request->get('resp_id')) {
            $respuestas = Respuesta::find($request->resp_id);
            if ($respuestas != null) {
                $respuestas->update($request->all());
                return response()->json($respuestas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);*/
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
            if (isset($value['resp_id'])) {
                $respuestas = Respuesta::find($value['resp_id'])->delete();
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
            $consulta = Respuesta::select('resp_id')->where('canv_id', $canv_id)->get('resp_id');
            foreach ($consulta as $key => $value) {
                $consulta2[$index]['resp_id'] = $value->resp_id;
                $index++;
            }
        }
        return $consulta2;
    }
    public function deleteRespNotFound($indices, $resp_id)
    {
        if ($resp_id !== null) {
            //$consulta2 = $this->array_remove_object($consulta,$request->get('resp_id'),'resp_id');
            $consulta3 = $indices;
            foreach ($indices as $key => $value) {
                if ($value['resp_id'] == $resp_id) {
                    $consulta3 = array_filter($consulta3, function ($a) use ($value) {
                        return $a['resp_id'] !== $value['resp_id'];
                    });
                }
            }
            //$consulta2 = $this->array_remove_object($consulta2,$request->get('resp_id'),'resp_id');
            // dd($consulta3);
            /* return response()->json([
            'consulta' => ($consulta2),
        ]);*/
            $indices = $consulta3;
        }
        return $indices;
    }

    public function deleteResp(Request $request)
    {
        if ($request->get('resp_id')) {
            $respuestas = Respuesta::find($request->get('resp_id'))->delete();
            if ($respuestas != null) {

                return response()->json($respuestas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }
    public function queryResp(Request $request)
    {
        if ($request->filled('resp_id')) {
            $respuestas = Respuesta::where('resp_id', $request->get('resp_id'))->firstOrFail();
            return response()->json([
                'resp_text' => $respuestas->resp_text,
            ], 201);
        } else {
            return response()->json([
                'error' => 'No se envió el resp_id',
            ]);
        }
        /*
        return response()->json([
            'empr_nomb'=>$request->get('empr_id'),
        ],201);*/
    }
}
