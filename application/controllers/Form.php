<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->layout->auth();
    }

    public function index()
    {
        $data['title'] = 'Form Analisis';
        $data['user'] = $this->ion_auth->user()->row();
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Form Analisis' => '',
        ];
        //$this->layout->set_privilege(1);
        $data['code_js'] = 'form/codejs';
        $data['page'] = 'form/form';
        $this->load->view('template/backend', $data);
    }
}
