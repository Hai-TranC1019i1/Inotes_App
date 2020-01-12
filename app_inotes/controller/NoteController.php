<?php


class NoteController
{
    private const FILE = 'FILE';
    private const DB = 'DB';
    private $noteData;

    public function __construct()
    {
        $this->noteData = new NoteDB();
        $this->changeNoteStore('FILE');
    }

    public function changeNoteStore($storeType)
    {
        switch (strtoupper($storeType)) {
            case self::FILE:
                $this->noteData = new NoteFile();
                return true;
            case self::DB:
                $this->noteData = new NoteDB();
                return true;
            default:
                return false;
        }
    }

    public function index()
    {
        $notes = empty($keyword = $_REQUEST["keyword"]) ? $this->noteData->getList() : $this->noteData->search($keyword);
        include "view/list.php";
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "view/add.php";
        } else {
            $note = new Note($_POST["title"]);
            $note->setContent($_POST["content"]);
            $note->setType($_POST["type"]);
            $this->noteData->save($note);
            header("location: index.php");
        }
    }

    public function detail()
    {
        $note = $this->noteData->getById($_GET["id"]);
        include "view/read.php";
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            $note = $this->noteData->getById($id);
            include "view/delete.php";
        } else {
            $this->noteData->delete($_POST["id"]);
            header("location: index.php");
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            $note = $this->noteData->getById($id);
            include "view/update.php";
        } else {
            $note = new Note($_POST["title"]);
            $note->setId($_POST["id"]);
            $note->setContent($_POST["content"]);
            $note->setType($_POST["type"]);

            $this->noteData->edit($note);
            $message = 'Update successful!';
            include "view/update.php";
        }
    }

}
