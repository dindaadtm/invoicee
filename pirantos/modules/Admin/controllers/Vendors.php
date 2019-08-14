<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *"); 

class Vendors extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// $admin_auth = $this->session->userdata('admin_auth');
		// if(!$admin_auth){
		// 	redirect(base_url('authenticate'));
		// }
	}

	public function index()
	{ 
		$data['konten'] = $this->load->view('vendor/data', NULL, TRUE);
		$this->load->view ('admin/main_admin', $data);
	}
	public function data()
	{ 
		$data['konten'] = $this->load->view('vendor/data', NULL, TRUE);
		$this->load->view ('admin/main_admin', $data);
	}
	public function add()
	{ 
		$data['konten'] = $this->load->view('vendor/add', NULL, TRUE);
		$this->load->view ('admin/main_admin', $data);
	}
	public function detail()
	{ 
		$data['konten'] = $this->load->view('vendor/detail', NULL, TRUE);
		$this->load->view ('admin/main_admin', $data);
	}
	public function edit()
	{ 
		$data['konten'] = $this->load->view('vendor/edit', NULL, TRUE);
		$this->load->view ('admin/main_admin', $data);
	}
	// public function insert_data_checker()
	// {
	// 	$feedback 		= array();
	// 	$data 			= $this->input->post();
	// 	$data['upass'] 	= paramEncrypt($data['password']); 
	// 	$table_name 	= $data['table_name'];
	// 	$checker 		= 'clear';
	// 	foreach($data['checker'] as $check){
	// 		$this->db->where($check, $data[$check]);
	// 		$check_result = $this->db->get($table_name)->row();
	// 		if(count($check_result)>0){
	// 			$feedback['msg'] = $check;
	// 			$checker = 'fail';
	// 		}
	// 	}
	// 	unset($data['password']);
	// 	unset($data['table_name']);
	// 	unset($data['checker']);

	// 	if($checker=='clear'){
	// 		$insert = $this->db->insert($table_name, $data);
	// 		if($insert){
	// 			$feedback['msg'] = 'success';
	// 		} else{
	// 			$feedback['msg'] = 'fail';
	// 		}
	// 	}
	// 	echo json_encode($feedback);
	// }\
	
	public function insert_data(){
		$data = $this->input->post();

		$data_insert = $this->db->insert('data_vendor', $data);
		if ($data_insert) {
			$feedback['msg'] = 'success';
		}else {
			$feedback['msg'] = 'Fail';			
		}
		echo json_encode($feedback);
	}

	public function edit_data()
	{
		$data = $this->input->post();
		$id = $data['id'];

		unset($data['id']);
		//unset($data['foto_file']);
		$this->db->where('id', $id);
		$data_insert = $this->db->update('data_vendor', $data);
		if ($data_insert) {
			$data_feed['msg'] = 'success';
		}else{
			$data_feed['msg'] = 'fail'; 
		}

		echo json_encode($data_feed);
	}

	// public function update_data(){
	// 	$data = $this->input->post();
	// 	// $date = date('ymhs');
	// 	$id = $data['id'];
	// 	if(move_uploaded_file(
	// 		$_FILES['foto_file']['tmp_name'],
	// 		'./prabotan/image/photo/'.'photo'.'.'.pathinfo($_FILES['foto_file']['name'], PATHINFO_EXTENSION)
	// 	))
	// 	{ 	
	// 		$path = './prabotan/image/photo'.$data['photo'];
	// 		if(is_file($path)){
	// 			unlink($path);
	// 		}
	// 		$file = 'photo'.'.'.pathinfo($_FILES['foto_file']['name'], PATHINFO_EXTENSION);
	// 		$data['photo'] = $file;
	// 	}

	// 	unset($data['id']);
	// 	unset($data['foto_file']);
	// 	$this->db->where('id', $id);
	// 	$data_update = $this->db->update('data_user', $data);
	// 	if ($data_update) {
	// 		$data_feed['msg'] = 'success';
	// 	}else{
	// 		$data_feed['msg'] = 'fail'; 
	// 	}

	// 	echo json_encode($data_feed);
	// }

	// public function edit_data_checker()
	// {
	// 	$feedback = array();
	// 	$data = $this->input->post();
	// 	$where_value 	= $data['where_value'];
	// 	$where_field 	= $data['where_field'];
	// 	$table_name 	= $data['table_name'];
	// 	$data['upass'] 	= paramEncrypt($data['password']); 
	// 	if($where_field && $where_field != '' && $where_value && $table_name){
	// 		unset($data['where_field']);
	// 		unset($data['where_value']);
	// 		unset($data['table_name']);
	// 		unset($data['password']);

	// 		$checker = 'clear';

	// 		foreach($data['checker'] as $check){
	// 			$this->db->where($where_field.'!= ',$where_value);
	// 			$this->db->where($check, $data[$check]);
	// 			$check_result = $this->db->get($table_name)->row();
	// 			if(count($check_result)>0){
	// 				$feedback['msg'] = $check.'_fail';
	// 				$checker = 'fail';
	// 			}
	// 		}
	// 		unset($data['table_name']);
	// 		unset($data['checker']);

	// 		if($checker=='clear'){
	// 			$this->db->where($where_field, $where_value);
	// 			$update = $this->db->update($table_name, $data);
	// 			if($update){
	// 				$feedback['msg'] = 'success';
	// 			} else{
	// 				$feedback['msg'] = 'fail';
	// 			}
	// 		}
	// 	}else{
	// 		$feedback['msg'] = 'fail_query';
	// 	}
	// 	echo json_encode($feedback);
	// }
	public function delete_data()
	{
		$feedback = array();
		$data = $this->input->post();
		$where_value = $data['where_value'];
		$where_field = $data['where_field'];
		$table_name = $data['table_name'];
		if($where_field){
			$this->db->where($where_field, $where_value);
		}
		$delete = $this->db->delete($table_name);
		if($delete){
			$feedback['msg'] = 'success';
		} else{
			$feedback['msg'] = 'fail';
		}
		echo json_encode($feedback);
	}

	
}
