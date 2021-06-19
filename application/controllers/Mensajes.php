<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajes extends CI_Controller {

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

            $this->load->model('MensajesModel');
            $mensajes = $this->MensajesModel->AllMensajes();

            $data = array(
                'mensajes' => $mensajes
            );

            $vista =  $this->load->view('mensajes/entradas',$data,true);
            $this->getTemplate($vista);
        }else{
            return redirect(base_url());
        }

    }

    public function crear(){
        if($this->session->userdata('id')){
            $vista =  $this->load->view('mensajes/crear','',true);
                $this->getTemplate($vista);
        }else{
            return redirect(base_url());
        }
    }



    public function save(){
        if($this->session->userdata('id')){
            if($post = $this->input->post()){
                
                $data = array(
                    'usuario_id' => $this->session->userdata('id'),
                    'titulo' => $post['titulo'],
                    'descripcion' => $post['descripcion']
                );

                $this->load->model('MensajesModel');
                $this->MensajesModel->insertEntradas($data);

                return redirect(base_url().'Mensajes');
            }
        }else{
            return redirect(base_url());
        }
    }

    public function edit(){
        if($this->session->userdata('id')){
            
            if($get = $this->input->get()){

                $this->load->model('MensajesModel');
                $mensaje = $this->MensajesModel->ObtenerMensaje($get);

                $data = array(
                    'mensaje' => $mensaje
                );

                $vista =  $this->load->view('mensajes/editar',$data,true);
                $this->getTemplate($vista);
            }
        }
    }

    public function editado(){
        if($this->session->userdata('id')){
            if($post = $this->input->post()){

                $data = array(
                    'id' => $post['id'],
                    'titulo' => $post['titulo'],
                    'descripcion' => $post['descripcion']
                );

                $this->load->model('MensajesModel');
                $this->MensajesModel->editar_Mensaje($data);

                return redirect(base_url().'Mensajes');

            }
        }
    }

    public function eliminar(){
        if($this->session->userdata('id')){
            if($get = $this->input->get()){

                $data = array(
                    'id' => $get['id']
                );
                
                $this->load->model('MensajesModel');
                $this->MensajesModel->eliminar_mensaje($data);


                return redirect(base_url().'Mensajes');
            }
        }
    }

    public function buscar(){
        if($this->session->userdata('id')){
            
            if($this->input->is_ajax_request()){
                $post = $this->input->post(NULL, true);

                $this->load->model('MensajesModel');
                $busqueda = $this->MensajesModel->buscarMensaje($post);

                exit(json_encode($busqueda));
            }
        }
    }
}