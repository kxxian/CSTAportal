<?php 
	require('../includes/connect.php');

	if (isset($_POST['studName'])) {
		$studName = htmlspecialchars(trim($_POST['studName']));
		$studType = $_POST['studType'];
		$email = htmlspecialchars(trim($_POST['email']));
		$one = 1;
		$two = 2;
		$three = 3;
		$four = 4;

		if (isset($_FILES['form138'])) {
			$img_name = $_FILES['form138']['name'];
			$tmp_name = $_FILES['form138']['tmp_name'];
			$error = $_FILES['form138']['error'];

			if ($error == 0) {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);
				$img_new_name = $one.'_'.$studName.'_'.$email.'.'.$img_ex_lc;	

				$img_upload_path = '../uploads/guest/requirements/freshmen/'.$img_new_name;
				move_uploaded_file($tmp_name, $img_upload_path);
			}
		}

		if (isset($_FILES['form137a'])) {
			$img_name2 = $_FILES['form137a']['name'];
			$tmp_name2 = $_FILES['form137a']['tmp_name'];
			$error2 = $_FILES['form137a']['error'];

			if ($error2 == 0) {
				$img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
				$img_ex_lc2 = strtolower($img_ex2);
				$img_new_name2 = $two.'_'.$studName.'_'.$email.'.'.$img_ex_lc2;	

				$img_upload_path2 = '../uploads/guest/requirements/'.$img_new_name2;
				move_uploaded_file($tmp_name2, $img_upload_path2);
			}
		}

		if (isset($_FILES['gmc'])) {
			$img_name3 = $_FILES['gmc']['name'];
			$tmp_name3 = $_FILES['gmc']['tmp_name'];
			$error3 = $_FILES['gmc']['error'];

			if ($error3 == 0) {
				$img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
				$img_ex_lc3 = strtolower($img_ex3);
				$img_new_name3 = $three.'_'.$studName.'_'.$email.'.'.$img_ex_lc3;	

				$img_upload_path3 = '../uploads/guest/requirements/freshmen/'.$img_new_name3;
				move_uploaded_file($tmp_name3, $img_upload_path3);
			}
		}

		if (isset($_FILES['gmc'])) {
			$img_name4 = $_FILES['psa']['name'];
			$tmp_name4 = $_FILES['psa']['tmp_name'];
			$error4 = $_FILES['psa']['error'];

			if ($error4 == 0) {
				$img_ex4 = pathinfo($img_name4, PATHINFO_EXTENSION);
				$img_ex_lc4 = strtolower($img_ex4);
				$img_new_name4 = $four.'_'.$studName.'_'.$email.'.'.$img_ex_lc4;	

				$img_upload_path4 = '../uploads/guest/requirements/freshmen/'.$img_new_name4;
				move_uploaded_file($tmp_name4, $img_upload_path4);
			}
		}

		if (isset($img_new_name) && isset($img_new_name2) && isset($img_new_name3) && isset($img_new_name4)) {
			$sql = "INSERT INTO guest_requirements (guest_studName, guest_studType, guest_email, guest_form138, guest_form137a, guest_gmc, guest_psa) VALUES (?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->execute([$studName, $studType, $email, $img_new_name, $img_new_name2, $img_new_name3, $img_new_name4]);
		}
	}	
?>
