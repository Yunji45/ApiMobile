<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json([   
            'response_code' => 200,
            'message' => 'List User',
            'content' => $user
        ]);
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
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role'      => 'kurir'
        ]);
        if($user) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Data berhasil di simpan',
                'content'    => $user,  
            ]);
        }else {
            return response()->json([
                'success' => false,
            ], 409);
    
        }
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
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user =User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user ->save();
        if($user) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Data berhasil di update',
                'content'    => $user,  
            ]);
        }else {
            return response()->json([
                'success' => false,
            ], 409);
    
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
        $user = User::find($id);
        $user->delete();
        if($user) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Data berhasil di hapus',
                'content'    => $user,  
            ]);
        }else {
            return response()->json([
                'success' => false,
            ], 409);
    
        }

    }
}
