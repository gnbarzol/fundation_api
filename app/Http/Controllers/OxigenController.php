<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oxigen;

class OxigenController extends Controller
{

    // GET oxigens
    public function index(Request $request)
    {
        // GET oxigens?idProperty=0987654323
        if($request->has('idProperty')) {
            return Oxigen::whereIdProperty($request->idProperty)->get();
        }
        else return Oxigen::all();
    }

    // GET oxigens/id
    public function show($id)
    {
        return Oxigen::findOrFail($id);
    }

    // POST oxigens
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $input = $request->all();
        Oxigen::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente' 
        ]);
    }

    // PUT oxigens
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $input = $request->all();

        $oxigen = Oxigen::find($id);
        $oxigen->update($input);
        Oxigen::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente',
        ]);
    }

    // DELETE oxigens/id
    public function delete($id) 
    {
        Oxigen::destroy($id);

        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado correctamente',
        ]);
    }

    private function validateRequest($request)
    {
        $this->validate($request, [
            'capacity' => 'required',
            'id_property' => 'required',
            'amount' => 'required'
        ]);
    }
}