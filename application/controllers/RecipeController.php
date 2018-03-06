<?php

class RecipeController extends MY_Controller
{
    public function index()
    {
        $this->load->model('RecipeModel');


        $data = array(
            'pageTitle' => "Marmite !!!"
        );

        $this->renderView( 'recipe/main', $data);

    }

}