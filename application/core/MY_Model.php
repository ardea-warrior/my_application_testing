<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of MY_model
 *
 * @author maulana
 */
class MY_Model extends CI_Model{
    protected $name = '';
    protected $db = NULL;
    
    /**
     * 
     */

    public function __construct() {
        parent::__construct();
        $CI = &get_instance();
        $this->db = $CI->load->database('default', TRUE);
    }
       
    /**
     * Insert data process
     * 
     * @param array $data
     */

    public function insert($data) {

         $this->db->insert($this->name, $data);
    }
    
    /**
     * update data process
     * 
     * @param string $id
     * @param array $data
     */
    
    public function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->name, $data); 
    }
    
    /**
     * get all data from table
     * 
     * @return array[][]
     */
    
    public function all() {
        return $this->db->get($this->name)->result_array();
    }
    
    
    /**
     * delete data process
     * 
     * @param type $id
     */
    
    public function delete($id) {
        $this->db->delete($this->name, array($this->id => $id)); 
    }
    
    /**
     * 
     * @param string $id
     * @return array
     */
    
    public function getById($id) {
        return $this->db->get_where($this->name, array($this->id => $id))->row();
        
    }
    
    
    /**
     * 
     * @param string $id
     * @return array
     */
    public function isIdExists($id) {
        $query = $this->db->get_where($this->name, array($this->id => $id))->result_array();
        return count($query)? TRUE: FALSE;
    }
    
    
    
}
