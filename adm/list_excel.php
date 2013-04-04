<? 
include_once("./_common.php");

if ( !($is_admin == "super") ) {
	alert("no permission", "{$g4['path']}");	
}
 

include "../dbconfig.php";
$db_conn = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('can not access.');
mysql_select_db($mysql_db, $db_conn);


$foo = array();
for ($i=0; $i<count($chk); $i++) 
{
    // 실제 번호를 넘김
    $k = $_POST['chk'][$i];

    $mb_id = $_POST['mb_id'][$k];
	$foo[] = '"'.$mb_id.'"';
}


$file_name =	date("Ymd");


header( "Content-type: application/vnd.ms-excel" ); 
header( "Content-Disposition: attachment; filename=$file_name.xls" ); 
header( "Content-Description: PHP4 Generated Data" );


$sql = "select mb_no, mb_id, mb_password, mb_name, mb_nick, mb_email, mb_level, mb_jumin, mb_hp, mb_tel, mb_point, mb_datetime from $g4[member_table] where mb_level < 10 and ( mb_id IN (". implode(",", $foo) ." )) limit 1000";

$result = @mysql_query($sql); 


?> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<style type="text/css">

.txt {mso-number-format:'\@'}
</style>
</head>

<body>
<table border="1"> 
  <tr style="background-color : #d3d3d3" >
    <td align=center  colspan="5"><h1>리스트</h1></td>
  </tr>
  <tr style="background-color : #eee">
    <td align=center>아이디</td>
    <td align=center>메일</td>
    <td align=center>전번</td>
    <td align=center>이름</td>
    <td align=center>닉네임</td>
  </tr>



<? 
while($data=mysql_fetch_array($result)) { 
echo "
  <tr> 
    <td align=center>$data[mb_id]</td>
    <td align=center>$data[mb_email]</td>
    <td align=center>$data[mb_hp]</td>
    <td align=center>$data[mb_name]</td>
    <td align=center>$data[mb_nick]</td>
  </tr>
";
  } 
?>

</table> 
</body> 
</html>