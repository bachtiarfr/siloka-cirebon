<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AlatStandar;
use App\MasterData;
use App\DataKalibrasi;
use Session;
use File;

use PDF;

use App\Exports\DataLaporan;
use Maatwebsite\Excel\Facades\Excel;

class LabPengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alat = MasterData::all();
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

        return view('dashboard.pengujian.index', compact('alat'));
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
        // dd($request->all());
        $images = array();

        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);        

        $nama_alat_ukur = $request->input('nama_alat_ukur');
        $merk = $request->input('merk');
        $id_alat = $request->input('id_alat');
        $nomor_seri = $request->input('nomor_seri');
        $kapasitas = $request->input('kapasitas');
        $kelas = $request->input('kelas');
        $nomor_inventaris = $request->input('nomor_inventaris');
        $jumlah = $request->input('jumlah');
        $internal = $request->input('internal');
        $eksternal = $request->input('eksternal');

        $insert_data = new AlatStandar;

        $imageName = time().'.'.request()->filename->getClientOriginalExtension();
        // dd($imageName);
        request()->filename->move(public_path('assets/images'), $imageName);
        $insert_data->gambar = $imageName;

        $data_alat_standar = [
            'nama_alat_ukur' => $nama_alat_ukur, 
            'merk' => $merk, 
            'id_alat' => $id_alat, 
            'nomor_seri' => $nomor_seri, 
            'gambar' => $imageName, 
            'kapasitas' => $kapasitas, 
            'kelas' => $kelas, 
            'nomor_inventaris' => $nomor_inventaris, 
            'jumlah' => $jumlah, 
            'internal' => $internal, 
            'eksternal' => $eksternal, 
        ];

        $data_kalibrasi = [
            'id_alat' => $id_alat,
            'nama_alat' => $nama_alat_ukur,
        ];

        $insert_alat_standar = DB::table('lab-cirebon.alat_standar')->insert($data_alat_standar);
        if ($insert_alat_standar) {

            $data_kalibrasi = [
                'id_alat' => $id_alat,
                'nama_alat' => $nama_alat_ukur,
            ];
            DB::table('lab-cirebon.data_kalibrasis')->insert($data_kalibrasi);
        }

        // $insert_data->save();
        if ($insert_data) {
            // $data_kalibrasi = new DataKalibrasi;
            // $data_kalibrasi->id_alat = $insert_data->id;
            // $data_kalibrasi->nama_alat_ukur->insert_data->nama_alat_ukur;
            // $data_kalibrasi->tanggal_kalibrasi = $insert_data->created_at;
            // $data_kalibrasi->save();
            // Session::flash("success", "berhasil Menambah Product");
            return redirect()->to("/lab-pengujian");
        } else {
            // Session::flash("error", "Gagal Menambah Product");
            return redirect()->to("/lab-pengujian");
        }    
    }

    public function export_excel()
    {
        return Excel::download(new DataLaporan, 'laporan.xlsx');
    }

    public function export_pdf()
    {
        $data = DB::table('lab-cirebon.alat_standar')->get();
 
    	$pdf = PDF::loadview('dashboard.pengujian.laporan_pdf',['data'=>$data]);
        return $pdf->stream();
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
