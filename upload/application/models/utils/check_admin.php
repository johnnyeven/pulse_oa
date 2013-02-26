<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Check_admin extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('account');
	}
	
	public function validate($redirect = true) {
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->helper('cookie');
		$redirectUrl = 'login?redirect=' . urlencode($this->input->server('REQUEST_URI'));
		$cookieName = $this->config->item('cookie_prefix') . 'user';
		if(!$this->input->cookie($cookieName, TRUE)) {

			if($redirect)
				showMessage(MESSAGE_TYPE_ERROR, 'USER_CHECK_EXPIRED', '', $redirectUrl, true, 5);
			
		} else {
			$cookie = $this->input->cookie($cookieName, TRUE);
			$this->load->helper('ucenter_sync');
			$cookie = _authcode($cookie);
			$json = json_decode($cookie);
			$parameter = array(
				'account_id'	=>	$json->account_id
			);
			$result = $this->account->read($parameter);
			if($result != FALSE) {
				if($result[0]->account_level == '999')
				{
					return $result[0];
				}
				else
				{
					showMessage(MESSAGE_TYPE_ERROR, 'USER_CHECK_NO_PERMISSION', '', $redirectUrl, true, 5);
				}
			} else {

				$this->resetCookie();
				if($redirect)
				{
					showMessage(MESSAGE_TYPE_ERROR, 'USER_CHECK_INVALID', '', $redirectUrl, true, 5);
				}
				
			}
		}
	}
	
	private function resetCookie()
	{
		$this->load->helper('cookie');
		$cookie = array(
			'name'		=> 'user',
			'domain'	=> $this->config->item('cookie_domain'),
			'path'		=> $this->config->item('cookie_path'),
			'prefix'		=> $this->config->item('cookie_prefix')
		);
		delete_cookie($cookie);
	}
}
?>