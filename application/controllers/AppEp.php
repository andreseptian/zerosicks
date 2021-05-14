<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppEp extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		$data['title'] = 'EPPE  App';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'EPPE  App' => '',
		];
		//$this->layout->set_privilege(1);
		// $data['code_js'] = 'artikel/codejs';
		$data['page'] = 'app/appEp';
		$this->load->view('template/backend', $data);
	}
}
