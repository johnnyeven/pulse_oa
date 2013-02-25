<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pay extends CI_Controller {

	private $user;
	private $rootPath;
	private $pageName = 'user/pay';
	
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
		$this->load->model('mpay');
		
		$parameter = array(
			'account_name'			=>	$this->user->account_name,
			'account_department'	=>	$this->user->account_department
		);
		$result = $this->mpay->read($parameter, null);
		
		$parameter = array(
			'page_name'	=>	$this->pageName,
			'user'				=>	$this->user,
			'result'			=>	$result
		);
		$this->render->render($this->pageName, $parameter);
	}
}
?>