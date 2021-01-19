<?php


class GlobalMethods extends CI_Model
{

	public function logger($user, $data)
	{
		$todate = date('Y-m-d');
		$file = fopen('./assets/logbook/log_' . $todate . '.txt',"a");
		date_default_timezone_set('Asia/Kolkata');
		fwrite($file, "\n".date("h:i:sa")." ".$user . " " . $data);
	}

	public function readLogFile($file){
		$handle = fopen("./assets/logbook/".$file, "r");
		$info = array();
		if ($handle) {
			while (($line = fgets($handle)) !== false) {
				array_push($info,$line);
			}
			fclose($handle);
			return $info;
		}
	}



}
