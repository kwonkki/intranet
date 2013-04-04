<?
if (!defined("_GNUBOARD_")) exit;

$begin_time = get_microtime();

include_once("$g4[path]/head.sub.php");

function print_menu1($key, $no)
{
    global $menu;

    $str = "<table width=130 cellpadding=1 cellspacing=0 id='menu_{$key}' style='position:absolute; display:none; z-index:1;' onpropertychange=\"selectBoxHidden('menu_{$key}')\"><colgroup><colgroup><colgroup width=10><tr><td rowspan=2 colspan=2 bgcolor=#EFCA95><table width=127 cellpadding=0 cellspacing=0 bgcolor=#FEF8F0><colgroup style='padding-left:10px'>";
    $str .= print_menu2($key, $no);
    $str .= "</table></td><td></td></tr><tr><td bgcolor=#DDDAD5 height=40></td></tr><tr><td width=4></td><td height=3 width=127 bgcolor=#DDDAD5></td><td bgcolor=#DDDAD5></td></tr></table>\n";

    return $str;
}


function print_menu2($key, $no)
{
    global $menu, $auth_menu, $is_admin, $auth, $g4;

    $str = "";
    for($i=1; $i<count($menu[$key]); $i++)
    {
        if ($is_admin != "super" && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], "r")))
            continue;

        if ($menu[$key][$i][0] == "-")
            $str .= "<tr><td class=bg_line{$no}></td></tr>";
        else
        {
            $span1 = $span2 = "";
            if (isset($menu[$key][$i][3]))
            {
                $span1 = "<span style='{$menu[$key][$i][3]}'>";
                $span2 = "</span>";
            }
            $str .= "<tr><td class=bg_menu{$no}>";
            if ($no == 2)
                $str .= "&nbsp;&nbsp;<img src='{$g4[hr_path]}/img/icon.gif' align=absmiddle> ";
            //$str .= "<a href='{$menu[$key][$i][2]}' style='color:#555500;'>{$span1}{$menu[$key][$i][1]}{$span2}</a></td></tr>";
            if ($menu[$key][$i][3]) 
                $target_link = "target='$menu[$key][$i][3]'"; 
            else 
                $target_link = ""; 
            $str .= "<a href='{$menu[$key][$i][2]}' {$target_link} style='color:#555500;'>{$span1}{$menu[$key][$i][1]}{$span2}</a></td></tr>";
            $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
        }
    }

    return $str;
}

function print_menu3($key, $no)
{
    global $menu, $auth_menu, $is_admin, $auth, $g4;
	
    $str = "<div id=\"{$key}\" style=\"display:none;\" class=\"ADM_SNB\">";
    for($i=1; $i<count($menu[$key]); $i++)
    {
        if ($is_admin != "super" && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], "r")))
            continue;
            $span1 = $span2 = "";
			if ($menu[$key][$i][0] != "-")
			{
				if (isset($menu[$key][$i][3]))
				{
					$span1 = "<span style='{$menu[$key][$i][3]}'>";
					$span2 = "</span>";
				}
				if ($no == 2)
					$str .= "<font color='white'>&nbsp;&nbsp;* </font>";
				$str .= "<a href='{$menu[$key][$i][2]}' style='color:white;'>{$span1}{$menu[$key][$i][1]}{$span2}</a> ";
			}

            $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
    }
    $str .= "</div>";

    return $str;
}


?>

<script language="JavaScript">
if (!g4_is_ie) document.captureEvents(Event.MOUSEMOVE)
document.onmousemove = getMouseXY;
var tempX = 0;
var tempY = 0;
var prevdiv = null;
var timerID = null;

function getMouseXY(e) 
{
    if (g4_is_ie) { // grab the x-y pos.s if browser is IE
        tempX = event.clientX + document.body.scrollLeft;
        tempY = event.clientY + document.body.scrollTop;
    } else {  // grab the x-y pos.s if browser is NS
        tempX = e.pageX;
        tempY = e.pageY;
    }  

    if (tempX < 0) {tempX = 0;}
    if (tempY < 0) {tempY = 0;}  

    return true;
}

function imageview(id, w, h)
{

    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - ( w + 11 );
    submenu.top  = tempY - ( h / 2 );

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}

function help(id, left, top)
{
    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - 50 + left + 'px';
    submenu.top  = tempY + 15 + top + 'px';

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}

// TEXTAREA 사이즈 변경
function textarea_size(fld, size)
{
	var rows = parseInt(fld.rows);

	rows += parseInt(size);
	if (rows > 0) {
		fld.rows = rows;
	}
}
</script>

<script type="text/javascript" src="<?=$g4['path']?>/js/common.js"></script>
<script type="text/javascript" src="<?=$g4['path']?>/js/sideview.js"></script>
<script language="JavaScript">
var save_layer = null;
function layer_view(link_id, menu_id, opt, x, y)
{
    var link = document.getElementById(link_id);
    var menu = document.getElementById(menu_id);

    //for (i in link) { document.write(i + '<br/>'); } return;

    if (save_layer != null)
    {
        save_layer.style.display = "none";
        selectBoxVisible();
    }

    if (link_id == '')
        return;

    if (opt == 'hide')
    {
        menu.style.display = 'none';
        selectBoxVisible();
    }
    else
    {
        x = parseInt(x);
        y = parseInt(y);
        menu.style.left = get_left_pos(link) + x + 'px';
        menu.style.top  = get_top_pos(link) + link.offsetHeight + y + 'px';
        menu.style.display = 'block';
    }

    save_layer = menu;
}
</script>

<link rel="stylesheet" href="<?=$g4['hr_path']?>/admin.style.css" type="text/css">
<style>
.bg_menu1 { height:22px; 
            padding-left:15px; 
            padding-right:15px; } 
.bg_line1 { height:1px; background-color:#EFCA95; } 

.bg_menu2 { height:22px; 
            padding-left:25px; } 
.bg_line2 { background-image:url('<?=$g4['hr_path']?>/img/dot.gif'); height:3px; } 
.dot {color:#D6D0C8;border-style:dotted;}

#csshelp1 { border:0px; background:#FFFFFF; padding:6px; }
#csshelp2 { border:2px solid #BDBEC6; padding:0px; }
#csshelp3 { background:#F9F9F9; padding:6px; width:200px; color:#222222; line-height:120%; text-align:left; }
</style>

<body leftmargin=0 topmargin=0>
<a name='gnuboard4_admin_head'></a>

<table width="1000" cellspacing="0" border="0" bgcolor="white" class="adm" style="position:relative;">
<tr>
<td valign=top width="80"><a href="<?=$g4['path']?>/"><img src="<?=$g4['hr_path']?>/img/admin_logo.gif" align="absmiddle" title='Go to the main website'/></a>
</td>
<td style="padding-top:5px;">
Your ip would be <?=$_SERVER["REMOTE_ADDR"]?>.
</td>
<td width="300" align="right">
<!--a href="javascript:;" onclick="change_lang(1);"><img src="<?=$g4['path']?>/adm/img/KR.png" align="absmiddle" /></a>
<a href="javascript:;" onclick="change_lang(0);"><img src="<?=$g4['path']?>/adm/img/US.png" align="absmiddle" /></a-->
<span class="button small gray"><input type="button" onClick="location.href='<?=$g4['path']?>/'" value="Home" style="width:60px;"></span>
<span class="button small gray"><input type="button" onClick="location.href='<?=$g4['hr_path']?>/'" value="admin home" style="width:60px;"></span>
<span class="button small red"><input type="button" onClick="location.href='<?=$g4['bbs_path']?>/logout.php'" value="logout" style="width:60px;"></span>
</td>
</tr>
</table>


<table width="1000" cellspacing="0" cellpadding="0">
<colgroup width="6">
<colgroup width="">
<colgroup width="6">
<tr height="43">
<td width="6"><img src="<?=$g4['hr_path']?>/img/ADM_LNB_LEFT.gif" align="absmiddle" /></td>
<td background="<?=$g4['hr_path']?>/img/ADM_LNB_BG.gif">
<?
echo "<a href=\"{$g4[hr_path]}\"><img src=\"{$g4[hr_path]}/img/0/ADM_LNB_000.gif\" style=\"margin:0 20px 0 10px;\"></a>";

for( $i = 9; $i >= 1; $i--)
{
	$tmp_menu_id = $i * 100;
	$key = "menu".$tmp_menu_id;

	if ($is_admin != "super" && (!array_key_exists($menu[$key][1][0], $auth) || !strstr($auth[$menu[$key][1][0]], "r")))
		continue;

	$onSelect = " onMouseOver=\"\$('.ADM_SNB').hide();\$('#{$key}').show();\"  ";

	$filename = "ADM_LNB_{$tmp_menu_id}";

	if( $menu[$key][0][1] )
	echo "<a href=\"{$menu[$key][1][2]}\"><img src=\"{$g4[hr_path]}/img/0/$filename.gif\" title=\"".$menu[$key][0][1]."\" style=\"margin:0 20px 0 10px;\" $onSelect ></a>";
}

?>
<!--<a href="<?=$g4[hr_path]?>/game_excel_write.php"><img src="<?=$g4[hr_path]?>/img/0/ADM_LNB_1100.gif" style="margin:0 20px 0 10px;" onMouseOver="$('.ADM_SNB').hide(); $('#menu950').show();"></a>-->
</td>
<td width="6"><img src="<?=$g4['hr_path']?>/img/ADM_LNB_RIGHT.gif" align="absmiddle" /></td>
</tr>
<tr height="31" bgcolor="white">
<td width="6"><img src="<?=$g4['hr_path']?>/img/ADM_SNB_LEFT.gif" align="absmiddle" /></td>
<td background="<?=$g4['hr_path']?>/img/ADM_SNB_BG.gif">
<?
for( $i = 9; $i >= 1; $i--)
{
	$tmp_menu_id = $i * 100;
	$key = "menu".$tmp_menu_id;

	echo print_menu3($key, 2);
}

echo print_menu3('menu950', 2);
?>
</td>
<td width="6"><img src="<?=$g4['hr_path']?>/img/ADM_SNB_RIGHT.gif" align="absmiddle" /></td>
</tr>
</table>






<table width=1004 cellpadding=0 cellspacing=0 border=0>
<colgroup width=180>
<colgroup>
<tr><td colspan=3 bgcolor=#C3BBB1 height=1></td></tr>
<tr><td colspan=3 bgcolor=#E5E5E5 height=2></td></tr>
<tr onmouseover="layer_view('','','','','')">
    <td></td>
    <td rowspan=2 width=1 bgcolor=#DBDBDB></td>
    <td bgcolor=#F8F8F8 align=right>
        <img src='<?=$g4['hr_path']?>/img/navi_icon.gif' align=absmiddle> 
        &nbsp;<a href='<?=$g4['hr_path']?>/'>Admin</a> > 
        <? 
        $tmp_menu = "";
        if (isset($sub_menu))
            $tmp_menu = substr($sub_menu, 0, 3);
        if (isset($menu["menu{$tmp_menu}"][0][1]))
        {
            if ($menu["menu{$tmp_menu}"][0][2])
            {
                echo "<a href='".$menu["menu{$tmp_menu}"][0][2]."'>";
                echo $menu["menu{$tmp_menu}"][0][1];
                echo "</a> > ";
            }
            else
                echo $menu["menu{$tmp_menu}"][0][1]." > ";
        }
        ?>
        <?=$g4['title']?> <span class=small>: <?=$member['mb_id']?></span>&nbsp;&nbsp;</td>
</tr>
<tr colspan"2" onmouseover="layer_view('','','','','')">
    <td valign=top>
        <table width=180 cellpadding=0 cellspacing=0>
        <?
        echo print_menu2("menu{$tmp_menu}", 2);
        ?>
        </table><br>
    </td>
    <td valign=top style='padding:10px;'>
