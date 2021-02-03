<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{

    // GET solicitudes
    public function index(Request $request)
    {
        return Solicitud::all();
    }


    // GET Solicituds/id
    // public function show($id)
    // {
    //     return Solicitud::findOrFail($id);
    // }

    // POST 
    public function store(Request $request)
    {
        
        // 'id_property' => 'required|unique:user,id',
        $this->validateRequest($request);

        $input = $request->all();
        Solicitud::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente' 
        ]);
    }

    // PUT Solicituds
    // public function update(Request $request, $id)
    // {
    //     $this->validateRequest($request);

    //     $input = $request->all();

    //     $solicitud = Solicitud::find($id);
    //     $solicitud->update($input);
    //     Solicitud::create($input);

    //     return response()->json([
    //         'res' => true,
    //         'message' => 'Registro actualizado correctamente',
    //     ]);
    // }

    // DELETE Solicituds/id
    // public function delete($id) 
    // {
    //     Solicitud::destroy($id);

    //     return response()->json([
    //         'res' => true,
    //         'message' => 'Registro eliminado correctamente',
    //     ]);
    // }

    private function validateRequest($request)
    {
        $this->validate($request, [
            'namePerson' => 'required|min:3|max:100',
            'id_property' => 'required',
            'amount' => 'required',
            'nameProduct' => 'required'
        ]);
    }
}
