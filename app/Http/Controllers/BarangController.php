<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::all();
        return response()->json([   
            'response_code' => 200,
            'message' => 'List Barang',
            'content' => $barang
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
            'kode_barang'      => 'required',
            'nama_barang'     => 'required',
            'deskripsi'  => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barang = barang::create([
            'kode_barang'      => $request->kode_barang,
            'nama_barang'     => $request->nama_barang,
            'deskripsi'  => $request->deskripsi,
            'stok_barang'      => $request->stok_barang,
            'harga_barang' => $request->harga_barang,
        ]);
        if($barang) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Data berhasil di simpan',
                'content'    => $barang,  
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
        $validator = Validator::make($request->all(), [
            'kode_barang'      => 'required',
            'nama_barang'     => 'required',
            'deskripsi'  => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barang =barang::find($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok_barang = $request->stok_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang ->save();
        if($barang) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Data berhasil di update',
                'content'    => $barang,  
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
        $data = barang::find($id);
        $data ->delete();
        return response()->json([
            'response_code' => 200,
            'message' => 'Data berhasil di hapus',
            'content'    => $data,  
        ]);

    }
}
