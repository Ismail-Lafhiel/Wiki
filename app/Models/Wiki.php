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
    public function allWithUserAndCategory()
    {
        $wikis = $this->all();

        foreach ($wikis as &$wiki) {
            if (isset($wiki['user_id'])) {
                $user = new User();
                $userDetails = $user->find($wiki['user_id']);
                if ($userDetails) {
                    $wiki['user_name'] = $userDetails['user_name'];
                }
            }

            if (isset($wiki['category_id'])) {
                $category = new Categorie();
                $categoryDetails = $category->find($wiki['category_id']);
                if ($categoryDetails) {
                    $wiki['category_name'] = $categoryDetails['category_name'];
                }
            }
        }
        unset($wiki);
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
