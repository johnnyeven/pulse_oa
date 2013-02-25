<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('ICrud.php');

class Account extends CI_Model implements ICrud {
	private $accountTable = 'platform_account';
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function count($parameter = null, $extension = null)
	{
		if(!empty($parameter))
		{
			foreach($parameter as $key=>$value)
			{
				$this->db->where($key, $value);
			}
		}
		if(!empty($extension))
		{
			
		}
		return $this->db->count_all_results($this->accountTable);
	}
	
	public function create($row, $autoCreatePass = FALSE)
	{
		if(!empty($row))
		{
			if($autoCreatePass)
			{
				$row['account_pass'] = $this->encrypt_pass('123456');
			}
			if($this->db->insert($this->accountTable, $row))
			{
				return $this->db->insert_id();
			}
			else
			{
				return -1;
			}
		}
		else
		{
			return -1;
		}
	}
	
	public function read($parameter = null, $extension = null, $limit = 0, $offset = 0)
	{
		if(!empty($parameter))
		{
			foreach($parameter as $key=>$value)
			{
				$this->db->where($key, $value);
			}
		}
		if(!empty($extension))
		{
			
		}
		if($limit==0 && $offset==0) {
			$query = $this->db->get($this->accountTable);
		} else {
			$query = $this->db->get($this->accountTable, $limit, $offset);
		}
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function update($id, $row)
	{
		if(!empty($id) && !empty($row))
		{
			$this->db->where('account_id', $id);
			return $this->db->update($this->accountTable, $row);
		}
		else
		{
			return false;
		}
	}
	
	public function delete($id)
	{
		if(!empty($id))
		{
			$this->db->where('account_id', $id);
			return $this->db->delete($this->accountTable);
		}
		else
		{
			return false;
		}
	}
	
	private function encrypt_pass($pass) {
		$this->load->helper('security');
		return encrypt_pass($pass);
	}
}

?>