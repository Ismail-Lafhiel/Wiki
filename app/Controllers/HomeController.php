<?php
namespace App\Controllers;

use App\Models\Categorie;
use App\Models\Statistics;
use App\Models\Tag;
use App\Models\User;
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
        $wikis_statistics = new Wiki();
        $users_statistics = new User();
        $tags_statistics = new Tag();
        $categories_statistics = new Categorie();

        $numberOfWikis = $wikis_statistics->countWikis();
        $numberOfUsers = $users_statistics->countUsers();
        $numberOfTags = $tags_statistics->countTags();
        $numberOfCategories = $categories_statistics->countCategories();

        return $this->render('dashboard', [
            'numberOfWikis' => $numberOfWikis,
            'numberOfUsers' => $numberOfUsers,
            'numberOfTags' => $numberOfTags,
            'numberOfCategories' => $numberOfCategories
        ]);
    }
    public function wikis()
    {
        $Wiki = new Wiki;

        if (isset($_GET['searchTerm'])) {
            $searchTerm = $_POST['searchTerm'];
            $wikis = $Wiki->searchWiki($searchTerm);
            header('Content-Type: application/json');
            echo json_encode($wikis);
        } else {
            $allWikis = $Wiki->allWithUserCategoryAndTags();
        }
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