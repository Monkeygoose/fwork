<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resource extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');

    }

    public function css() {

        $segments = $this->uri->segment_array();
        array_shift($segments);   // remove the first
        array_shift($segments);   // remove the second
        $content['stylesheet'] = $segments[0] . ".php";  //e.g. main.css.php

        $content['data'] = array(); 

        $this->load->view('resources/css.php', $content);        

    }

    public function js(){

        $segments = $this->uri->segment_array();
        array_shift($segments);   // remove the first
        array_shift($segments);   // remove the second
        $content['script'] = $segments[0] . ".php";  //e.g. main.js.php

        $content['data'] = array(); 

        $this->load->view('resources/js.php', $content);

    }

}

?>