<?php 
require('../includes/connect.php');
require('../codes/fetchuserdetails.php');


$strOut = '';

if (isset($_POST['param'])) {
	$sql = "SELECT * FROM schedules WHERE sched_snum=?";
	$data = array($snum);
	$stmt = $con->prepare($sql);
	$stmt->execute($data);

	foreach ($stmt as $row) {
		$strOut.= '<tr>';
		$strOut.= '<td class="text-gray-900">'.$row['sched_subj'].'</td>';
		$strOut.= '<td class="text-gray-900">'.$row['sched_day'].'</td>';
		$strOut.= '<td class="text-gray-900" width=25%>'.$row['sched_time'].'</td>';
		$strOut.= '<td class="text-gray-900">'.$row['sched_prof'].'</td>';
		$strOut.= '<td width=18%>
						<button class="btn btn-warning" onClick="loadRecord('.$row['schedId'].')" title="Edit"><i class="fas fa-edit"></i></button>
						<button class="btn btn-danger" onClick="deleteRecord('.$row['schedId'].')" title="Delete"><i class="fas fa-trash"></i></button>
					</td>';
		$strOut.= '</tr>';
	}
	echo $strOut;
}

if (isset($_POST['upsert'])) {
	$subj = htmlspecialchars(trim($_POST['subj']));
	$days = htmlspecialchars(trim($_POST['days']));
	$time = htmlspecialchars(trim($_POST['time']));
	$prof = htmlspecialchars(trim($_POST['prof']));
	$studnum = $snum;
	$data = explode('^', $_POST['Data']);
	
	if ($data[4] == '') {
		$sql = "INSERT INTO schedules (sched_snum, sched_subj, sched_day, sched_time, sched_prof) VALUES (?,?,?,?,?)";
		$data = array($studnum, $data[0], $data[1], $data[2], $data[3]);
	} else {
		$sql = "UPDATE schedules SET sched_subj=?, sched_day=?, sched_time=?, sched_prof=? WHERE schedId=?";	
	}
	$stmt = $con->prepare($sql);
	$stmt->execute($data);
}

if (isset($_POST['paramEdit'])) {
	$sql = "SELECT * FROM schedules WHERE schedId=?";
	$stmt = $con->prepare($sql);
	$stmt->execute([$_POST['SchedID']]);
	$row = $stmt->fetch();

	echo json_encode($row);
}

if (isset($_POST['paramDelete'])) {
	$sql = "DELETE FROM schedules WHERE schedId=?";
	$stmt = $con->prepare($sql);
	$stmt->execute([$_POST['SchedID']]);	
}

?>
