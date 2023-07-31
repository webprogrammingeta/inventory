<?php 
include ('fetch.php');
class API {
	function Select(){
		$db = new Connect;
		$users = array();
		$data = $db->prepare('SELECT * FROM tbl_user ORDER BY id');
		$data->execute();
		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$users[$OutputData['id']] = array(
				'id' => $OutputData['id'],
				'nama_lengkap' => $OutputData['nama_lengkap'],
				'kd_user' => $OutputData['kd_user'],
				'password' => $OutputData['password'],
				'email' => $OutputData['email'],
				'tempat_lahir' => $OutputData['tempat_lahir'],
				'tanggal_lahir' => $OutputData['tanggal_lahir'],
				'no_telp' => $OutputData['no_telp'],
				'alamat' => $OutputData['alamat'],
				'level' => $OutputData['level'],
				'foto' => $OutputData['foto']
			);
		}
	return json_encode($users);
	}
}
$API = new API;
header('Content-Type: application/json');
echo $API->Select();

?>
