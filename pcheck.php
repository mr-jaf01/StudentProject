<?php require 'init.php'; ?>
<?php include 'head.php'; ?>
<body>
<?php include 'dashboard_navbar.php'; ?>
<h3>Content Plagiarism Check</h3>
<?php
$err = "";
$text_1 = "";
$text_2 = "";
$var_1 = "";
$var_2 = "";
$matching = "";
$percentage = "";

if(isset($_POST['btnSearch']))
{
	$matching=0;
	
	$text_1=$_POST['firstText'];
	$text_2=$_POST['secondText'];
	 
	$var_1 = explode(' ', $text_1);
	$var_2 = explode(' ', $text_2);
	
	$num_word=count($var_1);
	$num_word2=count($var_2);
	
	$total=$num_word+$num_word2;
	
	for ($word_num=0; $word_num < count($var_1); $word_num++) {	
			$pos = strpos("x".$text_2, $var_1["$word_num"]);
			if ($pos != "") {
				$matching=$matching+1;
			}
	}
	
	$percentage=($matching/($total/2))*100;
	$percentage= number_format($percentage, 0, '.', ',');
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<title>Plagiarism Checker</title>
<style type="text/css">
.style1 {
	font-size: 21px;
	font-weight:bold;
}

.style2 {
	font-size: 30px;
	font-weight:bold;
	color:#00F;
}
</style>
</head>
<body>
	<div id="wrap">
    <table width="75%" align="center" background="bg.png">
      <tr>
        <td width="60%" height="7" colspan="3" id="header3"></td>
      </tr>
      <tr>
        <td colspan="3" align="center" id="header"><img src="logo.png" width="278" height="111" alt="" /></td>
      </tr>
      <tr>
        <td colspan="3" id="header2"></td>
      </tr>
      <tr>
        <td colspan="3" align="center">
        <form action="" method="post">
        	<table width="75%">
              <?php 
			  if($matching !="" and $percentage !="")
			  { 
			  ?>
              <tr bgcolor="#c7cfd1">
              	<td colspan="2" align="center">
					<table width="100%">
                    	<tr bgcolor="#759ebe">
                        	<td width="50%" align="center" bgcolor="#759ebe">
                            <br><span class="style1">Number of Matching</span><br>
                            <br><span class="style2"><?php echo "$matching"; ?></span><br><br>
                            </td>
                        	<td align="center" bgcolor="#759ebe">
                            <br><span class="style1">Matching Percentage</span><br>
                            <br><span class="style2"><?php echo "$percentage"; ?>%</span><br><br>
                            </td>
                        </tr>
                   	</table>
                </td>
              </tr>
              <?php
			  } ?>
              <tr bgcolor="#c7cfd1">
                <td width="50%" align="center">
                  Content 1
                	<textarea class="textarea" cols="60" rows="12" name="firstText" ><?php echo $text_1;?></textarea>
                </td>
                <td align="center">
                Content 2
                	<textarea class="textarea" cols="60" rows="12" name="secondText" ><?php echo $text_2;?></textarea>
                </td>
              </tr>
              <tr bgcolor="#c7cfd1">
                <td colspan="2" align="center">
					<input type="submit" name="btnSearch" id="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Search &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" />
                </td>
              </tr>
            </table>
        </form>
        </td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
    </table>
</div>
