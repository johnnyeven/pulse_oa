<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Render extends CI_Model
{
	/**
	 * 
	 * 渲染器
	 * 
	 * 提供页面最终渲染的拼接操作
	 * 
	 * @author Johnny EVEN
	 * @version Pulse utils/render.php - 1.0.1.20130123 17:32
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	public function render($pageName = null, $data = null)
	{
		$this->load->helper('url');
		
		$header = $this->load->view('std_header', $data, true);
		$top = $this->load->view('std_top', $data, true);
		$nav = $this->load->view('std_nav', $data, true);
		$content = $this->load->view($pageName, $data, true);
		$sidebar = $this->load->view('std_sidebar', $data, true);
		$footer = $this->load->view('std_footer', $data, true);
		
		$value = array(
			'std_header'	=>	$header,
			'std_top'		=>	$top,
			'std_nav'		=>	$nav,
			'std_content'	=>	$content,
			'std_sidebar'	=>	$sidebar,
			'std_footer'	=>	$footer
		);
		$this->load->view('std_frame', $value);
	}
	
	public function renderAdmin($pageName = null, $data = null)
	{
		$this->load->helper('url');
	
		$header = $this->load->view('admin/std_header', $data, true);
		$top = $this->load->view('admin/std_top', $data, true);
		$nav = $this->load->view('admin/std_nav', $data, true);
		$content = $this->load->view($pageName, $data, true);
		$sidebar = $this->load->view('admin/std_sidebar', $data, true);
		$footer = $this->load->view('admin/std_footer', $data, true);
	
		$value = array(
				'std_header'	=>	$header,
				'std_top'		=>	$top,
				'std_nav'		=>	$nav,
				'std_content'	=>	$content,
				'std_sidebar'	=>	$sidebar,
				'std_footer'	=>	$footer
		);
		$this->load->view('admin/std_frame', $value);
	}
}
?>