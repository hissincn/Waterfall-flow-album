<?php


require('function.php');


if (isset($_POST['picsub'])) {
    $picurl='"'.$_POST['picurl'].'"';
    $picname='"'.$_POST['picname'].'"';
    $piczhu='"'.$_POST['piczhu'].'"';
    //$subfr=$_POST['picname'].'<br/><p style="font-weight:200;">'.$_POST['piczhu'].'</p>';
    //$subname="'${subfr}'";
 
    getsql("INSERT INTO album_pic (name,description,url) VALUES ($picname, $piczhu,$picurl)");
    
    echo "<script language=JavaScript> location.replace(location.href);</script>";


}

?>
<html>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" id="picname" name="picname" placeholder="图片名称">
<input type="text" id="piczhu" name="piczhu" placeholder="图片注释">
<input type="text" id="picurl" name="picurl" placeholder="图片url">
<input type="submit" id="picsub" name="picsub">

</form>


</html>