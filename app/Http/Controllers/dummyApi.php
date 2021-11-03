<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class dummyApi extends Controller
{
    function login(Request $request)
    {
        $user= User::where('telephone', $request->telephone)->first();
     //  dd($user->password);
     $validator = Validator::make($request->all(), [
        'telephone' => 'required',
        "password" => "required"
    ]);

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }

             $token = $user->createToken('parrainage-token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

             return response($response, 201);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nom" => "required|string" ,
            'telephone' => 'required|max:9|unique:users',
            "matricule" => "required|unique:users" ,
            "sexe" => "required|string" ,
            "filiere" => "required" ,
            "niveau" => "required|numeric" ,
            "email" => "required|email" ,
            "password" => "required|min:3"
        ]);

        if ($validator->fails()) {
            $status = 0;
            return response(['errors' => $validator->errors()->all(), 'status' => $status], 422);
        }

        $user = User::create(
            [
                "nom" => $request["nom"],
                "prenom" => $request["prenom"],
                "matricule" => $request["matricule"],
                "sexe" => $request["sexe"],
                "filiere" => $request["filiere"],
                "niveau" => $request["niveau"],
                "email" => $request["email"],
                'telephone' => $request['telephone'],
                "password" =>Hash::make($request->password),
            ]
        );
        $status = 1;
        $response = [
            'status' => $status,
            'message' => 'Successfully registered',
        ];
        return $response;
    }

}
