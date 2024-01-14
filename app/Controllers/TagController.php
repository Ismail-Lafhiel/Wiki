<?php
namespace App\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    protected $tag;

    public function __construct()
    {
        $this->tag = new Tag();
    }

    public function index()
    {
        $tags = $this->tag->all();

        return $this->render('tags.index', ['tags' => $tags]);
    }
    public function store($data)
    {
        $result = $this->tag->create($data);

        if ($result) {
            $response = ['successMessage' => 'tag created successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to create tag'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);

    }
    public function edit($id)
    {
        $tag = $this->tag->find($id);

        // return $this->render('tags.edit');
        return $this->render('tags.edit', ['tag' => $tag]);
    }
    public function update($id, $data)
    {
        $result = $this->tag->update($id, $data);
        if ($result) {
            $response = ['successMessage' => 'tag updated successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to updated tag'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function destroy($id)
    {
        $this->tag->delete($id);
        header('Location: /tags');
    }
}
