<?php
namespace App\Controllers;


class HomeController extends Controller
{
    public function index(){
        return $this->render('index');
    }
    public function wikis(){
        return $this->render('wikis');
    }
}