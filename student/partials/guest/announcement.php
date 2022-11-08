<div class="container-fluid">
	<section>
		<div class="content">
			<h1>Announcements</h1>
			<div class="row">
				<div class="owl-carousel owl-theme">
					<?php	
						$sql = "SELECT * FROM vwannouncements ORDER BY a_id DESC";
						$stmt =	$con->query($sql);

						foreach ($stmt as $row) {
							echo '
								<div class="item">
									<div class="time">
										<h2>'.$row['a_day'].' <span>'.$row['a_month'].'</span></h2>
										<h5>'.$row['a_office'].'</h5>
									</div>
									<div class="dept">
										<h5>'.$row['dept'].'</h5>
									</div>
									<div class="details">
										<h3>'.$row['a_title'].'</h3>
										<p>
											'.$row['a_desc'].'	
										</p>
									</div>
								</div>
							';
						}
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- Content Row -->
</div>
