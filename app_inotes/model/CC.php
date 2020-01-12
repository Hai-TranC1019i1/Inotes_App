<?php


class CC
{
    public $id;
    public $type;
    public $content;
    public $title;

    public function __construct($id, $type, $title, $content)
    {
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
        $this->content = $content;
    }
}