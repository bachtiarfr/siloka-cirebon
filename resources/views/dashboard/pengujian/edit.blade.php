@extends('dashboard.master')

@section('content')

<div class="col-lg-12">
  <div class="card">
      <div class="card-body card-block">
        <form id="form_add_data" action="{{url('lab-pengujian/insert-data')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nama_alat_ukur" class=" form-control-label">Nama Alat Ukur</label>
            <select class="form-control select2" id="nama_alat_ukur" name="nama_alat_ukur">
              <option value="" selected>Pilih Salah Satu Data</option>
              @foreach ($alat as $item)
              <option value="{{$item->nama}}" data-id="{{$item->id}}">{{$item->nama}}</option>
              @endforeach  
              </select>
              <input type="text" id="id_alat" name="id_alat" class="form-control" hidden>
              {{-- <input type="text" id="nama_alat_ukur" name="nama_alat_ukur" placeholder="Masukan nama alat" class="form-control" required> --}}
          </div>
          <div class="form-group">
              <label for="gambar" class=" form-control-label">Masukan Gambar</label>
              <input type="file" id="filename" name="filename" placeholder="Masukan gambar" class="form-control" required multiple>
          </div>
          <div class="form-group">
              <label for="Merk" class=" form-control-label">Merk/Tipe</label>
              <input type="text" id="merk" name="merk" placeholder="Merk" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="nomor_seri" class=" form-control-label">Nomor Seri</label>
              <input type="text" id="nomor_seri" name="nomor_seri" placeholder="Masukan nomor seri" class="form-control" required>
          </div>
          <div class="form-group">
              <div class="row">
                  <div class="col">
                      <label for="kapasitas_range" class=" form-control-label">Kapasitas Range</label>
                      <input type="text" id="kapasitas" name="kapasitas" placeholder="Kapasitas" class="form-control" required>
                  </div>
                  <div class="col">
                      <label for="kelas" class=" form-control-label">Kelas</label>
                      <input type="text" id="kelas" name="kelas" placeholder="Kelas" class="form-control" required>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <div class="row">
                  <div class="col">
                      <label for="nomor_inventaris" class=" form-control-label">Nomor Inventaris</label>
                      <input type="text" id="nomor_inventaris" name="nomor_inventaris" placeholder="Masukan nomor inventaris" class="form-control" required>
                  </div>
                  <div class="col">
                      <label for="jumlah" class=" form-control-label">Jumlah</label>
                      <input type="number" id="jumlah" name="jumlah" placeholder="Masukan jumlah" class="form-control" required>
                  </div>
              </div>
          </div>
          <div class="form-group">
            <label for="Tanggal Kalibrasi" class=" form-control-label">Tanggal Kalibrasi</label>
            <input type="date" name="tanggal_kalibrasi" id="tanggal_kalibrasi">
            <input type="text" id="perusahaan" name="perusahaan" placeholder="" class="form-control" required>

          </div>
          <div class="form-group">
            <label for="eksternal" class=" form-control-label">Eksternal</label>
            <input type="text" id="eksternal" name="eksternal" placeholder="Eksternal" class="form-control" required>
          </div>
      </div>
  </div>
</div>


@endsection
