<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sanitize {

	function trimFirstCaps($e)
	{
		$result = trim($e);
		$result = strtolower($result);
		$result = ucwords($result);
		return $result;
	}

	function trimAllCaps($e)
	{
		$result = trim($e);
		$result = strtoupper($result);
		return $result;
	}

	function trimAllLower($e)
	{
		$result = trim($e);
		$result = strtolower($result);
		return $result;
	}

	function formatMoney($number, $fractional=false) {
   		if ($fractional) {
        $number = sprintf('%.2f', $number);
   		}
  		while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
   		}
   		if (!$number) {
   			return '0.00';
   		}
  	  	return $number;
		}

	function generatePassword() {

	   list($usec, $sec) = explode(' ', microtime());
	   srand((float) $sec + ((float) $usec * 100000));

	   $validchars[1] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	   $validchars[2] = "abcdfghjkmnpqrstvwxyz";
	   $validchars[3] = "0123456789";
	   $validchars[4] = "!@#$%&";

	   $password1  = "";
	   $counter   = 0;

	   while ($counter < 2) {
	     $actChar = substr($validchars[1], rand(0, strlen($validchars[1])-1), 1);

	     // All character must be different
	     if (!strstr($password1, $actChar)) {
	        $password1 .= $actChar;
	        $counter++;
	     }
	   }

	   $password2  = "";
	   $counter   = 0;

	   while ($counter < 2) {
	     $actChar = substr($validchars[2], rand(0, strlen($validchars[2])-1), 1);

	     // All character must be different
	     if (!strstr($password2, $actChar)) {
	        $password2 .= $actChar;
	        $counter++;
	     }
	   }

	   $password3  = "";
	   $counter   = 0;

	   while ($counter < 3) {
	     $actChar = substr($validchars[3], rand(0, strlen($validchars[3])-1), 1);

	     // All character must be different
	     if (!strstr($password3, $actChar)) {
	        $password3 .= $actChar;
	        $counter++;
	     }
	   }

	   $password4  = "";
	   $counter   = 0;

	   while ($counter < 1) {
	     $actChar = substr($validchars[4], rand(0, strlen($validchars[4])-1), 1);

	     // All character must be different
	     if (!strstr($password4, $actChar)) {
	        $password4 .= $actChar;
	        $counter++;
	     }
	   }

	   $password = $password1 . $password2 . $password3 . $password4;
	   return $password;

	}

	function getUserLevel($type) {
		switch ($type) {
			case 'Sales':
				$userLevel = '1';
				break;
			case 'Sales Support':
				$userLevel = '2';
				break;
			case 'Manager':
				$userLevel = '3';
				break;
			case 'Branch Manager':
				$userLevel = '3';
				break;
			case 'Administrator':
				$userLevel = '4';
				break;
			default:
				$userLevel = '1';
				break;
		}
		return $userLevel;
	}

	function generateQuoteNumber($division, $initials) {

		$len = 2;
		$base='ABCDEFGHKLMNOPQRSTWXYZ';
		$max=strlen($base)-1;
		$quotenumberLetters='';
		mt_srand((double)microtime()*1000000);
		while (strlen($quotenumberLetters)<$len+1)
	  	$quotenumberLetters.=$base{mt_rand(0,$max)};

		$len = 3;
		$base='123456789';
		$max=strlen($base)-1;
		$quotenumberNumbers='';
		mt_srand((double)microtime()*1000000);
		while (strlen($quotenumberNumbers)<$len+1)
	  	$quotenumberNumbers.=$base{mt_rand(0,$max)};

	  	$quotenumber = $division . "-" . $initials . "-" . $quotenumberLetters . $quotenumberNumbers . "-1";

		return $quotenumber;
	}

	function formatPhoneNum($phone) {

		$onlynums = preg_replace('/[^0-9]/','',$phone);
		if (strlen($onlynums)==10) { $areacode = substr($onlynums, 0,3);
		$exch = substr($onlynums,3,3);
		$num = substr($onlynums,6,4);
		$phone = "(" . $areacode . ") " . $exch . "-" . $num;
		return $phone;
		}
	}
}
