<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Prenotazione;
use App\Models\Socio;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login', 'signup', 'index']]);
    }

    public function index()
    {
        return UserResource::collection(User::latest()->get());
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function signup(UserRequest $request)
    {
        $socio = Socio::where([
            ['nome', $request->input('nome')],
            ['cognome', $request->input('cognome')],
            ['anno', $request->input('anno')]
        ])->first();

        if ($socio){
            $user = User::create($request->all());
            return response($user, Response::HTTP_CREATED);
            //return $this->login($request);
        }
        return 'Errore - Socio non presente';
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(new UserResource(auth()->user()));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->username
        ]);
    }

    public function payload()
    {
        return auth()->payload();
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response($user, Response::HTTP_ACCEPTED);
    }

    public function prenotazioni()
    {
        $username = auth()->user()->username;
        $prenotazioni = Prenotazione::where('username1', $username)->
                                orWhere('username2', $username)->
                                orWhere('username3', $username)->
                                orWhere('username4', $username)

            ->get();
        return $prenotazioni;
    }
}
