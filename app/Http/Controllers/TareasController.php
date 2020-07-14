<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{Tarea, Prioridad};
use App\Repositories\TareasRepository;
use Carbon\Carbon;


class TareasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index')->with(compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prioridades = Prioridad::all();
        $action = route('tareas.store');
        $tarea = new Tarea();
        return view('tareas.create')->with(compact('prioridades', 'action', 'tarea'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #Validacion
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);

        #opcion 1 => para formularios chicos menos de 15 elementos ---------------------------
        /*
        $tarea = new Tarea();
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->prioridad_id = $request->input('prioridad_id');
        $tarea->usuario_id = 1;
        $tarea->save(); */

        #opcion 2 ---------------------------------------------
        /*
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $prioridad_id = $request->input('prioridad_id');
        $usuario_id = 1;

        $tarea = [
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'prioridad_id' => $prioridad_id,
            'usuario_id' => $usuario_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        Tarea::insert($tarea); */

        #opcion 3 para forms mas grandes
        $tarea = new Tarea($request->input());
        $tarea->usuario_id = 1;
        $tarea->save();

        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $prioridades = Prioridad::all();
        $put = True;
        $action = route('tareas.update', ['id' => $id]);
        return view('tareas.update')->with( compact('tarea', 'action', 'prioridades', 'put'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->prioridad_id = $request->input('prioridad_id');
        $tarea->usuario_id = 1;
        $tarea->save();

        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return back();
    }

    #reglas de validacion
    private function _rules(){
        $messages = [
            'titulo.required' => 'El titulo es requerido',
            'titulo.min' => 'Minimo 5 caracteres',
            'descripcion.required' => 'Escribe una descripcion',
            'prioridad_id.not_in' => 'No puede ser 0',
            'prioridad_id.required' => 'Selecciona una prioridad'
        ];

        $rules = [
            'titulo' => 'required|min:5',
            'descripcion' => 'required',
            'prioridad_id' => 'required|not_in:0'
        ];

        return array($rules, $messages);
    }
}
