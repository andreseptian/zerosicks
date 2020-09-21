<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasik3_model extends CI_Model
{

    public $table = 'informasik3';
    public $id = 'id_informasi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_informasi,judul_informasi,isi_informasi,foto_informasi');
        $this->datatables->from('informasik3');
        //add this line for join
        //$this->datatables->join('table2', 'informasik3.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('informasik3/read/$1'), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"') . "  " . anchor(site_url('informasik3/update/$1'), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"') . "  " . anchor(site_url('informasik3/delete/$1'), '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'informasik3/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_informasi');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_informasi', $q);
        $this->db->or_like('judul_informasi', $q);
        $this->db->or_like('isi_informasi', $q);
        $this->db->or_like('foto_informasi', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_informasi', $q);
        $this->db->or_like('judul_informasi', $q);
        $this->db->or_like('isi_informasi', $q);
        $this->db->or_like('foto_informasi', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}
