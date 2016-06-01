<?php

class LoginReturnUrlTracker extends CApplicationComponent
{

    public function init()
    {
        parent::init();

        $action = Yii::app()->getUrlManager()->parseUrl(Yii::app()->getRequest());

        // Certain actions should not be returned to after login
        if ($action == "index.php/user/error") {
            return true;
        }
        if ($action == "index.php/user/logout") {
            return true;
        }
        if ($action == "index.php/user/login") {
            return true;
        }

        // Keep track of the most recently visited valid url
        Yii::app()->user->returnUrl = Yii::app()->request->url;

    }

}