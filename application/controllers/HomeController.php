<?php

class HomeController extends MY_Controller
{
    public function index()
    {
        $this->load->model('HomeModel');


        $data = array(
            'pageTitle' => "Marmite !!!"
        );

        $this->renderView( 'home/main', $data);

    }

}