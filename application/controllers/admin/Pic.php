<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pic_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pics"] = $this->pic_model->getAll();
        $this->load->view("admin/pic/list", $data);
    }

    public function add()
    {
        $pic = $this->pic_model;
        $validation = $this->form_validation;
        $validation->set_rules($pic->rules());

        if ($validation->run()) {
            $pic->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pic/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pic');
       
        $pic = $this->pic_model;
        $validation = $this->form_validation;
        $validation->set_rules($pic->rules());

        if ($validation->run()) {
            $pic->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pic"] = $pic->getById($id);
        if (!$data["pic"]) show_404();
        
        $this->load->view("admin/pic/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pic_model->delete($id)) {
            redirect(site_url('admin/pic'));
        }
    }
}