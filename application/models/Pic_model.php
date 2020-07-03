<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pic_model extends CI_Model
{
    private $_table = "pic";

    public $id_pic;
    public $name;
    public $address;
    public $phone_number;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'phone_number',
            'label' => 'Phone Number',
            'rules' => 'numeric'],
            
            ['field' => 'address',
            'label' => 'Address',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pic" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pic = uniqid();
        $this->name = $post["name"];
        $this->address = $post["address"];
        $this->phone_number = $post["phone_number"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pic = $post["id_pic"];
        $this->name = $post["name"];
        $this->address = $post["address"];
        $this->phone_number = $post["phone_number"];
        return $this->db->update($this->_table, $this, array('id_pic' => $post['id_pic']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pic" => $id));
    }
}