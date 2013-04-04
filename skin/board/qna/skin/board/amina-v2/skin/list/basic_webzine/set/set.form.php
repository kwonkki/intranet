<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$set_skin_path/set.load.php");

$set = amina_set_list($set_data);

?>

<div class=br></div>

<table border=0 cellpadding=0 cellspacing=0 width=100% class=tbl>
<col width=60><col />
<tr>
<td colspan=2 align=center class="td2"><b><?=$skin?> 목록스킨 사용법</b></td>
</tr>
<tr>
<td colspan=2>
	<ul style="padding-left:15px; margin:0px;">
		<li>출력을 체크하셔도 해당 항목이 미사용이면 출력되지 않습니다.
	</ul>
</td>
</tr>		
<tr>
<td align=center class="td2">항 &nbsp; 목</td><td align=center class="td2">추 / 가 / 설 / 정</td>
</tr>
<tr>
<td align=center class="td3">썸네일</td>
<td>
	크기 
	<? if(!$set[list_thumb_w] || $set[list_thumb_w] == "" ) $set[list_thumb_w] = 180; ?>
	<input type=text class=ed name='list_thumb_w' size=3 maxlength=10 numeric value='<?=$set[list_thumb_w]?>'>

	<? if($set[list_thumb_h] == "") $set[list_thumb_h] = 100; ?>	
	x <input type=text class=ed name='list_thumb_h' size=3 maxlength=10 numeric value='<?=$set[list_thumb_h]?>'> px 

	&nbsp;<select name="list_thumb_no">
		<option value="white">흰색배경 NO썸</option>
		<option value="black" <? if($set[list_thumb_no] == "black") { ?> selected<? } ?>>검정배경 NO썸</option>
		<option value="none" <? if($set[list_thumb_no] == "none") { ?> selected<? } ?>>NO썸 출력안함</option>
	</select>

	&nbsp;<select name="list_thumb_icon">
		<option value="s">작은 아이콘</option>
		<option value="m" <? if($set[list_thumb_icon] == "m") echo "selected"; ?>>보통 아이콘</option>
		<option value="l" <? if($set[list_thumb_icon] == "l") echo "selected"; ?>>큰 아이콘</option>
	</select>

	&nbsp;<input type=checkbox name='list_thumb_cut' value='nocut' <? if($set[list_thumb_cut] == "nocut") { ?> checked<? } ?>> 자르지 않기
</td>
</tr>
<tr>
<td align=center class="td3">글제목</td>
<td>
	<? if($set[subj_len] == "") $set[subj_len] = 100; ?>
	길이 <input type=text class=ed name='subj_len' size=3 numeric maxlength=10 value='<?=$set[subj_len]?>'> 자
	&nbsp;좌우정렬
	<select name="subj_align">
		<option value="left">좌측</option>
		<option value="center" <? if($set[subj_align] == "center") { ?> selected<? } ?>>중앙</option>
		<option value="right" <? if($set[subj_align] == "right") { ?> selected<? } ?>>우측</option>
	</select>
	&nbsp;<input type=checkbox name='subj_cate' value='1' <? if($set[subj_cate]) { ?> checked<? } ?>> 제목앞에 분류명 출력
</td>
</tr>
<tr>
<td align=center class="td3">글내용</td>
<td>
	<? if($set[conts_len] == "") $set[conts_len] = 300; ?>
	길이 <input type=text class=ed name='conts_len' size=3 numeric maxlength=10 value='<?=$set[conts_len]?>'> 자
	- 0 입력시 출력되지 않습니다.
</td>
</tr>
<tr>
<td align=center class="td3">항 &nbsp; 목</td>
<td>
	위치
	<select name="info_location">
		<option value="0">제목아래 표시</option>
		<option value="1" <? if($set[info_location] == "1") { ?> selected<? } ?>>내용아래 표시</option>
	</select>
	
	&nbsp;좌우정렬
	<select name="info_align">
		<option value="left">좌측</option>
		<option value="center" <? if($set[info_align] == "center") { ?> selected<? } ?>>중앙</option>
		<option value="right" <? if($set[info_align] == "right") { ?> selected<? } ?>>좌측</option>
	</select>
	
	<div class='br'></div>
	출력 : 
	<input type=checkbox name='info_name' value='1' <? if($set[info_name]) { ?> checked<? } ?>> 이름
	<input type=checkbox name='info_cate' value='1' <? if($set[info_cate]) { ?> checked<? } ?>> 분류
	<input type=checkbox name='info_star' value='1' <? if($set[info_star]) { ?> checked<? } ?>> 별점
	<input type=checkbox name='info_hit' value='1' <? if($set[info_hit]) { ?> checked<? } ?>> 조회
	<input type=checkbox name='info_good' value='1' <? if($set[info_good]) { ?> checked<? } ?>> 추천
	<input type=checkbox name='info_nogood' value='1' <? if($set[info_nogood]) { ?> checked<? } ?>> 비추
	<input type=checkbox name='info_cmt' value='1' <? if($set[info_cmt]) { ?> checked<? } ?>> 댓글
	<input type=checkbox name='info_point' value='1' <? if($set[info_point]) { ?> checked<? } ?>> 점수
	
	<div class='br'></div>

	<? if(!$set[info_date_type]) $set[info_date_type] = "2"; ?>
	날짜 : <input type=checkbox name='info_date' value='1' <? if($set[info_date]) { ?> checked<? } ?>> 출력 - 모양 <input type=text class=ed name='info_date_type' size=6 maxlength=6 value='<?=$set[info_date_type]?>'> ※ Y.m.d, y/m/d 등 - 그누기본은 1, '며칠전' 형태는 2 라고 입력

	<div class='br'></div>

	채택 : <input type=checkbox name='info_choice' value='1' <? if($set[info_choice]) { ?> checked<? } ?>> 출력

	<? if(!$set[info_choice_txt]) $set[info_choice_txt] = "채택됨"; ?>
	- <input type=text class=ed name='info_choice_txt' size=6 value='<?=$set[info_choice_txt]?>'> 표시(완료, 종료 등)
	/
	<? if(!$set[info_nochoice_txt]) $set[info_nochoice_txt] = "미채택"; ?>
	<input type=text class=ed name='info_nochoice_txt' size=6 value='<?=$set[info_nochoice_txt]?>'> 표시(진행, 검토 등 )
	<div class='br'></div>

</td>
</tr>
</table>