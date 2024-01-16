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
    public function countUsers()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM users");
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['count'];
    }
}
