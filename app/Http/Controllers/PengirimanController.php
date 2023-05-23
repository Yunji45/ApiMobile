<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\pengiriman;
use App\Models\lokasi;
use App\Models\barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pengiriman::all();
        return response()->json([   
            'response_code' => 200,
            'message' => 'List Jadwal Pengiriman',
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
            'no_pengiriman'      => 'required',
            'tanggal'     => 'required',
            'jumlah_barang'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lokasi = lokasi::where('id',$request->id)->first();
        $barang = barang::where('nama',$request->nama)->first();
        $user = User::where('role','kurir')->first();

        $data = new pengiriman;
        $data ->no_pengiriman = $request->no_pengiriman;
        $data ->tanggal = $request->tanggal;
        $data ->lokasi_id = $lokasi->id;
        $data ->barang_id = $barang->id;
        $data ->jumlah_barang = 1;
        $data ->harga_barang = $barang->harga_barang * 1;
        $data ->kurir_id = $user->id;
        $data ->status = 'proses';
        $data ->save();

        $barang->stok_barang -=1;
        $barang->save();

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

    public function confirmasi(Request $request ,$id)
    {
        $data =pengiriman::find($id);
        $data ->status = 'selesai';
        $data ->save();
        return response()->json([
            'response_code' => 200,
            'message' => 'Data berhasil di kirim',
            'content'    => $data,  
        ]);

    }
}
