<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'koneksi.php';

$query = "SELECT tbl_detail_transaksi_sparepart.ID_DETAIL_TRANSAKSI_SPAREPART, 
tbl_sparepart.NAMA_SPAREPART as ID_SPAREPART

FROM tbl_sparepart JOIN tbl_detail_transaksi_sparepart 

ON tbl_sparepart.ID_SPAREPART=tbl_detail_transaksi_sparepart.ID_SPAREPART";
$result = mysqli_query($conn, $query);
$response = array();

$server_name = $_SERVER['SERVER_ADDR'];

while( $row = mysqli_fetch_assoc($result) ){

    array_push($response, 
    array(
   		'NAMA_SPAREPART' =>$row['ID_SPAREPART']) 
    );
}

echo json_encode($response);

mysqli_close($conn);

?>
