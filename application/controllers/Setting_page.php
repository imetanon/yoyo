<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_page extends MY_Controller {
	
	protected $groups = array('admin');
	protected $models = array('setting_page');

	public function index()
	{
		$this->template->add_title_segment("Setting Page");
		$this->template->render("setting/page");
	}
	
	public function fetchData()
	{
		$result = array('data' => array());

		$data = $this->setting_page->get_all();
		
		foreach ($data as $key => $value) {
			// button
			$buttons = '
			<a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="javascript:void(0)">
            	<i class="fa fa-edit fa-lg"></i>
            </a>
            <a rel="tooltip" title="Remove" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">
            	<i class="fa fa-remove fa-lg"></i>
            </a>
			';

			$result['data'][$key] = array(
				'id' => $value->setting_page_id,
				'name' => $value->setting_page_name,
				'link' => $value->setting_page_link,
				'controller' => $value->setting_page_controller,
				'group' => $value->setting_page_group,
				'actions' => $buttons
			);
		} // /foreach

		echo json_encode($result);
	}
	
}
