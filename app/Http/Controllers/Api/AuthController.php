<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email|email',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        if ($request->user('sanctum')) {
            return response('Already logged In');
        } else {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ]);

            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                $abilities = [];
                auth()->user()->role == 'admin' ? $abilities = ['*'] : (auth()->user()->role == 'viewer' ? $abilities = ['view-patients', 'view-demographics', 'view-records', 'view-reports'] : (auth()->user()->role == 'user' ? $abilities = ['create-patients', 'create-demographics', 'create-records', 'view-patients', 'view-records', 'view-demographics'] : ''));
                $response = [
                    'user' => auth()->user(),
                    'token' => auth()->user()->createToken('myapptoken', $abilities)->plainTextToken,
                ];
                return response($response);
            } else {
                return response('Invalid Credentials');
            }
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response('Logged Out', 200);
    }
}
