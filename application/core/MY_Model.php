<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_model
 *
 * @author maulana
 */
class MY_Model extends CI_Model{
    protected $name = '';
    protected $db = NULL;
    


    public function __construct() {
        parent::__construct();
        $CI = &get_instance();
        $this->db = $CI->load->database('default', TRUE);
    }
            

    public function insert($data) {

         $this->db->insert($this->name, $data);
    }
    
    public function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->name, $data); 
    }
    
    public function all() {
        return $this->db->get($this->name)->result_array();
    }
    
    
    public function delete($id) {
        $this->db->delete($this->name, array($this->id => $id)); 
    }
    
    
    
    public function getById($id) {
        return $this->db->get_where($this->name, array($this->id => $id))->row();
        
    }
    
    public function isIdExists($id) {
        $query = $this->db->get_where($this->name, array($this->id => $id))->result_array();
        return count($query)? TRUE: FALSE;
    }
    
    
    
}
