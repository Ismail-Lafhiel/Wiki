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
        $stmt = $this->db->query("SELECT wikis.*, users.user_name AS user_name, categories.category_name AS category_name
        FROM wikis 
        INNER JOIN users ON wikis.user_id = users.id 
        INNER JOIN categories ON wikis.category_id = categories.id");

        $wikis = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($wikis as &$wiki) {
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
    public function latestWikis($limit = 6)
    {
        $stmt = $this->db->query("SELECT wikis.*, categories.category_name, users.user_name, users.profile_path 
        FROM wikis 
        INNER JOIN categories ON wikis.category_id = categories.id 
        INNER JOIN users ON wikis.user_id = users.id 
        ORDER BY wikis.created_at DESC 
        LIMIT $limit");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
