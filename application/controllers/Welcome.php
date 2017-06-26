<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	
	protected $groups = array('admin','members');

	public function index()
	{
		$this->template->add_title_segment("Application List");
		$this->template->render("dashboard/dashboard");
	}
}
