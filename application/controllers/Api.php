<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function getTemplate($view){
        $data = array(
            'head' => $this->load->view('layouts/header','',true),
            'sidebar' => $this->load->view('layouts/sidebar','',true),
            'nav' => $this->load->view('layouts/nav','',true),
            'content' => $view,
            'footer' => $this->load->view('layouts/footer','',true)
        );

        return $this->load->view('layouts/dashboard',$data);
    }

    public function index(){
        if($this->session->userdata('id')){

            $view = $this->load->view('api/index','',true);
            $this->getTemplate($view);
        }
    }

    public function clima(){
        if($this->session->userdata('id')){
            
            if($this->input->is_ajax_request()){
                $post = $this->input->post(NULL, true);

                $ciudad = $post['ciudad'];
                $pais = $post['pais'];

                $api_key = '22b516fe49c5a365268a65a06cbcbe7f';
                $api_key2 = '8c7fd07a5237b9b35a09bfe79b120a45';

                $data = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$ciudad,$pais&appid=$api_key");

                exit($data);
            }
        }

    }

}