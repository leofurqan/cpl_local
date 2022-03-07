<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class Phpmailer_library
{
	public function __construct()
	{
		log_message('Debug', 'PHPMailer class is loaded.');
	}

	public function load()
	{
		$objMail = new PHPMailer();
		return $objMail;
	}
}
