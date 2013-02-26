<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_number extends CI_Controller {

	private $user;
	private $rootPath;
	private $pageName = 'user/account_number';
	
	public function __construct()
	{
		parent::__construct();
		$this->rootPath = $this->config->item('root_path');
		
		$this->load->model('utils/check_user', 'check');
		$this->user = $this->check->validate();
	}
	
	public function index()
	{
		$this->load->model('utils/render');
		
		$parameter = array(
			'page_name'	=>	$this->pageName,
			'user'				=>	$this->user
		);
		$this->render->render($this->pageName, $parameter);
	}
	
	public function submit()
	{
		$this->load->helper('url');
		
		$accountNumber = $this->input->post('accountNumber', TRUE);
		
		if(empty($accountNumber) || !is_numeric($accountNumber))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'USER_NUMBER_ERROR_FORMAT', '', 'user/account_number', true, 5);
		}
		else
		{
			$this->load->model('account');
			
			$parameter = array(
				'account_number'	=>	$accountNumber
			);
			$result = $this->account->read($parameter);
			
			if($result != FALSE)
			{
				showMessage(MESSAGE_TYPE_ERROR, 'USER_NUMBER_ERROR_EXIST', '', 'user/account_number', true, 5);
			}
			else
			{
				$this->account->update($this->user->account_id, $parameter);
				showMessage(MESSAGE_TYPE_SUCCESS, 'USER_NUMBER_SUCCESS', '', 'user/account_number', true, 5);
			}
		}
	}
}
?>