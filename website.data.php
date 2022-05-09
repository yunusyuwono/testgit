<?php 
include 'koneksi.php';
if(isset($_GET['cari']))
{
	$cari=addslashes($_GET['cari']);
}
?>
<div id="wadahwebsite">
<table id="website" class="table table-responsive table-striped table-bordered" style="width: 100%;">
<thead class="bg-light">
	<th>No.</th>
	<th>Nama</th>
	<th>URL</th>
	<th>Admin</th>
	<th>Aksi</th>
</thead>
<?php 
$no=1;


if(!isset($_GET['cari']))
{
	$twebsite=mysqli_query($kon,"select * from website order by nama asc");
	if(mysqli_num_rows($twebsite)==0)
	{
		echo "<td colspan='4'>Data website belum tersedia</td>";
	}
}
else
{
	$twebsite=mysqli_query($kon,"select * from website where nama like '%$cari%' or url like '%$cari%'  order by id desc");
	if(mysqli_num_rows($twebsite)==0)
	{
		echo "<td colspan='4'>Data website yang anda cari tidak ditemukan</td>";
	}
}


	while($t=mysqli_fetch_array($twebsite))
	{
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $t['nama'];?></td>
			<td><a href="<?php echo $t['url'];?>" class="btn btn-link" target="_blank"><?php echo $t['url'];?></a></td>
			<td><?php
				$a=mysqli_fetch_array(mysqli_query($kon,"select * from admin where id='$t[admin]'"));
			 	echo $a['nama'];?></td>
			<td>
				<a class="btn btn-sm btn-primary" href="?hal=website&admin&id=<?php echo $t['id'];?>"><i class="fas fa-user-secret"></i></a>
				<a class="btn btn-sm btn-warning" href="?hal=website&edit&id=<?php echo $t['id'];?>"><i class="fas fa-edit"></i></a>
				<a class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data ini?')" href="website.aksi?a=del&id=<?php echo $t['id'];?>"><i class="fas fa-trash"></i></a>
			</td>
		</tr>
		<?php
		$no++;
	}
?>

</table>
</div>