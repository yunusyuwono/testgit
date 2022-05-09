<?php
include 'koneksi.php';

$a=$_GET['a'];
switch ($a) {
	case 'save':
		$nama=addslashes($_POST['nama']);
		$url	 =addslashes($_POST['url']);
		$sinsql="insert into website (nama,url) values ('$nama','$url')";
		$exesql=mysqli_query($kon,$sinsql);
		if($exesql)
		{
			echo "Berhasil";
		}
		else
		{
			echo "Gagal";
		}
		break;

	case 'edit':
		$nama=addslashes($_POST['nama']);
		$url	 =addslashes($_POST['url']);
		$id=$_POST['id'];
		$sinsql="update website set nama='$nama',url='$url',email='$email', pw='$pw' where id='$id'";
		$exesql=mysqli_query($kon,$sinsql);
		if($exesql)
		{
			echo "Berhasil";
		}
		else
		{
			echo "Gagal";
		}
		break;

	case 'admin':
		$id=addslashes($_POST['id']);
		$admin=addslashes($_POST['admin']);
		$sinsql="update website set admin='$admin' where id='$id'";
		$exesql=mysqli_query($kon,$sinsql);
		if($exesql)
		{
			echo "Berhasil";
		}
		else
		{
			echo "Gagal";
		}
		break;

	case 'del':
		$id=$_GET['id'];
		$sinsql="delete from website where id='$id'";
		$exesql=mysqli_query($kon,$sinsql);
		if($exesql)
		{
			?>
			<script>alert("Berhasil");window.location='master?hal=website'</script>
			<?php
		}
		else
		{
			?>
			<script>alert("Gagal");window.location='master?hal=website'</script>
			<?php
		}
		break;		
	
	default:
		// code...
		break;
}
?>