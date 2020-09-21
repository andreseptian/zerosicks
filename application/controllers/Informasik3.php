<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasik3 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Informasik3_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('informasik3/create_action'),
            'id_informasi' => set_value('id_informasi'),
            'judul_informasi' => set_value('judul_informasi'),
            'isi_informasi' => set_value('isi_informasi'),
            'foto_informasi' => set_value('foto_informasi'),
        );
        $data['title'] = 'Informasik3';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Informasik3' => '',
        ];
        $data['code_js'] = 'informasik3/codejs';
        $data['page'] = 'informasik3/Informasik3_list';
        $this->load->view('template/backend', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Informasik3_model->json();
    }

    public function read($id)
    {
        $row = $this->Informasik3_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_informasi' => $row->id_informasi,
                'judul_informasi' => $row->judul_informasi,
                'isi_informasi' => $row->isi_informasi,
                'foto_informasi' => $row->foto_informasi,
            );
            $data['title'] = 'Informasik3';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'informasik3/Informasik3_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasik3'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('informasik3/create_action'),
            'id_informasi' => set_value('id_informasi'),
            'judul_informasi' => set_value('judul_informasi'),
            'isi_informasi' => set_value('isi_informasi'),
            'foto_informasi' => set_value('foto_informasi'),
        );
        $data['title'] = 'Informasik3';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'informasik3/Informasik3_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $file = "";
        if (!empty($_FILES["foto_informasi"]["name"])) {

            $config['upload_path']          = './assets/file_upload/foto_informasi/';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|doc|docx|pdf';
            $config['max_size']      = 10000;
            $config['overwrite'] = TRUE;
            $file = date('YmdHis');
            $config['file_name'] = $file;
            $file = $file . "." . pathinfo($_FILES["foto_informasi"]["name"], PATHINFO_EXTENSION);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_informasi')) {

                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                // $this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data("file_name"));
                $data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/file_upload/foto_informasi/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                //$config['quality'] = '100%';
                $config['width'] = 380;
                $config['height'] = 380;
                $config['new_image'] = './assets/file_upload/foto_informasi/kecil/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                // $this->load->view('upload_success', $data);
                echo $file;
            }
        }
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'judul_informasi' => $this->input->post('judul_informasi', TRUE),
                'isi_informasi' => $this->input->post('isi_informasi', TRUE),
                'foto_informasi' => $file,
            );
            $this->Informasik3_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('informasik3'));
        }
    }

    public function update($id)
    {
        $row = $this->Informasik3_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('informasik3/update_action'),
                'id_informasi' => set_value('id_informasi', $row->id_informasi),
                'judul_informasi' => set_value('judul_informasi', $row->judul_informasi),
                'isi_informasi' => set_value('isi_informasi', $row->isi_informasi),
                'foto_informasi' => set_value('foto_informasi', $row->foto_informasi),
            );
            $data['title'] = 'Informasik3';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'informasik3/Informasik3_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasik3'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        $file = "";
        if (!empty($_FILES["foto_informasi"]["name"])) {

            $config['upload_path']          = './assets/file_upload/foto_informasi/';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|doc|docx|pdf';
            $config['max_size']      = 5000;
            $config['overwrite'] = TRUE;
            $file = date('YmdHis');
            $config['file_name'] = $file;
            $file = $file . "." . pathinfo($_FILES["foto_informasi"]["name"], PATHINFO_EXTENSION);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_informasi')) {

                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                // $this->load->view('upload_form', $error);
            } else {
                $data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/file_upload/foto_informasi/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                //$config['quality'] = '50%';
                $config['width'] = 380;
                $config['height'] = 380;
                $config['new_image'] = './assets/file_upload/foto_informasi/kecil/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->load->view('upload_success', $data);
                echo $file;
            }
        } else {
            $file = $this->input->post('old');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_informasi', TRUE));
        } else {
            $data = array(
                'judul_informasi' => $this->input->post('judul_informasi', TRUE),
                'isi_informasi' => $this->input->post('isi_informasi', TRUE),
                'foto_informasi' => $file,
            );

            $this->Informasik3_model->update($this->input->post('id_informasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('informasik3'));
        }
    }

    public function delete($id)
    {
        $row = $this->Informasik3_model->get_by_id($id);

        if ($row) {
            $this->Informasik3_model->delete($id);
            unlink("./assets/file_upload/foto_informasi/$row->foto_informasi");
            unlink("./assets/file_upload/foto_informasi/kecil/$row->foto_informasi");
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('informasik3'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasik3'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Informasik3_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('message', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul_informasi', 'judul informasi', 'trim|required');
        $this->form_validation->set_rules('foto_informasi', 'foto informasi');
        $this->form_validation->set_rules('isi_informasi', 'isi informasi');

        $this->form_validation->set_rules('id_informasi', 'id_informasi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function printdoc()
    {
        $data = array(
            'informasik3_data' => $this->Informasik3_model->get_all(),
            'start' => 0
        );
        $this->load->view('informasik3/informasik3_print', $data);
    }
}

/* End of file Informasik3.php */
