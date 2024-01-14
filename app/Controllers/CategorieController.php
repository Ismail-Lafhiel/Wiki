<?php
namespace App\Controllers;

use App\Models\Categorie;

class CategorieController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new Categorie();
    }

    public function index()
    {
        $categories = $this->category->all();

        return $this->render('categories.index', ['categories' => $categories]);
    }

    public function show($id)
    {
        $category = $this->category->find($id);
        // var_dump($user);
        return $this->render('categories.show', ['category' => $category]);
    }
    public function store($data)
    {
        $result = $this->category->create($data);

        if ($result) {
            $response = ['successMessage' => 'category created successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to create category'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);

    }
    public function edit($id)
    {
        $category = $this->category->find($id);

        return $this->render('categories.edit', ['category' => $category]);
    }
    public function update($id, $data)
    {
        $result = $this->category->update($id, $data);
        if ($result) {
            $response = ['successMessage' => 'category updated successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to updated category'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function destroy($id)
    {
        $this->category->delete($id);
        header('Location: /categories');
    }
}
