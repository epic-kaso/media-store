<?php namespace MediaStore\Media\Commands;


class CreateMediaItemCommand {
    public $title;
    public $description;
    public $file;
    public $album_art;
    /**
     * @var null
     */
    public $group_id;
    public $price;

    /**
     * @param $title
     * @param $description
     * @param $file
     * @param $album_art
     * @param $price
     * @param null $group_id
     */
    public function __construct($title,$description,$file,$album_art,$price,$group_id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->file = $file;
        $this->album_art = $album_art;
        $this->group_id = $group_id;
        $this->price = $price;
    }

}