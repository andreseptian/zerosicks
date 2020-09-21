<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materik3 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->layout->auth();
    }

    public function index()
    {
        $data['title'] = 'Materi K3';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Materi K3' => '',
        ];
        //$this->layout->set_privilege(1);
        // $data['code_js'] = 'materik3/codejs';
        $data['page'] = 'materik3/materik3';
        $this->load->view('template/backend', $data);
    }
}
