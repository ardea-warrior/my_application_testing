<?php

/**
 * Description of User_model
 *
 * @author maulana
 */

class User_model extends MY_Model {
    protected $name = 'users_pawon';
    protected $id =  'uuid';
    /**
     * check nama exists
     * 
     * @param string $nama
     * @param string $uuid
     * @return boolean
     */
    public function isNamaExists($nama, $uuid = '') {
        $rows = $this->db->get_where($this->name, array('nama' => $nama))->result_array(); 
        return count($rows)? (($uuid && $rows[0]['uuid'] == $uuid)? FALSE: TRUE): FALSE;
    }
            
    
    
    
    
    
    
    
    
    
}
