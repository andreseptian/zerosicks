<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tentang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		$data['title'] = 'Tentang Aplikasi';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Tentang Aplikasi' => '',
		];
		//$this->layout->set_privilege(1);
		// $data['code_js'] = 'tentang/codejs';
		$data['page'] = 'tentang/tentang';
		$this->load->view('template/backend', $data);
	}
}
