<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

/* mnb 정의
참조문서 : http://html.nhncorp.com/uio_factory/ui_pattern/lnb/1

NHN의 메뉴 java script는 사용하지 않습니다.
이것을 쓰면 애니메이션도 이쁘고 하지만, 선택된 메뉴의 class가 없어지고,
SUB 메뉴도 안쓰기 때문입니다.
<script type="text/javascript" src="<?=$g4[layout_skin_path]?>/menu.naver.js"></script>

submenu가 있는 경우, span에 class="i"가 들어가야 합니다.
<li><a class="m10" id="qna" href="http://www.bugsboard.co.kr" target=_new><span>벅스4<span class="i"></span></span></a></a></li>
*/

$mnb_arr[] = array('id'=>'home', 'name'=>'Home', 'href'=>"$g4[url]" );
$mnb_arr[] = array('id'=>'notice', 'name'=>'notice', 'href'=>"$g4[bbs_path]/board.php?bo_table=notice&mnb=notice" );
$mnb_arr[] = array('id'=>'attendance', 'name'=>'attendance', 'href'=>"$g4[path]/attendance.php?mnb=attendance" );
$mnb_arr[] = array('id'=>'status', 'name'=>'status', 'href'=>"$g4[path]/status.php?mnb=status" );
$mnb_arr[] = array('id'=>'vacation', 'name'=>'vacation', 'href'=>"$g4[bbs_path]/write.php?bo_table=vacation&mnb=vacation" );
$snb_indent = "text-align:left;margin-left:20px;";

/*
snb - 좌측 side 메뉴의 정의

$snb_arr[id]의 id에는 위의 $mnb_arr의 id 값을 넣어주는데, $mnb가 연동 안될 경우에는 맘대로 넣으면 됩니다.

$snb_arr의 id는 그냥 임의로 쓰면 됩니다. 
중복 되면 문제 될 수도 있으니 중복 안되게 "$mnb_내맘대로" 와 같이 하는게 편하지만,
구분하기 좋게 이름 지으면 더 좋습니다.
*/

?>
