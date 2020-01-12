<?php


class NoteDB implements INote
{
    private $db;

    public function __construct()
    {
        $this->db = DB::connection();
    }

    public function getList()
    {
        $sql = "SELECT * FROM notes";
        $stmt = $this->db->query($sql);
        $stmt->execute();

        $items = $stmt->fetchAll();
        $notes = [];

        foreach ($items as $key => $item) {
            $note = new Note($item["title"]);
            $note->setId($item["id"]);
            $note->setContent($item["content"]);
            $note->setType($item["type_id"]);
            array_push($notes, $note);
        }

        return $notes;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM notes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch();

        $note = new Note($result["title"]);
        $note->setId($result["id"]);
        $note->setType($result["type_id"]);
        $note->setContent($result["content"]);

        return $note;
    }

    public function save($note)
    {
        $sql = "INSERT INTO notes(title, content) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $note->getTitle());
        $stmt->bindParam(2, $note->getContent());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM notes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function edit($note)
    {
        $sql = "UPDATE notes SET title = ? , content = ? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $note->getTitle());
        $stmt->bindParam(2, $note->getContent());
        $stmt->bindParam(3, $note->getId());
        $stmt->execute();
    }

    public function search($keyword)
    {
        $sql = "SELECT * FROM notes WHERE MATCH (title,content) AGAINST ('$keyword*' IN BOOLEAN MODE)";
        $stmt = $this->db->prepare($sql);
//        $stmt->bindParam(1, $keyword);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $notes = [];
        foreach ($result as $key => $item) {
            $note = new Note($item["title"]);
            $note->setId($item["id"]);
            $note->setContent($item["content"]);
            $note->setType($item["type_id"]);
            array_push($notes, $note);
        }
        return $notes;
    }
}