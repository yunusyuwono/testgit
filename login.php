
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    </head>
<div class="container">
	
<form method="post">
	<center>
		<div class="col-md-4 m-5">
		<h4>SIMAS POLKESLU</h4>
		<p>Sistem Informasi Monitoring Humas<br>Poltekkes Kemenkes Bengkulu<hr></p>
	<div class="form-group">
	<input type="text" name="username" placeholder="Username" autofocus >
	</div>
	<div class="form-group">
    <input type="password" name="password" placeholder="Password">
	</div>
	<button name="cari" class="btn btn-primary" onclick="showloader()">Login
		
	</button>
	</div>

	</center>
</form>
<?php 
if(isset($_POST['cari']))
{
	include "koneksi.php";
	$us=$_POST['username'];
    $pw=$_POST['password'];
	$cekus=mysqli_query($kon,"select * from admin where email='$us' and pw='$pw'");
	if(mysqli_num_rows($cekus)>1)
	{
		session_start();
		$c=mysqli_fetch_array($cekus);
		$_SESSION['us']=$c['email'];
		$_SESSION['nama']=$c['nama'];
		header("location:./");
	}
	else
	{
		echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
		echo mysqli_error($kon);
	}
}
?>
</div>


    