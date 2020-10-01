<!DOCTYPE html>
<html>
<head>
	<title>SILOKA Laporan PDF </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		{{-- <img src="{{asset('assets/images/West_java_coa.png')}}" alt="LOGO"> --}}
		<h5>
			Daftar Peralatan Standar Laboratorium Pengujian <br>
			Balai Pengujian Dan Sertifikasi Mutu Barang <br>
			Air Minum Dalam Kemasan Cirebon <br>
		</h5>
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> --}}
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Alat</th>
				<th>Merk</th>
				<th>Nomor Seri</th>
				<th>Kapasitas</th>
				<th>Kelas</th>
				<th>Jumlah</th>
				<th>Internal</th>
				<th>Eksternal</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama_alat_ukur}}</td>
				<td>{{$p->merk}}</td>
				<td>{{$p->nomor_seri}}</td>
				<td>{{$p->kapasitas}}</td>
				<td>{{$p->kelas}}</td>
				<td>{{$p->jumlah}}</td>
				<td>{{$p->internal}}</td>
				<td>{{$p->eksternal}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>