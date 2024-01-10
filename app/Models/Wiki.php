<?php
namespace App\Models;

class Wiki extends Model
{
    protected $user_id;
    protected $category_id;
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
    public function all()
    {
        $wikis = parent::all();

        foreach ($wikis as &$wiki) {
            $user = $this->belongsTo(User::class, 'user_id')->find($wiki['user_id']);
            $category = $this->belongsTo(Categorie::class, 'category_id')->find($wiki['category_id']);
            $wiki['user_name'] = $user['user_name'];
            $wiki['category_name'] = $category['category_name'];
        }
        dump($wikis);
        return $wikis;
    }
    // public function all()
    // {
    //     $wikis = parent::all();

    //     foreach ($wikis as &$wiki) {
    //         $user = (new User())->find($wiki['user_id']);
    //         $category = (new Categorie())->find($wiki['category_id']);

    //         $wiki['user_name'] = $user['user_name'];
    //         $wiki['category_name'] = $category['category_name'];
    //     }

    //     return $wikis;
    // }
}
