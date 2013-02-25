<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $pageName = 'login';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
	}
	
	public function index()
	{
		$redirectUrl = $this->input->get('redirect', TRUE);

		$this->load->model('utils/check_user', 'check');
		$user = $this->check->validate(false);
		if(!empty($user))
		{
			if(!empty($redirectUrl))
			{
				redirect(urldecode($redirectUrl));
			}
			else
			{
				redirect('index');
			}
		}
		else
		{
			$this->load->view($this->pageName);
		}
	}
	
	public function submit()
	{
		$redirectUrl = $this->input->post('redirect', TRUE);
		$accountName = $this->input->post('accountName', TRUE);
		$accountPass = $this->input->post('accountPass', TRUE);
		$cookieRemain = $this->input->post('cookieRemain', TRUE);
		$isAjaxRequest = $this->input->post('isAjaxRequest', TRUE);
		
		if(!empty($accountName) && !empty($accountPass))
		{
			$this->load->model('account');
			$this->load->model('utils/logs');
			$this->load->helper('security');
			
			$parameter = array(
				'account_name'		=>	$accountName,
				'account_pass'		=>	encrypt_pass($accountPass)
			);
			$result = $this->account->read($parameter);
			
			if($result === FALSE)
			{
				$this->logs->write(array(
					'log_type'		=>	'USER_INVALID',
					'user_name'	=>	$accountName
				));
				showMessage(MESSAGE_TYPE_ERROR, 'USER_INVALID', '', 'login?redirect=' . $redirectUrl, true, 5);
			}
			else
			{
				$row = $result[0];
				$cookie = array(
					'account_id'		=>		$row->account_id,
					'account_name'	=>		$accountName
				);
				$cookieStr = json_encode($cookie);
				$this->load->helper('ucenter_sync');
				$cookieStr = _authcode($cookieStr, 'ENCODE');
	
				$this->load->helper('cookie');
				$cookie = array(
						'name'		=> 'user',
						'value'		=> $cookieStr,
						'expire'		=> $this->config->item('cookie_expire'),
						'domain'	=> $this->config->item('cookie_domain'),
						'path'		=> $this->config->item('cookie_path'),
						'prefix'		=> $this->config->item('cookie_prefix')
				);
				if($cookieRemain=='1') {
					$cookie['expire'] = strval(intval($this->config->item('cookie_expire')) * 30);
				}
	            $this->input->set_cookie($cookie);
	            
	            $this->account->update($row->account_id, array(
	            	'account_lastlogin'	=>	time()
	            ));
				$this->logs->write(array(
					'log_type'		=>	'USER_LOGIN',
					'user_name'	=>	$accountName
				));
				
				if($isAjaxRequest == '1') {
					$parameter = array(
						'message'		=>	'USER_LOGIN',
						'user'				=>	$row
					);
					echo json_encode($parameter);
				} else {
					$redirectUrl = empty($redirectUrl) ? 'index' : $redirectUrl;
 					showMessage(MESSAGE_TYPE_SUCCESS, 'USER_LOGIN_SUCCESS', '', $redirectUrl, true, 5);
				}
			}
		}
		else
		{
			showMessage(MESSAGE_TYPE_ERROR, 'USER_LOGIN_ERROR_NO_PARAM', '', 'login?redirect=' . $redirectUrl, true, 5);
		}
	}
	
	public function out()
	{
		$this->load->helper('cookie');
		
		$cookie = array(
			'name'		=> 'user',
			'domain'	=> $this->config->item('cookie_domain'),
			'path'		=> $this->config->item('cookie_path'),
			'prefix'		=> $this->config->item('cookie_prefix')
		);
		delete_cookie($cookie);
 		showMessage(MESSAGE_TYPE_SUCCESS, 'USER_LOGOUT', '', 'index', true, 5);
	}
}
?>