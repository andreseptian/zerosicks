<?php
defined('BASEPATH') or exit('No direct script access allowed');

class artikel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		$data['title'] = 'Artikel K3';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Artikel K3' => '',
		];
		//$this->layout->set_privilege(1);
		// $data['code_js'] = 'artikel/codejs';
		$data['page'] = 'artikel/artikel';
		$this->load->view('template/backend', $data);
	}
}
