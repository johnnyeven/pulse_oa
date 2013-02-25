<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index1 extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('index');
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
// 			$msg = '上传成功！';
// 			$error = 'null';
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
		
		$this->load->model('account');
		for($i=0; $i<count($result); $i++)
		{
			$result[$i]['date'] = '2013-02-02';
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
		}
		
		$this->load->model('pay');
		$this->pay->create($result);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */