<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends MY_Model {
    
    public function __construct()
	{
        $this->table = 'customers';
        $this->primary_key = 'customer_id';
		parent::__construct();
	}
        
}