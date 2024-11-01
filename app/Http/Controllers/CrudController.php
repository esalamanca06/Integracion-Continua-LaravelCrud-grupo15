<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $datos = DB::select(" select * from usuario ");
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert("INSERT INTO usuario (Nombre, Cedula, Region, Ciudad, Edad, Genero) VALUES (?, ?, ?, ?, ?, ?)", [
    $request->txtNombre,
    $request->txtCedula,
    $request->txtRegion,
    $request->txtCiudad,
    $request->txtEdad,
    $request->txtGenero,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql) {
            return back()->with("correcto", "Miembro Ingresado Correctamente");
        } else {
            return back()->with("incorrecto", "Error en el ingreso");
        }
    }

    public function update(Request $request)
    {
        try {

            $idUsuario = $request->txtUsuario;
            $Nombre = $request->txtNombre;
            $Cedula = $request->txtCedula;
            $Region = $request->txtRegion;
            $Ciudad = $request->txtCiudad;
            $Edad = $request->txtEdad;
            $Genero = $request->txtGenero;

            $sql = DB::update("UPDATE usuario SET Nombre = ?, Cedula = ?, Region = ?, Ciudad = ?, Edad = ?, Genero = ? WHERE idUsuario = ?", [

                $Nombre,
                $Cedula,
                $Region,
                $Ciudad,
                $Edad,
                $Genero,
                $idUsuario,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql) {
            return back()->with("correcto", "Miembro Modificado Correctamente");
        } else {
            return back()->with("incorrecto", "Error en la Modificación");
        }
    }

    public function delete($id){

        $sql = DB::delete("DELETE FROM usuario WHERE idUsuario = ?", [$id]);

        if ($sql) {
            return back()->with("correcto", "Registro eliminado correctamente");
        } else {
            return back()->with("incorrecto", "Error al eliminar el registro");
        }
    }
}