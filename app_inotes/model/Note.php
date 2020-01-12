<?php


class Note
{
    private $id;
    private $type;
    private $title;
    private $content;

    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}