<?php


class GlobalMethods extends CI_Model
{

	public function logger($user, $data)
	{
		$todate = date('Y-m-d');
		$file = fopen('./assets/logbook/log_' . $todate . '.txt',"a");
		fwrite($file, "\n".$user . " " . $data);
	}
}
