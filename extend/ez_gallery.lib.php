<?
if (!defined('_GNUBOARD_')) exit;

// �ֽű� ����
//('��Ų', �Խ����̸�, $rows=�Ѱ���, $cols=���ΰ���, $img_width=����ũ��, $img_height=����ũ��, $is_crop, $subject_len=������ڼ�, $list_content=������ڼ�, $subject_len2=������ڼ�, $gallery_view=��â, $options="", $target="")

function ez_gallery($skin_dir="", $bo_table, $rows=10, $cols="", $img_width="", $img_height="", $is_crop="", $subject_len=40, $list_content="", $subject_len2="", $gallery_view=0, $options="", $target="")
{
    global $g4;

    if ($skin_dir)
        $latest_skin_path = "$g4[path]/skin/latest/$skin_dir";
    else
        $latest_skin_path = "$g4[path]/skin/latest/basic";

   if ($target)
      $target_link = "target=" . $target;

    $list = array();

    $sql = " select bo_table, bo_notice, bo_subject, bo_subject_len, bo_use_list_content, bo_use_sideview, bo_use_comment, bo_hot, bo_use_search, bo_new from $g4[board_table] where bo_table = '$bo_table'";
    $board = sql_fetch($sql);



	// �亯�� �������
	$subqry1 = "&& wr_reply = ''";

	// �������� �������
		$arr_notice = explode("\n", trim($board[bo_notice]));
		for ($k=0; $k<count($arr_notice); $k++)
		{
	$subqry2_1 = " && wr_id!='$arr_notice[$k]'";
	$subqry2 = "$subqry2 $subqry2_1";
		} 





    $tmp_write_table = $g4['write_prefix'] . $bo_table; // �Խ��� ���̺� ��ü�̸�
    //$sql = " select * from $tmp_write_table where wr_is_comment = 0 order by wr_id desc limit 0, $rows ";
    // ���� �ڵ� ���� �ӵ��� ��
    //$sql = " select * from $tmp_write_table where wr_is_comment = 0 order by wr_num limit 0, $rows ";
    $sql_select = " wr_id, wr_subject, wr_option, wr_content, wr_comment, wr_parent, wr_datetime, wr_last, wr_homepage, wr_name, wr_reply, wr_link1, wr_link2, ca_name, wr_hit, wr_file_count, wr_1, wr_2, wr_3, wr_4, wr_5, wr_6, wr_7, wr_8, wr_9, wr_10 ";
    $sql = " select $sql_select from $tmp_write_table where wr_is_comment = 0 $subqry1 $subqry2 order by wr_num limit 0, $rows ";

    //explain($sql);
    $result = sql_query($sql);
    for ($i=0; $row = sql_fetch_array($result); $i++) 
        $list[$i] = get_list($row, $board, $latest_skin_path, $subject_len, $gallery_view);
    
    ob_start();
    include "$latest_skin_path/latest.skin.php";
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}


?>
