<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_pay extends CI_Controller {

	private $user;
	private $rootPath;
	private $pageName = 'admin/import_pay';
	
	public function __construct()
	{
		parent::__construct();
		$this->rootPath = $this->config->item('root_path');
		
		$this->load->model('utils/check_admin', 'check');
		$this->user = $this->check->validate();
		
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->model('utils/render');
		
		$parameter = array(
			'page_name'	=>	$this->pageName,
			'user'				=>	$this->user,
		);
		$this->render->renderAdmin($this->pageName, $parameter);
	}
	
	public function submit()
	{
		$this->load->library('ExcelAdapter');
	
		$uploadDir = $this->config->item('upload_dir');
		$uploadStorePath = $uploadDir;
		$error = "";
		$msg = "";
		$fileElementName = 'fileField';
		$el = $this->input->get('el', TRUE);
		if($el) {
			$fileElementName = $el;
		}
	
		$config['upload_path'] = $uploadStorePath;
		$config['allowed_types'] = 'xls|xlsx';
		$config['encrypt_name'] = TRUE;
	
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($fileElementName)) {
			$this->upload->display_errors('<stronng>', '</stronng>');
			$error = $this->upload->display_errors();
		} else {
			$data = $this->upload->data();
			$fileName = $this->root_path . $uploadDir . '/' . $data['file_name'];
		}
	
		// 		$ret = '{';
		// 		$ret .= "	error:\"{$error}\",";
		// 		$ret .= "	msg:\"{$msg}\",";
		// 		$ret .= "	data:\"{$fileName}\",";
		// 		$ret .= "	width:{$data['image_width']},";
		// 		$ret .= "	height:{$data['image_height']}";
		// 		$ret .= '}';
		// 		exit($ret);
	
		$result = $this->exceladapter->ParseExcel($fileName);
		$result = $this->exceladapter->RemoveNull($result);
		
		$year = $this->input->post('payYear', TRUE);
		$month = $this->input->post('payMonth', TRUE);
		$currentMonth = "{$year}-{$month}-1";
		
		$this->load->model('account');
		$totalCount = count($result);
		$successCount = 0;
		for($i=0; $i<$totalCount; $i++)
		{
			$result[$i]['date'] = $currentMonth;
			$row = array(
				'account_name'		=>	$result[$i]['account_name'],
				'account_department'=>	$result[$i]['account_department']
			);
			$result[$i]['account_id'] = $this->account->create($row, TRUE);
				
			if($result[$i]['account_id'] == -1)
			{
				$accountResult = $this->account->read($row);
				$result[$i]['account_id'] = $accountResult[0]->account_id;
			}
			else
			{
				$successCount++;
			}
		}
	
		$this->load->model('mpay');
		$payCount = $this->mpay->create($result);
		
		$message = "<span style='font-size:14px;font-weight:bold;'>本次总共读取 {$totalCount} 条记录，新增用户 {$successCount} 个，新增工资信息 {$payCount} 条</span>";
		showMessage(MESSAGE_TYPE_SUCCESS, 'ADMIN_IMPORT_PAY_SUCCESS', $message, 'admin/import_pay', true, 5);
	}
}
?>