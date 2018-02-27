<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Daftar Alumni</title>
	<!-- Tell the browser to be responsive to screen width -->
	<!-- Bootstrap 3.3.6 -->

	<style>
	@page { margin-top: 0px; }
	body {
		font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
		font-weight: 400;
		font-size: 14px;
		line-height: 1.42857143;
	}
	#table-laporan {
		border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;

		margin: 0 auto;
		width: 100%;
		clear: both;
		border-collapse: collapse;
		table-layout: fixed;
		word-wrap:break-word; 


	}
	#table-laporan th {border-width: 1px;padding: 3px;border-style: solid;border-color: black;background-color: #6495ED; text-align: center}
	#table-laporan td {border-width: 1px;padding: 3px;border-style: solid;border-color: black; text-align: center}
	.odd  { background-color:#ffffff; }
	.even { background-color:#dddddd; }
	.text-left {
		text-align: left;
	}
	.text-center {
		text-align: center;
	}

	
</style>
</head>
<body>
		<table width="100%">
			<tr">
				<td class="text-center">
					<img  width="1000" height="100" src="http://localhost/alumni_deri/assets/files/images/KODE PRODI UIR.jpg">
				<!-- </td> -->
			</tr>
		</table>
	<P class="text-center" style="font-weight: bold; font-size: 18">DAFTAR ALUMNI UNIVERSITAS ISLAM RIAU</P>



	<table  id="table-laporan" width="100%" border="1px">
		<thead>
			<tr>
				<th width="3%" class="text-center">No</th>
				<th>NPM</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Fakultas</th>
				<th>Tahun Lulus/Periode</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($data_alumni)): ?>
				<?php echo $data_alumni ?>
			<?php endif ?>

		</tbody>
		<tfoot>

		</tfoot>
	</table>
	<br>
	<hr>
	<table >
		<tr>
			<td colspan="3" style="text-transform: " >Keterangan</td>
		</tr>
		<?php $number = 1; ?>
		<tr>
			<td><?php echo $number++; ?></td>
			<td>Total Alumni</td>
			<td>= &emsp;</td>
			<td><?php echo $total; ?></td>
		</tr>

		<?php if (!empty($kondisi)): ?>

			<?php foreach ($kondisi as $key => $kond): ?>
				<tr>
					<td><?php echo $number++ . ')' ?> &emsp;</td>
					<td><?php echo $kond['nama']?></td>
					<td>= &emsp; </td>
					<td><?php echo html_escape($kond['nilai']) ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	<?php endif ?>


</body>
</html>
