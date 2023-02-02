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
        $id_cron = ($request->get('cron_id') ? $request->get('cron_id') : null);
        $empr_id = $request->get('empr_id') ? $request->get('empr_id') : null;
        if ($empr_id != null && $id_cron != null) {
            $cron_empr = Cronograma::select('cron_id')->where('empr_id', $empr_id)->count();
            if ($cron_empr > 0) {
                $cron_emprid = Cronograma::select('cron_id')->where('empr_id', $empr_id)->first();
                if ($cron_emprid->cron_id != $id_cron) {
                    return response()->json([
                        'error' => 'este emprendimiento tiene otro cronograma registrado',
                    ], 201);
                }
            } else {
                $request5 = new Request([
                    'cron_id' => ($request->get('cron_id')) ? $request->get('cron_id') : null,
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

                $request5->validate([
                    'cron_id' => 'required|unique:cronogramas,cron_id',
                    'empr_id' => 'required|numeric|digits_between:1,10',
                    'cron_fech_inic' => 'required',
                    'cron_fech_fin' => 'required',
                    'cron_proy' => 'required',
                    'cron_type' => 'required',
                    'cron_hide_child' => 'required',
                    'cron_done' => 'required',
                    // 'cron_resp' => 'required',
                ]);

                $respuesta = Cronograma::create($request5->all());
            }
        } else {
            return response()->json([
                'error' => 'no envió un código de emprendimiento o un cron_id válido',
            ], 201);
        }


        // $cron_empr = Cronograma::select('cron_id')->where('empr_id', $request->get('empr_id'))->count();
        // if ($cron_empr == 0) {
        //     $respuesta = Cronograma::create($request2->all());
        // }


        return response()->json([
            'resultado' => 'exito',
        ], 201);
    }

    public function actualizarCrons(Request $request)
    {
        $input = $request->all();
        // $valores = new Cronograma;
        $valores = null;
        $id_acti = null;
        $id_cron = null;
        $c = true;
        $indices = array();
        $inicio = true;
        foreach ($input as $key => $value) {

            $valores = (object)$value;
            // return response()->json([
            //     'resultado' => $valores,
            // ], 201);
            if ($c == true) {
                $id_cron = (isset($valores->cron_id) ? $valores->cron_id : null);
                $empr_id = (isset($valores->empr_id) ? $valores->empr_id : null);
                if ($empr_id != null) {
                    $cron_empr = Cronograma::select('cron_id')->where('empr_id', $empr_id)->count();
                    if ($cron_empr > 0) {
                        $cron_emprid = Cronograma::select('cron_id')->where('empr_id', $empr_id)->first();
                        if ($cron_emprid->cron_id != $id_cron) {
                            return response()->json([
                                'error' => 'este emprendimiento tiene otro cronograma registrado',
                            ], 201);
                        } else {
                            $request5 = new Request([
                                'empr_id' => (isset($valores->empr_id)) ? $valores->empr_id : null,
                                'cron_fech_inic' => (isset($valores->start)) ? $valores->start : null,
                                'cron_fech_fin' => (isset($valores->end)) ? $valores->end : null,
                                'cron_proy' => (isset($valores->name)) ? $valores->name : null,
                                // 'cron_desc' => isset($valores->name) ? $valores->name : null,
                                'cron_type' => (isset($valores->type)) ? $valores->type : null,
                                'cron_hide_child' => (isset($valores->hideChildren)) ? $valores->hideChildren : false,
                                'cron_done' => (isset($valores->cron_done)) ? $valores->cron_done : false,
                                'cron_resp' => (isset($valores->cron_resp)) ? $valores->cron_resp : '',
                                // 'cron_costo_total'=>
                                // 'progress'=>,
                            ]);

                            $request5->validate([
                                'empr_id' => 'required|numeric|digits_between:1,10',
                                'cron_fech_inic' => 'required',
                                'cron_fech_fin' => 'required',
                                'cron_proy' => 'required',
                                'cron_type' => 'required',
                                'cron_hide_child' => 'required',
                                'cron_done' => 'required',
                                // 'cron_resp' => 'required',
                            ]);


                            $cronograma2 = Cronograma::find($id_cron);
                            if ($cronograma2 != null)
                                $respuesta = $cronograma2->update($request5->all());
                        }
                    } else {
                        $request5 = new Request([
                            'cron_id' => (isset($valores->cron_id)) ? $valores->cron_id : null,
                            'empr_id' => (isset($valores->empr_id)) ? $valores->empr_id : null,
                            'cron_fech_inic' => (isset($valores->start)) ? $valores->start : null,
                            'cron_fech_fin' => (isset($valores->end)) ? $valores->end : null,
                            'cron_proy' => (isset($valores->name)) ? $valores->name : null,
                            // 'cron_desc' => isset($valores->name) ? $valores->name : null,
                            'cron_type' => (isset($valores->type)) ? $valores->type : null,
                            'cron_hide_child' => (isset($valores->hideChildren)) ? $valores->hideChildren : false,
                            'cron_done' => (isset($valores->cron_done)) ? $valores->cron_done : false,
                            'cron_resp' => (isset($valores->cron_resp)) ? $valores->cron_resp : '',
                            // 'cron_costo_total'=>
                            // 'progress'=>,
                        ]);

                        $request5->validate([
                            'cron_id' => 'required|unique:cronogramas,cron_id',
                            'empr_id' => 'required|numeric|digits_between:1,10',
                            'cron_fech_inic' => 'required',
                            'cron_fech_fin' => 'required',
                            'cron_proy' => 'required',
                            'cron_type' => 'required',
                            'cron_hide_child' => 'required',
                            'cron_done' => 'required',
                            // 'cron_resp' => 'required',
                        ]);
                        $respuesta = Cronograma::create($request5->all());
                    }
                }
                $c = false;
            } else {
                $id_acti = (isset($valores->id) ? $valores->id : null);
                // $vectorDependencies = "[";
                 $vectorDependencies = "";
                if ($id_acti !== null) {
                    if (isset($valores->dependencies)) {
                        foreach ($valores->dependencies as $key2 => $value2) {
                            // $vectorDependencies = $vectorDependencies . "'" . $value2 . "',";
                            $vectorDependencies = $vectorDependencies . $value2 . ",";
                        }
                        // $vectorDependencies = substr($vectorDependencies, 0, strlen($vectorDependencies) - 1);
                        // $vectorDependencies = $vectorDependencies . "]";
                    }
                    $request2 = new Request([
                        'id' => isset($valores->id) ? $valores->id : null,
                        'cron_id' => $id_cron != null ? $id_cron : null,
                        'empr_id' => isset($valores->empr_id) ? $valores->empr_id : null,
                        'type' => isset($valores->type) ? $valores->type : null,
                        'project' => isset($valores->project) ? $valores->project : null,
                        'displayorder' => isset($valores->displayorder) ? $valores->displayorder : null,
                        'name' => isset($valores->name) ? $valores->name : null,
                        'start' => isset($valores->start) ? $valores->start : null,
                        'end' => isset($valores->end) ? $valores->end : null,
                        'responsable' => isset($valores->responsable) ? $valores->responsable : null,
                        'dependencies' => isset($valores->dependencies) ? $vectorDependencies : null,
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
                            'cron_id' => 'required',
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
                        // if (isset($valores->dependencies)) {
                        //     foreach ($valores->dependencies as $key2 => $value2) {
                        //          $request3=new Request([
                        //              'id'=>isset($valores->id) ? $valores->id : null,
                        //              'cron_dep_tareas'=>$value2,
                        //          ]);
                        //          $request3->validate([
                        //             'id' => 'required',
                        //             'cron_dep_tareas' => 'required',
                        //         ]);
                        //         $cron_dependencia = CronDependencia::find($id_acti);
                        //          $respuesta3 = CronDependencia::create($request3->all());
                        //          $vectorDependencies=$vectorDependencies.$value2.",";
                        //     }
                        //     $vectorDependencies=$vectorDependencies."]";
                        // }
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

    public function listAllCrons(Request $request)
    {
        if ($request->get('id')) {
            $crons = Cronograma::join(
                'emprendimientos',
                'emprendimientos.empr_id',
                '=',
                'cronogramas.empr_id'
            )->where('emprendimientos.id', '=', $request->get('id'))
                ->select('cronogramas.*')->get();
            $indice = 0;
            $result = array();
            foreach ($crons as $key => $value) {
                // print_r((array)$result[$key]);
                // return response()->json((array)$this->prepareCrons($value['cron_id']));
                // $result = array_merge((array)$result[$key], (array)$this->prepareCrons($value['cron_id']));
                $result[$key][$indice] = $crons[$key];
                $activities = $this->prepareCrons($value['cron_id']);
                // print_r($result[$key][$indice]);
                // dd($activities);
                foreach ($activities as $key2 => $value2) {
                    $result[$key][$indice] = $activities[$key2];
                    $indice++;
                }
                // return response()->json($crons[1]);
                // $crons[$key]['cron']=$this->prepareCrons($value['cron_id']);
                $indice = 0;
            }
            return response()->json([
                'crons' => $result,
            ], 201);

            // if (count($crons)>0) {
            //     $cron_emprid = Cronograma::select('cron_id')->where('empr_id', $request->get('empr_id'))->first();
            //     return response()->json([
            //         'habilitado' => 'no',
            //         'cron_id'=>$cron_emprid->cron_id,
            //     ], 201);
            // } else {
            //     return response()->json([
            //         'habilitado' => 'yes',
            //     ], 201);
            // }
        }
    }
    public function prepareCrons($cron_id)
    {
        $data = array();

        if ($cron_id) {
            $cronograma = Cronograma::where('cron_id', '=', $cron_id)->get();
            $data[0]['id'] = '1';
            $data[0]['cron_id'] = $cronograma[0]['cron_id'];
            $data[0]['empr_id'] = $cronograma[0]['empr_id'];
            $data[0]['start'] = $cronograma[0]['cron_fech_inic'];
            $data[0]['end'] = $cronograma[0]['cron_fech_fin'];
            $data[0]['hideChildren'] = $cronograma[0]['cron_hide_child'] == 0 ? false : true;
            $data[0]['type'] = $cronograma[0]['cron_type'];
            $data[0]['cron_done'] = $cronograma[0]['cron_done'];
            $data[0]['cron_resp'] = $cronograma[0]['cron_resp'];
            $data[0]['name'] = $cronograma[0]['cron_proy'];
            $data[0]['progress'] = $cronograma[0]['progress'];
            $data[0]['displayorder'] = 1;
            $actividades = CronActividade::where('cron_id', '=', $cron_id)
                ->get();
            $data2 = $actividades;
            $indice = 1;
            $index = 0;
            foreach ($actividades as $key => $value) {
                // dd($value['dependencies']);
                $data[$indice] = $value;
                // $data[$indice]['dependencies']=array();
                // $data[$indice]['dependencies']=array();
                $cadena = $data[$indice]['dependencies'];
                // print_r($cadena);
                $depAux3 = array();
                while (strpos($cadena, ',') !== false) {
                    $pos1 = strpos($cadena, ',');
                    $depAux3[]=substr($cadena, 0,$pos1);
                    $cadena = substr($cadena, $pos1 + 1);
                    // print_r($cadena);
                }
                // print_r($depAux3);
                $data[$indice]['dependencies']=$depAux3;

                // $temp = CronDependencia::where('id', $value->id)->get();
                // if (sizeof($temp) > 0) {
                //     $dependencias[$index] = $temp;
                //     // $depAux3=array();
                //     // $data[$indice]['dependencies']=array();
                //     foreach ($dependencias[$index] as $key2 => $value2) {
                //         // print_r($dependencias[$index][$key2]->cron_dep_tareas."\n");
                //         // $data[$indice]['dependencies'] = $data[$indice]['dependencies'] . "" . $dependencias[$index][$key2]->cron_dep_tareas . ",";
                //         // print_r($dependencias[$index][$key2]->cron_dep_tareas);
                //         // print_r($data[$indice]['dependencies']);
                //         $depAux3[]=$dependencias[$index][$key2]->cron_dep_tareas;
                //         // print_r($depAux3);
                //         // print_r($key2);
                //         // array_push($data[$indice]['dependencies'],$dependencias[$index][$key2]->cron_dep_tareas);
                //         // print_r($depAux3);
                //         // $data[$indice]['dependencies']=$depAux3;
                //         // print_r($data[$indice]['dependencies']);
                //     }
                //     // print_r("MOMMY");
                //     $data[$indice]['dependencies']=$depAux3;
                //     // print_r($data[$indice]['dependencies']);
                //     // print_r($dependencias[$index]."\n");
                //     $index++;
                // }
                // foreach($dependencias as $key3=>$value3){
                //     foreach($dependencias[$key3] as $key4=>$value4)
                //     print_r($dependencias[$key3][$key4]->cron_dep_tareas."\n");
                //     //print_r($dependencias[$key3][0]->cron_dep_tareas."\n");
                //     // $data[$indice]['dependencies']=$data[$indice]['dependencies']."".$dependencias[$key3][0]->cron_dep_tareas.",";

                // }   
                $indice++;
            }
            return $data;
        }
        return null;
    }
    public function listCrons(Request $request)
    {
        $data = array();

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
            $cronograma = Cronograma::where('cron_id', '=', $request->get('cron_id'))->get();
            //$data=$cronograma;
            // dd($cronograma[0]['cron_id']);
            $data['id'] = $cronograma[0]['cron_id'];
            $data['empr_id'] = $cronograma[0]['empr_id'];
            $data['start'] = $cronograma[0]['cron_fech_inic'];
            $data['end'] = $cronograma[0]['cron_fech_fin'];
            $data['hideChildren'] = $cronograma[0]['cron_hide_child'];
            $data['type'] = $cronograma[0]['cron_type'];
            $data['cron_done'] = $cronograma[0]['cron_done'];
            $data['cron_resp'] = $cronograma[0]['cron_resp'];
            $data['progress'] = $cronograma[0]['progress'];
            //$data['cron_costo_total']=$cronograma[0]['cron_costo_total'];
            //return response()->json(['DATA'=>$data], 201);

            $actividades = CronActividade::where('cron_id', '=', $request->get('cron_id'))
                ->get();
            $data2 = $actividades;
            // return response()->json(['DATA'=>$data2], 201);

            // $dependencias=array();
            $index = 0;
            foreach ($actividades as $key => $value) {
                $temp = CronDependencia::where('id', $value->id)->get();
                if (sizeof($temp) > 0) {
                    $dependencias[$index] = $temp;
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
            return response()->json(['cronograma' => $data, 'actividades' => $actividades, 'dependencias' => $dependencias], 201);
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
            if ($actividades != null) {
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
            return response()->json(['estado' => 'exito'], 201);
        }
        return response()->json(['error' => 'no se envió el id'], 201);
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
                    'cron_id' => $cron_emprid->cron_id,
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
    public function strpos_recursive($haystack, $needle, $offset = 0, &$results = array())
    {
        $offset = strpos($haystack, $needle, $offset);
        if ($offset === false) {
            return $results;
        } else {
            $results[] = $offset;
            return $this->strpos_recursive($haystack, $needle, ($offset + 1), $results);
        }
        // $search = 'a';
        // $found = strpos_recursive($mystring, $search);

        // if ($found) {
        //     foreach ($found as $pos) {
        //         echo 'Found "' . $search . '" in string "' . $mystring . '" at position <b>' . $pos . '</b><br />';
        //     }
        // } else {
        //     echo '"' . $search . '" not found in "' . $mystring . '"';
        // }
    }
}
