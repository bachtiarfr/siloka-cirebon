@extends('dashboard.master')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            
            <div class="col-md-12">
                <a href="#" data-toggle="modal" data-target="#myModal" id="add_new">
                    <span class="badge badge-success mb-3">Masukan Data Baru</span>
                </a>
                <a href="{{url('lab-pengujian/export_pdf')}}">
                  <span class="badge badge-danger mb-3">Export PDF</span>
                </a>

                <div class="form-group" id="gambar">
                </div>
                <div class="card">
                    <div class="card-header">
                      <strong class="card-title">Daftar Inventaris Alat Standar Laboratorium Pengujian</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table_pengujian">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alat Ukur</th>
                                        <th>Merk/Tipe</th>
                                        <th>Nomor Seri</th>
                                        <th>Kapasitas</th>
                                        <th>kelas</th>
                                        <th>Nomor Inventaris</th>
                                        <th>Jumlah</th>
                                        <th>Internal</th>
                                        <th>Eksternal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Modal -->
<div class="modal fade modal-primary" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                        <label for="Tanggal Kalibrasi" class=" form-control-label">Internal</label>
                        <input type="date" name="tanggal_kalibrasi" id="tanggal_kalibrasi">
                        <input type="text" id="perusahaan" name="perusahaan" placeholder="Nama Perusahaan" class="form-control" required>

                      </div>
                      <div class="form-group">
                        <label for="eksternal" class=" form-control-label">Eksternal</label>
                        <input type="text" id="eksternal" name="eksternal" placeholder="Eksternal" class="form-control" required>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel_form" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary save_form">Simpan</button>
        </div>
        </form>
        </div>
      </div>
</div>

{{-- MODAL VIEW DATA PENGUJIAN --}}

<!-- Modal detail data -->
<div class="modal fade" id="ModalViewData" tabindex="-1" role="dialog" aria-labelledby="ModalViewDataLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 0px">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- News jumbotron -->
        <div class="jumbotron text-center hoverable p-4">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-5 offset-md-1 mx-3 my-3">

              <!-- Featured image -->
              <div class="view overlay">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="https://mdbootstrap.com/img/Photos/Others/laptop-sm.jpg" class="img-fluid myImg" alt="Sample image for first version of blog listing">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 text-md-left ml-3 mt-3">
              <p class="font-weight-normal m-0"> Nama Alat Ukur : </p>
              <h4 class="h4 v_nama_alat_ukur"></h4>
              <p class="font-weight-normal m-0"> Merk / Tipe : </p>
              <h4 class="h4 v_merk"></h4>
              <p class="font-weight-normal m-0"> Nomor Seri : </p>
              <h4 class="h4 v_nomor_seri"></h4>
              <p class="font-weight-normal m-0"> Kapasitas : </p>
              <h4 class="h4 v_kapasitas"></h4>
              <p class="font-weight-normal m-0"> Kelas : </p>
              <h4 class="h4 v_kelas"></h4>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 text-md-left ml-3 mt-3">
              <p class="font-weight-normal m-0"> Nomor Inventaris : </p>
              <h4 class="h4 v_nomor_inventaris"></h4>
              <p class="font-weight-normal m-0"> Internal : </p>
              <h4 class="h4 v_internal"></h4>
              <p class="font-weight-normal m-0"> Eksternal : </p>
              <h4 class="h4 v_eksternal"></h4>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- News jumbotron -->
      </div>
    </div>
  </div>
</div>

{{-- Modal image when clicked --}}
<div id="ImageModal" class="modal" style="text-align: center; margin-top: 100px;">
  <span class="close_image">&times;</span>
  <img class="modal-content_image" id="img01">
  <div id="caption"></div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/init/datatables-init.js')}}"></script>
{{-- <script src="{{asset('assets/js/datepicker.js')}}"></script> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">    
(function ($) {

  // select 2

  $('select').on('change',function(){
    var id_alat = $(this).find(':selected').data('id');
    $('#id_alat').val(id_alat);
    console.log(id_alat);

  })
  

  // image view
  var modal = document.getElementById("ImageModal");
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementsByClassName("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close_image")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() { 
    modal.style.display = "none";
  }

  $('.save_form').click(function(){

    let id = $(this).attr('id')
    if ($(this).attr('action') !== 'edit') {
      $('#form_add_data').submit();
    } else {
      Swal.fire({
        title: 'Yakin Mau Diganti?',
        text: "Data ini akan diedit di database!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Update!'
      }).then((result) => {
        if (result.value) {
            var id = $(this).attr('id')
            nama = $('#nama_alat_ukur').val()
            filename = $('#filename').val()
            merk = $('#merk').val()
            nomor_seri = $('#nomor_seri').val()
            kapasitas = $('#kapasitas').val()
            kelas = $('#kelas').val()
            nomor_inventaris = $('#nomor_inventaris').val()
            jumlah = $('#jumlah').val()
            tanggal_kalibrasi = $('#tanggal_kalibrasi').val()
            perusahaan = $('#perusahaan').val()
            eksternal = $('#eksternal').val()
            
            let url = "{{url('lab-pengujian/update-data')}}"+'/'+id+"";
            $('.save_form').attr('action', url).submit();
            data = {
                id : id,
                nama : nama,
                filename : filename,
                merk : merk,
                nomor_seri : nomor_seri,
                nomor_inventaris : nomor_inventaris,
                jumlah : jumlah,
                tanggal_kalibrasi : tanggal_kalibrasi,
                perusahaan : perusahaan,
                eksternal : eksternal
            }
          console.log(url);
          $.ajax({
            url : url,
            method : 'POST',
            data : {_token:"{{ csrf_token() }}",data},
            success: function(data) {                
                if (data == 'success') {
                clear_table()
                Swal.fire(
                  'Terupdate!',
                  'Data Berhasil Diupdate.',
                  'success'
                )
                var url =  "{{url('lab-pengujian')}}";
                window.location.href = url;
                }
              }
          })
        }
      })

    }
  })

    $('.cancel_form').click(function(){
      clear_table();
    })

    var i = 1;
    
    var table_pengujian = $('.table_pengujian').DataTable({
        destroy: true,
    });
    getTable();
    
    function getTable() {
        $.ajax({
        url : "{{url('get-table-pengujian')}}",
        method : 'GET',
        complete : function(data){
        if (data.responseJSON.data === null || data.responseJSON.data === undefined) {
        console.log('kosong');          
        } else {
            $.each(data.responseJSON.data,(key,val)=>{
              var gambar = val.gambar
              let url = "{{asset('assets/images')}}"+'/'+gambar+"";
                table_pengujian.row.add({
                0:i,
                1:val.nama_alat_ukur,
                2:val.merk,
                3:val.nomor_seri,
                4:val.kapasitas,
                5:val.kelas,
                6:val.nomor_inventaris,
                7:val.jumlah,
                8:val.tanggal_kalibrasi + " " + val.perusahaan,
                9:val.eksternal,
                10:""+
                "<div class='col-action'>" +
                    "<button data-toggle='modal' data-target='#myModal' class='edit' id='"+val.id+"' >" +
                      "<i class='fa fa-edit'></i>" +
                    "</button>" +
                    "<button data-toggle='modal' data-target='#ModalViewData' class='view' id='"+val.id+"' >" +
                      "<i class='fa fa-eye'></i>" +
                    "</button>" +
                    "<button class='delete' id='"+val.id+"' >" +
                      "<i class='fa fa-trash-o'></i>" +
                    "</button>" +
                  "</div>",
                11:""+
                "<div class='view overlay'>"+
                "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>"+
                  "<div class='carousel-inner'>"+
                    "<div class='carousel-item active'>"+
                      "<img src='"+url+"' class='img-fluid myImg' alt='Sample image for first version of blog listing'>"+
                    "</div>"+
                  "</div>"+
                  "<a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>"+
                    "<span class='carousel-control-prev-icon' aria-hidden='true'></span>"+
                    "<span class='sr-only'>Previous</span>"+
                  "</a>"+
                  "<a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>"+
                    "<span class='carousel-control-next-icon' aria-hidden='true'></span>"+
                    "<span class='sr-only'>Next</span>"+
                  "</a>"+
                "</div>"+
              "</div>",
                12:val.tanggal_kalibrasi,
                13:val.perusahaan,
              })
              table_pengujian.draw()
              i++;
            })
            }
        }
        })
    }

    function clear_table() {
      $('#nama_alat_ukur').val('')
      $('#merk').val('')
      $('#nomor_seri').val('')
      $('#kapasitas').val('')
      $('#kelas').val('')
      $('#nomor_inventaris').val('')
      $('#jumlah').val('')
      $('#tanggal_kalibrasi').val('')
      $('#perusahaan').val('')
      $('#eksternal').val('')
    }

    table_pengujian.on('click', 'tbody tr td div button', function(){
    if ($(this).attr('class') === 'edit') {
      let id = $(this).attr('id');
      console.log('click edit',id);
        
      var data = table_pengujian.row($(this).parents('tr')).data()
      // console.log(data);
      var nama_alat_ukur = data[1]
      merk = data[2]
      nomor_seri = data[3]
      kapasitas = data[4]
      kelas = data[5]
      nomor_inventaris = data[6]
      jumlah = data[7]
      tanggal_kalibrasi[12]
      perusahaan = data[13]
      eksternal = data[9]
      
      var indexRow = table_pengujian.row($(this).parents('tr')).index()
      
      $('#nama_alat_ukur').val(nama_alat_ukur)
      $('#merk').val(merk)
      $('#nomor_seri').val(nomor_seri)
      $('#kapasitas').val(kapasitas)
      $('#kelas').val(kelas)
      $('#nomor_inventaris').val(nomor_inventaris)
      $('#jumlah').val(jumlah)
      $('#tanggal_kalibrasi').val(tanggal_kalibrasi)
      $('#perusahaan').val(perusahaan)
      $('#eksternal').val(eksternal)

      $('.save_form').attr('action','edit')
      $('.save_form').attr('id',id)
    } else if ($(this).attr('class') === 'view') {
        let id = $(this).attr('id');
        // console.log('view', id);      
          
        var data = table_pengujian.row($(this).parents('tr')).data()
        console.log('view data ',data);
        var nama_alat_ukur = data[1]
        merk = data[2]
        nomor_seri = data[3]
        kapasitas = data[4]
        kelas = data[5]
        nomor_inventaris = data[6]
        jumlah = data[7]
        internal = data[8]
        eksternal = data[9]
        gambar = data[11]

        $('.v_nama_alat_ukur').html(nama_alat_ukur)
        $('.v_merk').html(merk)
        $('.v_nomor_seri').html(nomor_seri)
        $('.v_kapasitas').html(kapasitas)
        $('.v_kelas').html(kelas)
        $('.v_nomor_inventaris').html(nomor_inventaris)
        $('.v_internal').html(internal)
        $('.v_eksternal').html(eksternal)
        $('.carousel-item.active').html(gambar)
        
        
    } else if ($(this).attr('action') === 'edit') {
      Swal.fire({
        title: 'Yakin Mau Diedit?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Edit!'
      }).then((result) => {
        if (result.value) {
          let id = $(this).attr('id')
          let url = "{{url('lab-pengujian/update-data')}}"+'/'+id+"";
          // console.log(url);
          var data = {
            id : id
          }
          $.ajax({
            url : url,
            method : 'GET',
            data : data,
            success: function(data) {                
              window.location.href = url;
            }
          })
        }
      })    
    } else {
      Swal.fire({
        title: 'Yakin Mau Dihapus?',
        text: "Setelah dihapus, data produk ini akan hilang!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Apus!'
      }).then((result) => {
        if (result.value) {
          let id = $(this).attr('id')
          let url = "{{url('lab-pengujian/delete-data')}}"+'/'+id+"";
          // console.log(url);
          $.ajax({
            url : url,
            method : 'GET',
            success: function(data) {                
              if (data.message == 'success') {
                Swal.fire(
                  'Terhapus!',
                  'Data Berhasil Terhapus.',
                  'success'
                )
                var url =  "{{url('lab-pengujian')}}";
                window.location.href = url;
                }
              }
          })
        }
      })
    }
  })

})(jQuery);

</script>

@endsection