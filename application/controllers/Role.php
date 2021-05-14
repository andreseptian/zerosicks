<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Role_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Role';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Role' => '',
        ];
        $data['code_js'] = 'role/codejs';
        $data['page'] = 'role/role_list';
        $this->load->view('template/backend', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Role_model->json();
    }

    public function read($id)
    {
        $row = $this->Role_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'role' => $row->role,
            );
            $data['title'] = 'Role';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'role/role_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('role/create_action'),
            'id' => set_value('id'),
            'role' => set_value('role'),
        );
        $data['title'] = 'Role';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'role/role_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'role' => $this->input->post('role', TRUE),
            );
            $this->Role_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('role'));
        }
    }

    public function update($id)
    {
        $row = $this->Role_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('role/update_action'),
                'id' => set_value('id', $row->id),
                'role' => set_value('role', $row->role),
            );
            $data['title'] = 'Role';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'role/role_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'role' => $this->input->post('role', TRUE),
            );

            $this->Role_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('role'));
        }
    }

    public function delete($id)
    {
        $row = $this->Role_model->get_by_id($id);

        if ($row) {
            $this->Role_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('role'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Role_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('message', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('role', 'role', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Role.php */
