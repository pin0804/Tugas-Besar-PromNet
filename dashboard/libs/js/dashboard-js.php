<?php 
include('../../../koneksi.php')


?>
<script>
		var ctx = document.getElementById("chart-kategori").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Sosial", "Kesehatan", "Kriminal", "Pemerintahan", "Lainnya"],
				datasets: [{
					label: '',
					data: [
					<?php 
						$sql="Call getCountSosial()"; 
				        $select_stmt=$db->prepare($sql);
				        $select_stmt->execute();
				        $count_sosial=$select_stmt->fetch(PDO::FETCH_ASSOC);
				        extract($count_sosial);
				        echo $count_sosial['sosial'];
					?>, 
					<?php 
						$sql="Call getCountKesehatan()"; 
				        $select_stmt=$db->prepare($sql);
				        $select_stmt->execute();
				        $count_kesehatan=$select_stmt->fetch(PDO::FETCH_ASSOC);
				        extract($count_kesehatan);
				        echo $count_kesehatan['kesehatan'];
					?>, 
					<?php 
						$sql="Call getCountKriminal()"; 
				        $select_stmt=$db->prepare($sql);
				        $select_stmt->execute();
				        $count_kriminal=$select_stmt->fetch(PDO::FETCH_ASSOC);
				        extract($count_kriminal);
				        echo $count_kriminal['kriminal'];
					?>, 
					<?php 
						$sql="Call getCountPemerintahan()"; 
				        $select_stmt=$db->prepare($sql);
				        $select_stmt->execute();
				        $count_pemerintahan=$select_stmt->fetch(PDO::FETCH_ASSOC);
				        extract($count_pemerintahan);
				        echo $count_pemerintahan['pemerintahan'];
					?>, 
					<?php 
						$sql="Call getCountLainnya()"; 
				        $select_stmt=$db->prepare($sql);
				        $select_stmt->execute();
				        $countlainnya=$select_stmt->fetch(PDO::FETCH_ASSOC);
				        extract($count_lainnya);
				        echo $count_lainnya['lainnya'];
					?>
					],
					backgroundColor: [
					'#B29DD9',
					'#FDFD98',
					'#FE6B64',
					'#77DD77',
					'#779ECB'
					],
					borderColor: [
					'#B29DD9',
					'#FDFD98',
					'#FE6B64',
					'#77DD77',
					'#779ECB'
					],
					borderWidth: 1
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