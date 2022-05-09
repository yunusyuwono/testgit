<?php 
include 'koneksi.php';
if(isset($_GET['cari']))
{
	$cari=addslashes($_GET['cari']);
}
?>
<div id="wadahadmin">
<table id="admin" class="table table-responsive table-striped table-bordered" style="width: 100%;">
<thead class="bg-light">
	<th>No.</th>
	<th>Kode</th>
	<th>Nama</th>
	<th>No.HP</th>
	<th>Email</th>
	<th>Aksi</th>
</thead>
<?php 
$no=1;


if(!isset($_GET['cari']))
{
	$tadmin=mysqli_query($kon,"select * from admin order by id asc");
	if(mysqli_num_rows($tadmin)==0)
	{
		echo "<td colspan='6'>Data admin belum tersedia</td>";
	}
}
else
{
	$tadmin=mysqli_query($kon,"select * from admin where nama like '%$cari%' or hp like '%$cari%' or email like '%$cari%' order by id desc");
	if(mysqli_num_rows($tadmin)==0)
	{
		echo "<td colspan='6'>Data admin yang anda cari tidak ditemukan</td>";
	}
}


	while($t=mysqli_fetch_array($tadmin))
	{
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $t['kode'];?></td>
			<td><?php echo $t['nama'];?></td>
			<td><?php echo $t['hp'];?></td>
			<td><?php echo $t['email'];?></td>
			<td>
				<a class="btn btn-sm btn-warning" href="?hal=admin&edit&id=<?php echo $t['id'];?>"><i class="fas fa-edit"></i></a>
				<a class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data ini?')" href="admin.aksi?a=del&id=<?php echo $t['id'];?>"><i class="fas fa-trash"></i></a>
			</td>
		</tr>
		<?php
		$no++;
	}
?>

</table>
</div>