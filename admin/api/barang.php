<?php 
include ('fetch.php');
class API {
	function Select(){
		$db = new Connect;
		$users = array();
		$data = $db->prepare('SELECT * FROM tbl_barang ORDER BY id');
		$data->execute();
		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$users[$OutputData['id']] = array(
				'id' => $OutputData['id'],
				'Nama barang' => $OutputData['nama_barang'],
				'Merk' => $OutputData['keterangan'],
			);
		}
	return json_encode($users);
	}
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();

?>
