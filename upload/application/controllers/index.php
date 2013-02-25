<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	private $user;
	private $rootPath;
	private $pageName = 'index';
	
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
			'user'				=>	$this->user,
		);
		$this->render->render($this->pageName, $parameter);
	}
}
?>