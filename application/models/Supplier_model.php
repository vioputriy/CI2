<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    private $_table = "supplier";

    public $Supplier_id;
    public $Supplier_name;
    public $Supplier_address;

    public function rules()
    {
        return [
            ['field' => 'Supplier_id',
            'label' => 'Supplier_id',
            'rules' => 'numberic'],

            ['field' => 'Supplier_name',
            'label' => 'Name',
            'rules' => 'required'],
            
            ['field' => 'Supplier_address',
            'label' => 'address',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["customer_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->supplier_id = uniqid();
        $this->name = $post["name"];
        $this->address= $post["address"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->_id = $post["Supplier_id"];
        $this->name = $post["Supplier_name"];
        $this->description = $post["Supplier_address"];
        $this->db->update($this->_table, $this, array('Supplier_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("_id" => $id));
    }
}
