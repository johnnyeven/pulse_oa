<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {

	private $user;
	private $rootPath;
	private $pageName = 'admin/accounts';
	
	public function __construct()
	{
		parent::__construct();
		$this->rootPath = $this->config->item('root_path');
		
		$this->load->model('utils/check_admin', 'check');
		$this->user = $this->check->validate();
		
		$this->load->helper('url');
		$this->load->model('account');
	}
	
	public function index()
	{
		$page = $this->input->get('page', TRUE);
		/**
		 * 
		 * 分页程序
		 * @novar
		 */
		$rowTotal = $this->account->count();
		$itemPerPage = $this->config->item('pagination_per_page');
		$pageTotal = intval($rowTotal/$itemPerPage);
		if($rowTotal%$itemPerPage) $pageTotal++;
		if($pageTotal > 0) {
			if(empty($page) || !is_numeric($page) || intval($page) < 1) {
				$page = 1;
			} elseif($page > $pageTotal) {
				$page = $pageTotal;
			} else {
				$page = intval($page);
			}
			$offset = $itemPerPage * ($page - 1);
		} else {
			$offset = 0;
		}
		$result = $this->account->read(null, null, $itemPerPage, $offset);
	}
}
?>