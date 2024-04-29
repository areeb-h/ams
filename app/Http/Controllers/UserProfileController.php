<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function getProfile(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }
}
