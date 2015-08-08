<?php

use Phalcon\Mvc\Controller;

//extend ControllerBase to include login checks in other controllers when needed

class ControllerBase extends Controller
{
    //constructor or onConstruct can be used
    public function initialize(){}

    /**
     * @description check user is logged in otherwise redirect to /LoginController
     * @return void or redirects to login page
     */
    public function loginCheck(){

        if (!Sentry::check())
        {
            // User is not logged in, or is not activated
            $this->view->disable();
            $this->response->redirect('login');
        }
    }

    /**
     * @description if logged in will logout session and redirect to /index
     * @return void or redirects to login page
     */
    public function logoutAction()
    {

        if (Sentry::check()){
            Sentry::logout();
            return $this->response->redirect('index');
        }

    }


}
