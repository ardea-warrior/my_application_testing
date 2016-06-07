<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Pawon_user
 *
 * @author maulana
 */
class Pawoon_user extends CI_Controller {

    public function index() {
        $datas = $this->user->all();
        $this->load->view('pawoon_user/index', array('datas'=>$datas));
    }
    
    public function saveUser() {
        $params = $this->input->post();
        
        //check user id exits
        if ($this->user->isIdExists($params['uuid'])) {
            $this->user->update($params['uuid'], $params);
        } else {
            $this->user->insert($params);
        }
        
        
        
        $result = $this->result();
        $this->output($result);
    }
    
    
    
    public function checkUID($uid) {
        
        $exists = $this->user->isIdExists($uid);
        $result = $this->result();
        $result['data'] = $exists;
        $this->output($result);
        
    }
    
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
    
    
    
    private function result() {
        $resultData = array(
            'Ver' => '0.0.1',
            'Success' => TRUE,
            'Message' => ''
            );
        return $resultData;
    }
    
    private function output($data) {
        $this->output
        ->set_content_type('application/json');
        echo json_encode($data);
        exit;
    }
}
