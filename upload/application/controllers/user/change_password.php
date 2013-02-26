<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_password extends CI_Controller {

	private $user;
	private $rootPath;
	private $pageName = 'user/change_password';
	
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
		$this->load->model('account');

		$parameter = array(
				'page_name'	=>	$this->pageName,
				'user'				=>	$this->user
		);
		$this->render->render($this->pageName, $parameter);
	}
	
	public function submit()
	{
		$this->load->helper('security');
		$this->load->helper('url');
		$this->load->model('account');
		
		$orignalPass = $this->input->post('orignalPass', TRUE);
		$newPass = $this->input->post('newPass', TRUE);
		
		$result = $this->account->read(array(
			'account_id'	=>	$this->user->account_id
		));
		if($result[0]->account_pass != encrypt_pass($orignalPass))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'USER_CHANGEPASS_ERROR', '', 'user/change_password', true, 5);
		}
		else
		{
			$newPass = encrypt_pass($newPass);
			$row = array(
				'account_pass'					=>	$newPass,
				'recommand_change_pass'	=>	0
			);
			$this->account->update($this->user->account_id, $row);
			showMessage(MESSAGE_TYPE_SUCCESS, 'USER_CHANGEPASS_SUCCESS', '', 'user/change_password', true, 5);
		}
	}
}
?>