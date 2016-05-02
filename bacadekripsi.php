<?php
	set_time_limit(0);
	$pass = file('password.txt');
	foreach ($pass as $password) {
		$string = trim($password);
		if (!empty($string)) {
			$start = time();
			echo decrypt(trim($password), '');
			$end = time();
			echo " ( memerlukan waktu ".($end - $start)." seconds) <br>";
		}
	}

	echo decrypt($pass,$jawaban);

	function decrypt($pass,$answer) {
		$array = array('a','b','c','d','e','f',
					   'g','h','i','j','k','l',
					   'm','n','o','p','q','r','s',
					   't','u','v','w','x','y','z',
					   '0','1','2','3','4','5','6','7','8','9');
		$maxNum = 4;
		if (strlen($answer) > $maxNum) {
			return;
		}

		for ($i=0; $i < count($array); $i++) { 
			$temp = $answer.$array[$i];
			if (md5($temp) == $pass) {
				return $temp;
			}

			$result = decrypt($pass, $temp);
			if (strlen($result) > 0) {
				return $result;
			}
		}

		/*for ($i=0; $i < count($array); $i++) { 
			$temp = $answer.$array[$i];
			if (md5($temp) = $pass) {
				return $temp;
			}

			$result = decrypt($pass, $temp);
			if (strlen($result) > 0) {
				return $result;
			}
		}*/
	}
?>