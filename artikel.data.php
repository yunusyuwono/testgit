<?php 
include 'koneksi.php';
if(isset($_GET['cari']))
{
	$cari=addslashes($_GET['cari']);
}
?>
<div id="wadahartikel" class="table-responsive">
<table id="artikel" class="table  table-striped table-bordered" style="width: 100%;">
<thead class="bg-light">
	<th>No.</th>
	<th>Kode Artikel</th>
	<th>URL Utama</th>
	<th>Judul</th>
	<th>URL Artikel</th>
	<th>Ringkasan</th>
	<th>Tanggal Publish</th>
	<th>Screenshot Preview</th>
	<th>Screenshot Upload</th>
	<th>Jumlah Kunjungan</th>
	<th>Entri</th>
	<th>Aksi</th>
</thead>
<?php 
$no=1;


if(!isset($_GET['cari']))
{
	$tartikel=mysqli_query($kon,"select * from monev order by id asc");
	if(mysqli_num_rows($tartikel)==0)
	{
		echo "<td colspan='12'>Data artikel belum tersedia</td>";
	}
}
else
{
	$tartikel=mysqli_query($kon,"select * from monev where kode like '%$cari%' or urlutama like '%$cari%' or judul like '%$cari%' or url like '%$cari%' or isi like '%$cari%' or tgl_buat like '%$cari%' or view like '%$cari%' order by id desc");
	if(mysqli_num_rows($tartikel)==0)
	{
		echo "<td colspan='12'>Data artikel yang anda cari tidak ditemukan</td>";
	}
}


	while($t=mysqli_fetch_array($tartikel))
	{
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $t['kode'];?></td>
			<td><?php echo $t['urlutama'];?></td>
			<td><?php echo $t['judul'];?></td>
			<td><?php echo $t['url'];?></td>
			<td><?php echo $t['isi'];?></td>
			<td><?php echo $t['tgl_buat'];?></td>
			<td>
				<?php 
				if(!empty($t['sspreview']))
				{
					?>
				
				<a target="_blank" href="ssweb/<?php echo $t['sspreview'];?>" class="btn btn-primary btn-sm"><i class="fas fa-link"></i></a>
				<?php 
			}
			?>
		</td>
			<td>
			<?php 
			if(!empty($t['ssupload']))
			{
				?>
				<a target="_blank" href="ssweb/<?php echo $t['ssupload'];?>" class="btn btn-primary btn-sm"><i class="fas fa-link"></i></a>
				<?php 
			}
			?>
			</td>
			<td><?php echo $t['view'];?></td>
			<td><?php echo $t['entri'];?></td>
			<td>
				<a class="btn btn-sm btn-warning" href="?hal=artikel&edit&id=<?php echo $t['id'];?>"><i class="fas fa-edit"></i></a>
				<a class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data ini?')" href="artikel.aksi?a=del&id=<?php echo $t['id'];?>"><i class="fas fa-trash"></i></a>
			</td>
		</tr>
		<?php
		$no++;
	}
?>

</table>
</div>