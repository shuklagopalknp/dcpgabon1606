<?php 

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
}

class Admin_Controller extends MY_Controller 
{
	var $permission = array();
	public $base_language = 'english';
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		$group_data = array();
		
		if($this->session->userdata('logged_in')) {
		   // echo "dsfds";
			$session_data = array('logged_in' => TRUE);
			$this->session->set_userdata($session_data);
		}
		else {
			$user_id = $this->session->userdata('id');
			//$this->load->model('model_groups');
			//$group_data = $this->model_groups->getUserGroupByUserId($user_id);
			
			//$this->data['user_permission'] = unserialize($group_data['permission']);
			//$this->permission = unserialize($group_data['permission']);
		}
	}

	public function logged_in()
	{
		//echo "<pre>", print_r($session_data['logged_in']), "</pre>";// exit;
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == TRUE) {
			if($this->session->userdata('role') ==1) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==2) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==3) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==4) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==5) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==6) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==7) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==8) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==9) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==10) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==11) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			if($this->session->userdata('role') ==12) {
				redirect($this->session->userdata('posturl'), 'refresh');
			}
			//redirect('admin/Admin_Dashboard', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == FALSE) {
			redirect('Login', 'refresh');
		}
	}

	public function render_template($page = null, $data = array())
	{

		$this->load->view('templates/header',$data);
		$this->load->view('templates/header_menu',$data);
		$this->load->view('templates/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
	}

	public function render_template2($page = null, $data = array())
	{
         $user_id  =  $this->session->userdata('id');

		//$this->db->limit(7);
            $this->db->select('tbl_notifications.*,u.first_name,u.last_name');
            $this->db->join('tbl_user as u','u.id = tbl_notifications.sender_id','inner');
            $this->db->order_by('notification_id','desc');
            $data['notifications'] =  $this->db->get_where('tbl_notifications',array('receiver_id' => $user_id))->result_array();


            $data['unseen_notification'] =  $this->db->get_where('tbl_notifications',array('receiver_id' => $user_id,'seen_status' => 'unseen'))->result_array(); 
		$this->load->view('templates/header-superadmin',$data);
		$this->load->view('templates/header_menu-superadmin',$data);
		$this->load->view('templates/side_menubar-superadmin',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer-superadmin',$data);
	}
	public function simple_template($page = null, $data = array())
	{
		$this->load->view($page, $data);		
	}

	public function company_currency()
	{
		$this->load->model('model_company');
		$company_currency = $this->model_company->getCompanyData(1);
		$currencies = $this->currency();
			
		$currency = '';
		foreach ($currencies as $key => $value) {
			if($key == $company_currency['currency']) {
				$currency = $value;
			}
		}

		return $currency;

	}

	// --------------------------------------------------------------------
	
	/**
	 * Load a language file, with fallback to english.
	 *
	 * @param	mixed	$langfile	Language file name
	 * @param	string	$idiom		Language name (english, etc.)
	 * @param	bool	$return		Whether to return the loaded array of translations
	 * @param 	bool	$add_suffix	Whether to add suffix to $langfile
	 * @param 	string	$alt_path	Alternative path to look for the language file
	 *
	 * @return	void|string[]	Array containing translations, if $return is set to TRUE
	 */
	public function load($langfile, $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '')
	{
		if (is_array($langfile))
		{
			foreach ($langfile as $value)
			{
				$this->load($value, $idiom, $return, $add_suffix, $alt_path);
			}

			return;
		}

		$langfile = str_replace('.php', '', $langfile);

		if ($add_suffix === TRUE)
		{
			$langfile = preg_replace('/_lang$/', '', $langfile) . '_lang';
		}

		$langfile .= '.php';

		if (empty($idiom) OR ! preg_match('/^[a-z_-]+$/i', $idiom))
		{
			$config = & get_config();
			$idiom = empty($config['language']) ? $this->base_language : $config['language'];
		}

		if ($return === FALSE && isset($this->is_loaded[$langfile]) && $this->is_loaded[$langfile] === $idiom)
		{
			return;
		}

		// load the default language first, if necessary
		// only do this for the language files under system/
		$basepath = SYSDIR . 'language/' . $this->base_language . '/' . $langfile;
		if (($found = file_exists($basepath)) === TRUE)
		{
			include($basepath);
		}

		// Load the base file, so any others found can override it
		$basepath = BASEPATH . 'language/' . $idiom . '/' . $langfile;
		if (($found = file_exists($basepath)) === TRUE)
		{
			include($basepath);
		}

		// Do we have an alternative path to look in?
		if ($alt_path !== '')
		{
			$alt_path .= 'language/' . $idiom . '/' . $langfile;
			if (file_exists($alt_path))
			{
				include($alt_path);
				$found = TRUE;
			}
		} else
		{
			foreach (get_instance()->load->get_package_paths(TRUE) as $package_path)
			{
				$package_path .= 'language/' . $idiom . '/' . $langfile;
				if ($basepath !== $package_path && file_exists($package_path))
				{
					include($package_path);
					$found = TRUE;
					break;
				}
			}
		}

		if ($found !== TRUE)
		{
			show_error('Unable to load the requested language file: language/' . $idiom . '/' . $langfile);
		}

		if (!isset($lang) OR ! is_array($lang))
		{
			log_message('error', 'Language file contains no data: language/' . $idiom . '/' . $langfile);

			if ($return === TRUE)
			{
				return array();
			}
			return;
		}

		if ($return === TRUE)
		{
			return $lang;
		}

		$this->is_loaded[$langfile] = $idiom;
		$this->language = array_merge($this->language, $lang);

		log_message('info', 'Language file loaded: language/' . $idiom . '/' . $langfile);
		return TRUE;
	}

	
	public function currency()
	{
		return $currency_symbols = array(
		  'AED' => '&#1583;.&#1573;', // ?
		  'AFN' => '&#65;&#102;',
		  'ALL' => '&#76;&#101;&#107;',
		  'ANG' => '&#402;',
		  'AOA' => '&#75;&#122;', // ?
		  'ARS' => '&#36;',
		  'AUD' => '&#36;',
		  'AWG' => '&#402;',
		  'AZN' => '&#1084;&#1072;&#1085;',
		  'BAM' => '&#75;&#77;',
		  'BBD' => '&#36;',
		  'BDT' => '&#2547;', // ?
		  'BGN' => '&#1083;&#1074;',
		  'BHD' => '.&#1583;.&#1576;', // ?
		  'BIF' => '&#70;&#66;&#117;', // ?
		  'BMD' => '&#36;',
		  'BND' => '&#36;',
		  'BOB' => '&#36;&#98;',
		  'BRL' => '&#82;&#36;',
		  'BSD' => '&#36;',
		  'BTN' => '&#78;&#117;&#46;', // ?
		  'BWP' => '&#80;',
		  'BYR' => '&#112;&#46;',
		  'BZD' => '&#66;&#90;&#36;',
		  'CAD' => '&#36;',
		  'CDF' => '&#70;&#67;',
		  'CHF' => '&#67;&#72;&#70;',
		  'CLP' => '&#36;',
		  'CNY' => '&#165;',
		  'COP' => '&#36;',
		  'CRC' => '&#8353;',
		  'CUP' => '&#8396;',
		  'CVE' => '&#36;', // ?
		  'CZK' => '&#75;&#269;',
		  'DJF' => '&#70;&#100;&#106;', // ?
		  'DKK' => '&#107;&#114;',
		  'DOP' => '&#82;&#68;&#36;',
		  'DZD' => '&#1583;&#1580;', // ?
		  'EGP' => '&#163;',
		  'ETB' => '&#66;&#114;',
		  'EUR' => '&#8364;',
		  'FJD' => '&#36;',
		  'FKP' => '&#163;',
		  'GBP' => '&#163;',
		  'GEL' => '&#4314;', // ?
		  'GHS' => '&#162;',
		  'GIP' => '&#163;',
		  'GMD' => '&#68;', // ?
		  'GNF' => '&#70;&#71;', // ?
		  'GTQ' => '&#81;',
		  'GYD' => '&#36;',
		  'HKD' => '&#36;',
		  'HNL' => '&#76;',
		  'HRK' => '&#107;&#110;',
		  'HTG' => '&#71;', // ?
		  'HUF' => '&#70;&#116;',
		  'IDR' => '&#82;&#112;',
		  'ILS' => '&#8362;',
		  'INR' => '&#8377;',
		  'IQD' => '&#1593;.&#1583;', // ?
		  'IRR' => '&#65020;',
		  'ISK' => '&#107;&#114;',
		  'JEP' => '&#163;',
		  'JMD' => '&#74;&#36;',
		  'JOD' => '&#74;&#68;', // ?
		  'JPY' => '&#165;',
		  'KES' => '&#75;&#83;&#104;', // ?
		  'KGS' => '&#1083;&#1074;',
		  'KHR' => '&#6107;',
		  'KMF' => '&#67;&#70;', // ?
		  'KPW' => '&#8361;',
		  'KRW' => '&#8361;',
		  'KWD' => '&#1583;.&#1603;', // ?
		  'KYD' => '&#36;',
		  'KZT' => '&#1083;&#1074;',
		  'LAK' => '&#8365;',
		  'LBP' => '&#163;',
		  'LKR' => '&#8360;',
		  'LRD' => '&#36;',
		  'LSL' => '&#76;', // ?
		  'LTL' => '&#76;&#116;',
		  'LVL' => '&#76;&#115;',
		  'LYD' => '&#1604;.&#1583;', // ?
		  'MAD' => '&#1583;.&#1605;.', //?
		  'MDL' => '&#76;',
		  'MGA' => '&#65;&#114;', // ?
		  'MKD' => '&#1076;&#1077;&#1085;',
		  'MMK' => '&#75;',
		  'MNT' => '&#8366;',
		  'MOP' => '&#77;&#79;&#80;&#36;', // ?
		  'MRO' => '&#85;&#77;', // ?
		  'MUR' => '&#8360;', // ?
		  'MVR' => '.&#1923;', // ?
		  'MWK' => '&#77;&#75;',
		  'MXN' => '&#36;',
		  'MYR' => '&#82;&#77;',
		  'MZN' => '&#77;&#84;',
		  'NAD' => '&#36;',
		  'NGN' => '&#8358;',
		  'NIO' => '&#67;&#36;',
		  'NOK' => '&#107;&#114;',
		  'NPR' => '&#8360;',
		  'NZD' => '&#36;',
		  'OMR' => '&#65020;',
		  'PAB' => '&#66;&#47;&#46;',
		  'PEN' => '&#83;&#47;&#46;',
		  'PGK' => '&#75;', // ?
		  'PHP' => '&#8369;',
		  'PKR' => '&#8360;',
		  'PLN' => '&#122;&#322;',
		  'PYG' => '&#71;&#115;',
		  'QAR' => '&#65020;',
		  'RON' => '&#108;&#101;&#105;',
		  'RSD' => '&#1044;&#1080;&#1085;&#46;',
		  'RUB' => '&#1088;&#1091;&#1073;',
		  'RWF' => '&#1585;.&#1587;',
		  'SAR' => '&#65020;',
		  'SBD' => '&#36;',
		  'SCR' => '&#8360;',
		  'SDG' => '&#163;', // ?
		  'SEK' => '&#107;&#114;',
		  'SGD' => '&#36;',
		  'SHP' => '&#163;',
		  'SLL' => '&#76;&#101;', // ?
		  'SOS' => '&#83;',
		  'SRD' => '&#36;',
		  'STD' => '&#68;&#98;', // ?
		  'SVC' => '&#36;',
		  'SYP' => '&#163;',
		  'SZL' => '&#76;', // ?
		  'THB' => '&#3647;',
		  'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
		  'TMT' => '&#109;',
		  'TND' => '&#1583;.&#1578;',
		  'TOP' => '&#84;&#36;',
		  'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
		  'TTD' => '&#36;',
		  'TWD' => '&#78;&#84;&#36;',
		  'UAH' => '&#8372;',
		  'UGX' => '&#85;&#83;&#104;',
		  'USD' => '&#36;',
		  'UYU' => '&#36;&#85;',
		  'UZS' => '&#1083;&#1074;',
		  'VEF' => '&#66;&#115;',
		  'VND' => '&#8363;',
		  'VUV' => '&#86;&#84;',
		  'WST' => '&#87;&#83;&#36;',
		  'XAF' => '&#70;&#67;&#70;&#65;',
		  'XCD' => '&#36;',
		  'XPF' => '&#70;',
		  'YER' => '&#65020;',
		  'ZAR' => '&#82;',
		  'ZMK' => '&#90;&#75;', // ?
		  'ZWL' => '&#90;&#36;',
		);
	}
}