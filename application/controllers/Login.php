<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login'); //untuk load model
    }
    function index()
    {
        $this->load->view('login'); //load view front end
    }
    function auth()
    {
        $this->m_login->cek_login(); //load function model cek login
    }

    function logout()
    {
        $this->session->sess_destroy(); //function untuk logout

        redirect(base_url('login'));
    }
}
