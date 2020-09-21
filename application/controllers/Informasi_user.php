<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi_user extends CI_Controller
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
        $data['informasi'] = $this->Informasik3_model->get_all();
        $data['title'] = 'Papan Informasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Papan Informasi' => '',
        ];
        // $data['code_js'] = 'informasi_user/codejs';
        $data['page'] = 'informasi_user/informasi_user';
        $this->load->view('template/backend', $data);
    }
    public function video()
    {
        $data['informasi'] = $this->Informasik3_model->get_all();
        $data['title'] = 'Papan Informasi K3';
        $data['subtitle'] = 'Read';
        $data['crumb'] = [
            'Papan Informasi' => '',
        ];
        // $data['code_js'] = 'informasi_user/codejs';
        $data['page'] = 'informasi_user/informasi_video';
        $this->load->view('template/backend', $data);
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
            $data['title'] = 'Papan Informasi K3';
            $data['subtitle'] = 'Read';
            $data['crumb'] = [
                'Papan Informasi' => '',
            ];

            $data['page'] = 'informasi_user/informasi_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi_user'));
        }
    }
}
/* End of file Informasik3.php */
