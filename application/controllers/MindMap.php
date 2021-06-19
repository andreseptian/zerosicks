<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MindMap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		$data['title'] = 'MindMap';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'MindMap' => '',
		];
		//$this->layout->set_privilege(1);
		$data['code_js'] = 'MindMap/codejs';
		$data['page'] = 'MindMap/Index';
		$this->load->view('template/backend', $data);
	}
}
