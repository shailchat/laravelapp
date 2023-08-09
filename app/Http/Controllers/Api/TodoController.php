<?php

namespace App\Http\Controllers\Api;

use App\Constants\ApiConstants;
use Illuminate\Support\Facades\Http;

class TodoController
{
    public function getTodos(){

        $response = Http::get(ApiConstants::TODOS_API);
//        $response = Http::post("http://localhost:8000/api/tokens/create");

        return $response;

//        $user = User::where('id', 9)->first();
//        auth()->login($user);
//        $token =  $user->createToken('token');
//
//        $response = Http::withToken($token->plainTextToken)
//                        ->post("http://localhost:8000/api/employees");
//
//
//        return $response;
    }
}
