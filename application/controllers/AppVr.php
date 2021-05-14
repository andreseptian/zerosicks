<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppVr extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		$data['title'] = 'VR ELECTRICAL';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'VR ELECTRICAL' => '',
		];
		//$this->layout->set_privilege(1);
		// $data['code_js'] = 'artikel/codejs';
		$data['page'] = 'app/appVr';
		$this->load->view('template/backend', $data);
	}
}
