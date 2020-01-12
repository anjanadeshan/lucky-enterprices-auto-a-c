<?php

function verify_query($result_set) {

		global $conn;
unset($_SESSION['user']);
		if (!$result_set) {
			die("Database query failed: " . mysqli_error($conn));
		}

	}