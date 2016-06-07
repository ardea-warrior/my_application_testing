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
    
    public function addUser() {
        $params = $this->input->post();
        $this->user->insert($params);
        $result = $this->result();
        $this->output($result);
    }
    
    
    
    public function checkUID($uid) {
        
        $exists = $this->user->isIdExists($uid);
        $result = $this->result();
        $result['data'] = $exists;
        $this->output($result);
        
    }
    
    public function delete() {
        
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
