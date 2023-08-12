<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//require 'vendor/autoload';
class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }

    public function overview() {
        
        $this->load->view('header');
        $this->load->view('overview');
        $this->load->view('footer');
    }
    
    public function services() {
        $this->load->view('header');
        $this->load->view('services');
        $this->load->view('footer');
    }
    
    public function products() {
        $this->load->view('header');
        $this->load->view('products');
        $this->load->view('footer');
    }

    public function cots() {
        $this->load->view('header');
        $this->load->view('cots');
        $this->load->view('footer');
    }
    
    public function coe() {
        $this->load->view('header');
        $this->load->view('coe');
        $this->load->view('footer');
    }
    
    public function casestudies() {
        $this->load->view('header');
        $this->load->view('casestudies');
        $this->load->view('footer');
    }
    
    public function contactus() {
        $this->load->view('header');
        $this->load->view('contactus');
        $this->load->view('footer');
    }

    public function careers() {

        $this->load->view('header');
        $this->load->view('careers');
        $this->load->view('footer');
    }

    public function whysinaz() {

        $this->load->view('header');
        $this->load->view('whysinaz');
        $this->load->view('footer');
    }
    
    public function captcha_check($captcha) {
        //echo $captcha.' '.$this->session->userdata('captchaWord');exit;
        $secret = '6LfYQiATAAAAAFgQOtLtPqEkbkv0koOYT9ru1E_i';
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($captcha, $_SERVER['REMOTE_ADDR']);
        //$resp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if ($resp->isSuccess()) {
            return TRUE;
        } else {
            $this->form_validation->set_message('captcha_check', 'Please verify yourself.');
            return FALSE;
        }
    }

    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    } 
    
    public function enquiry() {

            $this->load->library('My_phpmailer');
            $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|callback_alpha_dash_space'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'required'
            )/*,
            array(
                'field' => 'g-recaptcha-response',
                'label' => 'Please verify captcha',
                'rules' => 'trim|required'
            )*/
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'errors' => validation_errors());
            $this->output
                    ->set_content_type('json')
                    ->set_output(json_encode($response));
            return;
        } else {
            $data['name'] = htmlspecialchars($this->input->post('name'));
            $data['email'] = htmlspecialchars($this->input->post('email'));
             $data['subject'] = htmlspecialchars($this->input->post('subject'));
            $data['message'] = htmlspecialchars($this->input->post('message'));


            $this->send_mail($data);
        }
    }

    public function send_mail($data) {


        $mail = new PHPMailer;
        $mail->Mailer = "mail";
        //$mail->IsSMTP();                                      // Set mailer to use SMTP , Comment for server and uncomment for local server
      
        $mail->Host = 'smtp.sendgrid.net';
        // Specify main and backup server
        $mail->Port = 587;                                    // Set the SMTP port
        $mail->SMTPAuth = true;
        //$mail->SMTPSecure = "tls";

        // Enable SMTP authentication
        $mail->Username = 'srvmedia';                // SMTP username
        $mail->Password = 'srv@1248';

        $mail->From = $data['email'];
        $mail->FromName = $data['name'];
        $mail->AddAddress('spiffytech2508@gmail.com');  // Add a recipient
        
        
        $mail->IsHTML(true);                                  // Set email format to HTML

        $mail->Subject =  $data['subject'];
        $mail->Body = 'name:' . $data['name'] . '<br/>Subject:' . $data['subject'] .'<br/>Message:' . $data['message'] . '<br/>Email:' . $data['email'];
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';      
        // var_dump($mail);
        if ($mail->Send()) {

            $response = array('status' => 'true');
            $this->output
                    ->set_content_type('json')
                    ->set_output(json_encode($response));
            return;
        } else {
            $response = array('status' => 'false');
            $this->output
                    ->set_content_type('json')
                    ->set_output(json_encode($response));
            return;
        }
    }

}