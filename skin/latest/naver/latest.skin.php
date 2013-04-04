<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if (!$skin_title) {
    if ($board[bo_subject]) {
        $skin_title = $board[bo_subject];
        $skin_title_link = "$g4[bbs_path]/board.php?bo_table=$bo_table";
    } else {
        $skin_title = "최신글";
    }
}

// naver layout이 아니면, style을 include
if ($g4[layout_skin] !== "naver")
    echo "<link rel='stylesheet' href='<?=$g4[path]?>/style.latest.css' type='text/css'>";
?>

<div class="section_ul">
	<h2><em><a href='<?=$skin_title_link?>' onfocus='this.blur()'><?=$skin_title?></a></em></h2>
	<ul>
  <?
  if (count($list) == 0) {
      echo "<li><span class='bu'></span> <a href='#'>내용없슴</a></li>";
  } else {
      for ($i=0; $i<count($list); $i++) { 

          echo "<li><span class='bu'></span> ";

          if ($list[$i][icon_secret])
              echo "<img src='$latest_skin_path/img/icon_secret.gif' alt='secret' align=absmiddle> ";

          if ($list[$i][bo_name])
              $list_title = $list[$i][bo_name] . " : " . $list[$i][subject] . " (". $list[$i][datetime] . ")" ;
          else
              $list_title = $list[$i][subject]  . " (". $list[$i][datetime] . ")" ;

          if ($list[$i][comment_cnt]) 
              echo " <a href=\"{$list[$i][comment_href]}\" onfocus=\"this.blur()\"><span style='font-family:돋움; font-size:8pt; color:#9A9A9A;'>{$list[$i][comment_cnt]}</span></a> ";

          if ($list[$i][icon_reply])
              echo $list[$i][icon_reply] . " ";

          echo "<a href='{$list[$i][href]}' onfocus='this.blur()' title='{$list_title}' {$target_link}>";
          if ($list[$i][is_notice])
              echo "<font style='font-family:돋움; font-size:9pt; color:#2C88B9;'><strong>" . $list[$i][subject] . "</strong></font>";
          else
              echo "<font style='font-family:돋움; font-size:9pt; color:#6A6A6A;'>" . $list[$i][subject] . "</font>";
          echo "</a>";

          if ($list[$i][icon_new])
              echo " " . $list[$i][icon_new];

          echo "</li>";
      }
  }
  // fill이 true이고, 덜 채워지면 꽉 채워준다.
  if (is_array($options) && $options['fill'] && $i < $rows) {
        for ($j=$i; $j<$rows;$j++) {
            echo "<li><span class='bu'></span> ";
            echo "<a href='#'><font style='font-family:돋움; font-size:9pt; color:#6A6A6A;'>&nbsp;</font></a></li>";
        }
  }
  ?>
  </ul>
	<a href='<?=$skin_title_link?>' onfocus='this.blur()' class="more"><span></span>더보기</a>
</div>
