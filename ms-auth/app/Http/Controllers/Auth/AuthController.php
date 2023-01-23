<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Проверить валидность токена
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function checkToken(Request $request): JsonResponse
    {
        if(!$request->hasHeader('Authorization')) {
            return response()->json(['error' => 'No Authorization header present'], Response::HTTP_BAD_REQUEST);
        }

        if(Auth::check()) {
            return response()->json(['active' => true]);
        }

        return response()->json(['active' => false]);
    }
}
