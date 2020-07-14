<?php

    namespace App\Repositories;

    use App\Models\Tarea;

    class TareasRepository{

        public function porUsuario($id){
            return Tarea::where('usuario_id', $id)->orderBy('created_at', 'asc')->get();
        }

        public function porPrioridad($id, $prioridad_id){
            #leftjoin, rightjoin, innerjoin
            return Tarea::where('usuario_id', $id)
                    ->where('prioridad_id', $prioridad_id)
                    ->orderBy('created_at', 'asc')
                    ->get();
        }

    }

?>
