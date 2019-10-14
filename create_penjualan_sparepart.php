<?php 

require_once 'koneksi.php';


$key = isset($_POST['key']) ? $_POST['key'] : 'empty';
$id_konsumen = isset($_POST['ID_KONSUMEN']) ? $_POST['ID_KONSUMEN'] : 'empty';
$id_cabang = isset($_POST['ID_CABANG']) ? $_POST['ID_CABANG'] : 'empty';
//$no_transaksi = isset($_POST['NO_TRANSAKSI']) ? $_POST['NO_TRANSAKSI'] : 'empty';
//$tanggal_transaksi = isset($_POST['TANGGAL_TRANSAKSI']) ? $_POST['TANGGAL_TRANSAKSI'] : 'empty';
$diskon = isset($_POST['DISKON']) ? $_POST['DISKON'] : 'empty';
//$total_transaksi = isset($_POST['TOTAL_TRANSAKSI']) ? $_POST['TOTAL_TRANSAKSI'] : 'empty';
//$status_pembayaran = isset($_POST['STATUS_PEMBAYARAN']) ? $_POST['STATUS_PEMBAYARAN'] : 'empty';
$jenis_penjualan = isset($_POST['JENIS_PENJUALAN']) ? $_POST['JENIS_PENJUALAN'] : 'empty';

$tanggal_transaksi = date('Y-m-d H:i:s');
$date=date_create($tanggal_transaksi);
$date1 =date_format($date,"dmY");
$tahun =substr($date1, 6);
$tglbln = substr($date1, 0,4);
//$no_transaksi='SP-'.$tglbln.$tahun.'-';

if ( $key == "insert" )
{
    if($jenis_penjualan == "Sparepart")
    {
	    $no_transaksi='SP-'.$tglbln.$tahun.'-';
	    $cek1=mysqli_query($conn,"select NO_TRANSAKSI as pid from tbl_transaksi_pembayaran WHERE
	             TANGGAL_TRANSAKSI = (SELECT max(TANGGAL_TRANSAKSI) from tbl_transaksi_pembayaran);");
	    
	    $result=mysqli_fetch_assoc($cek1);

	    $a=$result['pid'];
	    $b=substr($a, 10);
	    $urutan=$b+1;
		$no_transaksi1=$no_transaksi.$urutan;
		//$tanggal_transaksi_newformat = date('Y-m-d', strtotime($tanggal_transaksi));

		$query = "INSERT INTO `tbl_transaksi_pembayaran` (ID_KONSUMEN,ID_CABANG,NO_TRANSAKSI,TANGGAL_TRANSAKSI,DISKON,TOTAL_TRANSAKSI,STATUS_PEMBAYARAN,TOTAL_DISKON, BAYAR, KEMBALIAN) VALUES('$id_konsumen', '$id_cabang', '$no_transaksi1', '$tanggal_transaksi', '$diskon', '0', 'Diproses','','','')";

		if ( mysqli_query($conn, $query) )
	    {
	        $result["value"] = "1";
	        $result["message"] = "Data penjualan berhasil dibuat";
	    
	        echo json_encode($result);
	        mysqli_close($conn);

	    }
	    else 
	    {
	            $response["value"] = "0";
	            $response["message"] = "Error! ".mysqli_error($conn);
	            echo json_encode($response);

	            mysqli_close($conn);
	    }
	}
	else if($jenis_penjualan == "Jasa Service")
	{
		$no_transaksi='SV-'.$tglbln.$tahun.'-';
	    $cek1=mysqli_query($conn,"select NO_TRANSAKSI as pid from tbl_transaksi_pembayaran WHERE
	             TANGGAL_TRANSAKSI = (SELECT max(TANGGAL_TRANSAKSI) from tbl_transaksi_pembayaran);");
	    
	    $result=mysqli_fetch_assoc($cek1);

	    $a=$result['pid'];
	    $b=substr($a, 10);
	    $urutan=$b+1;
		$no_transaksi1=$no_transaksi.$urutan;
		//$tanggal_transaksi_newformat = date('Y-m-d', strtotime($tanggal_transaksi));

		$query = "INSERT INTO `tbl_transaksi_pembayaran` (ID_KONSUMEN,ID_CABANG,NO_TRANSAKSI,TANGGAL_TRANSAKSI,DISKON,TOTAL_TRANSAKSI,STATUS_PEMBAYARAN,TOTAL_DISKON, BAYAR, KEMBALIAN) VALUES('$id_konsumen', '$id_cabang', '$no_transaksi1', '$tanggal_transaksi', '$diskon', '0', 'Diproses','','','')";

		if ( mysqli_query($conn, $query) )
	    {
	        $result["value"] = "1";
	        $result["message"] = "Data penjualan berhasil dibuat";
	    
	        echo json_encode($result);
	        mysqli_close($conn);

	    }
	    else 
	    {
	            $response["value"] = "0";
	            $response["message"] = "Error! ".mysqli_error($conn);
	            echo json_encode($response);

	            mysqli_close($conn);
	    }
	}
	else if($jenis_penjualan == "Jasa Service dan Sparepart")
	{
		$no_transaksi='SS-'.$tglbln.$tahun.'-';
	    $cek1=mysqli_query($conn,"select NO_TRANSAKSI as pid from tbl_transaksi_pembayaran WHERE
	             TANGGAL_TRANSAKSI = (SELECT max(TANGGAL_TRANSAKSI) from tbl_transaksi_pembayaran);");
	    
	    $result=mysqli_fetch_assoc($cek1);

	    $a=$result['pid'];
	    $b=substr($a, 10);
	    $urutan=$b+1;
		$no_transaksi1=$no_transaksi.$urutan;
		//$tanggal_transaksi_newformat = date('Y-m-d', strtotime($tanggal_transaksi));

		$query = "INSERT INTO `tbl_transaksi_pembayaran` (ID_KONSUMEN,ID_CABANG,NO_TRANSAKSI,TANGGAL_TRANSAKSI,DISKON,TOTAL_TRANSAKSI,STATUS_PEMBAYARAN,TOTAL_DISKON, BAYAR, KEMBALIAN) VALUES('$id_konsumen', '$id_cabang', '$no_transaksi1', '$tanggal_transaksi', '$diskon', '0', 'Diproses','','','')";

		if ( mysqli_query($conn, $query) )
	    {
	        $result["value"] = "1";
	        $result["message"] = "Data penjualan berhasil dibuat";
	    
	        echo json_encode($result);
	        mysqli_close($conn);

	    }
	    else 
	    {
	            $response["value"] = "0";
	            $response["message"] = "Error! ".mysqli_error($conn);
	            echo json_encode($response);

	            mysqli_close($conn);
	    }
	}
}

?>