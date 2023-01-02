<?php 

class Image {
    public $title;
    public $author;
    public $fileName;
    public $visibility;

    // Methods
    function set_title($title) {
        $this->title = $title;
    }
    function get_title() {
        return $this->title;
    }

    function set_author($author) {
        $this->author = $author;
    }
    function get_author() {
        return $this->author;
    }

    function set_fileName($fileName) {
        $this->fileName = $fileName;
    }
    function get_fileName() {
        return $this->fileName;
    }

    function set_visibility($visibility) {
        $this->visibility = $visibility;
    }
    function get_visibility() {
        return $this->visibility;
    }
}

?>