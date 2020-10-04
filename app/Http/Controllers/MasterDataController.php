<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\MasterData;

use App\AlatStandarKalibrasi;
use App\DataKalibrasi;
use Session;
use File;

use PDF;

class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $out = [];
        $data = DB::table('lab-cirebon.master_data')->get();
        if (count($data) > 0) {
            $out['state'] = true;
            $out['message'] = 'success';
            $out['data'] = $data;
        } else {
            $out['state'] = false;
            $out['message'] = 'empty';
            $out['data'] = null;
        }

        return view('dashboard.master-data.index');
    }

    public function earlyWarning()
    {
        $data = DB::table('lab-cirebon.data_kalibrasis')->get();
        return view('dashboard.early-warning.index', compact('data'));
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
        $insert_data = new MasterData;
        $insert_data->nama = $request->input('nama'); 
        $insert_data->save();
        if ($insert_data) {
            // Session::flash("success", "berhasil Menambah Product");
            return redirect()->to("/master-data");
        } else {
            // Session::flash("error", "Gagal Menambah Product");
            return redirect()->to("/master-data");
        }    
    }

    public function getTable() {
        $out = [];
        $data = DB::table('lab-cirebon.master_data')->get();
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

    public function getEarlyWarning() {
        $out = [];
        $data = DB::table('lab-cirebon.data_kalibrasis')->get();
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

    public function getEarlyWarning2() {
        $out = [];
        $data = DB::table('lab-cirebon.data_kalibrasi_pengujian')->get();
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
        $id = $request->data['id'];
        $nama = $request->data['nama'];
        $update_data = MasterData::find($id);
        $update_data->nama = $nama; 
        $update_data->save();
        if ($update_data) {
            return 'success';
        } else {
            $err['message'] = 'error';
            $err['detail'] = '';
            return $err;
        }
    }

    public function kalibrasi_pengujian_export_pdf ()
    {
        $data = DB::table('lab-cirebon.data_kalibrasi_pengujian')->get();
 
    	$pdf = PDF::loadview('dashboard.early-warning.laporan_early_warning_kalibrasi_pengujian',['data'=>$data]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    
    }

    public function kalibrasi_export_pdf()
    {
        $data = DB::table('lab-cirebon.data_kalibrasis')->get();
 
    	$pdf = PDF::loadview('dashboard.early-warning.laporan_early_warning_kalibrasi',['data'=>$data]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get_alat = MasterData::find($id);
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
