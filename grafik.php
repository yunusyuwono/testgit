<div class="card">
	<div class="card-header bg-primary text-white">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#" class="text-white">Master</a></li>
						<li class="breadcrumb-item active  text-white" aria-current="page"><b>Grafik</b></li>
					</ol>
				</nav>
				<h4 class="text-white">Grafik</h4></div>
		</div>
	</div>
	<div class="card-body mt-2">
		<form method="post">
			<div class="form-group">
				<label></label>
				<select class="form-control" name="website">
					<?php 
					$web=mysqli_query($kon,"select * from website order by nama asc");
					while($w=mysqli_fetch_array($web))
					{
						?>
						<option value="<?php echo $w['url'];?>"><?php echo $w['nama'];?></option>
						<?php
					}
					?>
				</select>
				<button class="btn btn-success btn-sm" name="submit">Submit</button>
			</div>
		</form>

		<?php 
		if(isset($_POST['submit']))
		{
			$urlu=$_POST['website'];
			?>
			<canvas id="myChart" style="height:500"></canvas>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"></script>
			<?php
			$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
 
			for($bulan = 1;$bulan < 13;$bulan++)
			{
				$query = mysqli_query($kon,"select sum(view) as jumlahview from monev where MONTH(entri)='$bulan' and urlutama like '%$urlu%'");
				$row = mysqli_fetch_array($query);
				$jumlah_view[] = $row['jumlahview'];
			}
			?>
			<script>
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: <?php echo json_encode($label); ?>,
					datasets: [{
						label: 'Jumlah View',
						data: <?php echo json_encode($jumlah_view); ?>,
						borderWidth: 1,
						backgroundColor: ['rgb(0, 99, 212)'],
	                    borderColor: ['rgb(0, 99, 212)'],
						}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
			</script>
		<?php
		}
		?>
	</div>

</div>