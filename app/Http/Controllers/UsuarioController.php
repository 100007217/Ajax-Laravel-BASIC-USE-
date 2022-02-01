<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function leerController(Request $request){
        $datos=DB::select('select * from tbl_users where nombre like ?',['%'.$request->input('filtro').'%']);
        return response()->json($datos);
    }
    public function crearController(Request $request){
        try {
            $path=$request->file('foto')->store('uploads','public');
            DB::insert('insert into tbl_users (nombre, foto) values (?,?)',[$request->input('nombre'),$path]);
            return response()->json(array('resultado'=> 'OK'));            
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
    public function eliminarController($id){
        try {
            DB::delete('delete from tbl_users where id = '.$id.'');
            return response()->json(array('resultado'=> 'OK')); 
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
    public function editarController(Request $request){
/*
        try {
            if ($request->hasFile('foto_file')) {
                $foto = DB::table('tbl_users')->select('foto')->where('id','=',$request['id'])->first();          
                if ($foto->foto_persona != null) {
                    Storage::delete('public/'.$foto->foto); 
                }
            $foto=$request->file('foto_file')->store('uploads','public');
            }else{}
        } catch (\Throwable $th) {
            //throw $th;
        }

        /*

        }else{
            $foto = DB::table('tbl_persona')->select('foto_persona')->where('id','=',$request['id'])->first();
            $datos['foto_persona'] = $foto->foto_persona;
        }
*/ 

        $id=$request['id'];
        $nombre=$request['nombre'];
        if(isset($request['foto_file'])){
            $foto = DB::table('tbl_users')->select('foto')->where('id','=',$request['id'])->first();          
                if ($foto->foto != null) {
                    Storage::delete('public/'.$foto->foto); 
                }
            $foto=$request->file('foto_file')->store('uploads','public');
        }else{
            $foto=$request['foto'];
        }

        try {
            //UPDATE `tbl_users` SET `id` = NULL, `nombre` = 'admin7' WHERE `tbl_users`.`id` = 22;
            DB::update('update tbl_users set nombre = ?,foto=? where id = ?',[$nombre,$foto,$id]);
            return response()->json(array('resultado'=> 'OK')); 
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
}
