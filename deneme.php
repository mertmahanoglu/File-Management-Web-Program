


<?php
set_time_limit(1000);


try {
    $filestat = stat("C:/");
} catch (\Throwable $th) {
    //throw $th;
}

$dir = new DirectoryIterator("C:/");
opendir("C:/");


function tumBilgiler(){

    global $dir;
    global $filestat;

    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
         
    

                echo "--------------------<br>";
              
               try {
               
                echo '<li><a href="'.$fileinfo->getFilename().'">'.$fileinfo->getFilename().'</a></li>';
               
                echo "Dosya Size : ".round($fileinfo->getSize() / 1024).' KB<br>';
           
                echo "Dosya Owner'ı : ".$fileinfo->getOwner().'<br>';
                echo "Dosya değiştirilme zamanı : ".date('F d Y, H:i:s',$fileinfo->getMTime()).'<br>';
                $octal_perms = substr(sprintf('%o', $fileinfo->getPerms()), -4);
                echo  " Dosya Permission : " . $octal_perms . "<br>";
                echo 'Number of links to file: '.$filestat['nlink'].'<br>';
                echo "Group  : ".$fileinfo->getGroup().'<br>';
              
                echo "Type  : ".$fileinfo->getType().'<br>';

               } catch (\Throwable $th) {
                   //throw $th;
               }
              
            
        
        }
        
    }
}

tumBilgiler();

?>