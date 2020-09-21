<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aturank3 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->layout->auth();
    }

    public function index()
    {
        $data['title'] = 'Aturan K3';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Aturan K3' => '',
        ];
        //$this->layout->set_privilege(1);
        // $data['code_js'] = 'aturank3/codejs';
        $data['page'] = 'aturank3/aturank3';
        $this->load->view('template/backend', $data);
    }
}
