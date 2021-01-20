<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    // GET user/id
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // POST 
    public function store(Request $request)
    {

        $this->validateRequest($request);

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        User::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Usuario insertado correctamente'
        ]);
    }

    public function login(Request $request)
    {
        $user = User::whereEmail( $request->email)->first();

        if(!is_null($user) && Hash::check($request->password, $user->password))
        {
            $user->api_token = Str::random(100);
            $user->save();

            return response()->json([
                'res' => true,
                'token' => $user->api_token,
                'message' => 'Login correct'
            ]);
        } else {
            return response()->json([
                'res' => false,
                'message' => 'Email or password incorrect'
            ]);
        }
    }

    public function logout(Request $request)
    {
        $user = User::where('api_token',$request->api_token)->first();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'res' => true,
            'message' => 'Logout correct'
        ]);
    }

    // PUT user
    public function update(Request $request, $id)
    {
        $this->validateRequest($request, $id);

        $input = $request->all();

        $user = User::find($id);
        $user->update($input);
        User::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Usuario actualizado correctamente',
        ]);
    }

    // DELETE user/id
    public function delete($id)
    {
        User::destroy($id);

        return response()->json([
            'res' => true,
            'message' => 'Usuario eliminado correctamente',
        ]);
    }

    private function validateRequest($request, $id = null)
    {
        $rule = is_null($id) ? '' : ',' . $id; 
        $this->validate($request, [
            'name' => 'required', 'email' => 'required|unique:user,email' . $rule, 'password' => 'required'
        ]);
    }

    private function savePhoto($file)
    {
        $nameFile = time() . '.' . $file->getClientOriginalExtension();
        $file->move(base_path('/public/photos'), $nameFile);

        return $nameFile;
    }
}
