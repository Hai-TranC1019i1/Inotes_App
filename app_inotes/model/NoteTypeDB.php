<?php


class NoteTypeDB implements INote
{
    private $db;

    public function __construct()
    {
        $this->db = DB::connection();
    }

    public function getList()
    {
        $sql = "SELECT * FROM note_types";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        $types = [];
        foreach ($result as $key => $item) {
            $type = new NoteType($item["name"], $item["description"]);
            $type->setId($item["id"]);
            array_push($types,$type);
        }

        return $types;
    }

    public function save($item)
    {
        // TODO: Implement save() method.
    }

    public function delete($value)
    {
        // TODO: Implement delete() method.
    }
}