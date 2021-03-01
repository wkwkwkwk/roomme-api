<?php

namespace App\Http\Controllers;

use App\Models\RoomMeUser;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_nama' => ['required'], 
            'user_alamat' => ['required'], 
            'user_kecamatan' => ['required', 'integer'], 
            'user_longitude' => ['required'], 
            'user_latitude' => ['required'], 
            'user_photo' => ['required'], 
            'username' => ['required'], 
            'password' => ['required'], 
            'role' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $user = RoomMeUser::create($request->all());
            $response = [
                'message' => 'User created',
                'data' => $user
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
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
        $user = RoomMeUser::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'user_nama' => ['required'], 
            'user_alamat' => ['required'], 
            'user_kecamatan' => ['required', 'integer'], 
            'user_longitude' => ['required'], 
            'user_latitude' => ['required'], 
            'user_photo' => ['required'], 
            'username' => ['required'], 
            'password' => ['required'], 
            'role' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $user->update($request->all());
            $response = [
                'message' => 'User updated',
                'data' => $user
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = RoomMeUser::findOrFail($id);

        try {
            $user->delete();
            $response = [
                'message' => 'User deleted'
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }
}
