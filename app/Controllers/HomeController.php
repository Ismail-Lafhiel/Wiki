<?php
namespace App\Controllers;


class HomeController extends Controller
{
    public function index(){
        return $this->render('index');
    }
    public function signin(){
        return $this->render('signin');
    }
    public function signup(){
        return $this->render('signup');
    }
}