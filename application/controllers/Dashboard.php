<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $this->load->view('template/dashboard/header');
		$this->load->view('dashboard/index');
        $this->load->view('template/dashboard/footer');
	}
}
?>