<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->template->add_title_segment("Application List");
		$this->template->render("welcome_message");
	}
}
