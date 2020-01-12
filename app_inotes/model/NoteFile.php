<?php

class NoteFile implements INote
{
    private const JSON_PATH = "public/json/note.json";
    private $noteFile;

    public function __construct()
    {
        $this->noteFile = new File(self::JSON_PATH);
    }

    public function getList()
    {
        $data = $this->noteFile->readFileJson();

        $arr = [];
        foreach ($data as $key => $item) {
            $note = new Note($item->title);
            $note->setContent($item->content);
            $note->setId($item->id);
            array_push($arr, $note);
        }
        return $arr;
    }

    public function save($item)
    {
        $data = $this->noteFile->readFileJson();
        if (count($data) === 0) {
            $item->setId(1);
        } else {
            $item->setId($data[count($data) - 1]->id + 1);
        }

        $arr = (array)$item;
        $kkk = [];
        foreach ($arr as $key => $value) {
            array_push($kkk, $value);
        }
        $item = new CC($kkk[0], $kkk[1], $kkk[2], $kkk[3]);
        array_push($data, $item);
        $this->noteFile->putFileJson($data);
    }

    public function delete($id)
    {
        $data = $this->noteFile->readFileJson();

        foreach ($data as $key => $item) {
            if ($item->id == $id) {
                array_splice($data, $key, 1);
                $this->noteFile->putFileJson($data);
                return;
            }
        }
    }

    public function getById($id)
    {
        $data = $this->noteFile->readFileJson();

        foreach ($data as $key => $item) {
            if ($item->id == $id) {
                $note = new Note($item->title);
                $note->setId($item->id);
                $note->setType($item->type);
                $note->setContent($item->content);

                return $note;
            }
        }
    }

    public function edit($note)
    {
        $data = $this->noteFile->readFileJson();

        $newNote = new CC($note->getId(), $note->getType(), $note->getTitle(), $note->getContent());

        foreach ($data as $key => $item) {
            if ($item->id == $note->getId()) {
                $data[$key] = $newNote;
                $this->noteFile->putFileJson($data);
                return;
            }
        }
    }

    public function search($keyword)
    {
        $data = $this->noteFile->readFileJson();
        $result = [];

        $keyword = strtoupper($keyword);

        foreach ($data as $key => $item) {
            if (strpos(strtoupper($item->type), $keyword) !== false
                || strpos(strtoupper($item->content), $keyword) !== false
                || strpos(strtoupper($item->title), $keyword) !== false) {
                $note = new Note($item->title);
                $note->setId($item->id);
                $note->setType($item->type);
                $note->setContent($item->content);
                array_push($result, $note);
            }
        }

        return $result;
    }
}