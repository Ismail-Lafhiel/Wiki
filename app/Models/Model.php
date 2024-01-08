<?php
namespace App\Models;

use App\Config\Database;

class Model
{
    protected $db;
    protected $table;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->db = Database::getInstance()->getPdo();
    }
    public function getTableName()
    {
        return $this->table;
    }
    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $keys = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $stmt = $this->db->prepare("INSERT INTO $this->table ($keys) VALUES ($values)");
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $setValues = '';
        foreach ($data as $key => $value) {
            $setValues .= "$key=:$key, ";
        }
        $setValues = rtrim($setValues, ', ');
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE $this->table SET $setValues WHERE id = :id");
        $stmt->execute($data);
        return $stmt->rowCount();
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }


    // relationship methods
    public function hasMany($relatedModel, $foreign_key, $id)
    {
        $relatedTableName = (new $relatedModel())->getTableName();

        $query = "SELECT * FROM $relatedTableName WHERE $foreign_key = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function belongsTo($relatedModel, $foreign_key)
    {
        $relatedTableName = (new $relatedModel())->getTableName();

        $query = "SELECT * FROM $relatedTableName WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $this->$foreign_key]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function belongsToMany($relatedModel, $pivotTable, $foreignPivotKey, $relatedPivotKey, $id)
    {
        $relatedTableName = (new $relatedModel())->getTableName();

        $query = "SELECT $relatedTableName.* FROM $relatedTableName
              JOIN $pivotTable ON $relatedTableName.id = $pivotTable.$relatedPivotKey
              WHERE $pivotTable.$foreignPivotKey = :id";

        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);

        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }

}
