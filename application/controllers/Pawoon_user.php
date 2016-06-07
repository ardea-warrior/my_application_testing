<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Pawon_user
 * Controller for user processing
 * 
 * 
 * @author maulana
 */
class Pawoon_user extends CI_Controller {
    /**
     * Main Action
     */
    public function index() {
        $datas = $this->user->all();
        $this->load->view('pawoon_user/index', array('datas'=>$datas));
    }
    
    /**
     * Action for save user
     */
    public function saveUser() {
        $params = $this->input->post();
        $result = $this->result();
        //check user id exits
        if ($this->user->isIdExists($params['uuid'])) {
            if ($this->user->isNamaExists($params['nama'], $params['uuid'])) {
                $result['Success'] = FALSE;
                $result['Message'] = 'Nama already Exists';
            } else {
                $this->user->update($params['uuid'], $params);
                $result['process'] = 'update';
            }
            
            
        } else {
            if ($this->user->isNamaExists($params['nama'])) {
                $result['Success'] = FALSE;
                $result['Message'] = 'Nama already Exists';
            } else {
                $this->user->insert($params);
                $result['process'] = 'insert';
            }
            
        }
        $result['data'] = $params;
        
        
        
        $this->output($result);
    }
    
    /**
     * Action for check UUID with ajax
     * 
     * @param string $uid
     */
    
    public function checkUID($uid) {
        
        $exists = $this->user->isIdExists($uid);
        $result = $this->result();
        $result['data'] = $exists;
        $this->output($result);
        
    }
    
    /**
     * Action for delete with ajax
     * @param string $uuid
     */
    public function delete($uuid='') {
       
        $result = $this->result();
        if ($uuid) {
            try {
                $this->user->delete($uuid);
            } catch (Exception $e) {
                $result['Success'] = FALSE;
            }
        } else {
            $result['Message'] = "ID not set";
            $result['Success'] = FALSE;
        }
        $this->output($result);
        
    }
    
    /**
     * 
     * @param string $uuid
     */
    public function user_by_id($uuid='') {
        if ($uuid) {
            $result = $this->result();
            $data = $this->user->getById($uuid);
            if (count($data)) {
                $result['data'] = $data ;
            } else {
                $result['Message'] = "ID not found";
                $result['Success'] = FALSE;
            }
            
        } else {
            $result['Message'] = "ID not set";
            $result['Success'] = FALSE;
        }
        $this->output($result);
        
    }
    
    /**
     * 
     * @return array
     */
    
    private function result() {
        $resultData = array(
            'Ver' => '0.0.1',
            'Success' => TRUE,
            'Message' => ''
            );
        return $resultData;
    }
    
    /**
     * 
     * @param array $data
     */
    
    private function output($data) {
        $this->output
        ->set_content_type('application/json');
        echo json_encode($data);
        exit;
    }
}
