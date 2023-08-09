<?php

namespace App\Http\Controllers\Api;

use App\Constants\ApiConstants;
use Illuminate\Support\Facades\Http;

class TodoController
{
    public function getTodos(){

        $response = Http::get(ApiConstants::TODOS_API);
        return $response;
    }
}
