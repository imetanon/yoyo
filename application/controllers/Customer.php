<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {
	
	protected $groups = array('admin','members');
	protected $models = array('customer');

	public function index()
	{
		$this->template->add_title_segment("Customer List");
		$this->template->render("customer/customer");
	}
	
	
	public function fetchData()
	{
		$result = array('data' => array());

		$data = $this->customer->get_all();
		
		foreach ($data as $key => $value) {
			// button
			$buttons = '
			<a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" data-toggle="modal" data-target="#editModal" onclick="editModal('.$value->customer_id.')">
            	<i class="fa fa-edit fa-lg"></i>
            </a>
            <a rel="tooltip" title="Remove" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">
            	<i class="fa fa-remove fa-lg"></i>
            </a>
			';

			$result['data'][$key] = array(
				'id' => $value->customer_id,
				'name' => $value->customer_name,
				'type' => $value->customer_type,
				'credit' => $value->customer_credit,
				'actions' => $buttons
			);
		} // /foreach

		echo json_encode($result);
	}
	
	public function create()
	{
		$validator = array('success' => false, 'messages' => array());

		$config = array(
		    array(
		        'field' => 'customerName',
		        'label' => 'Customer',
		        'rules' => 'trim|required|htmlspecialchars|is_unique[customers.customer_name]'
		    )
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {

			
			$data = array(
		        'customer_name' => $this->input->post('customerName'),
		        'customer_type' => $this->input->post('customerType'),
		        'customer_credit' => $this->input->post('customerCredit'),
		    );
		    
		    $create = $this->customer->insert($data);

			if($create === false) {
				$validator['success'] = false;
				$validator['messages'] = "Error while updating the infromation";
			} else {
				$validator['success'] = true;
				$validator['messages'] = "Successfully added";
			}			
		} 
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);	
			}			
		}

		echo json_encode($validator);
	}
	
	public function getInfo($id = null) 
	{
		if($id) {
			$data = $this->customer->get($id);
			echo json_encode($data);
		}else{
			show_404();
		}
	}
	
	public function edit($id = null)
	{
		if($id){
			$validator = array('success' => false, 'messages' => array());

			$config = array(
				array(
			        'field' => 'editCustomerName',
			        'label' => 'Customer',
			        'rules' => 'trim|required|htmlspecialchars'
			    )
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
	
			if($this->form_validation->run() === true) {
	
				$data = array(
			        'customer_name' => $this->input->post('editCustomerName'),
			        'customer_type' => $this->input->post('editCustomerType'),
			        'customer_credit' => $this->input->post('editCustomerCredit'),
			    );
			    
			    $edit = $this->customer->update($data,$id);
	
				if($edit === false) {
					$validator['success'] = false;
					$validator['messages'] = "Error while updating the infromation";
				} else {
					$validator['success'] = true;
					$validator['messages'] = "Successfully updated";
				}			
			} 
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);	
				}			
			}
	
			echo json_encode($validator);
		}else{
			show_404();
		}
	}
}
