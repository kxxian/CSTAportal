<?php
	try {
		$sql = "SELECT * FROM departments";	
		$stmt = $con->query($sql);
		$stmt->execute();
		$row = $stmt->fetch();

		$dip = $row['deptid'];
		$dept = $row['dept'];
		$email = $row['dept_email'];
		
	} catch (PDOException $e) {
		$e->getMessage();
	}
?>
