<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function getData()
    {
        $sql = $this->db->get('siswa');
        $query = $sql->result_array();

        return $query;
    }
 
    public function add($data)
    {
        $sql = $this->db->insert('siswa', $data);
        $query = $sql;

        return $query;
    }
}