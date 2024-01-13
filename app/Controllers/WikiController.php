<?php
namespace App\Controllers;

use App\Models\Categorie;
use App\Models\User;
use App\Models\Wiki;

class WikiController extends Controller
{
    protected $wiki;

    public function __construct()
    {
        $this->wiki = new Wiki();
    }
    public function index()
    {
        $wikis = $this->wiki->allWithUserCategoryAndTags();
        // dump($wikis);
        return $this->render('wikis.index', ['wikis' => $wikis]);
    }
    public function show($id)
    {
        $wiki = $this->wiki->find($id);
        $user = (new User())->find($wiki['user_id']);
        $wiki['user_name'] = $user['user_name'];
        $wiki['role'] = $user['role'];

        $category = (new Categorie())->find($wiki['category_id']);
        $wiki['category_name'] = $category['category_name'];

        $tags = $this->wiki->getTagsForWiki($id);

        $wiki['tags'] = $tags;
        dump($wiki);

        return $this->render('wikis.show', ['wiki' => $wiki]);
    }

    public function add()
    {
        $users = $this->wiki->getAllUsers();
        $categories = $this->wiki->getAllCategories();
        $tags = $this->wiki->getAllTags();
        dump($users, $categories, $tags);
        return $this->render('wikis.create', ['users' => $users, 'categories' => $categories, 'tags' => $tags]);
    }

    public function store($data)
    {
        $result = $this->wiki->create($data);

        if ($result) {
            $response = ['successMessage' => 'wiki created successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to create wiki'];
        }
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageName = time() . '.' . $_FILES['image']['name'];
            $img_path = 'public/assets/wiki_uploads/' . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $img_path);

            $data['image_path'] = $img_path;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function edit($id)
    {
        $wiki = $this->wiki->find($id);
        $user = (new User())->find($wiki['user_id']);
        $wiki['user_name'] = $user['user_name'];

        $category = (new Categorie())->find($wiki['category_id']);
        $wiki['category_name'] = $category['category_name'];

        return $this->render('wikis.edit', ['wiki' => $wiki]);
    }

    public function update($id, $data)
    {
        $result = $this->wiki->update($id, $data);
        if ($result) {
            $response = ['successMessage' => 'wiki updated successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to update wiki'];
        }
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageName = time() . '.' . $_FILES['image']['name'];
            $img_path = 'public/assets/wiki_uploads/' . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $img_path);

            $data['image_path'] = $img_path;
        }

        header('Content-Type: application/json');
        echo json_encode($response);

    }

    public function destroy($id)
    {
        $result = $this->wiki->delete($id);
        if ($result) {
            $response = ['successMessage' => 'wiki deleted successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to delete wiki'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }


}
