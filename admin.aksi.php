<?php 
include 'koneksi.php';

$a=$_GET['a'];
switch ($a) {
	case 'save':
		$nama=addslashes($_POST['nama']);
		$hp	 =addslashes($_POST['hp']);
		$email=addslashes($_POST['email']);		
		$jmld=mysqli_num_rows(mysqli_query($kon,"select * from admin"));
		$kode="AWP".sprintf('%03s',($jmld+1));
		$pw=$hp;
		$sinsql="insert into admin (kode,nama,hp,email,pw) values ('$kode','$nama','$hp','$email','$pw')";
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
		$hp	 =addslashes($_POST['hp']);
		$email=addslashes($_POST['email']);
		$pw=addslashes($_POST['pw']);		
		$id=$_POST['id'];
		$sinsql="update admin set nama='$nama',hp='$hp',email='$email', pw='$pw' where id='$id'";
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
		$sinsql="delete from admin where id='$id'";
		$exesql=mysqli_query($kon,$sinsql);
		if($exesql)
		{
			?>
			<script>alert("Berhasil");window.location='master?hal=admin'</script>
			<?php
		}
		else
		{
			?>
			<script>alert("Gagal");window.location='master?hal=admin'</script>
			<?php
		}
		break;		
	
	default:
		// code...
		break;
}
?>