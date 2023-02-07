<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(5);

        return view('empleados.index', $datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $datosEmpleados = request()->all();

        $datosEmpleados = request()->except('_token');  // almacenar toda la informacion exeptuando el _token

        if($request->hasFile('Foto')){
            $datosEmpleados['Foto'] = $request->file('Foto')->store('uploads' , 'public');

        }

        Empleado::insert($datosEmpleados); //insertar toda la informacion a la base de datos

        // return response()->json($datosEmpleados);

        return redirect('empleado')->with('mensaje', 'Empleado registrado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id); //busca el registro por ID

        return view('empleados.edit', compact('empleado')); //con la funcion compact recibe todos los datos de ese registro
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleados = request()->except(['_token','_method']);
        if($request->hasFile('Foto')){

            $empleado = Empleado::findOrFail($id);

            Storage::delete('public/'.$empleado->Foto);

            $datosEmpleados['Foto'] = $request->file('Foto')->store('uploads' , 'public');
        }


        Empleado::where('id','=',$id)->update($datosEmpleados); //Sentencia para salvar los datos del update

        $empleado = Empleado::findOrFail($id); //busca el registro por ID

        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado = Empleado::findOrFail($id);

        if(Storage::delete('public/'.$empleado->Foto)){

            Empleado::destroy($id);
        }
    
         // Orden para eliminar 

        return redirect('empleado')->with('mensaje', 'Empleado eliminado satisfactoriamente');
    }
}
