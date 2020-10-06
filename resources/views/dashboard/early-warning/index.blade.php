@extends('dashboard.master')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Jadwal Kalibrasi Peralatan</strong>
                    </div>
                    <div class="card-body">
                      <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Laboratorium Pengujian</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Laboratorium Kalibrasi</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="table-responsive">
                            <a href="{{url('data-kalibrasi-pengujian/export_pdf')}}">
                              <span class="badge badge-danger mb-3">Export PDF</span>
                            </a>
                              <table class="table table-striped table-bordered table_master">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alat</th>
                                        <th>Tanggal di Kalibrasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-responsive">
                          <a href="{{url('data-kalibrasi/export_pdf')}}">
                            <span class="badge badge-danger mb-3">Export PDF</span>
                          </a>
                          <table class="table table-striped table-bordered table_master2">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama Alat</th>
                                      <th>Tanggal Kalibrasi</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Modal -->
<div class="modal fade modal-primary" id="myModalMasterData">
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
                    <form id="form_add_data" action="{{url('master-data/insert-data')}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <label for="nama" class=" form-control-label">Nama Alat</label>
                          <input type="text" id="nama" name="nama" placeholder="Masukan nama alat" class="form-control" required>
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

<!-- Modal data pengujian -->
<div class="modal fade" id="ModalViewDataPengujian" tabindex="-1" role="dialog" aria-labelledby="ModalViewDataPengujianLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
          <div class="container text-left">
            <div class="row">
              <div class="col-md-12">
                <h3 class="font-weight-normal mb-3">Tanggal Kalibrasi Awal :</h3>
                <h4 class="h4 v_tanggal"></h4>
              </div>
              <!-- Grid column -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <h3 class="font-weight-normal mb-3">Early Warning System :</h3>
                <h4 class="h4 v_early_warning"></h4>
              </div>
              <!-- Grid column -->
            </div>
          </div>
          <!-- Grid row -->
          
        </div>
        <button class="col-md-12 btn-warning play" id="play">
          Nyalakan Alarm Sekarang
        </button>
        <!-- News jumbotron -->
      </div>
    </div>
  </div>
</div>

<!-- Modal data kalibrasi -->
<div class="modal fade" id="ModalViewDataKalibrasi" tabindex="-1" role="dialog" aria-labelledby="ModalViewDataKalibrasiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
          <div class="container text-left">
            <div class="row">
              <div class="col-md-12">
                <h3 class="font-weight-normal mb-3">Tanggal Kalibrasi Awal :</h3>
                <h4 class="h4 v_tanggal"></h4>
              </div>
              <!-- Grid column -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <h3 class="font-weight-normal mb-3">Early Warning System :</h3>
                <h4 class="h4 v_early_warning"></h4>
              </div>
              <!-- Grid column -->
            </div>
          </div>
          <!-- Grid row -->
          
        </div>
        <button class="col-md-12 btn-warning play" id="play">
          Nyalakan Alarm Sekarang
        </button>
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
<script type="text/javascript">    
(function ($) {

  EarlyWarningSystem()

  function EarlyWarningSystem() {
    var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3');
    
    audioElement.addEventListener('ended', function() {
        this.play();
    }, false);
    
    audioElement.addEventListener("canplay",function(){
        $("#length").text("Duration:" + audioElement.duration + " seconds");
        $("#source").text("Source:" + audioElement.src);
        $("#status").text("Status: Ready to play").css("color","green");
    });
    
    audioElement.addEventListener("timeupdate",function(){
        $("#currentTime").text("Current second:" + audioElement.currentTime);
    });
    
    $('.play').click(function() {
        audioElement.play();
        Swal.fire({
          title: 'STOP?',
          text: "STOP ALARM!",
          icon: 'warning',
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Stop Alarm!'
        }).then((result) => {
          audioElement.pause();
          audioElement.currentTime = 0;
        })
      });
    
    $('#stop').click(function() {
        audioElement.pause();
        audioElement.currentTime = 0;
        $("#status").text("Status: Paused");
    });    
  }

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
            nama = $('#nama').val()
            
          let url = "{{url('master-data/update-data')}}"+'/'+id+"";
        //   window.location.href = url;
            data = {
                id : id,
                nama : nama,
            }
          console.log(url);
          $.ajax({
            url : url,
            method : 'POST',
            data : {_token:"{{ csrf_token() }}",data},
            success: function(data) {                
                if (data == 'success') {
                Swal.fire(
                  'Terupdate!',
                  'Data Berhasil Diupdate.',
                  'success'
                )
                var url =  "{{url('master-data')}}";
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
    
    var table_master = $('.table_master').DataTable({
        destroy: true,
    });

    var table_master2 = $('.table_master2').DataTable({
        destroy: true,
    });

    getTable();
    getTable2();
    
    function getTable() {
      var i = 1;
        $.ajax({
        url : "{{url('get-early-warning-data2')}}",
        method : 'GET',
        complete : function(data){
        if (data.responseJSON.data === null || data.responseJSON.data === undefined) {
        console.log('kosong');          
        } else {
            $.each(data.responseJSON.data,(key,val)=>{

              var kalibrasi = new Date(val.tanggal_kalibrasi);
              var warning_sys = new Date(val.tanggal_kalibrasi);
              warning_sys.setDate(warning_sys.getDate()+330);

              var gambar = val.gambar
              let url = "{{asset('assets/images')}}"+'/'+gambar+"";
                table_master.row.add({
                0:i, 
                1:val.nama_alat, 
                2:kalibrasi, 
                3:""+
                "<div class='col-action'>" +
                    "<button data-toggle='modal' data-target='#ModalViewDataKalibrasi' data-tgl='"+warning_sys+"' class='view' id='"+val.id+"' >" +
                      "Cek Early Warning System" +
                    "</button>" +
                    // "<button class='delete' id='"+val.id+"' >" +
                    //   "<i class='fa fa-trash-o'></i>" +
                    // "</button>" +
                  "</div>",
              })
              table_master.draw()
              i++
            })
            }
        }
        })
    }
    function getTable2() {
        $.ajax({
        url : "{{url('get-early-warning-data')}}",
        method : 'GET',
        complete : function(data){
        if (data.responseJSON.data === null || data.responseJSON.data === undefined) {
        console.log('kosong');          
        } else {
            $.each(data.responseJSON.data,(key,val)=>{

              var kalibrasi = new Date(val.tanggal_kalibrasi);
              var warning_sys = new Date(val.tanggal_kalibrasi);
              warning_sys.setDate(warning_sys.getDate()+330);

              var gambar = val.gambar
              let url = "{{asset('assets/images')}}"+'/'+gambar+"";
                table_master2.row.add({
                0:i, 
                1:val.nama_alat, 
                2:kalibrasi, 
                3:""+
                "<div class='col-action'>" +
                    "<button data-toggle='modal' data-target='#ModalViewDataPengujian' data-tgl='"+warning_sys+"' class='view' id='"+val.id+"' >" +
                      "Cek Early Warning System" +
                    "</button>" +
                    // "<button class='delete' id='"+val.id+"' >" +
                    //   "<i class='fa fa-trash-o'></i>" +
                    // "</button>" +
                  "</div>",
              })
              table_master2.draw()
              i++
            })
            }
        }
        })
    }

    table_master.on('click', 'tbody tr td div button', function(){
    if ($(this).attr('class') === 'edit') {
      let id = $(this).attr('id');
      // console.log('click edit',id);
        
      var data = table_master.row($(this).parents('tr')).data()
      // console.log(data);
      var nama = data[0]
      alamat = data[1]
      no_telepon = data[2]
      
      var indexRow = table_master.row($(this).parents('tr')).index()
      
      $('#nama').val(nama)
      $('#alamat').val(alamat)
      $('#no_telepon').val(no_telepon)
      
      $('.save_form').attr('action','edit')
      $('.save_form').attr('id',id)
    } else if ($(this).attr('class') === 'view') {
        let early_warning_sys = $(this).attr('data-tgl');
        console.log('view tgl', early_warning_sys);      
        var data = table_master.row($(this).parents('tr')).data()
        var tgl = data[2]

        $('.v_early_warning').html(early_warning_sys)

        $('.v_tanggal').html(tgl)
    }
  })

})(jQuery);

</script>

@endsection