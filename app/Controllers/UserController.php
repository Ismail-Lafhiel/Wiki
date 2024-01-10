<?php
namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();

        return $this->render('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = $this->user->find($id);
        // var_dump($user);

        return $this->render('users.show', ['user' => $user]);
    }
    public function store($data)
    {
        $result = $this->user->create($data);

        if ($result) {
            $response = ['successMessage' => 'User created successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to create user'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);

    }
    public function edit($id)
    {
        $user = $this->user->find($id);

        return $this->render('users.edit', ['user' => $user]);
    }
    public function update($id, $data)
    {
        $result = $this->user->update($id, $data);
        if ($result) {
            $response = ['successMessage' => 'User updated successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to update user'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function destroy($id)
    {
        $result = $this->user->delete($id);
        if ($result) {
            $response = ['successMessage' => 'User deleted successfully'];
        } else {
            $response = ['errorMessage' => 'Failed to delete user'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);

    }
}
