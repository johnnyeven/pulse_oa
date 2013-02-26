<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('ICrud.php');

class Mpay extends CI_Model implements ICrud {
	private $accountTable = 'platform_pay';
	
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
	
	public function create($row)
	{
		$payCount = 0;
		if(!empty($row))
		{
			if(count($row) > 1 && is_array($row[0]))
			{
				for($i=0; $i<count($row); $i++)
				{
					if($this->db->insert($this->accountTable, $row[$i]))
					{
						$payCount++;
					}
				}
				return $payCount;
			}
			else
			{
				if($this->db->insert($this->accountTable, $row))
				{
					$payCount++;
				}
				return $payCount;
			}
		}
		else
		{
			return $payCount;
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
}

?>