<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Canva;
use App\Models\Cronograma;
use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\CronActividade;
use App\Models\CronDependencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Stmt\Foreach_;

class CronogramasController extends Controller
{
    //
    public function registerCronWithEmpr(Request $request)
    {
        //request()->validate(Cronograma::$rules);
        if ($request->get('empr_id')) {
            $emprendimiento = Emprendimiento::where('empr_id', $request->get('empr_id'))->get();
        }
        $request2 = new Request([
            'cron_id' => ($request->get('id')) ? $request->get('id') : null,
            'empr_id' => ($request->get('empr_id')) ? $request->get('empr_id') : null,
            'cron_fech_inic' => ($request->get('start')) ? $request->get('start') : null,
            'cron_fech_fin' => ($request->get('end')) ? $request->get('end') : null,
            'cron_proy' => ($request->get('name')) ? $request->get('name') : null,
            // 'cron_desc' => isset($valores->name) ? $valores->name : null,
            'cron_type' => ($request->get('type')) ? $request->get('type') : null,
            'cron_hide_child' => ($request->get('hideChildren')) ? $request->get('hideChildren') : false,
            'cron_done' => ($request->get('cron_done')) ? $request->get('cron_done') : false,
            'cron_resp' => ($request->get('cron_resp')) ? $request->get('cron_resp') : '',
            // 'cron_costo_total'=>
            // 'progress'=>,
        ]);

        $request2->validate([
            'cron_id' => 'required|unique:cronogramas,cron_id',
            'empr_id' => 'required|numeric|digits_between:1,10',
            'cron_fech_inic' => 'required',
            'cron_fech_fin' => 'required',
            'cron_proy' => 'required',
            'cron_type' => 'required',
            'cron_hide_child' => 'required',
            'cron_done' => 'required',
            'cron_resp' => 'required',
        ]);

        $cron_empr = Cronograma::select('cron_id')->where('empr_id', $request->get('empr_id'))->count();
        if ($cron_empr == 0) {
            $respuesta = Cronograma::create($request2->all());
        }


        return response()->json([
            'resultado' => 'exito',
        ], 201);
    }

    public function actualizarCrons(Request $request)
    {
        $input = $request->all();
        $valores = new Cronograma;
        $id_acti = null;
        $id_cron = null;
        $c = true;
        $indices = array();
        $inicio = true;
        foreach ($input as $key => $value) {

            $valores = (object)$value;
            if ($c == true) {
                $id_cron = (isset($valores->id) ? $valores->id : null);
                $c = false;
            } else {
                $id_acti = (isset($valores->id) ? $valores->id : null);
                if ($id_acti !== null) {
                    if (isset($valores->acti_depen)) {
                        // foreach ($valores->acti_depen as $key2 => $value2) {
                        //     $va
                        // }
                    }
                    $request2 = new Request([
                        'id' => isset($valores->id) ? $valores->id : null,
                        'emmpr_id' => isset($valores->empr_id) ? $valores->empr_id : null,
                        'type' => isset($valores->type) ? $valores->type : null,
                        'project' => isset($valores->project) ? $valores->project : null,
                        'displayorder' => isset($valores->displayOrder) ? $valores->displayOrder : null,
                        'name' => isset($valores->name) ? $valores->name : null,
                        'start' => isset($valores->start) ? $valores->start : null,
                        'end' => isset($valores->end) ? $valores->end : null,
                        'responsable' => isset($valores->responsable) ? $valores->responsable : null,
                        'dependencies' => isset($valores->dependencies) ? $valores->dependencies : null,
                        'cantidad' => isset($valores->cantidad) ? $valores->cantidad : null,
                        'unidad' => isset($valores->unidad) ? $valores->unidad : null,
                        'costounitario' => isset($valores->costounitario) ? $valores->costounitario : null,
                        'monto' => isset($valores->monto) ? $valores->monto : null,
                        'notas' => isset($valores->notas) ? $valores->notas : null,
                        'progress' => isset($valores->progress) ? $valores->progress : null,
                        'cron_done' => isset($valores->cron_done) ? $valores->cron_done : null,
                        'estado' => isset($valores->estado) ? $valores->estado : null,
                    ]);
                    $cronogramas = Cronograma::find($id_cron);
                    if ($cronogramas != null) {
                        $request2->validate([
                            'id' => 'required',
                            'empr_id' => 'required|numeric|digits_between:1,10',
                            'type' => 'required',
                            'project' => 'required',
                            'displayorder' => 'required|numeric|digits_between:1,10',
                            'name' => 'required',
                            'start' => 'required',
                            'end' => 'required',
                            'responsable' => 'required',
                        ]);
                        $cron_actividades = CronActividade::find($id_acti);
                        if ($inicio === true) {
                            $indices = $this->getIndexArray($request2->get('cron_id'));
                            $inicio = false;
                        }
                        $indices = $this->deleteRespNotFound($indices, $id_acti);
                        if ($cron_actividades != null) {
                            $cron_actividades->update($request2->all());
                            //return response()->json($respuestas, 201);
                        } else {
                            $respuesta3 = CronActividade::create($request2->all());
                            //return response()->json($respuesta3, 201);
                        }
                    } else {
                        // $respuesta3 = Canva::create($request2->all());
                    }
                }
            }
        }
        $this->removeResps($indices);
        $uniqId = $this->unique_code(9);
        return response()->json([
            'resultado' => 'exito',
        ], 201);
    }

    public function getCrons(Request $request)
    {
        if ($request->get('cron_id')) {
            $cronogram = Cronograma::where('cron_id', '=', $request->get('cron_id'))
                ->first();
            if ($cronogram != null) {
                return response()->json($cronogram, 201);
            } else {
                return response()->json([
                    'error' => 'el cronograma id no fue encontrado',
                ]);
            }
        }
        return response()->json([
            'error' => 'el número de cronograma no fue encontrado',
        ], 401);
    }

    public function listCrons(Request $request)
    {
        $data=array();

        // $request2 = new Request([
        //     'id' => ($request->get('id')) ? $request->get('id') : null,
        //     'empr_id' => ($request->get('empr_id')) ? $request->get('empr_id') : null,
        //     'cron_fech_inic' => ($request->get('start')) ? $request->get('start') : null,
        //     'cron_fech_fin' => ($request->get('end')) ? $request->get('end') : null,
        //     'cron_proy' => ($request->get('name')) ? $request->get('name') : null,
        //     // 'cron_desc' => isset($valores->name) ? $valores->name : null,
        //     'cron_type' => ($request->get('type')) ? $request->get('type') : null,
        //     'cron_hide_child' => ($request->get('hideChildren')) ? $request->get('hideChildren') : false,
        //     'cron_done' => ($request->get('cron_done')) ? $request->get('cron_done') : false,
        //     'cron_resp' => ($request->get('cron_resp')) ? $request->get('cron_resp') : '',
        //     // 'cron_costo_total'=>
        //     // 'progress'=>,
        // ]);

        if ($request->get('cron_id')) {
            $cronograma=Cronograma::where('cron_id','=',$request->get('cron_id'))->get();
            //$data=$cronograma;
            // dd($cronograma[0]['cron_id']);
            $data['id']=$cronograma[0]['cron_id'];
            $data['empr_id']=$cronograma[0]['empr_id'];
            $data['start']=$cronograma[0]['cron_fech_inic'];
            $data['end']=$cronograma[0]['cron_fech_fin'];
            $data['hideChildren']=$cronograma[0]['cron_hide_child'];
            $data['type']=$cronograma[0]['cron_type'];
            $data['cron_done']=$cronograma[0]['cron_done'];
            $data['cron_resp']=$cronograma[0]['cron_resp'];
            $data['progress']=$cronograma[0]['progress'];
            //$data['cron_costo_total']=$cronograma[0]['cron_costo_total'];
            //return response()->json(['DATA'=>$data], 201);

            $actividades=CronActividade::where('cron_id','=',$request->get('cron_id'))
            ->get();
            $data2=$actividades;
            // return response()->json(['DATA'=>$data2], 201);

            // $dependencias=array();
            $index=0;
            foreach ($actividades as $key => $value) {
                $temp=CronDependencia::where('id',$value->id)->get();
                if(sizeof($temp)>0){
                $dependencias[$index]=$temp;
                $index++;
                }
                
            }
            // $index2=0;
            // $temp2=array();
            //  foreach ($dependencias as $key => $value) {
            //      # code...
            //     $temp2[$index2]=$value;
            //      $index2++;
                 
            //  }
            

            // return response()->json(['DATA'=>$temp2], 201);
            //$canvas=Canva::join('emprendimientos','canvas.empr_id','=','emprendimientos.empr_id');
            // $cronogramas = Cronograma::join('cron_actividades', 'cron_actividades.cron_id','=','cronogramas.cron_id')
            // ->join('cron_dependencias','cron_dependencias.id','=','cron_actividades.id')
            // ->where('cronogramas.cron_id','=',$request->get('cron_id'))
            // ->get();
            // if ($cronogramas != null) {
            //     return response()->json(['actividades'=>$actividades,'dependencias'=>$dependencias], 201);
            // }
            return response()->json(['cronograma'=>$data,'actividades'=>$actividades,'dependencias'=>$dependencias], 201);
            // }
        }
        return response()->json([
            'error' => 'el número de cronograma no fue encontrado',
        ], 401);
    }

    private function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    public function deleteCronActividade(Request $request)
    {
        if ($request->get('id')) {
            $actividades = CronActividade::select('id')::where('id', $request->get('cron_id'));
            if ($actividades!=null) {
                foreach ($actividades as $key => $value) {
                    $dependencies = CronDependencia::select('cron_dep_id')::where('id', $value)->get('cron_dep_id');
                    if ($dependencies != null) {
                        foreach ($dependencies as $key3 => $value3) {
                            # code...
                            $cron_actividade = CronActividade::find($value3)->delete();
                        }
                    }
                    $cron_actividade = CronActividade::find($value)->delete();
                }
                
            }
            return response()->json(['estado'=>'exito'], 201);
        }
        return response()->json(['error'=>'no se envió el id'], 201);
    }
    public function deleteCron(Request $request)
    {
        if ($request->get('cron_id')) {
            $cronograma = Cronograma::find($request->get('cron_id'))->delete();
            if ($cronograma != null) {
                $actividades = CronActividade::select('id')::where('id', $request->get('cron_id'));

                foreach ($actividades as $key => $value) {
                    $dependencies = CronDependencia::select('cron_dep_id')::where('id', $value)->get('cron_dep_id');
                    if ($dependencies != null) {
                        foreach ($dependencies as $key3 => $value3) {
                            # code...
                            $cron_actividade = CronActividade::find($value3)->delete();
                        }
                    }
                    $cron_actividade = CronActividade::find($value)->delete();
                }

                return response()->json($cronograma, 201);
            }
        }
        return response()->json([
            'error' => 'el número de cronograma no fue encontrado',
        ], 401);
    }

    public function checkIfEmprHasCron(Request $request)
    {
        if ($request->get('empr_id')) {
            $cron_empr = Cronograma::select('cron_id')->where('empr_id', $request->get('empr_id'))->count();

            if ($cron_empr > 0) {
                $cron_emprid = Cronograma::select('cron_id')->where('empr_id', $request->get('empr_id'))->first();
                return response()->json([
                    'habilitado' => 'no',
                    'cron_id'=>$cron_emprid->cron_id,
                ], 201);
            } else {
                return response()->json([
                    'habilitado' => 'yes',
                ], 201);
            }
        }
    }

    public function removeResps($array)
    {
        foreach ($array as $key => $value) {
            if (isset($value['id'])) {
                $respuestas = CronActividade::find($value['id'])->delete();
                if ($respuestas != null) {
                }
            }
        }
    }

    public function getIndexArray($cron_id)
    {
        $consulta2 = array();
        if ($cron_id !== null) {
            $index = 0;
            $consulta = CronActividade::select('id')->where('cron_id', $cron_id)->get('id');
            foreach ($consulta as $key => $value) {
                $consulta2[$index]['id'] = $value->id;
                $index++;
            }
        }
        return $consulta2;
    }

    public function deleteRespNotFound($indices, $acti_id)
    {
        if ($acti_id !== null) {
            $consulta3 = $indices;
            foreach ($indices as $key => $value) {
                if ($value['id'] == $acti_id) {
                    $consulta3 = array_filter($consulta3, function ($a) use ($value) {
                        return $a['id'] !== $value['id'];
                    });
                }
            }
            $indices = $consulta3;
        }
        return $indices;
    }
}