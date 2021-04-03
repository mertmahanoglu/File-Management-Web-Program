
<?php


$silinecek_Path=null;



function adıGetir($dir,$veri){
    
global $silinecek_Path;
    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
        
         if($veri==$fileinfo->getFilename())
         {
            $silinecek_Path = $fileinfo->getPathname();
            
            return $fileinfo->getFilename();
         }
         
         
        }
        
    }
}


//https://stackoverflow.com/questions/5501427/php-filesize-mb-kb-conversion Size kaynağı


function formatSizeUnits($bytes)
{
   
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}



function adNType($dir,$veri,$filestat,$type){
    
    global $silinecek_Path;
        foreach ($dir as $fileinfo) {
       
            if (!$fileinfo->isDot()) {
            
             if($veri==$fileinfo->getFilename() && $type==$fileinfo->getType())
             {
                $silinecek_Path = $fileinfo->getPathname();
    
    tumBilgiler3($dir,$filestat);
    
             
             }
             
             
            }
            
        }
    }



    function permissionNUser($dir,$permission,$filestat,$user){
    
        global $silinecek_Path;
            foreach ($dir as $fileinfo) {
           
                if (!$fileinfo->isDot()) {
                
                    $octal_perms = substr(sprintf('%o', $fileinfo->getPerms()), -4);
           
            if($octal_perms=="0666")
            {
                $octal_perms="-rw-rw-rw-";
             
            }
            else if($octal_perms=="0777")
            {
                $octal_perms="-rwxrwxrwx";
            
            }
            else if($octal_perms=="0555")
            {
                $octal_perms="-r-xr-xr-x";
             
            }
            
                   
                 if($permission==$octal_perms && $user==$fileinfo->getOwner())
                 {
                     
                    $silinecek_Path = $fileinfo->getPathname();
        tumBilgiler3($dir,$filestat);
                 }
                 
                 
                 
                }
                
            }
        }


        
function groupNHardlink($dir,$veri,$filestat,$hardlink){
    
    global $silinecek_Path;
        foreach ($dir as $fileinfo) {
       
            if (!$fileinfo->isDot()) {
            
             if($veri==$fileinfo->getGroup() && $hardlink==$filestat['nlink'])
             {
                $silinecek_Path = $fileinfo->getPathname();
    
    tumBilgiler3($dir,$filestat);
    
             
             }
             
             
            }
            
        }
    }

    function groupNHardlinkDelete($dir,$veri,$filestat,$hardlink){
    
        global $silinecek_Path;
            foreach ($dir as $fileinfo) {
           
                if (!$fileinfo->isDot()) {
                
                 if($veri==$fileinfo->getGroup() && $hardlink==$filestat['nlink'])
                 {
                    $silinecek_Path = $fileinfo->getPathname();
                 }
                 
                 
                }
                
            }
        }
    

    function permissionNType($dir,$permission,$filestat,$type){
    
        global $silinecek_Path;
            foreach ($dir as $fileinfo) {
           
                if (!$fileinfo->isDot()) {
                
                    $octal_perms = substr(sprintf('%o', $fileinfo->getPerms()), -4);
           
            if($octal_perms=="0666")
            {
                $octal_perms="-rw-rw-rw-";
             
            }
            else if($octal_perms=="0777")
            {
                $octal_perms="-rwxrwxrwx";
            
            }
            else if($octal_perms=="0555")
            {
                $octal_perms="-r-xr-xr-x";
             
            }
            
                   
                 if($permission==$octal_perms && $type==$fileinfo->getType())
                 {
                     
                    $silinecek_Path = $fileinfo->getPathname();
        
        
                    echo "--------------------<br>";
                        
                    echo "Dosya adı : ".$fileinfo->getFilename().'<br>';
                    echo "Dosya Size : ".round($fileinfo->getSize() / 1024).' KB<br>';
               
                    echo "Dosya Owner'ı : ".$fileinfo->getOwner().'<br>';
                    echo "Dosya değiştirilme zamanı : ".date('F d Y, H:i:s',$fileinfo->getMTime()).'<br>';
                    $octal_perms = substr(sprintf('%o', $fileinfo->getPerms()), -4);
                    
                    echo  " Dosya Permission : " . $octal_perms . "<br>";
                    echo 'Number of links to file: '.$filestat['nlink'].'<br>';
                    echo "Group  : ".$fileinfo->getGroup().'<br>';
                  
                    echo "Type  : ".$fileinfo->getType().'<br>';
                 }
                 
                 
                 
                }
                
            }
        }


        function dateNName($dir,$date,$filestat,$name){
    
            global $silinecek_Path;
                foreach ($dir as $fileinfo) {
               
                    if (!$fileinfo->isDot()) {
                    
                     if($date==date('F',$fileinfo->getMTime()) && $name==$fileinfo->getFilename())
                     {
                        $silinecek_Path = $fileinfo->getPathname();
            
            tumBilgiler3($dir,$filestat);
            
                     
                     }
                     
                     
                    }
                    
                }
            }

            function sizeNname($dir,$size,$filestat,$name){
    
                global $silinecek_Path;
                    foreach ($dir as $fileinfo) {
                   
                        if (!$fileinfo->isDot()) {
                        
                         if($size<=round($fileinfo->getSize()) && $name==$fileinfo->getFilename())
                         {
                            $silinecek_Path = $fileinfo->getPathname();
                
                              tumBilgiler3($dir,$filestat);
                
                         
                         }
                         
                         
                        }
                        
                    }
                }


function dosyaSize($dir,$veri){
   


    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {

            if($veri==$fileinfo->getSize())
            {
             
              
                return $fileinfo->getSize();
            }
           
      
        }
        
    }
}


function dosyaOwner($dir,$veri){
 

    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
        
           
            if($veri==$fileinfo->getOwner())
            {
             
              
                return $fileinfo->getOwner();   
            }
            
          
        }
        
    }
}


function dosyaMTime($dir){
   


    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
            return date('F',$fileinfo->getMTime());
        }
        
    }
}

function dosyaPermission($dir,$veri){
  


    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {

            $octal_perms = substr(sprintf('%o', $fileinfo->getPerms()), -4);
           
            if($octal_perms=="0666")
            {
                $octal_perms="-rw-rw-rw-";
             
            }
            else if($octal_perms=="0777")
            {
                $octal_perms="-rwxrwxrwx";
            
            }
            else if($octal_perms=="0555")
            {
                $octal_perms="-r-xr-xr-x";
             
            }
            if($veri==$octal_perms)
            {
                
              
                return  $octal_perms;
            }
            
       
        }
        
    }
}

function dosyaLink($dir,$filestat,$veri){
   
 

    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
        
            if($veri==$filestat['nlink'])
            {
               
                return $filestat['nlink'];
            }
            
           
        }
        
    }
}


function dosyaGroup($dir,$veri){
   
 

    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {

            if($veri==$fileinfo->getGroup())
            {
               
                return $fileinfo->getGroup();
            }
            
           
        }
        
    }
}

function dosyaType($dir,$veri){
   


    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
        if($veri==$fileinfo->getType())
        {
 
            return $fileinfo->getType();
        }
            
           
        }
        
    }
}


function dosyaBula($dir){
    

    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
        
         
          return $fileinfo->getPathname();
        }
        
    }
}


function tumBilgiler($dir,$filestat){

    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {
         
    

                echo "--------------------<br>";
                
                echo "Dosya adı : ".$fileinfo->getFilename().'<br>';
                echo "Dosya Size :" .formatSizeUnits(round($dir->getSize())).'<br>';
           
                echo "Dosya Owner'ı : ".$fileinfo->getOwner().'<br>';
                echo "Dosya değiştirilme zamanı : ".date('F d Y, H:i:s',$fileinfo->getMTime()).'<br>';
                $octal_perms = substr(sprintf('%o', $fileinfo->getPerms()), -4);
                if($octal_perms=="0666")
            {
                $octal_perms="-rw-rw-rw-";
            }
            else if($octal_perms=="0777")
            {
                $octal_perms="-rwxrwxrwx";
            }
            else if($octal_perms=="0555")
            {
                $octal_perms="-r-xr-xr-x";
            }
                echo  " Dosya Permission : " . $octal_perms . "<br>";
                echo 'Number of links to file: '.$filestat['nlink'].'<br>';
                echo "Group  : ".$fileinfo->getGroup().'<br>';
              
                echo "Type  : ".$fileinfo->getType().'<br>';

            
        
        }
        
    }
}


function tumBilgiler3($dir,$filestat){

    
   
        if (!$dir->isDot()) {
         
    

                echo "--------------------<br>";
                
                echo "Dosya adı : ".$dir->getFilename().'<br>';
                echo "Dosya Size :" .formatSizeUnits(round($dir->getSize())).'<br>';
                //echo "Dosya Size : ".round($dir->getSize() / 1024).' KB<br>';
           
                echo "Dosya Owner'ı : ".$dir->getOwner().'<br>';
                echo "Dosya değiştirilme zamanı : ".date('F d Y, H:i:s',$dir->getMTime()).'<br>';
                $octal_perms = substr(sprintf('%o', $dir->getPerms()), -4);
                if($octal_perms=="0666")
            {
                $octal_perms="-rw-rw-rw-";
            }
            else if($octal_perms=="0777")
            {
                $octal_perms="-rwxrwxrwx";
            }
            else if($octal_perms=="0555")
            {
                $octal_perms="-r-xr-xr-x";
            }
                echo  " Dosya Permission : " . $octal_perms . "<br>";
                echo 'Number of links to file: '.$filestat['nlink'].'<br>';
                echo "Group  : ".$dir->getGroup().'<br>';
              
                echo "Type  : ".$dir->getType().'<br>';

            
        
        }
        
    
}

function kontrol($string)
{
if($string=="")
{
    
      echo '<script language="javascript">';
      echo 'alert("Şartın Regular expressiona aykırı")';
    
      echo '</script>';
    
}
}

function tumBilgiler2($dir,$filestat,$degisken,$name,$type,$hardlink,$user,$group,$permission,$size,$date){

    

    foreach ($dir as $fileinfo) {
   
        if (!$fileinfo->isDot()) {

            $octal_perms = substr(sprintf('%o', $fileinfo->getPerms()), -4);
           
            if($octal_perms=="0666")
            {
                $octal_perms="-rw-rw-rw-";
             
            }
            else if($octal_perms=="0777")
            {
                $octal_perms="-rwxrwxrwx";
            
            }
            else if($octal_perms=="0555")
            {
                $octal_perms="-r-xr-xr-x";
             
            }
         
    if($degisken=="name," && $name==$fileinfo->getFilename() )
    {
        tumBilgiler3($dir,$filestat);
    }
    else if($degisken=="type," && $type==$fileinfo->getType() )
    {
        tumBilgiler3($dir,$filestat);
    }
    else if($degisken=="hardlink," && $hardlink==$filestat['nlink'])
    {
        tumBilgiler3($dir,$filestat);
    }
    else if($degisken=="user," && $user==$fileinfo->getOwner())
    {
        tumBilgiler3($dir,$filestat);
    }
    else if($degisken=="group," && $group==$fileinfo->getGroup())
    {
        tumBilgiler3($dir,$filestat);
    }
    else if($degisken=="permission," && $permission==$octal_perms)
    {
        tumBilgiler3($dir,$filestat);
    }
    else if($degisken=="size," && $size<=round($fileinfo->getSize()))
    {
        tumBilgiler3($dir,$filestat);
    }
    else if($degisken=="date," && $date==date('F',$fileinfo->getMTime()))
    {
        tumBilgiler3($dir,$filestat);
    }

        }
        
    }
}

$sql_path =  $_REQUEST['sql_komut'];


//Eşittir işaretinden önce veya sonra boşluk bırakılmadığı durumda aralara boşluk konur. Böylece hep aynı string oluşur
$new_str = str_replace('=', ' = ', $sql_path);

$verynew_str = str_replace('&&', ' && ', $new_str);

//Fazladan boşlukları siler yerine bir boşluk koyar böylece kelimeler arasında çok boşluk olsa bile tek boşluk olur
$cleanStr = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $verynew_str)));


$dizi = explode(" " , $cleanStr);

if($dizi[0] == "Delete" || $dizi[0] == "delete")
{

if($dizi[1] !== "from" && $dizi[1] !== "FROM" && $dizi[1] !== "From"){

    echo '<script language="javascript">';
    echo 'alert("Delete sorgusu yanlış girildiğinden delete işlemi yapılmadı.")';
    echo '</script>';
    }

if($dizi[3] !== "where" && $dizi[3] !== "Where" && $dizi[3] !== "WHERE"){
   
    echo '<script language="javascript">';
    echo 'alert("Delete sorgusu yanlış girildiğinden delete işlemi yapılmadı.")';
    echo '</script>';
    }

    else
    {

    echo $cleanStr .'<br>'; 
    $dir2 = new DirectoryIterator($dizi[2]);
    $filestat = stat($dir2);
    //tumBilgiler($dir2,$filestat);
    
 


try {
  

    if (str_contains($cleanStr, 'name')==true) {
        echo '<script language="javascript">';
        echo 'alert("Delete işleminde name parametresi zorunludur. Rastgele dosya silmeyi engellemek için yapılmıştır.")';
        echo '</script>';
    }
    else
    {
        $hatasay =0;
        $type=null;
    global $silinecek_Path;
        for ($x = 4; $x <= count($dizi); $x+=4) {
      
              $dizi2 = explode("=" , $dizi[$x]);  
              
  
           
            
           
          switch ($dizi2[0]) {
              case "size":
                  $silinecek_veri = $dizi[$x+2];
                  
                              $size = dosyaSize($dir2);
                              if($silinecek_veri !=$size)
                              {
                                  $hatasay++;
                              }
                
                  break;
              case "permission":
                  $silinecek_veri = $dizi[$x+2];
                  
                              $permission = dosyaPermission($dir2,$silinecek_veri);
                              
                              if($silinecek_veri !=$permission)
                              {
                                  $hatasay++;
                              }
               
                  break;
              case "hardlink":
                $silinecek_veri = $dizi[$x+2];
                       
                                     
                                      
                if($silinecek_veri !=dosyaLink($dir2,$filestat,$silinecek_veri))
                {
                    $hatasay++;
                }
                else
                {
                    $hardlink = $silinecek_veri;
                    
                }
               
                  break;
                  case "user":
                      $silinecek_veri = $dizi[$x+2];
                   
                              $user =dosyaOwner($dir2);
                              if($silinecek_veri !=$user)
                              {
                                  $hatasay++;
                              }
                   
                      break;
                      case "group":
                        $silinecek_veri = $dizi[$x+2];
                                 
                                      $group = dosyaGroup($dir2,$silinecek_veri);
                                     
                                      if($silinecek_veri !=$group)
                                      {
                                          $hatasay++;
                                      }
                                      else
                                      {
                                          $group = $silinecek_veri;
                                          
                                      }
                                   
                               
                                  break;
                      case "date":
                          $silinecek_veri = $dizi[$x+2];
                              $date = dosyaMTime($dir2);
                              if($silinecek_veri !=$date)
                              {
                                  $hatasay++;
                              }
                     
                          break;
                          case "type":
                              $silinecek_veri = $dizi[$x+2];
                              $type = dosyaType($dir2,$silinecek_veri);
                              
                        
  
                              if($silinecek_veri !=$type)
                              {
                                  $hatasay++;
                              }
                             
                           
                              break;
                          case "name":
                              $silinecek_veri = $dizi[$x+2];
                              $ad = adıGetir($dir2,$silinecek_veri);
                           
                            
                              if($silinecek_veri !=$ad)
                              {
                                 
                                  $hatasay++;
                              }
                              break;
              default:
                 
                  $hatasay++;
              }
      
          
          }
      
          if($hatasay===0)
          {
            echo $silinecek_Path;

              
               if(str_contains($cleanStr, 'group') && str_contains($cleanStr, 'hardlink'))
              {
                groupNHardlinkDelete($dir2,$group,$filestat,$hardlink);
                echo $silinecek_Path;
                echo "Delete işlemi";
              }
              else
              {
                echo "Delete işlemi";
                unlink($silinecek_Path);
              }
              //echo $silinecek_Path;
              //unlink($silinecek_Path);
          }
          else
          {
              echo '<script language="javascript">';
              echo 'alert("Sorgu yanlış veya silinecek dosya klasörde bulunmuyor!")';
              echo '</script>';
              
          }
    }
    
    
} catch (\Throwable $th) {
    throw $th;
}
    

    }


}


else if($dizi[0] == "Insert" || $dizi[0] == "insert")
{

try {
    echo $cleanStr .'<br>';     

    if($dizi[1] !== "into" && $dizi[1] !== "INTO" && $dizi[1] !== "Into"){

        echo '<script language="javascript">';
        echo 'alert("Insert sorgusu yanlış girildiğinden insert işlemi yapılmadı.")';
        echo '</script>';
        }
   
    if($dizi[3] !== "VALUES" && $dizi[3] !== "values" && $dizi[3] !== "Values"){
       
        echo '<script language="javascript">';
        echo 'alert("Insert sorgusu yanlış girildiğinden insert işlemi yapılmadı.")';
        echo '</script>';
        }
        else
        {
            
$sql_path =  $_REQUEST['sql_komut'];

//insert into C:/Users values deneme
//C:\Users\Boran\Documents\
//Eger random bir directory belirlenirse otomatik olarak yerel sunucunun htdocs klasorunde ilgili dosya ve klasor olusturulur.


$dizi = explode (" ",$sql_path);

$pathdir = $dizi[2];

$insertdeger = "insert into"." ". $pathdir." "."values";
$sonuc = str_contains($sql_path,$insertdeger); 
// Değişken var mı yok mu onu kontrol eder.

//dizinin 2. index'i C:/Users

if($sonuc === true && $pathdir !== "") {

if(count($dizi) == 5 && $dizi[4] != "") {

$insertdir = $dizi[4];
//print_r($insertdir);


$yazilacakdosya1 = "$insertdir";
$icerik = "Dosya Olusturuldu";


// if( is_dir($insertdir) === false )
// {mkdir($pathdir.$yazilacakdosya1);}

$file = fopen("$pathdir $yazilacakdosya1","w");


fwrite($file, $icerik);
print_r("Dosya Olusturuldu");
fclose($file);

} // dizi uzunluk if gövde sonu
else {
    echo '<script language="javascript">';
        echo 'alert("Hatalı veri girişi.")';
        echo '</script>';
}
} // sonuc if gövde sonu 

else {
print_r("Sorguyu Yanlış Girdiniz");
}
        }

} catch (\Throwable $th) {
    throw $th;
}
    
}
else if($dizi[0] == "Select" || $dizi[0] == "select")
{

    try {
        $dir2 = new DirectoryIterator($dizi[3]);
        echo $cleanStr .'<br>'; 
         $filestat = stat($dir2);

    if($dizi[2] !== "from" && $dizi[2] !== "FROM" && $dizi[2] !== "From"){

        echo '<script language="javascript">';
        echo 'alert("Select sorgusu yanlış girildiğinden select işlemi yapılmadı.")';
        echo '</script>';
        }
        else if($dizi[1] == "*" && str_contains($cleanStr, 'where')==false){
            try {
                tumBilgiler($dir2,$filestat);
            } catch (\Throwable $th) {
                //throw $th;
            }

           
            }
            else if($dizi[1] == "*" && str_contains($cleanStr, 'where')==true){
                try {
                    echo '<script language="javascript">';
                    echo 'alert("Tüm dosyaları listelerken şart konulamaz!")';
                    echo '</script>';
                    
                } catch (\Throwable $th) {
                    //throw $th;
                }
    
               
                }
            else
            {


               
                
                $hatasay =0;
                $degiskenSay=0;
                $type=null;
                $size=null;
                $hardlink=null;
                $name=null;
                $user=null;
                $date=null;
                $group=null;
                $permission=null;
                $deneme = null;
               
                if(str_contains($cleanStr, 'where')==true && $dizi[4]!="where")
                {
                        $hatasay++;
                }
                for ($x = 5; $x <= count($dizi); $x+=4) {
              
                      $dizi2 = explode("=" , $dizi[$x]);  
                      $deneme .= $dizi2[0].',';
          
                   
                    
                   
                  switch ($dizi2[0]) {
                      case "size":
                          $silinecek_veri = $dizi[$x+2];
                          kontrol($silinecek_veri);

                         
                              
                            $int = (int) filter_var($silinecek_veri, FILTER_SANITIZE_NUMBER_INT);
                                

                            if($silinecek_veri == $int.'K'||$silinecek_veri == $int.'k')
                            {
                                $silinecek_veri= $int*1024;
                            
                            }
                            else  if($silinecek_veri == $int.'M'|| $silinecek_veri == $int.'m')
                            {
                                $silinecek_veri= $int*1048576;
                            
                            }
                            else  if($silinecek_veri == $int.'G'|| $silinecek_veri == $int.'g')
                            {
                                $silinecek_veri= $int*1073741824;
                             
                            }
                            else
                            {
                                
                                echo '<script language="javascript">';
                                echo 'alert("Şartın Regular expressiona aykırı")';
                                echo '</script>';
                                $hatasay++;
                            }
                           
                                     
                                          $degiskenSay++;
                                          $size = $silinecek_veri;
                                          
                                      
                        
                          break;
                      case "permission":
                          $silinecek_veri = $dizi[$x+2];
                         
                          kontrol($silinecek_veri);
                          $degiskenSay++;
                                      if($silinecek_veri !=dosyaPermission($dir2,$silinecek_veri))
                                      {
                                          
                                          $hatasay++;
                                      }
                                      else
                                      {
                                      
                                          $permission = $silinecek_veri;
                                          
                                      }
                       
                          break;
                      case "hardlink":
                          $silinecek_veri = $dizi[$x+2];
                       
                          kontrol($silinecek_veri);
                          $degiskenSay++;
                                      if($silinecek_veri !=dosyaLink($dir2,$filestat,$silinecek_veri))
                                      {
                                          $hatasay++;
                                      }
                                      else
                                      {
                                          $hardlink = $silinecek_veri;
                                          
                                      }
                       
                          break;
                          case "user":
                              $silinecek_veri = $dizi[$x+2];
                              $degiskenSay++;
                              kontrol($silinecek_veri);
                                      if($silinecek_veri !=dosyaOwner($dir2,$silinecek_veri))
                                      {
                                          $hatasay++;
                                      }
                                      else
                                      {
                                          $user = $silinecek_veri;
                                          
                                      }
                                   
                           
                              break;
                              case "group":
                                  $silinecek_veri = $dizi[$x+2];
                                  kontrol($silinecek_veri);
                                      $group = dosyaGroup($dir2,$silinecek_veri);
                                      $degiskenSay++;
                                      if($silinecek_veri !=$group)
                                      {
                                          $hatasay++;
                                      }
                                      else
                                      {
                                          $group = $silinecek_veri;
                                          
                                      }
                                   
                               
                                  break;
                              case "date":
                                  $silinecek_veri = $dizi[$x+2];
                                  $degiskenSay++;
                                  kontrol($silinecek_veri);
                                      
                                      if($silinecek_veri !=dosyaMTime($dir2))
                                      {
                                          $hatasay++;
                                      }
                                      else
                                      {
                                          $date = $silinecek_veri;
                                          
                                      }
                             
                                  break;
                                  case "type":
                                      $silinecek_veri = $dizi[$x+2];
                                      
                                      $degiskenSay++;
                                      kontrol($silinecek_veri);
          
                                      if($silinecek_veri !=dosyaType($dir2,$silinecek_veri))
                                      {
                                          
                                          $hatasay++;
                                      }
                                      else
                                      {
                                          $type = $silinecek_veri;
                                          
                                      }
                                   
                                      break;
                                  case "name":

                                      $silinecek_veri = $dizi[$x+2];
                                      $degiskenSay++;
                                     kontrol($silinecek_veri);
                                     if($silinecek_veri !=adıGetir($dir2,$silinecek_veri))
                                      {
                                         
                                          $hatasay++;
                                      }
                                     
                                      else
                                      {
                                          $name = $silinecek_veri;
                                          
                                      }
                                      break;
                      default:
                         
                          $hatasay++;
                      }
              
                  
                  }

                  
                if($degiskenSay>1 && str_contains($cleanStr, '&&')==false)
                {
                     echo '<script language="javascript">';
                        echo 'alert("Şartlar && ile ayrılmalı")';
                        echo '</script>';
                        $hatasay;
                }
                else
                {



                    try {
                    
                        $deneme2=null; 
                        
                        if($dizi[1]!="*" && str_contains($dizi[1], ','))
                        {
                            $dizi3 = explode("," , $dizi[1]); 
                            
                            for($x = 0; $x <= count($dizi2); $x++)
                            {
                                $deneme2.=$dizi3[$x].',';
                            }
                
                            if($deneme!=$deneme2)
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Girilen ¸sartların hepsinin ataması yapılmalı")';
                              
                                echo '</script>';
                                
                              $hatasay++;
                            }
                         }
                         else if(str_contains($dizi[1], ',')==false && $dizi[1]!="*")
                         {
                                $deneme2=$dizi[1].',';
                                
                                if($deneme!=$deneme2)
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Wheredeki değişkenler uyuşmuyor!")';
                                echo '</script>';
                                 $hatasay++;
                            }
                            else
                            {
                                tumBilgiler2($dir2,$filestat,$deneme2,$name,$type,$hardlink,$user,$group,$permission,$size,$date);
                            }
                         }
                         
                        }
                        catch (\Throwable $th) {
                        //throw $th;
                    }
                  
                       if($hatasay===0)
                      {
    
                       
                       
                        if(str_contains($cleanStr, 'name')&&str_contains($cleanStr, 'type'))
                        {
                            adNType($dir2,$name,$filestat,$type);
                       
                        }
                        else if(str_contains($cleanStr, 'permission')&& str_contains($cleanStr, 'user'))
                        {
                           
                            permissionNUser($dir2,$permission,$filestat,$user);
                           
                        }
    
                        else if(str_contains($cleanStr, 'group')&& str_contains($cleanStr, 'hardlink'))
                        {
                           
                            groupNHardlink($dir2,$group,$filestat,$hardlink);
                           
                        }
                        else if(str_contains($cleanStr, 'permission')&& str_contains($cleanStr, 'type'))
                        {
                           
                            permissionNType($dir2,$permission,$filestat,$type);
                           
                        }
    
                        else if(str_contains($cleanStr, 'name')&& str_contains($cleanStr, 'date'))
                        {
                           
                            dateNName($dir2,$date,$filestat,$name);
                           
                        }
                        else if(str_contains($cleanStr, 'name')&& str_contains($cleanStr, 'size'))
                        {
                           
                            sizeNname($dir2,$size,$filestat,$name);
                           
                        }
                        
                          
                      }
                      else
                      {
                       
                          echo '<script language="javascript">';
                          echo 'alert("Sorgu yanlış veya silinecek dosya klasörde bulunmuyor!")';
                          echo '</script>';
                          
                      }

                }




            }
      
    } catch (\Throwable $th) {
       
        echo '<script language="javascript">';
        echo 'alert("Girdiğiniz sorgu yanlış")';
        echo '</script>';
    }
    

}
else
{
    
        echo '<script language="javascript">';
        echo 'alert("İlk deger select, delete veya insert olmalı")';
        echo '</script>';
}










//--------rmdir directory boş olmazsa silmemektedir. Bu fonksiyon silebilir.(KLASÖR SİLER!!)------------------


  function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}



//--------------- Belirtilen directorydeki DOSYAYI(KLASÖR DEĞİL) siler.-----------------
function deleteFile($dir)
{
unlink($dir);
}




?>

//------new.php------

<?php
set_time_limit(1000);


$dir_path =  $_REQUEST['kullanici_adi'];
$dosya_Adi =  $_REQUEST['dosya_adi'];

try {
    $filestat = stat($dir_path);
} catch (\Throwable $th) {
    //throw $th;
}

$dir = new DirectoryIterator($dir_path);
opendir($dir_path);


function tumBilgiler(){
    global $dir_path;
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

function dosyaBula()
{

    try {
        global $dosya_Adi;
        global $dir_path;
        global $dir;
        global $filestat;


    $path = realpath($dir_path);

    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
    foreach($objects as $name => $object){
        
        if($object->getFilename() == $dosya_Adi) {
           

            echo "--------------------<br>";
                
            echo "Dosya adı : ".$object->getFilename().'<br>';
            echo "Dosya Size : ".round($object->getSize() / 1024).' KB<br>';
       
            echo "Dosya Owner'ı : ".$object->getOwner().'<br>';
            echo "Dosya değiştirilme zamanı : ".date('F d Y, H:i:s',$object->getMTime()).'<br>';
            $octal_perms = substr(sprintf('%o', $object->getPerms()), -4);
            echo  " Dosya Permission : " . $octal_perms . "<br>";
            echo 'Number of links to file: '.$filestat['nlink'].'<br>';
            echo "Group  : ".$object->getGroup().'<br>';
          
            echo "Type  : ".$object->getType().'<br>';
            echo "Path  : ".$object->getPathname().'<br>';
            
        }
        
    }
    } catch (\Throwable $th) {
        //throw $th;
    }
   


}

if($dosya_Adi=="*")
{
tumBilgiler();
}
else if($dosya_Adi!=="")
{
    dosyaBula();
}
else
{
         echo '<script language="javascript">';
        echo 'alert("Dosya ismi boş bırakılamaz")';
        echo '</script>';
}


if(array_key_exists('test',$_POST) && $dosya_Adi=="*"){
    get_all_directory_and_files($dir_path);
 }
 


function get_all_directory_and_files($dir){
    
    try {
        $dh = new DirectoryIterator($dir);   

    foreach ($dh as $item) {
        if (!$item->isDot()) {
           if ($item->isDir()) {
               get_all_directory_and_files("$dir/$item");
           } else {
              

            echo '<li><a href="'.$item->getFilename().'">'.$item->getFilename().'</a></li>';
                echo $item->getPathname().'<br>';
                
                
              
               
                
            
           }
        }
     }
    } catch (\Throwable $th) {
        //throw $th;
    }
 
    
  }
 












?>

