<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_page_model extends MY_Model {
    
    public function __construct()
	{
        $this->table = 'setting_pages';
        $this->primary_key = 'setting_page_id';
		parent::__construct();
	}
        
}