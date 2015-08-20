<?php



class IndexController extends ControllerBase
{
    /**
     * @description __construct
     */
    public function onConstruct()
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

