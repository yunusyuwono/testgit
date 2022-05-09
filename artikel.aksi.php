<?php 
include 'koneksi.php';

$a=$_GET['a'];
switch ($a) {
	case 'save':
		$judul=addslashes($_POST['judul']);
		$url=addslashes($_POST['url']);
		$isi=addslashes($_POST['isi']);
		$tgl=addslashes($_POST['tgl_buat']);
		$sspn=$_FILES['sspreview']['name'];
		$sspt=$_FILES['sspreview']['tmp_name'];
		$ssun=$_FILES['ssupload']['name'];
		$ssut=$_FILES['ssupload']['tmp_name'];		
		$view=addslashes($_POST['view']);

		$jmld=mysqli_num_rows(mysqli_query($kon,"select * from monev"));
		$kode="ART"."01".sprintf('%05s',($jmld+1));
		$urlu="poltekkesbengkulu.ac.id";

		$sinsql="insert into monev (kode,urlutama,judul,url,isi,tgl_buat,sspreview,ssupload,view) values ('$kode','$urlu','$judul','$url','$isi','$tgl','$sspn','$ssun','$view')";
		$exesql=mysqli_query($kon,$sinsql);
		if($exesql)
		{
			move_uploaded_file($sspt, "ssweb/".$sspn);
			move_uploaded_file($ssut, "ssweb/".$ssun);
			echo "<script>alert('Berhasil');window.location='monev?hal=artikel'</script>";
		}
		else
		{
			echo "<script>alert('Gagal');window.location='monev?hal=artikel'</script>";
		}
		break;

	case 'edit':
		$nama=addslashes($_POST['nama']);
		$hp	 =addslashes($_POST['hp']);
		$email=addslashes($_POST['email']);
		$pw=addslashes($_POST['pw']);		
		$id=$_POST['id'];
		$sinsql="update monev set nama='$nama',hp='$hp',email='$email', pw='$pw' where id='$id'";
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
		$sinsql="delete from monev where id='$id'";
		$exesql=mysqli_query($kon,$sinsql);
		if($exesql)
		{
			?>
			<script>alert("Berhasil");window.location='master?hal=monev'</script>
			<?php
		}
		else
		{
			?>
			<script>alert("Gagal");window.location='master?hal=monev'</script>
			<?php
		}
		break;		
	
	default:
		// code...
		break;
}
?>