<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AlatStandar;
use Session;
use File;

class LabPengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $out = [];
        $data = DB::table('lab-cirebon.alat_standar')->get();
        if (count($data) > 0) {
            $out['state'] = true;
            $out['message'] = 'success';
            $out['data'] = $data;
        } else {
            $out['state'] = false;
            $out['message'] = 'empty';
            $out['data'] = null;
        }

        return view('dashboard.pengujian.index');
    }

    public function getTable() {
        $out = [];
        $data = DB::table('lab-cirebon.alat_standar')->get();
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
        $images = array();

        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);        

        $insert_data = new AlatStandar;
        $insert_data->nama_alat_ukur = $request->input('nama_alat_ukur'); 
        $insert_data->merk = $request->input('merk'); 
        $insert_data->nomor_seri = $request->input('nomor_seri'); 
        $insert_data->kapasitas = $request->input('kapasitas'); 
        $insert_data->kelas = $request->input('kelas'); 
        $insert_data->nomor_inventaris = $request->input('nomor_inventaris'); 
        $insert_data->jumlah = $request->input('jumlah'); 
        $insert_data->internal = $request->input('internal'); 
        $insert_data->eksternal = $request->input('eksternal'); 

        $imageName = time().'.'.request()->filename->getClientOriginalExtension();
        // dd($imageName);
        request()->filename->move(public_path('assets/images'), $imageName);
        $insert_data->gambar = $imageName;
        $insert_data->save();
        if ($insert_data) {
            // Session::flash("success", "berhasil Menambah Product");
            return redirect()->to("/lab-pengujian");
        } else {
            // Session::flash("error", "Gagal Menambah Product");
            return redirect()->to("/lab-pengujian");
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get_alat = AlatStandar::find($id);
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
