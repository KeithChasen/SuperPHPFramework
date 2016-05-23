<?php
namespace Framework;

class Auth
{


    public static function getIdentity()
    {
        $session = Session::getInstance();
        return $session->get('useridentity');
    }

    public static function setIdentity($data)
    {
        $session = Session::getInstance();
        $session->set('useridentity', $data);
    }


}