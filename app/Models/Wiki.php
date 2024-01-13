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
    public function user($id)
    {
        return $this->belongsTo(User::class, 'user_id', $id);
    }

    public function category($id)
    {
        return $this->belongsTo(Categorie::class, 'category_id', $id);
    }

    public function tags($id)
    {
        return $this->belongsToMany(Tag::class, 'wikitags', 'wiki_id', 'tag_id', $id);
    }
    public function getAllUsers()
    {
        return (new User())->all();
    }

    public function getAllCategories()
    {
        return (new Categorie())->all();
    }

    public function getAllTags()
    {
        return (new Tag())->all();
    }
    public function allWithUserCategoryAndTags()
    {
        $wikis = $this->all();

        foreach ($wikis as &$wiki) {
            $user = (new User())->find($wiki['user_id']);
            $wiki['users'] = $user;

            $category = (new Categorie())->find($wiki['category_id']);
            $wiki['categories'] = $category;

            $tags = $this->tags($wiki['id']);
            $wiki['tags'] = $tags;
        }
        return $wikis;
    }
    public function getTagsForWiki($wikiId)
    {
        $tags = $this->tags($wikiId);
        return $tags;
    }


}
