<?php
namespace App\Controllers;

use App\Models\Model;

class Controller
{
    protected $viewPath;
    protected $model;

    public function __construct()
    {
        $this->viewPath = __DIR__ . "/../../resources/views";
        $modelName = str_replace('Controller', '', static::class); // model name from controller class name
        $tableName = strtolower($modelName) . 's'; // table name from model name
        $this->model = new Model($tableName);
    }

    protected function render($view, $data = [])
    {
        $file = __DIR__ . '/../../resources/views/' . str_replace('.', '/', $view) . '.php';
        if (file_exists($file)) {
            extract($data);
            include $file;
        }
    }

    protected function all()
    {
        return $this->model->all();
    }

    protected function find($id)
    {
        return $this->model->find($id);
    }

    protected function create($data)
    {
        return $this->model->create($data);
    }

    protected function update($id, $data)
    {
        return $this->model->update($id, $data);
    }

    protected function delete($id)
    {
        return $this->model->delete($id);
    }
}