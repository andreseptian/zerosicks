<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		$data['title'] = 'Evaluasi';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Evaluasi' => '',
		];
		//$this->layout->set_privilege(1);
		$data['code_js'] = 'Evaluasi/codejs';
		$data['page'] = 'Evaluasi/Index';
		$this->load->view('template/backend', $data);
	}
}
