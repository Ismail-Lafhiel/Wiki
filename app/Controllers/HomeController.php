<?php
namespace App\Controllers;
use App\Models\Wiki;


class HomeController extends Controller
{
    public function index()
    {
        $categorieController = new CategorieController();
        $latestCategories = $categorieController->latest();

        $wikiController = new WikiController();
        $latestWikis = $wikiController->latestWikis();

        return $this->render('index', ['latestCategories' => $latestCategories, 'latestWikis' => $latestWikis]);
    }


    public function dashboard()
    {
        return $this->render('dashboard');
    }
    public function wikis()
    {
        $Wiki = new Wiki;
        $allWikis = $Wiki->allWithUserCategoryAndTags();
        return $this->render('wikis', ['allWikis' => $allWikis]);
    }
    public function editProfile()
    {
        return $this->render('editProfile');
    }
    public function notAllowed()
    {
        return $this->render('not_allowed');
    }
}