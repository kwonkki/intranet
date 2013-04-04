<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// Gallery & Mix Mode
if(($opt[mode] == "gallery" || $opt[mode] == "mix") && $opt[img_box_size] && $opt[img_size]) {
	
	include_once("$g4[path]/lib/amina.lib.thumb.php");

	$img = array();

	$j = 0;
	for ($i=0; $i<count($list); $i++) {
		list($list[$i][img]) = amina_thumb_img($list[$i][file], $list[$i][wr_6], $list[$i][wr_content], 1, $list[$i][link_youngcart], $list[$i][wr_8]);
		if($opt[mode] == "gallery" || $list[$i][img] || $opt[no_img] != "none") {
			$img[$j] = $list[$i];
			$j++;
		}
	}

	if($img) { 

		list($img_w, $img_h) = explode("x", trim($opt[img_size]));

		if($opt[thumb]) $thumb_cut = "nocut";

		//랜덤으로 섞기
		if($opt[img_rand]) shuffle($img);

		if($opt[img_row]) {
			$img_num = count($img);
			if($opt[img_row] < $img_num) $img_num = $opt[img_row];
		} else {
			if($opt[img_mode] == "mix") {
				$img_num = 1;
			} else {
				$img_num = count($img);
			}
		}

		if($opt[mode] == "mix") { // mix 모드일 때만 적용
			if($opt[list_align] == "right") {
				$img_list_align = "align=left";
				$list_align = "align=right";
			} else if($opt[list_align] == "left") {
				$img_list_align = "align=right";
				$list_align = "align=left";
			}
		}

		//글 보이기
		if($opt[img_sub] || $opt[img_txt]) {
			if($opt[img_sub_style]) $opt[img_sub_style] = "style='".$opt[img_sub_style]."'";
			if($opt[img_txt_style]) $opt[img_txt_style] = "style='".$opt[img_txt_style]."'";
			$view_txt = "ok";
		}

		if($view_txt && $opt[img_align] == "left") {
			$img_box_align = "text-align:left;";
			$img_align = "float:left;margin-right:8px;";
		} else if($view_txt && $opt[img_align] == "right") {
			$img_box_align = "text-align:left;";
			$img_align = "float:right;margin-left:8px;";
		} else {
			$img_sub_align = "align=center";
			$img_txt = "sero";
		} 

		if(!$opt[img_mod]) $opt[img_mod] = 1;

		if($opt[img_list_size]) {
			$td_width = (int)($opt[img_list_size] / $opt[img_mod]);
		} else {
			$opt[img_list_size] = "100%";
			$td_width = (int)(100 / $opt[img_mod])."%";
		}

		if($opt[img_list_style]) $opt[img_list_style] = "style='".$opt[img_list_style]."'";
		if($opt[img_box_style]) $opt[img_box_style] = "style='".$opt[img_box_style]."'";

	?>

	<table border=0 cellpadding=0 cellspacing=0 width="<?=$opt[img_list_size]?>" <?=$img_list_align?>>
	<tr><td valign=top class="latest_img_basic" <?=$opt[img_list_style]?>>
		<table border=0 cellpadding=0 cellspacing=0 width="<?=$opt[img_list_size]?>">
		<tr>
		<? for ($i=0; $i < $img_num; $i++) { 
		    if ($i>0 && (($i%$opt[img_mod])==0) ) {
			    echo "</tr>\n\n";
				if($opt[img_gap]) echo "<tr height='$opt[img_gap]'><td colspan='($opt[img_mod]}'></td></tr>\n";
				echo "<tr>\n";
		    }	
		?>
		<td valign=top align=center width="<?=$td_width?>">
			<div class="img_box" style="width:<?=$opt[img_box_size]?>;<?=$img_box_align?><?=$opt[img_box_style]?>">
				
				<? if($img[$i][img] || $opt[no_img] != "none") {

					$icon_name = "";
					if($img[$i][icon_new]) $icon_name = "new";

					echo "<div class=img style=\"{$img_align}; width:{$img_w}px; height:{$img_h}px; {$opt[img_style]}\">\n";
					echo gnu_url(amina_thumbnail($img[$i][wr_subject], $img[$i][href], $img[$i][img], $img_w, $img_h, $thumb_cut, $opt[no_img], $icon_name, $opt[img_icon]), $opt[tab]);
					echo "</div>\n";

					if($view_txt && $img_txt == "sero") echo "<div class=space></div>\n";

				} ?>

				<? if($opt[img_sub]) {

					//분류출력
					if($opt[img_cate]) $img[$i][wr_subject] = "[".$img[$i][ca_name]."] ".$img[$i][wr_subject];

					//제목길이 다시 자르기
					$img[$i][subject] = amina_cut($img[$i][wr_subject],$opt[img_sub]);
					echo "<a href='{$img[$i][href]}'>";
					echo "<p class=img_sub {$opt[img_sub_style]}>{$img[$i][subject]}";
					if ($img[$i][comment_cnt]) echo " <span class='comment'>{$img[$i][comment_cnt]}</span>";
					echo "</p></a>";
				} ?>

				<? if($opt[img_txt]) { ?>
					<p class=img_txt <?=$opt[img_txt_style]?>><?=amina_cut($img[$i][wr_content],$opt[img_txt])?></p>
				<? } ?>
			</div>
		</td>
		<? } ?>

		<? // 나머지 td 를 채운다.
			if (($cnt = $i%$opt[img_mod]) != 0)
				for ($j=$cnt; $j<$opt[img_mod]; $j++)
					echo "<td>&nbsp;</td>\n";
		?>
		</tr>
		<? if($opt[img_gap]) echo "<tr height='$opt[img_gap]'><td colspan='{$opt[img_mod]}'></td></tr>\n"; ?>
		</table>
	</td>
	</tr>
	</table>

<? } } // gallery, mix 끝
		
if($opt[mode] != "gallery") {

	//리스트 설정값
	if(!$opt[icon]) $opt[icon] = "basic";
	if(!$opt[list_size]) $opt[list_size] = "100%";
	if($opt[list_style]) $opt[list_style] = "style='".$opt[list_style]."'";
	if(!$opt[list_height]) $opt[list_height] = 24;
	if(!$opt[list_sub]) $opt[list_sub] = $subject_len;
	if($opt[order] && !$opt[rank]) $opt[rank] = "basic";

	$list_num = count($list);
	if($opt[list_row] && $opt[list_rows] < $list_num) $list_num = $opt[list_row];
?>

	<table border=0 cellpadding=0 cellspacing=0 width="<?=$opt[list_size]?>" <?=$list_align?>>
	<tr><td valign=top class="latest_list_basic" <?=$opt[list_style]?>>
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<? for ($i=0; $i < $list_num; $i++) { ?>
			<tr height="<?=$opt[list_height]?>">
			<? if($opt[icon] != 'none') { ?>
			<td align=center width=20 class="icon">
			<?
				if($opt[rank]) {
					$rank = $i + 1;
					echo "<img src='{$latest_skin_url}/img/rank/{$opt[rank]}/{$rank}.gif'>";
				} else {
					if($list[$i][is_notice]) {
						echo "<img src='{$latest_skin_url}/img/icon_notice.gif'>";
					} else {
						if($list[$i][icon_secret]) {
							if($list[$i][icon_new]) {
								echo "<img src='{$latest_skin_url}/img/icon_secret_new.gif'>";
							} else {
								echo "<img src='{$latest_skin_url}/img/icon_secret.gif'>";
							}
						} else {
							if($list[$i][icon_new]) {
								echo "<img src='{$latest_skin_url}/img/icon_new.gif'>";
							} else {
								if($opt[icon] == "qa") {						
									if($list[$i][icon_reply]) {
										echo "<img src='{$latest_skin_url}/img/icon_a.gif'>";
									} else {
										echo "<img src='{$latest_skin_url}/img/icon_q.gif'>";
									}
								} else {
									echo "<img src='{$latest_skin_url}/img/icon/{$opt[icon]}.gif'>";
								}
							}
						}
					}
				}
			?>
			</td>
		<? } ?>
		<td class=sub>
		<? 
			if($opt[list_cate]) $list[$i][wr_subject] = "[".$list[$i][ca_name]."] ".$list[$i][wr_subject];

			$list[$i][subject] = amina_cut($list[$i][wr_subject],$opt[list_sub]); //제목길이 다시 자르기
			if($list[$i][is_notice]) {
				if($opt[list_notice_style]) {
					$list[$i][subject] = "<span style='{$opt[list_notice_style]}'>".$list[$i][subject]."</span>";
				} else {
					$list[$i][subject] = "<b>".$list[$i][subject]."</b>";
				}
			}
			echo "<a href='{$list[$i][href]}'>";
			if($opt[list_subj_style]) {
				echo "<span style='{$opt[list_subj_style]}'>{$list[$i][subject]}</span>";
			} else {
				echo "{$list[$i][subject]}";
			}
			if (!$opt[list_cmt] && $list[$i][comment_cnt]) echo " <span class='comment'>{$list[$i][comment_cnt]}</span>";
			echo "</a>";
		?>
		</td>
		<? if($opt[list_name]) { ?><td class="name" width="<?=$opt[list_name]?>"><?=get_text(cut_str($list[$i][wr_name], $config[cf_cut_name]))?></td><? } ?>
		<? if($opt[list_date]) { ?><td align=center class="num" width="<?=$opt[list_date]?>"><?=date("m.d", strtotime($list[$i][wr_datetime]))?></td><? } ?>
		<? if($opt[list_good]) { ?><td align=center class="num" width="<?=$opt[list_good]?>"><div class=good><?=$list[$i][wr_good]?></div></td><? } ?>
		<? if($opt[list_nogood]) { ?><td align=center class="num" width="<?=$opt[list_nogood]?>"><div class=nogood><?=$list[$i][wr_nogood]?></div></td><? } ?>
		<? if($opt[list_cmt]) { ?><td align=center class="num" width="<?=$opt[list_cmt]?>"><div class=cmt><?=$list[$i][wr_comment]?></div></td><? } ?>
		<? if($opt[list_hit]) { ?><td align=center class="num" width="<?=$opt[list_hit]?>"><div class=hit><?=$list[$i][wr_hit]?></div></td><? } ?>
		</tr>
		<? } ?>

		<? if($i == 0) {?><tr><td align=center height=100 class=no_list>게시물이 없습니다.</td></tr><? } ?>
		</table>
	</td></tr>
	</table>
<? } ?>
