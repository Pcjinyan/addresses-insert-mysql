<?php 
  /**
   * @author
   */
    //数据库连接
    $con = new mysqli(HOSTNAME,DBUSER,DBPWD, DBNAME);
    
    //读取json文件
    $filename = 'areas.json';
    $myfile = fopen($filename,'r');
    $content = fread($myfile,filesize($filename));
    $de_json = json_decode($content,True);
    $count_json = count($de_json);

    //循环插入
    foreach ($de_json as $province => $area1)
    {
      foreach ($area1 as $city => $area2 )
      {
        foreach ($area2 as $town)
        {
          $sql = "INSERT INTO adbugo.addresses (province, city, area) VALUES ('$province', '$city', '$town')";
          mysqli_query($con, $sql);
        }
      }
    }
    //关闭数据库
    mysqli_close($con);
?>
