<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
	'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
	'smtp_host' => 'smtp.gmail.com',
	'smtp_port' => 465,
	'smtp_user' => 'manura.lakshan8@aiesec.net',
	'smtp_pass' => 'Manura577$',
	'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
	'mailtype' => 'text', //plaintext 'text' mails or 'html'
	'smtp_timeout' => '4', //in seconds
	'charset' => 'iso-8859-1',
	'wordwrap' => TRUE
);
