<div class="card">
	<div class="card-header bg-primary text-white">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#" class="text-white">Master</a></li>
						<li class="breadcrumb-item active  text-white" aria-current="page"><b>Admin</b></li>
					</ol>
				</nav>
				<h4 class="text-white">Admin</h4></div>
			<div class="col-md-6" align="right">
				<div class="btn-group">
				<a class="btn btn-lg text-white" id="tAdmin" onclick="callfAdmin()"><i class="fas fa-plus-circle"></i></a>
			</div>
			</div>
		</div>
	</div>
	<div class="card-body mt-2">
			<div id="fAdmin"  style="display: none;">
				<form method="post" id="formAdmin">
				<div class="row justify-content-center">
					<div class="form-group col-md-4">
						<label>Nama Admin</label>
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Admin" required>
					</div>
					<div class="form-group col-md-4">
						<label>Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group col-md-4">
						<label>No.HP</label>
						<input type="text" name="hp" id="hp" class="form-control" placeholder="No.HP">
					</div>
					<div class="form-group col-md-2">
						<br>
						<button class="btn btn-success btn-block" id="simpanAdmin"><i class="fas fa-save"></i> Simpan</button>
					</div>
				</div>
				<hr>
				</form>
			</div>

			<div id="cAdmin">
				<form method="post"  class="form-inline" id="formcAdmin">
					<div class="input-group">
					<input type="search" name="cari" id="cari" class="form-control" placeholder="Cari Admin">
						<div class="input-group-append">
							<button class="btn btn-success" id="cariAdmin"><i class="fas fa-search"></i></button>
						</div>
					</div>
					<hr>
				</form>
			</div>

			<?php 
			if(isset($_GET['edit']))
			{
				$id=$_GET['id'];
				$gd=mysqli_query($kon,"select * from admin where id='$id'");
				$d=mysqli_fetch_array($gd);
				?>	
				<div id="feditAdmin">
					<form method="post"  class="row" id="formeditAdmin">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<div class="form-group col-md-4">
								<label>Nama Admin</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Admin" required value="<?php echo $d['nama'];?>">
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
								<button class="btn btn-success btn-block" id="updAdmin"><i class="fas fa-save"></i> Update</button>
							</div>
							<hr>
					</form>
				</div>
				<?php 
			}
			?>

			<div id="Admindata" class="table-responsive" onload="loadData()"></div>
		</div>
	</div>
</div>
<script src="assets/js/jquery1-12.min.js"></script>
<script>
function callfAdmin() {
  var x = document.getElementById("fAdmin");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script type="text/javascript">
function loadData(Admin,cari) {
            $.ajax({
                url: 'admin.data.php',
                type: 'get',
                data:{Admin:Admin},
                success: function(data) {
                    $('#Admindata').html(data);
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
                        $("#Admindata").show();
                        var x = $(this).val();
                        $.ajax(
                            {
                                type:'GET',
                                url:'admin.data.php',
                                data: 'cari='+x,
                                success:function(data)
                                {
                                    $("#Admindata").html(data);
                                }
                                ,
                            });
                    });
                });


            </script>


<script type="text/javascript">
	$(document).ready(function(){
		$("#simpanAdmin").click(function(){
			var data= $("#formAdmin").serialize();
			$.ajax({
				url:'admin.aksi?a=save',
				type:'post',
				data:data,
				success:function(data){
					alert(data);
					window.location='master?hal=admin';
				},error:function(response){
					console.log(data);
				}
			})
		})
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#updAdmin").click(function(){
			var data= $("#formeditAdmin").serialize();
			$.ajax({
				url:'admin.aksi?a=edit',
				type:'post',
				data:data,
				success:function(data){
					alert(data);
					window.location='master?hal=admin';
				},error:function(response){
					console.log(response.responseText);
				}
			})
		})
	})
</script>