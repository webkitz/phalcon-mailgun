<?php



class IndexController extends ControllerBase
{

    /**
     * @description initialize
     */
    public function initialize()
    {
        $this->loginCheck();
    }
    /**
     * Display Login View
     */
    public function indexAction()
    {

        //add our javaScript file
        $this->assets->addJs('js/index.js');
    }



}

