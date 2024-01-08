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
        // Use the User to retrieve all users
        $users = $this->user->all();

        return $this->render('users.index', $users);
    }

    public function show($id)
    {
        // Use the User to find a specific user by ID
        $user = $this->user->find($id);


        return $this->render('users.show', $user);
    }

    public function edit($id)
    {
        // Use the User to find a specific user by ID
        $user = $this->user->find($id);

        return $this->render('users.edit', $user);
    }

    public function store($data)
    {
        // Use the User to create a new user
        $userId = $this->user->create($data);

        if ($userId) {
            $_SESSION['message'] = "User created successfully";
        } else {
            $_SESSION['message'] = "Failed to create user";
        }
        header("Location: ".__DIR__."/../../resources/views/users/index.php");
        exit();
    }

    public function update($id, $data)
    {
        // Use the User to update a user
        $affectedRows = $this->user->update($id, $data);
        
        if ($affectedRows > 0) {
            // User update was successful
            $_SESSION['message'] = "User updated successfully";
        } else {
            // User update failed
            $_SESSION['message'] = "Failed to update user";
        }
        header("Location: ".__DIR__."/../../resources/views/users/index.php");
        exit();
    }

    public function destroy($id)
    {
        // Use the User to delete a user
        $affectedRows = $this->user->delete($id);

        if ($affectedRows > 0) {
            // User deletion was successful
            $_SESSION['message'] = "User deleted successfully";
        } else {
            // User deletion failed
            $_SESSION['message'] = "Failed to delete user";
        }
        header("Location: ".__DIR__."/../../resources/views/users/index.php");
        exit();
    }
}
