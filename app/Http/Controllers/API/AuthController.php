<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{
//    public function register(Request $request): \Illuminate\Http\JsonResponse
//    {
//        $fields = $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required',
//        ]);
//
//        $user = User::create([
//            'name' => $fields['name'],
//            'email' => $fields['email'],
//            'password' => Hash::make($fields['password']),
//        ]);
//
//        $response = [
//            'success' => true,
//            'user' => $user,
//            'message' => "Registration successful."
//        ];
//        return response()->json($response, 201);
//    }
//
//    /**
//     * @throws ValidationException
//     */
//    public function login(Request $request): JsonResponse
//    {
//        $credentials = $request->validate([
//            'email' => 'required|email:rfc,dns',
//            'password' => 'required|string|min:8',
//        ]);
//
//        $user = User::where('email', $credentials['email'])->first();
//
//        if (!$user || !Hash::check($credentials['password'], $user->password)) {
//
//            throw ValidationException::withMessages([
//                'email' => ['The provided credentials are incorrect.'],
//            ]);
//        }
//
//        $token = $user->createToken('authToken')->plainTextToken;
//
//        $cookie = cookie('access_token', $token, 1440, '/', null, false, true, false, 'strict');
//
//        return response()->json([
//            'success' => true,
//            'user' => $user,
//            'message' => 'Login successful',
//        ])->withCookie($cookie);
//    }
//
//    public function logout(Request $request): JsonResponse
//    {
//        $request->user()->currentAccessToken()->delete();
//
//        $cookie = cookie::forget('access_token');
//
//        return response()->json([
//            'success' => true,
//            'message' => 'Successfully logged out'
//        ])->withoutCookie($cookie);
//    }

//    public function login(Request $request): JsonResponse
//    {
//        $credentials = $request->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//
//            $token = Auth::user()->createToken('authToken')->plainTextToken;
//
//            $cookie = cookie('access_token', $token, 1440, '/', null, false, true, false, 'strict');
//
//            return response()->json([
//                'success' => true,
//                'user' => Auth::user()
//            ])->withCookie($cookie);
//        }
//
//        return response()->json(['error' => 'The provided credentials do not match our records.'], 401);
//    }
//
//    public function logout(Request $request): JsonResponse
//    {
//        Auth::guard('web')->logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
//        return response()->json(['message' => 'Logged out successfully']);
//    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'The provided credentials do not match our records.'], 401);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        $token = $user->createToken('authToken')->plainTextToken;

        $cookie = cookie(
            'access_token',
            $token,
            1440,
            '/',
            null,
            false,
            true,
            false,
            'strict'
        );

        return response()->json([
            'success' => true,
            'user' => $user
        ])->withCookie($cookie);
    }

    public function logout(Request $request): JsonResponse
    {
        $cookie = cookie::forget('access_token');

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ])->withoutCookie($cookie);
    }
}
