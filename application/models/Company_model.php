<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model
{
    private $_table = "company";

    public $id_company;
    public $company_name;
    public $phone_number;
    public $address;
    public $logo = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'company_name',
            'label' => 'Company Name',
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
        return $this->db->get_where($this->_table, ["id_company" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_company = uniqid();
        $this->company_name = $post["company_name"];
        $this->phone_number = $post["phone_number"];
        $this->address = $post["address"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_company = $post["id_company"];
        $this->company_name = $post["company_name"];
        $this->phone_number = $post["phone_number"];
        $this->address = $post["address"];
        return $this->db->update($this->_table, $this, array('id_company' => $post['id_company']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_company" => $id));
    }
}