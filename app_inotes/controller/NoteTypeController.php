<?php


class NoteTypeController
{
    private const FILE = 'FILE';
    private const DB = 'DB';
    private $noteData;

    public function __construct()
    {
        $this->noteData = new NoteDB();
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
        $notes = $this->noteData->getList();
        include "view/list.php";
    }



    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "view/add.php";
        } else {
            $note = new Note($_POST["title"]);
            $note->setContent($_POST["content"]);
            $this->noteData->save($note);
        }
    }

    public function detail()
    {
        $note = $this->noteData->getById($_GET["id"]);
        include "view/read.php";
    }
}