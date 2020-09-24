<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataEksternal;
use DB;

class DataEksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $out = [];
        $data = DB::table('lab-cirebon.data_eksternal')->get();
        if (count($data) > 0) {
            $out['state'] = true;
            $out['message'] = 'success';
            $out['data'] = $data;
        } else {
            $out['state'] = false;
            $out['message'] = 'empty';
            $out['data'] = null;
        }

        return view('dashboard.eksternal.index');
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
        $insert_data = new DataEksternal;
        $insert_data->nama = $request->input('nama'); 
        $insert_data->alamat = $request->input('alamat'); 
        $insert_data->no_telepon = $request->input('no_telepon'); 
        $insert_data->save();
        if ($insert_data) {
            // Session::flash("success", "berhasil Menambah Product");
            return redirect()->to("/data-eksternal");
        } else {
            // Session::flash("error", "Gagal Menambah Product");
            return redirect()->to("/data-eksternal");
        }    
    }

    public function getTable() {
        $out = [];
        $data = DB::table('lab-cirebon.data_eksternal')->get();
        if (count($data) > 0) {
            $out['state'] = true;
            $out['message'] = 'success';
            $out['data'] = $data;
        } else {
            $out['state'] = false;
            $out['message'] = 'empty';
            $out['data'] = null;
        }
        return $out;
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
        // dd($request->data);
        $id = $request->data['id'];
        $nama = $request->data['nama'];
        $alamat = $request->data['alamat'];
        $no_telepon = $request->data['no_telepon'];
        $update_data = DataEksternal::find($id);
        $update_data->nama = $nama; 
        $update_data->alamat = $alamat; 
        $update_data->no_telepon = $no_telepon; 
        $update_data->save();
        if ($update_data) {
            return 'success';
        } else {
            $err['message'] = 'error';
            $err['detail'] = '';
            return $err;
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
        $get_alat = DataEksternal::find($id);
        // dd($gambar);
        $get_alat->delete();
        if ($get_alat) {
            return response()->json([
                'message' => 'success'
            ]);
        } else {
            return response($e)->json([
                'message' => $e
            ]);
        }
    }
}
