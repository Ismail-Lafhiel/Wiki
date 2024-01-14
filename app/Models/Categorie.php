<?php
namespace App\Models;

class Categorie extends Model
{
    public function __construct()
    {
        parent::__construct('categories');
    }

    public function wikis($id)
    {
        return $this->hasMany(Wiki::class, 'category_id', $id);
    }
    public function latestCategories($limit = 5)
    {
        $stmt = $this->db->query("SELECT * FROM $this->table ORDER BY created_at DESC LIMIT $limit");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
