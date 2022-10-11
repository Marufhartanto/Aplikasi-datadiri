<?php
include('./input-config.php');
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$tabledata="";
$data = mysqli_query($mysqli," SELECT * FROM datadiri ");
while($row = mysqli_fetch_array($data)){
       $tabledata .= "
       <tr>
           <td>".$no."</td>
           <td>".$row["nis"]."</td>
           <td>".$row["nama_lengkap"]."</td>
           <td>".$row["tanggal_lahir"]."</td>
           <td>".$row["nilai"]."</td>
       <tr>
       ";
       $no++;
}

$table = "
<h1>Laporan Data Diri Kelas</h1>
<h6>Waktu Cetak </h6>
<table cellpadding=5 border=1 cellspacing=0 width='100%'>
<tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama Lengkap</th>
    <th>Tanggal Lahir</th>
    <th>Nilai</th>
</tr>
<tr><
$tabledata
</table>";

$mpdf->WriteHTML("$table");
$mpdf->Output();







?>