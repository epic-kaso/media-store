<?php namespace MediaStore\Media\Commands;

class CreateMediaItem {
    private $title;
    private $description;
    private $file;
    private $album_art;
    /**
     * @var null
     */
    private $group_id;

    /**
     */
    public function __construct($title,$description,$file,$album_art,$group_id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->file = $file;
        $this->album_art = $album_art;
        $this->group_id = $group_id;
    }

}