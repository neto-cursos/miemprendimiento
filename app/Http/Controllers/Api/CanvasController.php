<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Canva;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CanvasController extends Controller
{
    //
    public function createCanv(Request $request)
    {
        //'id'=>Auth::user()->id,
        //$unique_id= echo floor(time()-999999999);
        request()->validate(Canva::$rules);
        $request->validate([
            'canv_id' => 'required|numeric|digits_between:1,10|unique:canvas,canv_id',
            'empr_id' => 'required|numeric|digits_between:1,5',
            'canv_esta' => 'required|numeric|digits_between:1,2',
        ]);
        $consulta = Canva::select('canv_id')
            ->where('empr_id', '=', $request->get('empr_id'))
            ->where('canv_esta','=',1)
            ->get()->count();
        /*$consulta = Canva::select('canv_id')
            ->where('canv_id', '=', $request->canv_id)
            ->get()->count();*/
        if ($consulta >0) {
            
            return response()->json(['error', 'emprendimiento ya tiene asignado un canva']);
        }
        $respuesta = Canva::create([
            'canv_id' => $request->get('canv_id'),
            'empr_id' => $request->get('empr_id'),
            'canv_esta' => $request->get('canv_esta'),
        ]);
        return response()->json([
            'resultado' => 'exito',
        ], 201);
    }
    public function getCanv(Request $request)
    {
        if ($request->get('empr_id')) {
            $canvas = Canva::where('empr_id', '=',$request->get('empr_id'))
            ->where('canv_esta','=',1)
            ->first();
            if ($canvas != null) {
                return response()->json($canvas, 201);
            }
            else{
                return response()->json([
                    'error' => 'el número de empr no fue encontrado',
                ]);
            }
        }
        return response()->json([
            'error' => 'el número de empr no fue encontrado',
        ], 401);
        /*return response()->json([
            'error' => $request->input(),
        ]);*/
    }

    public function listCanv(Request $request)
    {
        if ($request->get('canv_id')) {
            $canvas = Canva::where('canv_id', $request->get('canv_id'))->get();
            if ($canvas != null) {
                return response()->json($canvas, 201);
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


    public function updateCanv(Request $request)
    {
        //$input=$request->input()
        $input = $request->all();
        $valores=new Canva;
        $id=null;
        foreach ($input as $key => $value) {
            $valores=(object)$value;
            $id=(isset($valores->resp_id)?$valores->resp_id:null);
            if ($id!==null) {
                $request2 = new Request([
                    'preg_id' => isset($valores->preg_id)?$valores->preg_id:null,
                    'resp_desc' => isset($valores->resp_id)?$valores->resp_id:null,
                    'modu_nume' => isset($valores->modu_nume)?$valores->modu_nume:null,
                    'canv_id' => isset($valores->canv_id)?$valores->canv_id:null,
                    'resp_nume' => isset($valores->resp_nume)?$valores->resp_nume:null,
                    'resp_text' => isset($valores->resp_text)?$valores->resp_text:null,
                    'resp_desc' => isset($valores->resp_desc)?$valores->resp_desc:null,
                    'resp_esta' => 1,                        
                ]);
                $canvas = Canva::find($id);
                if ($canvas != null) {
                    
                    $request2->validate([
                        'canv_id' => 'required|numeric|digits_between:1,5',
                        'resp_nume' => 'required|numeric|digits_between:1,5',
                        'modu_nume' => 'required|numeric|digits_between:1,5',
                        'resp_text' => 'required'
                    ]);
                    $canvas->update($request2->all());
                }else{
                    $respuesta3 = Canva::create($request2->all());
                }
            }           
        }
        $uniqId=$this->unique_code(9);
        return response()->json([
            'error' => $id,
        ]);       
    }

    public function deleteCanv(Request $request)
    {
        if ($request->get('resp_id')) {
            $canvas = Canva::find($request->get('resp_id'))->delete();
            if ($canvas != null) {

                return response()->json($canvas, 201);
            }
        }
        return response()->json([
            'error' => 'el número de módulo no fue encontrado',
        ], 401);
    }
    public function queryResp(Request $request)
    {
        if ($request->filled('resp_id')) {
            $canvas = Canva::where('resp_id', $request->get('resp_id'))->firstOrFail();
            return response()->json([
                'resp_text' => $canvas->resp_text,
            ], 201);
        } else {
            return response()->json([
                'error' => 'No se envió el resp_id',
            ]);
        }
    }
}
