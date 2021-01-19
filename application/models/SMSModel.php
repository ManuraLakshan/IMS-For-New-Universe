<?php


class SMSModel extends CI_Model
{


		function sendSMS($userName, $message)
		{
			$user = "94771712924";
			$password = "2461";
			$userMobile="94702083227";

			$text = urlencode("New Universe Garments -"."\n".$message."\n -".$userName);
			$to = $userMobile;

			$baseurl ="http://www.textit.biz/sendmsg";
			$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
			$ret = file($url);

			$res= explode(":",$ret[0]);

//			if (trim($res[0])=="OK")
//			{
//				echo "Message Sent - ID : ".$res[1];
//			}
//			else
//			{
//				echo "Sent Failed - Error : ".$res[1];
//			}
		}

}
