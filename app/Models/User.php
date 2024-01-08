<?php
namespace App\Models;

class User extends Model
{
    public function __construct()
    {
        parent::__construct('users');
    }

    public function wikis($id)
    {
        return $this->hasMany(Wiki::class, 'user_id', $id);
    }
}
