<?php

class Photo extends Db_object {
    protected static $db_table = 'photos';
    protected static $db_table_fields = array('photo_id', 'title', 'description', 'filename', 'type', 'size');
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    
    public $tmp_path;
    public $upload_directory = 'images';
    public $custom_errors = array();

    public $upload_errors = array(
        UPLOAD_ERR_OK => "THERE IS NO ERROR",
        UPLOAD_ERR_INI_SIZE => "EXCEED THE SIZE",
        UPLOAD_ERR_FORM_SIZE => "EXCEED THE MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL => "PARTIALLY UPLOADED",
        UPLOAD_ERR_NO_FILE => "NO FILE UPLOADED",
        UPLOAD_ERR_NO_TMP_DIR => "MISSING TEMPORARY FOLDER",
        UPLOAD_ERR_CANT_WRITE => "FAILED TO WRITE FILE TO DISK",
        UPLOAD_ERR_EXTENSION => "A PHP EXTENSION STOPPED THE FILE UPLOAD"
    );

    public function set_file($file) {
        if (empty($file) || !$file || !is_array($file)) {
            $this->custom_errors[] = "No file was uploaded";
            return false;
        } elseif ($file['error'] != 0) {
            $this->custom_errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }




    public function picture_path(){


        return $this->upload_directory. DIRECTORY_SEPARATOR . $this->filename;
    }

    public function save()
    {
        if ($this->photo_id) {
            $this->update();
        } else {
            if (!empty($this->custom_errors)) {
                return false;
            }
    
            if (empty($this->filename) || empty($this->tmp_path)) {
                $this->custom_errors[] = "the field was not available";
                return false;
            }
    
           // Define the target directory
$target_directory = 'C:' . DIRECTORY_SEPARATOR . 'xampp' . DIRECTORY_SEPARATOR . 'htdocs' . DIRECTORY_SEPARATOR . 'learn' . DIRECTORY_SEPARATOR . 'Detyra1' . DIRECTORY_SEPARATOR . 'CMS_TEMPLATE  PHP' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images';

// Set the target path
$target_path = $target_directory . DIRECTORY_SEPARATOR . $this->filename;

// Check if the target directory exists, create it if it doesn't
if (!is_dir($target_directory)) {
    mkdir($target_directory, 0777, true);
    
    // Change directory permissions
    chmod($target_directory, 0777);
}

// Move the uploaded file to the target path
if (move_uploaded_file($this->tmp_path, $target_path)) {
    // File moved successfully, proceed with other operations
    if ($this->create()) {
        echo "<h1>uploaded</h1>";
        return true;
    } else {
        $this->custom_errors[] = "Failed to create database record";
        return false;
    }
} else {
    $this->custom_errors[] = "Failed to move the uploaded file";
    return false;
}

    
            if (file_exists($target_path)) {
                $this->custom_errors[] = "this file already exists";
                return false;
            }
    
            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    echo "<h1>uploaded</h1>";
                    return true;
                } else {
                    $this->custom_errors[] = "the folder does not have permission ";
                    return false;
                }
            }
        }
    }
    
}













?>