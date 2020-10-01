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
		<h5>
			Data Early Warning System Laboratorium Pengujian<br>
		</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Alat</th>
				<th>Tanggal Kalibrasi</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama_alat}}</td>
				<td>{{$p->tanggal_kalibrasi}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>