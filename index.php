<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

.my_class
{
  max-height:200px;
  overflow:scroll;
  width:500px;
  margin-left:500px;
  margin-top:50px;
}
    </style>
  </head>

  <body style="text-align: center; background-color: rgb(206, 202, 202);">
    <h1>Dosya Sistemleri ve SQL Cümleleri Üzerine Uygulama Geliştirme</h1>
    <form method="post" action="new.php" style="margin-top:50px;">
      Path : <input type="text" name="kullanici_adi" style="width: 300px;">
      Dosya Adı : <input type="text" name="dosya_adi" style="width: 300px;">
      <input type="submit" name="submit" value="Dosya Listele" />
      <form method="post">
        <input type="submit" name="test" id="test" value="SubPath Listele" /><br />
      </form>
    </form>

    <form method="post" action="abc.php" style=" margin-top:50px;">
      sql komutu: <input type="text" name="sql_komut" style="width: 500px;">
      <input type="submit" name="submit" value="Sql Çalıştır" />
    </form>

    <?php

    echo '<div class="my_class">';
   
    echo include('deneme.php');
   
   
    echo '</div>';
      
    ?>
    
  </body>

</html>
