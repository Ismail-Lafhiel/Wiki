<?php
namespace App\Controllers;

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
        $wiki = new Wiki();
        $wikis = $wiki->allWithUserAndCategory();
        // dump($wikis);
        return $this->render('wikis.index', ['wikis' => $wikis]);
    }

    public function show($id)
    {
        $wiki = $this->wiki->find($id);
        // var_dump($user);
        return $this->render('wikis.show', ['wiki' => $wiki]);
    }
    public function store($data)
    {
        $result = $this->wiki->create($data);

        if ($result) {
            $response = ['successMessage' => 'wiki created successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to create wiki'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);

    }
    public function edit($id)
    {
        $wiki = $this->wiki->find($id);

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
