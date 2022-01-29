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
    
    public function getDataId($id)
    {
        $sql = $this->db->get_where('siswa', ['id_siswa'=>$id]);
        $query = $sql->row_array();

        return $query;
    }
 
    public function add($data)
    {
        $sql = $this->db->insert('siswa', $data);
        $query = $sql;

        return $query;
    }
    
    public function update($id, $data)
    {
        $this->db->where('id_siswa', $id);
        $this->db->update('siswa', $data);
        return $this->db->affected_rows();
    }
    
    public function delete($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('siswa');
        return $this->db->affected_rows();
    }
}