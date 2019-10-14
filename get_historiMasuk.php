<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'koneksi.php';

$query = "SELECT tbl_sparepart.NAMA_SPAREPART, 
tbl_detail_pembelian_sparepart.JUMLAH 

FROM tbl_sparepart, tbl_detail_pembelian_sparepart 
WHERE tbl_sparepart.ID_SPAREPART = tbl_detail_pembelian_sparepart.ID_DETAIL_PEMBELIAN";
$result = mysqli_query($conn, $query);
$response = array();

$server_name = $_SERVER['SERVER_ADDR'];

while( $row = mysqli_fetch_assoc($result) ){

    array_push($response, 
    array(
   		'NAMA_SPAREPART' =>$row['NAMA_SPAREPART'],
        'JUMLAH'   		=>$row['JUMLAH']) 
    );
}

echo json_encode($response);

mysqli_close($conn);

?>
