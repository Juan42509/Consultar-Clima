<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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

			$view = $this->load->view('layouts/content','',true);
			$this->getTemplate($view);

		}else{
			return redirect(base_url());
		}
		
	}

	public function registro(){

		if($post = $this->input->post()){

			$datos = array(
				'nombre' => $post['nombre'],
				'apellidos' => $post['apellidos'],
				'email' => $post['email'],
				'password' => $post['password']
			);
			
			$this->load->model('UsuarioModel');
			$this->UsuarioModel->insertUsuarios($datos);

			return redirect(base_url());
		}
	}

	public function inicio(){

		if($post = $this->input->post()){

			$this->load->model('UsuarioModel');
			$user = $this->UsuarioModel->login($post);
			if($user){
				if($user[0]->password === $post['password']){

					$UserVerify = array(
						'id' => $user[0]->id,
						'nombre' => $user[0]->nombre,
						'apellidos' => $user[0]->apellidos,
						'email' => $user[0]->email,
						'rol' => $user[0]->rol
					);
					
					$this->session->set_userdata($UserVerify);

					// var_dump();

					if($this->session->userdata()){
						return redirect(base_url().'Usuario');
					}
				}else{
					return redirect(base_url());
				}
			}else{
				return redirect(base_url());
			}
		}else{
			return redirect(base_url());
		}
	}

	public function logout(){

		$this->session->sess_destroy();

		return redirect(base_url());
	}

	public function editar(){
		if($this->session->userdata('id')){

			$view = $this->load->view('usuario/editar','',true);
			$this->getTemplate($view);
		}
	}

	public function save(){
		if($this->session->userdata('id')){
			if($post = $this->input->post()){
				
				$data = array(
					'id' => $post['id'],
					'nombre' => $post['nombre'],
					'apellidos' => $post['apellidos'],
					'email' => $post['email']
				);

				$this->load->model('UsuarioModel');
				$this->UsuarioModel->editar_usuario($data);

				$this->session->unset_userdata('userdata');
				$this->session->set_userdata($data);

				return redirect(base_url().'Usuario');
			}
		}
	}

}
