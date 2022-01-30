<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function login_rules()
    {
        return [ [
                'field'=>'email',
                'label'=>'Email',
                'rules'=>'required|trim|valid_email'
            ], [
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'required|trim'
            ]
        ];
    }

    public function reg_rules()
    {
        return [
            [
                'field'=>'username',
                'label'=>'Username',
                'rules'=>'required|trim'
            ], [
                'field'=>'email',
                'label'=>'Email',
                'rules'=>'required|trim|valid_email|is_unique[user.email]',
                'errors'=>[
                    'is_unique'=>'Email has already registered'
                ]
            ], [
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'required|min_length[5]|trim',
                'errors'=>[
                    'min_length'=>'Password must have 5 character'
                ]
            ]
        ];
    }

    public function create($data)
    {
        $sql = $this->db->insert('user', $data);

        return $sql;
    }
    
    public function getUser($email)
    {
        $sql = $this->db->get_where('user', ['email'=>$email]);
        $query = $sql->row_array();

        return $query;
    }
}