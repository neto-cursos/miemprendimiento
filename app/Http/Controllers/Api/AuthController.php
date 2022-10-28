<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TokenFormRequest;
use App\Http\Requests\RegisterFormRequest;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    //
    public function register(RegisterFormRequest $request): JsonResponse
    {
        //dd($request->all());
        $user = User::create([
            'name' => $request->get('name'),
            'apellido' => $request->get('apellido'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function token(TokenFormRequest $request): JsonResponse
    {
        //if(!Auth::attempt($request->only('email',Hash::make('password')))){
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid Login details',
            ], 401);
        }
        $user = User::where('email', $request->get('email'))->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_apellido' => $user->apellido,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function cerrarSesion(Request $request): JsonResponse
    {
        //Auth::logout();
        //{
        try {

            $accessToken = $request->bearerToken();

            // Get access token from database
            $token = PersonalAccessToken::findToken($accessToken);
            if ($token)
                $token->delete();
            else
                $token = null;
            // Revoke token
            //$token->delete();
            //log user out
            //Auth::guard('web')->logout();
            //Auth::user()->token_get_all->delete;
            //con codigo 204 no retorna ningun mensaje aunq se coloq uno
            //return response()->json(['mensaje' => $token], 201);
            return response()->json(['mensaje' => 'sesión cerrada'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['error_logout' => $e], 501);
        }
        //}
        return response()->json(['mensaje' => 'logoutExitoso'], 201);
    }

    public function testAuth(Request $request)
    {
        //auth()->user()...Auth::check()
        $accessToken = $request->bearerToken();
        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);
        //if (Auth::check()) {
        if ($token) {
            $user_id = PersonalAccessToken::findToken($accessToken);
            //$id = User::where('empr_id', $request->get('empr_id'))->firstOrFail();
            //$user_id = DB::table('personal_access_tokens')->where('id', $user_token)->first(); echo $user_id->id;
            //return "auth";
            return response()->json(['user' => 'auth','user_id'=>$user_id->tokenable_id], 201);
        } else {
            return "guest";
        }
    }
}
