<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
    * Helpers to render composite view
    * @param $view
    * @param array $data
    */

    public function renderView($view, $data = array()){
        $_data = array(
            'siteTitle' => $this->config->item('siteTitle'),
            'pageTitle' => $this->config->item('pageTitle'),
        );

        $_data = array_merge($_data, $data);

        $this->load->view('global/header', $_data);
        $this->load->view($view, $_data);
        $this->load->view('global/footer');
    }
}
?>