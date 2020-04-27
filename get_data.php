<?php
include('koneksi.php');
$connection = openConn();

$student_name = '%'.htmlspecialchars($_POST['nama_siswa']).'%';
$nama = $_POST['nama_siswa'];
$query = "SELECT * FROM `tbl_siswa` WHERE `nama_siswa` LIKE '%$nama%' ORDER BY `nama_siswa` ASC";

$response = array();
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}
header('json app');
echo json_encode($response);
?>