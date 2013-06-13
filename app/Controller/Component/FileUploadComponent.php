<?php
/*
 * File Upload CakePHP Component
 * 
 * @cakephp 2.x
 * @author      Sandip Ghadge
 * @version     1.1
 * 
 */
class FileUploadComponent extends Component {
    
	  // sets uplaodDir in files if setting is set in componenet array in controller then dafault will be all-uploads 	
	  var $uploadDir = 'all-uploads';
	  //model name of uploading page
	  var $fileModel = '';
	  // field name of file upload field
	  var $field = 'file';
	  /***************************************************
	    * Initializes FileUploadComponent for use in the controller
	    *
	    * @param object $controller A reference to the instantiating controller object
	    * @return void
	    * @access public
	  */
	  function initialize(&$controller){
	    $this->data = $controller->data;
	    $this->params = $controller->params;
	    $this->fileModel = Inflector::camelize(Inflector::singularize($this->params['controller']));
	  } 
  
	  /**Sets the upload dir for fileupload if dir is not present then will create new dir
	   * @author sandip Ghadge
	   * @return void
   	  */ 
	  
	  function setUploadDir(){
	  		$dir = WWW_ROOT.'files/' .  $this->uploadDir."/"; 
		    if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			
	    	Configure::write('upload_dir', $dir);
	    	
	    }
	    
	    
	/**
	 * doFileUpload method
	 * this function does generate unique file name, does the file upload and then creates thumbnail image in thub dir. 	   
	 * @author sandip
	 * @return void
	*/ 
		
	    function doFileUpload(){
	    	$file_data = $this->data[$this->fileModel][$this->field];
	    	$media_type = $this->uploadDir;
	    	if($file_data['error']!=0){
	    		return false;
	    	}
	    	
	        $this->setUploadDir();
	        
     	    $new_file_name = $this->generateUniqueFilename($file_data['name']);
     	       	    
     	    if($this->handleFileUpload($file_data,$new_file_name)){
				 $type=explode('/',$file_data['type']);
				if($type[0] == 'image'){
					$this->thumbnail($new_file_name, 'small',  25,  30); // small thumbnail	
					$this->thumbnail($new_file_name, 'medium', 75,  90); // small thumbnail	
	     	        $this->thumbnail($new_file_name, 'large',  120, 150); // medium thumbnail	
	     	    }
     	    	return $new_file_name;
     	    }else{
     	      return false;	
     	    }
     	    	
     	    	
     	    	       
	    }
	    
	    
	    
	 /**
	 * generateUniqueFilename 
	 * this function does generate unique file name. 	   
	 * @author sandip
	 * @return void
	 * 
	*/ 
	    
	    
        function generateUniqueFilename($fileName){
			   
        	   $ext = trim(substr(strrchr($fileName,'.'),1)); 
               $new_name = trim(substr(md5(microtime()), 2, -5));
               $fileName = $new_name.'.'.$ext;
               $no=1;
               $newFileName = $fileName;
                while (file_exists(Configure::read('upload_dir').$newFileName)) {
                  $no++;
                  $newFileName = substr_replace($fileName, "_$no.", strrpos($fileName, "."), 1);
                }
             
               return $newFileName;
        }

		
	/**
	 * handleFileUpload 
	 * moves the uploaded file from tmp dir to upload dir. 	   
	 * @author sandip
	 * @return void
	 * 
	*/ 
       function handleFileUpload($file_data, $fileName){
                if (is_uploaded_file($file_data['tmp_name']) && $file_data['error']==0)
                  {
                    if (move_uploaded_file($file_data['tmp_name'], Configure::read('upload_dir')."/".$fileName)){
                        return TRUE;
                    }else{
                        return false;
                    }
                  }
       }
          
          
     /**
	 * function generate thumbnail images for uploaded image file  
	 * moves the uploaded file from tmp dir to upload dir. 	   
	 * @author sandip
	 * @return void
	 * 
	*/
       
      function thumbnail($inputFileName, $thumb_size = 'small', $width = 46, $height = 60){
                     
		    $src = Configure::read('upload_dir').$inputFileName; 
		    $filename = explode('.',$inputFileName);
			$thname = $filename[0];
			
			$file_extension = substr($src, strrpos($src, '.')+1);
			
			switch(strtolower($file_extension)) {
			     case "gif":  $image = @imagecreatefromgif($src); break;
			     case "png":  $image = @imagecreatefrompng($src);break;
			     case "bmp":  $image = @imagecreatefromwbmp($src);break;
			     case "jpeg":
			     case "jpg":  $image = @imagecreatefromjpeg($src);break;
			}
			
			list($width_orig, $height_orig, $type, $attr) = @getimagesize($src);

			$tn = @imagecreatetruecolor($width, $height) ;
			
			@imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			$dir = Configure::read('upload_dir').'thumb/'.$thumb_size.'/'; 
			if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			
			switch(strtolower($file_extension)) {
			     case "gif": imagegif($tn, $dir.$thname.'.'.$file_extension); break;
			     case "png": imagepng($tn, $dir.$thname.'.'.$file_extension); break;
			     case "bmp": imagewbmp($tn, $dir.$thname.'.'.$file_extension); break;
			     case "jpeg":
			     case "jpg": imagejpeg($tn, $dir.$thname.'.'.$file_extension); break;
			
			}
			
		
      }
 
      
   
}
