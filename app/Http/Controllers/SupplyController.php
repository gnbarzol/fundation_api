<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supply;

class SupplyController extends Controller
{

    // GET supplys
    public function index(Request $request)
    {
        // ?idProperty=0987654323
        if ($request->has('idProperty')) {
            return Supply::whereidProperty($request->idProperty)->get();
        }
        // ?name=vitamin
        else if ($request->has('name')) {
            return Supply::where('name', 'like', '%' . $request->name . '%')->get();
        } else
            return Supply::all();
    }


    // GET supplys/id
    public function show($id)
    {
        return Supply::findOrFail($id);
    }

    // POST 
    public function store(Request $request)
    {
        
        // 'id_property' => 'required|unique:user,id',
        $this->validateRequest($request);

        $input = $request->all();
        Supply::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente' 
        ]);
    }

    // PUT supplys
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $input = $request->all();

        $supply = Supply::find($id);
        $supply->update($input);
        Supply::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente',
        ]);
    }

    // DELETE supplys/id
    public function delete($id) 
    {
        Supply::destroy($id);

        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado correctamente',
        ]);
    }

    private function validateRequest($request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'id_property' => 'required',
            'amount' => 'required'
        ]);
    }
}
