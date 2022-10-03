<?php 
	require('../includes/connect.php');

	if (isset($_POST['studName2'])) {
		$studName2 = htmlspecialchars(trim($_POST['studName2']));	
		$studType2 = $_POST['studType2'];
		$email2 = htmlspecialchars(trim($_POST['email2']));	
		$one = 1;
		$two = 2;
		$three = 3;
		$four = 4;

		if (isset($_FILES['tor'])) {
			$img_name = $_FILES['tor']['name'];
			$tmp_name = $_FILES['tor']['tmp_name'];
			$error = $_FILES['tor']['error'];

			if ($error == 0) {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);
				$img_new_name = $one.'_'.$studName2.'_'.$email2.'.'.$img_ex_lc;

				$img_upload_path = '../uploads/guest/requirements/transferee/'.$img_new_name;
				move_uploaded_file($tmp_name, $img_upload_path);
			}
		}

		if (isset($_FILES['honorDismiss'])) {
			$img_name2 = $_FILES['honorDismiss']['name'];
			$tmp_name2 = $_FILES['honorDismiss']['tmp_name'];
			$error2 = $_FILES['honorDismiss']['error'];

			if ($error2 == 0) {
				$img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
				$img_ex_lc2 = strtolower($img_ex2);
				$img_new_name2 = $two.'_'.$studName2.'_'.$email2.'.'.$img_ex_lc2;

				$img_upload_path2 = '../uploads/guest/requirements/transferee/'.$img_new_name2;
				move_uploaded_file($tmp_name2, $img_upload_path2);
			}
		}

		if (isset($_FILES['gmc2'])) {
			$img_name3 = $_FILES['gmc2']['name'];
			$tmp_name3 = $_FILES['gmc2']['tmp_name'];
			$error3 = $_FILES['gmc2']['error'];

			if ($error3 == 0) {
				$img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
				$img_ex_lc3 = strtolower($img_ex3);
				$img_new_name3 = $three.'_'.$studName2.'_'.$email2.'.'.$img_ex_lc3;

				$img_upload_path3 = '../uploads/guest/requirements/transferee/'.$img_new_name3;
				move_uploaded_file($tmp_name3, $img_upload_path3);
			}
		}

		if (isset($_FILES['psa2'])) {
			$img_name4 = $_FILES['psa2']['name'];
			$tmp_name4 = $_FILES['psa2']['tmp_name'];
			$error4 = $_FILES['psa2']['error'];

			if ($error4 == 0) {
				$img_ex4 = pathinfo($img_name4, PATHINFO_EXTENSION);
				$img_ex_lc4 = strtolower($img_ex4);
				$img_new_name4 = $four.'_'.$studName2.'_'.$email2.'.'.$img_ex_lc4;

				$img_upload_path4 = '../uploads/guest/requirements/transferee/'.$img_new_name4;
				move_uploaded_file($tmp_name4, $img_upload_path4);
			}
		}

		if (isset($img_new_name) && isset($img_new_name2) && isset($img_new_name3) && isset($img_new_name4)) {
			$sql = "INSERT INTO guest_requirements (guest_studName, guest_studType, guest_email, guest_form138, guest_form137a, guest_gmc, guest_psa) VALUES (?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->execute([$studName2, $studType2, $email2, $img_new_name, $img_new_name2, $img_new_name3, $img_new_name4]);
		}
	}
?>
