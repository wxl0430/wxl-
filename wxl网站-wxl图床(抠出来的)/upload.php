<?php
$test = strtolower($_FILES["file"]["type"]);
if ((($_FILES["file"]["type"] == "image/jpeg")))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        $md5file = md5_file($_FILES["file"]["tmp_name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"],"img/" . $md5file.".jpg");
        $f=fopen("img//".$md5file.".jpg.ini","w");
        fwrite($f,"name=".$md5file.".jpg\ntime=".mktime()."\nwname=".$_FILES["file"]["name"]."\nsc=".$_POST["sc"]);
        fclose($f);
        echo "上传成功";
    }
}
Header("Location: index.php ");
?>