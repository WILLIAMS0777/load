<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		// $this->load->database();
		// $query = $this->db->query('select * from countries');
		// echo "<pre>";
		// echo print_r($query->result());
		// echo "</pre>";
		



		$this->load->helper("url");
		// echo base_url();
		$this->load->model('welcome_model');
		// $countries = $this->welcome_model->getCountry(0);
		// $countries = $this->welcome_model->getCountry(1);
		 $countries = $this->welcome_model->getCountry(2);

		// exit;
		 echo var_dump($countries);

		$this->load->view('welcome_message');
	}
	public function getCountry(){
		$page = $_GET['page'];
		$this->load->model('welcome_model');
		$countries = $this->welcome_model->getCountry($page);

		// echo var_dump($countries);
	
		foreach ($countries as $country) {
			echo "<tr><td>".$country->id."</td><td>".$country->country_name."</td><td>".$country->country_code."</td></tr>";
		}
		exit;
	}

}
