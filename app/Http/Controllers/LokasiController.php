<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = lokasi::all();
        return response()->json([   
            'response_code' => 200,
            'message' => 'List Lokasi',
            'content' => $data
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
            'kode_lokasi'      => 'required',
            'nama_lokasi'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = lokasi::create([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        if($data) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Data berhasil di simpan',
                'content'    => $data,  
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
            'kode_lokasi'      => 'required',
            'nama_lokasi'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = lokasi::find($id);
        $data->kode_lokasi= $request->kode_lokasi;
        $data->nama_lokasi= $request->nama_lokasi;
        $data ->save();

        if($data) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Data berhasil di update',
                'content'    => $data,  
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
        $data =lokasi::find($id);
        $data->delete();
        return response()->json([
            'response_code' => 200,
            'message' => 'Data berhasil di hapus',
            'content'    => $data,  
        ]);

    }
}
