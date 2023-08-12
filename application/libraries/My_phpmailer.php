<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_phpmailer {

    	public function My_phpmailer() {
        include 'PHPMailer/class.phpmailer.php';
        include_once 'PHPMailer/language/phpmailer.lang-en.php';
        require 'PHPMailer/class.smtp.php';
        include 'PHPMailer/recaptchalib.php';
    }
}