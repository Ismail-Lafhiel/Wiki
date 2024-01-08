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
}
