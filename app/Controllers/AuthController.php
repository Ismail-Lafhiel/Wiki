<?php
namespace App\Controllers;


class AuthController extends Controller
{   
    public function signin(){
        return $this->render('auth.signin');
    }
    public function signup(){
        return $this->render('auth.signup');
    }
}