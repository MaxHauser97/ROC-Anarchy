<?php
	include "Includes.php";
	
	if (isset($_REQUEST["getServerStatus"])) {//Returns database status, Used in: Login.php
		if ($conn = Connect()) {
			echo json_encode("OK");
		}
		else {
			echo json_encode("DEAD");
		}
		return;
	}
	
	if (isset($_REQUEST["getupdate"])) { //Returns news feed, Used in: Index.php
		if ($conn = Connect()) {
			if (preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['getupdate']) != $_GET['getupdate']) {
				echo json_encode(['success' => false]);
			}
			if ($result = Query("updates", "SELECT * FROM updates WHERE id = '".$_GET['getupdate']."'")) {
				if ($result) {
					echo json_encode([
						'success' => true,
						'result'  => mysqli_fetch_array($result)
					]);
				}
				else {
					echo json_encode(['success' => false]);
				}
			}
			else {
				echo json_encode(['success' => false]);
			}
		}
		else {
			echo json_encode(['success' => false]);
		}
		return;
	}
?>