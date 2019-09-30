<?php
 
abstract class FileUploader
{
    public function uploadFile($file)
    {
        $uri = $this->moveFile($file);
 
        // TODO persist additions to file manager CMS here.
        // may want to have FileUploader extend DataMapper model class
 
        return $uri;
    }
 
    abstract public function moveFile($file);
}

