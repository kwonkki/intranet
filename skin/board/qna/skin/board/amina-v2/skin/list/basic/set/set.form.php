<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$set_skin_path/set.load.php");

$set = amina_set_list($set_data);

?>

<div class=br></div>

<table border=0 cellpadding=0 cellspacing=0 width=100% class=tbl>
<col width=40><col width=40><col />
<tr>
<td colspan=3 align=center class="td2"><b><?=$skin?> 목록스킨 사용법</b></td>
</tr>
<tr>
<td colspan=3>
	<ul style="padding-left:15px; margin:0px;">
		<li>보이고 싶은 항목에 해당 항목의 너비(width)값을 넣어 주세요. 
		<li>너비값을 입력해도 해당 항목이 미사용이면 출력되지 않습니다.
	</ul>
</td>
</tr>		
<tr>
<td align=center class="td2">항목</td><td align=center class="td2">너비</td><td align=center class="td2">추 / 가 / 설 / 정</td>
</tr>
<tr>
<td align=center class="td3">번호</td>
<td align=center class="td4">
	<? if($set[list_num] == "") $set[list_num] = 50; ?>
	<input type=text class=ed name='list_num' size=3 maxlength=10 numeric value='<?=$set[list_num]?>'>
</td>
<td>
	<input type=checkbox name='list_qa' value='1' <? if($set[list_qa]) echo "checked"; ?>> 질답게시판으로 사용
</td>
</tr>
<tr>
<td align=center class="td3">썸</td>
<td align=center class="td4">
	<? if($set[list_thumb_w] == "") $set[list_thumb_w] = 0; ?>
	<input type=text class=ed name='list_thumb_w' size=3 maxlength=10 numeric value='<?=$set[list_thumb_w]?>'>
</td>
<td>
	<? if($set[list_thumb_h] == "") $set[list_thumb_h] = 0; ?>
	x &nbsp<input type=text class=ed name='list_thumb_h' size=3 maxlength=10 numeric value='<?=$set[list_thumb_h]?>'> px 

	&nbsp;<select name="list_thumb_no">
		<option value="white">흰색배경 NO썸</option>
		<option value="black" <? if($set[list_thumb_no] == "black") echo "selected"; ?>>검정배경 NO썸</option>
		<option value="none" <? if($set[list_thumb_no] == "none") echo "selected"; ?>>NO썸 출력안함</option>
	</select>

	&nbsp;<select name="list_thumb_icon">
		<option value="s">작은 아이콘</option>
		<option value="m" <? if($set[list_thumb_icon] == "m") echo "selected"; ?>>보통 아이콘</option>
		<option value="l" <? if($set[list_thumb_icon] == "l") echo "selected"; ?>>큰 아이콘</option>
	</select>

	&nbsp;<input type=checkbox name='list_thumb_cut' value='nocut' <? if($set[list_thumb_cut] == "nocut") echo "checked"; ?>> 자르지 않기
</td>
</tr>
<tr>
<td align=center class="td3">분류</td>
<td align=center class="td4">
	<? if($set[list_cate] == "") $set[list_cate] = 0; ?>
	<input type=text class=ed name='list_cate' size=3 numeric maxlength=10 value='<?=$set[list_cate]?>'>
</td>
<td>
	<input type="radio" name="list_cate_view" value="0" <? if(!$set[list_cate_view] || $set[list_cate_view] == "0") echo "checked"; ?>> 별도표시
	<input type="radio" name="list_cate_view" value="1" <? if($set[list_cate_view] == "1") echo "checked"; ?>> 제목앞에
	<input type="radio" name="list_cate_view" value="2" <? if($set[list_cate_view] == "2") echo "checked"; ?>> 모두표시
</td>
</tr>
<tr>
<td align=center class="td3">포토</td>
<td align=center class="td4">
	<? if($set[list_photo] == "") $set[list_photo] = 0; ?>
	<input type=text class=ed name='list_photo' size=3 numeric maxlength=10 value='<?=$set[list_photo]?>'>
</td>
<td> 
	회원사진 & 이모티콘
</td>
</tr>
<tr>
<td align=center class="td3">이름</td>
<td align=center class="td4">
	<? if($set[list_name] == "") $set[list_name] = 90; ?>
	<input type=text class=ed name='list_name' size=3 numeric maxlength=10 value='<?=$set[list_name]?>'>
</td>
<td>
	<input type="radio" name="list_name_align" value="left" <? if(!$set[list_name_align] || $set[list_name_align] == "left") echo "checked"; ?>> 좌측정렬
	<input type="radio" name="list_name_align" value="center" <? if($set[list_name_align] == "center") echo "checked"; ?>> 중간정렬
	<input type="radio" name="list_name_align" value="right" <? if($set[list_name_align] == "right") echo "checked"; ?>> 우측정렬
</td>
</tr>
<tr>
<td align=center class="td3">날짜</td>
<td align=center class="td4">
	<? if($set[list_date] == "") $set[list_date] = 60; ?>
	<input type=text class=ed name='list_date' size=3 maxlength=10 numeric value='<?=$set[list_date]?>'>
</td>
<td>
	<? if($set[list_date_type] == "") $set[list_date_type] = "m.d"; ?>
	<input type=text class=ed name='list_date_type' size=6 maxlength=6 value='<?=$set[list_date_type]?>'> 형태 ※ Y/m/d 등 - 그누기본은 1, '며칠전' 형태는 2 라고 입력
</td>
</tr>
<tr>
<td align=center class="td3">댓글</td>
<td align=center class="td4">
	<? if($set[list_cmt] == "") $set[list_cmt] = 0; ?>
	<input type=text class=ed name='list_cmt' size=3 numeric maxlength=10 value='<?=$set[list_cmt]?>'>
</td>
<td>
	<? if(!$set[list_cmt_txt]) $set[list_cmt_txt] = "댓글"; ?>
	<input type=text class=ed name='list_cmt_txt' size=6 value='<?=$set[list_cmt_txt]?>'> 이라고 헤드에 표시 ex) 참여 등 ※ 제목 옆 댓글수는 출력안됨
</td>
</tr>
<tr>
<td align=center class="td3">채택</td>
<td align=center class="td4">
	<? if($set[list_choice] == "") $set[list_choice] = 0; ?>
	<input type=text class=ed name='list_choice' size=3 numeric maxlength=10 value='<?=$set[list_choice]?>'>
</td>
<td>
	<? if(!$set[list_choice_txt]) $set[list_choice_txt] = "채택됨"; ?>
	<input type=text class=ed name='list_choice_txt' size=6 value='<?=$set[list_choice_txt]?>'> 표시(완료, 종료 등)
	/
	<? if(!$set[list_nochoice_txt]) $set[list_nochoice_txt] = "미채택"; ?>
	<input type=text class=ed name='list_nochoice_txt' size=6 value='<?=$set[list_nochoice_txt]?>'> 표시(진행, 검토 등 )
	
</td>
</tr>		
<tr>
<td colspan=2 align=center class="td3">기타너비</td>
<td>
	<? if($set[list_hit] == "") $set[list_hit] = 40; ?>
	조회 <input type=text class=ed name='list_hit' size=3 numeric maxlength=10 value='<?=$set[list_hit]?>'>
	<? if($set[list_good] == "") $set[list_good] = 0; ?>
	&nbsp;추천 <input type=text class=ed name='list_good' size=3 numeric maxlength=10 value='<?=$set[list_good]?>'>
	<? if($set[list_nogood] == "") $set[list_nogood] = 0; ?>
	&nbsp;비추 <input type=text class=ed name='list_nogood' size=3 numeric maxlength=10 value='<?=$set[list_nogood]?>'>
	<? if($set[list_star] == "") $set[list_star] = 0; ?>
	&nbsp;별점 <input type=text class=ed name='list_star' size=3 numeric maxlength=10 value='<?=$set[list_star]?>'>
	<? if($set[list_point] == "") $set[list_point] = 0; ?>
	&nbsp;점수 <input type=text class=ed name='list_point' size=3 numeric maxlength=10 value='<?=$set[list_point]?>'>
</td>
</tr>
</table>