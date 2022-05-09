<div class="card">
	<div class="card-header bg-primary text-white">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#" class="text-white">Master</a></li>
						<li class="breadcrumb-item active  text-white" aria-current="page"><b>Website</b></li>
					</ol>
				</nav>
				<h4 class="text-white">Website</h4></div>
			<div class="col-md-6" align="right">
				<div class="btn-group">
				<a class="btn btn-lg text-white" id="twebsite" onclick="callfwebsite()"><i class="fas fa-plus-circle"></i></a>
			</div>
			</div>
		</div>
	</div>
	<div class="card-body mt-2">
			<div id="fwebsite"  style="display: none;">
				<form method="post" id="formwebsite">
				<div class="row justify-content-center">
					<div class="form-group col-md-4">
						<label>Nama website</label>
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama website" required>
					</div>
					<div class="form-group col-md-4">
						<label>URL Website</label>
						<input type="url" name="url" id="url" class="form-control" placeholder="URL Website">
					</div>
					<div class="form-group col-md-2">
						<br>
						<button class="btn btn-success btn-block" id="simpanwebsite"><i class="fas fa-save"></i> Simpan</button>
					</div>
				</div>
				<hr>
				</form>
			</div>

			<div id="cwebsite">
				<form method="post"  class="form-inline" id="formcwebsite">
					<div class="input-group">
					<input type="search" name="cari" id="cari" class="form-control" placeholder="Cari website">
						<div class="input-group-append">
							<button class="btn btn-success" id="cariwebsite"><i class="fas fa-search"></i></button>
						</div>
					</div>
					<hr>
				</form>
			</div>

			<?php 
			if(isset($_GET['edit']))
			{
				$id=$_GET['id'];
				$gd=mysqli_query($kon,"select * from website where id='$id'");
				$d=mysqli_fetch_array($gd);
				?>	
				<div id="feditwebsite">
					<form method="post"  class="row" id="formeditwebsite">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<div class="form-group col-md-4">
								<label>Nama website</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama website" required value="<?php echo $d['nama'];?>">
							</div>
							<div class="form-group col-md-6">
								<label>URL Website</label>
								<input type="url" name="url" id="url" class="form-control"  value="<?php echo $d['url'];?>">
							</div>
							<div class="form-group col-md-2">
								<br>
								<button class="btn btn-success btn-block" id="updwebsite"><i class="fas fa-save"></i> Update</button>
							</div>
							<hr>
					</form>
				</div>
				<?php 
			}
			elseif(isset($_GET['admin']))
			{
				$id=$_GET['id'];
				$gd=mysqli_query($kon,"select * from website where id='$id'");
				$d=mysqli_fetch_array($gd);
				?>	
				<div id="fadminwebsite">
					<form method="post"  class="row" id="formadminwebsite">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<div class="form-group col-md-4">
								<label>Nama website</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama website" required value="<?php echo $d['nama'];?>">
							</div>
							<div class="form-group col-md-4">
								<label>URL Website</label>
								<input type="url" name="url" id="url" class="form-control"  value="<?php echo $d['url'];?>">
							</div>
							<div class="form-group col-md-4">
								<label>Admin</label>
								<select class="form-control" name="admin">
									<option>Pilih Admin</option>
									<?php 
									$admin=mysqli_query($kon,"select * from admin order by nama asc");
									while($a=mysqli_fetch_array($admin))
									{
										?>
										<option value="<?php echo $a['id'];?>" <?php if($a['id']==$d['admin']){echo "selected";} ?>><?php echo $a['nama'];?></option>
										<?php
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-2">
								<br>
								<button class="btn btn-success btn-block" id="updadminwebsite"><i class="fas fa-save"></i> Simpan</button>
							</div>
							<hr>
					</form>
				</div>
				<?php 
			}
			?>


			<div id="websitedata" class="table-responsive" onload="loadData()"></div>
		</div>
	</div>
</div>
<script src="assets/js/jquery1-12.min.js"></script>
<script>
function callfwebsite() {
  var x = document.getElementById("fwebsite");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script type="text/javascript">
function loadData(website,cari) {
            $.ajax({
                url: 'website.data.php',
                type: 'get',
                data:{website:website},
                success: function(data) {
                    $('#websitedata').html(data);
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
                        $("#websitedata").show();
                        var x = $(this).val();
                        $.ajax(
                            {
                                type:'GET',
                                url:'website.data.php',
                                data: 'cari='+x,
                                success:function(data)
                                {
                                    $("#websitedata").html(data);
                                }
                                ,
                            });
                    });
                });


            </script>


<script type="text/javascript">
	$(document).ready(function(){
		$("#simpanwebsite").click(function(){
			var data= $("#formwebsite").serialize();
			$.ajax({
				url:'website.aksi?a=save',
				type:'post',
				data:data,
				success:function(data){
					alert(data);
					window.location='master?hal=website';
				},error:function(response){
					console.log(data);
				}
			})
		})
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#updwebsite").click(function(){
			var data= $("#formeditwebsite").serialize();
			$.ajax({
				url:'website.aksi?a=edit',
				type:'post',
				data:data,
				success:function(data){
					alert(data);
					window.location='master?hal=website';
				},error:function(response){
					console.log(response.responseText);
				}
			})
		})
	})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#updadminwebsite").click(function(){
			var data= $("#formadminwebsite").serialize();
			$.ajax({
				url:'website.aksi?a=admin',
				type:'post',
				data:data,
				success:function(data){
					alert(data);
					window.location='master?hal=website';
				},error:function(response){
					console.log(response.responseText);
				}
			})
		})
	})
</script>