<?php

use function PHPSTORM_META\override;

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ion_auth_model');
		$this->layout->auth();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->library('session');
	}

	public function index()
	{
		$data['title'] = 'Profile';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Profile' => '',
		];
		$data['user'] = $this->ion_auth->user()->row();
		//$this->layout->set_privilege(1);
		$data['message'] = $this->session->message;

		$data['page'] = 'profile';
		$this->load->view('template/backend', $data);
	}


	public function gantipassword()
	{
		$data['title'] = 'Profile';
		$data['subtitle'] = 'Ganti Kata Sandi';
		$data['crumb'] = [
			'Profile' => 'profile/gantipassword',
		];
		$data['user'] = $this->ion_auth->user()->row();

		$data['message'] = $this->session->message;

		$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
		$data['old_password'] = array(
			'name' => 'old',
			'id' => 'old',
			'type' => 'password',
			'data-toggle' => 'password',
			'class' => 'form-control',
			'placeholder' => 'Password'
		);
		$data['new_password'] = array(
			'name' => 'new',
			'id' => 'new',
			'type' => 'password',
			'data-toggle' => 'password',
			'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
			'class' => 'form-control',
			'placeholder' => 'Password Baru'
		);
		$data['new_password_confirm'] = array(
			'name' => 'new_confirm',
			'id' => 'new_confirm',
			'type' => 'password',
			'data-toggle' => 'password',
			'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
			'class' => 'form-control',
			'placeholder' => 'Konfirmasi Password Baru'
		);
		$data['user_id'] = array(
			'name' => 'user_id',
			'id' => 'user_id',
			'type' => 'hidden',
			'value' => $data['user']->id,
		);
		//$this->layout->set_privilege(1);
		$data['page'] = 'change_password';
		$this->load->view('template/backend', $data);
	}

	public function action_changepass()
	{
		$identity = $this->session->userdata('identity');

		$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

		if ($change) {
			//if the password was successfully changed
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect(site_url('auth/logout'));
		} else {
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('profile/gantipassword', 'refresh');
		}
	}

	public function update_action()
	{
		$this->_rules();
		$data['user'] = $this->db->get_where('users', ['id' => $this->session->userdata('email')])->row_array();

		$image = "";
		if (!empty($_FILES["foto"]["name"])) {

			$config['upload_path']          = './assets/file_upload/foto_profile/';
			$config['allowed_types'] = 'png|jpg|jpeg|gif';
			$config['max_size']      = 5000;
			$config['overwrite'] = TRUE;
			// 			$config['encrypt_name'] = TRUE;
			// $image = pathinfo($_FILES["foto"]['name'], PATHINFO_FILENAME);
			$image = date('YmdHis');
			$config['file_name'] = $image;
			$image = $image . "." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				// $this->load->view('upload_form', $error);
			} else {
				$data = array('upload_data' => $this->upload->data("file_name"));
				$data = $this->upload->data();

				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/file_upload/foto_profile/' . $data['file_name'];
				// $config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '100%';
				$config['width'] = "300";
				$config['height'] = "300";

				$config['x_axis'] = 200;
				$config['x_axis'] = 200;

				$config['new_image'] = './assets/file_upload/foto_profile/kecil/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->crop();
				echo $image;
			}
		} else {
			$image = $this->input->post('old');
		}

		if ($this->form_validation->run() == FALSE) {
			($this->input->post('id', TRUE));
			$this->index();
		} else {
			$data = array(
				'first_name' => $this->input->post('first_name', TRUE),
				'last_name' => $this->input->post('last_name', TRUE),
				'email' => $this->input->post('email', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'foto' => $image,
			);


			$this->Ion_auth_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('Profile'));
		}
	}



	public function _rules()
	{
		$this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
		$this->form_validation->set_rules('last_name', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('phone', 'Nomor Telepon', 'trim|required|numeric|min_length[10]');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
