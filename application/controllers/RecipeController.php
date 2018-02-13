<?php

class RecipeController extends MY_Controller
{
    public function index()
    {
        $this->load->model('RecipeModel');

        $recipe = $this->RecipeModel->getRecipeById(1, true);

        $data = array(
            'pageTitle' => "Marmite !!!"
        );

        $this->renderView( view: 'recipe/main', $data);

    }

    /**
     * get a recipe
     * 
     * @param int $id
     */
    public function recipe(int $id){...}