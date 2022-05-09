<div class="card">
	<div class="card-header bg-primary text-white">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#" class="text-white">Master</a></li>
						<li class="breadcrumb-item active  text-white" aria-current="page"><b>Artikel</b></li>
					</ol>
				</nav>
				<h4 class="text-white">Artikel</h4></div>
			<div class="col-md-6" align="right">
				<div class="btn-group">
				<a class="btn btn-lg text-white" id="tartikel" onclick="callfartikel()"><i class="fas fa-plus-circle"></i></a>
			</div>
			</div>
		</div>
	</div>
	<div class="card-body mt-2">
			<div id="fartikel"  style="display: none;">
				<form method="post" id="formartikel" enctype="multipart/form-data" action="artikel.aksi?a=save">
				<div class="row">
					<div class="form-group col-md-4">
						<label>Judul</label>
						<input type="text" name="judul" id="judul" class="form-control" placeholder="Judul artikel" required>
					</div>
					<div class="form-group col-md-8">
						<label>URL Artikel</label>
						<input type="url" name="url" id="url" class="form-control" placeholder="URL Artikel" required>
					</div>
					<div class="form-group col-md-12">
						<label>Ringkasan Artikel</label>
						<textarea class="form-control" name="isi" required></textarea>
					</div>
					<div class="form-group col-md-4">
						<label>Tanggal Publish</label>
						<input type="date" name="tgl_buat" id="tgl_buat" class="form-control" required>
					</div>
					<div class="form-group col-md-4">
						<label>Screenshot Preview</label>
						<input type="file" name="sspreview" id="sspreview" class="form-control" accept="image/*" required>
					</div>
					<div class="form-group col-md-4">
						<label>Screenshot Upload</label>
						<input type="file" name="ssupload" id="ssupload" class="form-control" accept="image/*" required>
					</div>
					<div class="form-group col-md-4">
						<label>Jumlah Kunjungan <small>Per <?php echo date('d M Y');?></small></label>
						<input type="number" name="view" id="view" class="form-control" required>
					</div>

					<div class="form-group col-md-2">
						<br>
						<button class="btn btn-success btn-block" id="simpanartikel"><i class="fas fa-save"></i> Simpan</button>
					</div>
				</div>
				<hr>
				</form>
			</div>

			<div id="cartikel">
				<form method="post"  class="form-inline" id="formcartikel">
					<div class="input-group">
					<input type="search" name="cari" id="cari" class="form-control" placeholder="Cari artikel">
						<div class="input-group-append">
							<button class="btn btn-success" id="cariartikel"><i class="fas fa-search"></i></button>
						</div>
					</div>
					<hr>
				</form>
			</div>

			<?php 
			if(isset($_GET['edit']))
			{
				$id=$_GET['id'];
				$gd=mysqli_query($kon,"select * from artikel where id='$id'");
				$d=mysqli_fetch_array($gd);
				?>	
				<div id="feditartikel">
					<form method="post"  class="row" id="formeditartikel">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<div class="form-group col-md-4">
								<label>Nama artikel</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama artikel" required value="<?php echo $d['nama'];?>">
							</div>
							<div class="form-group col-md-4">
								<label>Email</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $d['email'];?>">
							</div>
							<div class="form-group col-md-4">
								<label>No.HP</label>
								<input type="text" name="hp" id="hp" class="form-control" placeholder="No.HP" value="<?php echo $d['hp'];?>">
							</div>
							<div class="form-group col-md-4">
								<label>Password</label>
								<input type="password" name="pw" id="pw" class="form-control" placeholder="Password" value="<?php echo $d['pw'];?>">
							</div>
							<div class="form-group col-md-2">
								<br>
								<button class="btn btn-success btn-block" id="updartikel"><i class="fas fa-save"></i> Update</button>
							</div>
							<hr>
					</form>
				</div>
				<?php 
			}
			?>

			<div id="artikeldata" class="table-responsive" onload="loadData()"></div>
		</div>
	</div>
</div>
<script src="assets/js/jquery1-12.min.js"></script>
<script>
function callfartikel() {
  var x = document.getElementById("fartikel");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script type="text/javascript">
function loadData(artikel,cari) {
            $.ajax({
                url: 'artikel.data.php',
                type: 'get',
                data:{artikel:artikel},
                success: function(data) {
                    $('#artikeldata').html(data);
                }
            });
        }
        
  $(document).ready(function() {
		loadData();
	})
  </script>

   <script>
                $(document).ready(function(e)
                {
                    $("#cari").keyup(function()
                    {
                        $("#artikeldata").show();
                        var x = $(this).val();
                        $.ajax(
                            {
                                type:'GET',
                                url:'artikel.data.php',
                                data: 'cari='+x,
                                success:function(data)
                                {
                                    $("#artikeldata").html(data);
                                }
                                ,
                            });
                    });
                });


            </script>


<script type="text/javascript">
/*	$(document).ready(function(){
		$("#simpanartikel").click(function(){
			var data= $("#formartikel").serialize();
			$.ajax({
				url:'artikel.aksi?a=save',
				type:'post',
				enctype:'multipart/form-data',
				data:data,
				success:function(data){
					alert(data);
					window.location='master?hal=artikel';
				},error:function(response){
					console.log(data);
				}
			})
		})
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#updartikel").click(function(){
			var data= $("#formeditartikel").serialize();
			$.ajax({
				url:'artikel.aksi?a=edit',
				type:'post',
				data:data,
				success:function(data){
					alert(data);
					window.location='master?hal=artikel';
				},error:function(response){
					console.log(response.responseText);
				}
			})
		})
	})
</script>