<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        if($this->session->userdata('rol') == 'admin'){

            $this->load->model('AdminModel');
            $usuarios = $this->AdminModel->AllUsers();

            $data = array(
                'usuarios' => $usuarios
            );

            $vista =  $this->load->view('admin/usuarios',$data,true);
            $this->getTemplate($vista);
        }else{
            $this->session->sess_destroy();
            return redirect(base_url());
        }
    }

    
    public function editar(){

        if($this->session->userdata('rol') == 'admin'){
            if($get = $this->input->get()){

                $this->load->model('AdminModel');
                $usuario = $this->AdminModel->OneUser($get);

                $data = array(
                    'usuario' => $usuario
                );

                $view = $this->load->view('admin/editar',$data,true);
                $this->getTemplate($view);

            }
        }
    }

    public function save(){
        if($this->session->userdata('rol') == 'admin'){
            if($post = $this->input->post()){

                $data = array(
                    'id' => $post['id'],
                    'nombre' => $post['nombre'],
                    'apellidos' => $post['apellidos'],
                );

                $this->load->model('AdminModel');
                $this->AdminModel->editar_usuario($data);

                return redirect(base_url().'Admin');

            }
        }
    }

    public function eliminar(){
        if($this->session->userdata('rol') == 'admin'){
            if($get = $this->input->get()){

                $this->load->model('AdminModel');
                $this->AdminModel->eliminar_usuario($get);

                return redirect(base_url().'Admin');
            }
        }
    }

}