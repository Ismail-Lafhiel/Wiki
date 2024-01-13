<?php
namespace App\Models;

class Tag extends Model
{
    public function __construct()
    {
        parent::__construct('tags');
    }
    public function wikis($id)
    {
        return $this->belongsToMany(Wiki::class, 'wikitags', 'tag_id', 'wiki_id', $id);
    }


}
