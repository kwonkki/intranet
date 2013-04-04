<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$img_width = 50; //이미지 가로
$img_height = 50; //이미지 가로
$img_quality = 100;

if (!function_exists("imagecopyresampled")) alert("GD 2.0.1 이상 버전이 설치되어 있어야 사용할 수 있는 갤러리 게시판 입니다.");

$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb';
$ym = date("ym", $g4[server_time]);

@mkdir($thumb_path, 0707);
@chmod($thumb_path, 0707);

//코멘트와 리플글은 제외
$sql = " select * from $tmp_write_table
where wr_comment = '' and wr_reply = ''
order by wr_id DESC LIMIT 0, 1 ";
$result = sql_query($sql);
$last_con = sql_fetch_array($result);
?>
    <link type="text/css" rel="stylesheet" href="<?=$latest_skin_path?>/css/style.css" />
    <!--jQuery<script type="text/javascript" src="<?=$latest_skin_path?>/js/jquery.js"></script>-->
    <!--jQuery-->
    <script type="text/javascript" src="<?=$latest_skin_path?>/js/jquery.pause.min.js"></script>
    <!--js-->
    <script type="text/javascript" src="<?=$latest_skin_path?>/js/weiboscroll.js"></script>

    <div id="box_title">› &nbsp;<a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'><?=$board[bo_subject]?></a></div>
    <div id="con">
        <div class="bottomcover" style="z-index: 2;"></div>
        <ul>
        <? for ($i=0; $i<count($list); $i++) { ?>
<?
//썸네일 생성
$thumfile = "";
    $thumb = $thumb_path.'/'.$list[$i][wr_id];
    // 썸네일 이미지가 존재하지 않는다면
    if (!file_exists($thumb)) {
        $file = $list[$i][file][0][path] .'/'. $list[$i][file][0][file];
        // 업로드된 파일이 이미지라면
        if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file) && file_exists($file)) {
            $size = getimagesize($file);
            if ($size[2] == 1)
                $src = imagecreatefromgif($file);
            else if ($size[2] == 2)
                $src = imagecreatefromjpeg($file);
            else if ($size[2] == 3) 
                $src = imagecreatefrompng($file); 
            else
                break;

            $rate = $img_width / $size[0];
            $height = (int)($size[1] * $rate);

            // 계산된 썸네일 이미지의 높이가 설정된 이미지의 높이보다 작다면
            if ($height < $img_height)
                // 계산된 이미지 높이로 복사본 이미지 생성
                $dst = imagecreatetruecolor($img_width, $height);
            else
                // 설정된 이미지 높이로 복사본 이미지 생성
                $dst = imagecreatetruecolor($img_width, $img_height);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $img_width, $height, $size[0], $size[1]);
            imagejpeg($dst, $thumb_path.'/'.$list[$i][wr_id], $img_quality);
            chmod($thumb_path.'/'.$list[$i][wr_id], 0606);
        } else { //게디터에서 삽입한 이미지 뽑자ㅠㅠ
			$edit_img = $list[$i]['wr_content'];
			if (eregi("data/cheditor4/{$ym}/[^<>]*\.(gif|jpg|png|bmp)", $edit_img, $tmp)) { // data/geditor------
				$file = './' . $tmp[0]; // 파일명
				$size = getimagesize($file);
				if ($size[2] == 1)
					$src = imagecreatefromgif($file);
				else if ($size[2] == 2)
					$src = imagecreatefromjpeg($file);
				else if ($size[2] == 3) 
					$src = imagecreatefrompng($file); 
				else
					break;

				$rate = $img_width / $size[0];
				$height = (int)($size[1] * $rate);

				// 계산된 썸네일 이미지의 높이가 설정된 이미지의 높이보다 작다면
				if ($height < $img_height)
					// 계산된 이미지 높이로 복사본 이미지 생성
					$dst = imagecreatetruecolor($img_width, $height);
				else
					// 설정된 이미지 높이로 복사본 이미지 생성
					$dst = imagecreatetruecolor($img_width, $img_height);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $img_width, $height, $size[0], $size[1]);
				imagejpeg($dst, $thumb_path.'/'.$list[$i][wr_id], $img_quality);
				chmod($thumb_path.'/'.$list[$i][wr_id], 0606);
			}
	    }
	}

    if (file_exists($thumb))
        $thumfile = "<img src='$thumb' width='{$img_width}' height='{$img_height}' border='0' style='border:1px #ccc solid'></a>";
		else
		//이미지가 없으면
		$thumfile="<img src='$latest_skin_path/images/noimg.gif' width='{$img_width}' height='{$img_height}' style='border:0 #E7E7E7 solid'></a>";
		//이미지가 아니네
        if(preg_match("/\.(swf|wma|asf)$/i","$file") && file_exists($file))
       { $thumfile = "<script>doc_write(flash_movie('$file', 'flash$i', '$img_width', '$img_height', 'transparent'));</script>"; }
?>
            <li>
                <div class="div_left">
                    <a href='<?=$list[$i][href]?>'><?=$thumfile?></a>
                    
                </div>
                <div class="div_right">
                	<?php
            		if ($is_category && $list[$i][ca_name]) { 
                	echo "[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]：";
            		}
					?><a href='<?=$list[$i][href]?>'><b><?=$list[$i]['subject']?></b></a><br/>
					<?=cut_str(strip_tags($list[$i][wr_content]),115,"...")?>
        <div class="twit_item_time"><?=substr ("{$list[$i][wr_datetime]}", 0,10)?></div>
                </div>
            </li>
            <?}?>
        </ul>
    </div>
    
<div style="text-align:center">
</div>
