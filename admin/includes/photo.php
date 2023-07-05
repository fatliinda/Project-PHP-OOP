<?php

class Photo extends Db_object{

    protected static $db_table='photos';
    protected static $db_table_fields= array('photo_id','title','description','filename','type','size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    
    public $tmp_path;
    public $upload_directory='images';
    public $custom_errors=array();

   public $upload_errors=array(
        UPLOAD_ERR_OK => "THERE IS NO ERROR",
        UPLOAD_ERR_INI_SIZE=> "EXCEED THE SIZE",
        UPLOAD_ERR_FORM_SIZE=> "EXCEED THE MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL=>"PARTIALLY UPLOADED",
        UPLOAD_ERR_NO_FILE=>"NO FILE UPLOADED",
        UPLOAD_ERR_NO_TMP_DIR=>"MISSING TEMPRORAY FOLDER",
        UPLOAD_ERR_CANT_WRITE=>"FAILD TO WRITE FILE TO DISK",
        UPLOAD_ERR_EXTENSION=>"A PHP EXTENSION STOPPED THE FILE UPLOAD"




);





public function set_file($file){

    if(empty($file)|| !$file || !is_array($file)){

            $this->custom_errors[]="no file was uploaded";
            return false;
    }
    elseif($file['error']!=0){
        $this->custom_errors[]=$this->upload_errors[$file['error']];
        return false;


    }
    else{


        $this->tmp_path = $file['tmp_name'];
        $this->type = $file['type'];
        $this->size = $file['size'];
        

    }
}

      

    public function save(){

          if($this->photo_id) {
          
             $this->update();
         }
          
          
          else{ 
 
            if(!empty($custom_errors)){
                return false;
            }

            if(empty($this->filename) || empty($this->tmp_path)){

                    $this->custom_errors[]="the field was not available";
                    return false;
            }

            $target_path= SITE_ROOT . DS . 'admin' .DS. $this->upload_directory . DS. $this->filename;
           echo $target_path;
        if(file_exists($target_path)){

            $this->custom_errors[]="this file already exists";
            return false;
        }

        if(move_uploaded_file($this->tmp_path,$target_path)){

            if($this->create()){

                echo "<h1>uploaded</h1>";
                return true;

            }
            else{

                    $this->custom_errors[]="the folder does not have permission ";
                    return false;


            }


        }
       
        
        
        }



    }









}



?>