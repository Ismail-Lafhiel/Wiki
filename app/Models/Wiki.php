<?php
namespace App\Models;

class Wiki extends Model
{
    public function __construct()
    {
        parent::__construct('wikis');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
    public function tags($id)
    {
        return $this->belongsToMany(Tag::class, 'wikitags', 'wiki_id', 'tag_id', $id);
    }
}
