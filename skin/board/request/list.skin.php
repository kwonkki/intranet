<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// ���ÿɼ����� ���� ����ġ�Ⱑ ���������� ����
$colspan = 7;

if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

$board_color = explode(",",$board[bo_color]);

// ������ ���ٷ� ǥ�õǴ� ��� �� �ڵ带 ����� ������.
//<nobr style='display:block; overflow:hidden; width:000px;'>����</nobr>
?>

<style>
.board_top { clear:both; }

.board_list { clear:both; width:100%; table-layout:fixed; margin:5px 0 0 0; }
.board_list th { font-weight:bold; font-size:12px; background-color:#FFFFFF; }
.board_list th { border-top:3px solid <?=$board_color[0]?>; border-bottom:1px solid <?=$board_color[0]?>; }
.board_list th { white-space:nowrap; height:36px; overflow:hidden; text-align:center; color:<?=$board_color[1]?>; }

.board_list tr.notice { font-weight:normal; background-color:#F8F8F8; }

.board_list td { padding:.5em; }
.board_list td { border-bottom:1px solid #ECDEDE; } 
.board_list td.num { font:normal 11px tahoma; color:#5E5E5E; text-align:center; }
.board_list td.checkbox { text-align:center; }
.board_list td.subject { overflow:hidden; }
.board_list td.name { text-align:center; }
.board_list td.datetime { font:normal; text-align:center;}
.board_list td.hit { font:normal 11px tahoma; color:#5E5E5E; text-align:center; }
.board_list td.good { font:normal 11px tahoma; color:#5E5E5E; text-align:center; }
.board_list td.nogood { font:normal 11px tahoma; color:#5E5E5E; text-align:center; }

.board_list .notice { font-weight:normal; background-color:#F8F8F8; }
.board_list .current { font:bold 11px tahoma; color:#E15916; }
.board_list .comment { font-family:Tahoma; font-size:10px; color:#EE5A00; }

.board_list a:link, .board_list a:visited, .board_list a:active { text-decoration:none; font-weight:bold; color:#5E5E5E; }
.board_list a:hover { text-decoration:none; font-weight:bold; color:<?=$board_color[1]?>; }

.board_list a.title:link, a:visited, a:active { text-decoration:none; font-weight:bold; color:<?=$board_color[1]?>; }
.board_list a.title:hover { text-decoration:none; font-weight:bold; color:#A9AEE4; }

.board_button { clear:both; margin:10px 0 0 0; }

.board_page { clear:both; text-align:center; margin:3px 0 0 0; }
.board_page a:link, .board_page a:visited, .board_page a:active { text-decoration:none; font-weight:bold; color:#5E5E5E; }
.board_page a:hover { text-decoration:none; font-weight:bold; color:<?=$board_color[1]?>; }

.board_search { text-align:center; margin:10px 0 0 0; }
.board_search .stx { height:21px; border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; }
.date_end { font:normal; text-align:center; font:bold 11px tahoma; color:#0056a7; }
.ing { font:normal; text-align:center; font:bold 11px tahoma; color:#f05133; }
 a:link    {color:#666; text-decoration:none;}
 a:visited {color:#666; text-decoration:none;}
 a:hover   {color:#f36b2f; text-decoration:none;}
 a:active  {color:#f36b2f; text-decoration:none;}
</style>

<!-- �Խ��� ��� ���� -->
<table width="980" align="center" cellpadding=0 cellspacing=0><tr><td>
<tr height="25"><td>

	<!-- �з� ����Ʈ �ڽ�, �Խù� ���, ������ȭ�� ��ũ -->
    <div class="board_top">
        <div style="float:left;">
            <form name="fcategory" method="get" style="margin:0px;">
            <? if ($is_category) { ?>
            <select name=sca onchange="location='<?=$category_location?>'+<?=strtolower($g4[charset])=='utf-8' ? "encodeURIComponent(this.value)" : "this.value"?>;">
            <option value=''>��ü</option>
            <?=$category_option?>
            </select>
            <? } ?>
            </form>
        </div>
        <div style="float:right;">
            <img src="<?=$board_skin_path?>/img/icon_total.gif" align="absmiddle" border='0'>
            <span style="color:#888888; font-weight:bold;">Total <?=number_format($total_count)?></span>
            <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border='0' align="absmiddle"></a><?}?>
            <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" border='0' title="������" align="absmiddle"></a><?}?>
        </div>
    </div>

	<!-- ���� -->
    <form name="fboardlist" method="post">
    <input type='hidden' name='bo_table' value='<?=$bo_table?>'>
    <input type='hidden' name='sfl'  value='<?=$sfl?>'>
    <input type='hidden' name='stx'  value='<?=$stx?>'>
    <input type='hidden' name='spt'  value='<?=$spt?>'>
    <input type='hidden' name='page' value='<?=$page?>'>
    <input type='hidden' name='sw'   value=''>

    <table cellspacing="0" cellpadding="0" class="board_list">
    <col width="30" />
   <!-- <? if ($is_checkbox) { ?><col width="40" /><? } ?>-->
    <col width="120" />
    <col width="240" />
    <col width="70" />
    <col width="70" />
    <col width="70" />
    <col width="70" />
    <col width="70" />
	<col width="60" />
    <tr>
        <th>��ȣ</th>
        <!-- <? if ($is_checkbox) { ?><th><input onclick="if (this.checked) all_checked(true); else all_checked(false);" type="checkbox"></th><?}?>-->        
		<th>������Ȳ</a></th>
		<th>������Ʈ��</th>
        <th>��ȹ��</th>
		<th>�����̳�</th>
		<th>���α׷���</th>
        <th>������</a></th>
        <th>�ϷΌ����</a></th>
		<th>�����</a></th>
    </tr>

<? 
    for ($i=0; $i<count($list); $i++) { 
        $bg = $i%2 ? 0 : 1;
    ?>

    <tr <?=($list[$i][is_notice])?"class='notice'":"";?>>
        <td class="num">
            <? 
            if ($list[$i][is_notice]) // �������� 
                echo "<b>����</b>";
            else if ($wr_id == $list[$i][wr_id]) // ������ġ
                echo "<span class='current'>{$list[$i][num]}</span>";
            else
                echo $list[$i][num];
            ?>
        </td>
        <!-- <? if ($is_checkbox) { ?><td class="checkbox"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?> -->
		<td align="center">
		<?
			if($list[$i][wr_5] == "����") echo "<img src='$board_skin_path/img/order1.gif' align='absmiddle' border='0'>";
			elseif($list[$i][wr_5] == "������") echo "<img src='$board_skin_path/img/order2.gif' align='absmiddle' border='0'>";
			elseif($list[$i][wr_5] == "����") echo "<img src='$board_skin_path/img/order3.gif' align='absmiddle' border='0'>";
			elseif($list[$i][wr_5] == "�Ϸ�") echo "<img src='$board_skin_path/img/order4.gif' align='absmiddle' border='0'>";
			else echo "<img src='$board_skin_path/img/order1.gif' align='absmiddle' border='0'>";
		?>
		</td>
        <td class="subject">
            <? 
            echo $nobr_begin;
            echo $list[$i][reply];
            echo $list[$i][icon_reply];
            if ($is_category && $list[$i][ca_name]) { 
                echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
            }
            
			echo "<a href='{$list[$i][href]}'>{$list[$i][subject]}</a>";

            if ($list[$i][comment_cnt]) 
                echo " <a href=\"{$list[$i][comment_href]}\"><span class='comment'>{$list[$i][comment_cnt]}</span></a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            echo " " . $list[$i][icon_new];
            echo " " . $list[$i][icon_file];
            echo " " . $list[$i][icon_link];
            echo " " . $list[$i][icon_hot];
            echo " " . $list[$i][icon_secret];
            echo $nobr_end;
            ?>
        </td>
		<td class="name"><?=$list[$i][name]?></td>
        <td class="name">&nbsp;<?=$list[$i][wr_2]?></td>
		<td class="name">&nbsp;<?=$list[$i][wr_3]?></td>
		<td class="datetime">&nbsp;<?=$list[$i][datetime]?></td>
		<td class="date_end">&nbsp;<?=$list[$i][wr_4]?></td>
        <td class="ing">&nbsp;<?=$list[$i][wr_6]?>%</td>
        </tr>
    <? } // end for ?>

	<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>�Խù��� �����ϴ�.</td></tr>"; } ?>

	<tr height="3"><td colspan="<?=$colspan?>" bgcolor="<?=$board_color[0]?>"></td></tr>

    </table>
    </form>

	<div class="board_button">
        <div style="float:left;">
        <? if ($list_href) { ?>
        <a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/btn_list.gif" align="absmiddle" border='0'></a>
        <? } ?>
        <!--<? if ($is_checkbox) { ?>
         <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" align="absmiddle" border='0'></a> 
        <? } ?>-->
        </div>

        <div style="float:right;">
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border='0'></a><? } ?>
        </div>
    </div>

    <!-- ������ -->
    <div class="board_page">
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/page_search_prev.gif' border='0' align=absmiddle title='�����˻�'></a>"; } ?>
        <?
        // �⺻���� �Ѿ���� �������� �Ʒ��� ���� ��ȯ�Ͽ� �̹����ε� ����� �� �ֽ��ϴ�.
        //echo $write_pages;
        $write_pages = str_replace("ó��", "<img src='$board_skin_path/img/page_begin.gif' border='0' align='absmiddle' title='ó��'>", $write_pages);
        $write_pages = str_replace("����", "<img src='$board_skin_path/img/page_prev.gif' border='0' align='absmiddle' title='����'>", $write_pages);
        $write_pages = str_replace("����", "<img src='$board_skin_path/img/page_next.gif' border='0' align='absmiddle' title='����'>", $write_pages);
        $write_pages = str_replace("�ǳ�", "<img src='$board_skin_path/img/page_end.gif' border='0' align='absmiddle' title='�ǳ�'>", $write_pages);
        //$write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "$1", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><span style=\"color:$board[bo_color]; font-size:12px; text-decoration:none;\">$1</span></b>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/page_search_next.gif' border='0' align=absmiddle title='�����˻�'></a>"; } ?>
    </div>

	<!-- �˻� -->
    <div class="board_search">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?=$bo_table?>">
        <input type="hidden" name="sca"      value="<?=$sca?>">
        <select name="sfl">
			<option value="wr_subject||wr_content">������Ʈ��+����</option>
            <option value="mb_id,1">ȸ�����̵�</option>
            <option value="mb_id,0">ȸ�����̵�(��)</option>
            <option value="wr_name,1">�۾���</option>
            <option value="wr_name,0">�۾���(��)</option>
        </select>
        <input name="stx" class="stx" maxlength="15" itemname="�˻���" required value='<?=stripslashes($stx)?>'>
        <input type="image" src="<?=$board_skin_path?>/img/btn_search.gif" border='0' align="absmiddle">
        <input type="radio" name="sop" value="and">and
        <input type="radio" name="sop" value="or">or
        </form>
    </div>

</td></tr></table>

<script language="JavaScript">
if ("<?=$sca?>") document.fcategory.sca.value = "<?=$sca?>";
</script>

<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw)
{
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str)
{
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "�� �Խù��� �ϳ� �̻� �����ϼ���.");
        return false;
    }
    return true;
}

// ������ �Խù� ����
function select_delete()
{
    var f = document.fboardlist;

    str = "����";
    if (!check_confirm(str))
        return;

    if (!confirm("������ �Խù��� ���� "+str+" �Ͻðڽ��ϱ�?\n\n�ѹ� "+str+"�� �ڷ�� ������ �� �����ϴ�"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// ������ �Խù� ���� �� �̵�
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "����";
    else
        str = "�̵�";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=396, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- �Խ��� ��� �� -->