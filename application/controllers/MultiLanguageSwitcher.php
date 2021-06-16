<?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
     
    /**
     * @package Contact :  CodeIgniter Multi Language Switcher
     *
     * @author TechArise Team
     *
     * @email  info@techarise.com
     *   
     * Description of Multi Language Switcher Controller
     */
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
     
    class MultiLanguageSwitcher extends Admin_Controller
    {
        public function __construct() {
            parent::__construct();     
        }
        // create language Switcher method
        function switch($language = "") {        
            $language = ($language != "") ? $language : "english";
            $this->session->set_userdata('site_lang', $language);
            $this->load($this->session->userdata('site_lang')); 
            redirect($_SERVER['HTTP_REFERER']);        
        }
    }
    ?>