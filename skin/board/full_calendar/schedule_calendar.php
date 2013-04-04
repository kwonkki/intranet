<?php
include_once("./_common.php");

// json_encode PHP4를 위한 함수....
if (!function_exists('json_encode'))
{
	function json_encode($a=false)
	{
		if (is_null($a)) return 'null';
		if ($a === false) return 'false';
		if ($a === true) return 'true';
		if (is_scalar($a))
		{
			if (is_float($a))
			{
				// Always use "." for floats.
				return floatval(str_replace(",", ".", strval($a)));
			}

		if (is_string($a))
		{
			static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
			return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
		}
		else
			return $a;
		}
		$isList = true;
		for ($i = 0, reset($a); $i < count($a); $i++, next($a))
		{
			if (key($a) !== $i)
			{
				$isList = false;
				break;
			}
		}
		$result = array();
		if ($isList)
		{
			foreach ($a as $v) $result[] = json_encode($v);
			return '[' . join(',', $result) . ']';
		}
		else
		{
			foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
			return '{' . join(',', $result) . '}';
		}
	}
}

$list = array();
$mb_id = $member[mb_id]; 

////////// 일정반복 위한
$sql = "select mb_id as name, wr_subject as title, wr_id as id, trim(concat_ws(' ', wr_1, wr_4)) as start, trim(concat_ws(' ', wr_2, wr_5)) as end, wr_3 as className, '$bo_table' as bo_table, IF(wr_4 <> '', 0, 1) as allDay, wr_8, wr_10 from $g4[write_prefix]$bo_table where wr_8 != '' and wr_6 = '$department' order by wr_1";

$result = sql_query($sql);
$i = 0;

// 일정반복
while($row = sql_fetch_array($result))
{	
	switch($row[wr_8])
	{
        //일정 매년 반복
		case "year":  			
			$s_year = date("Y", $start);
			$e_year = date("Y", $end);	
			
			for($t = $s_year; $t <= $e_year; $t++)
			{
				$list[$i] = $row;
				if($list[$i][allDay] == "1") $list[$i][allDay] = true; else $list[$i][allDay] = false;		
				$list[$i][start] = $t.substr($row[start], 4);
				$list[$i][end] = $t.substr($row[end], 4);
				if($list[$i][wr_10] == '100')  // 일정완료일 경우
				{	 
					$importance4 = "importance4_100";
					$importance3 = "importance3_100";
					$importance2 = "importance2_100";
					$importance1 = "importance1_100";
					$importance0 = "importance0_100";
				}else{ // 일정완료 아닐 경우
					$importance4 = "importance4";
					$importance3 = "importance3";
					$importance2 = "importance2";
					$importance1 = "importance1";
					$importance0 = "importance0";
				}
				switch($list[$i][className])
				{
					case "004": $list[$i][className] = $importance4 ; break; // 프로젝트
					case "003": $list[$i][className] = $importance3 ; break; // 매우종요
					case "002": $list[$i][className] = $importance2 ; break; // 중요
					case "001": $list[$i][className] = $importance1 ; break; // 일반
					case "000": $list[$i][className] = $importance0 ; break; // 개인일정
					//default: $list[$i][className] = ""; break; // 일반
				}
				$list[$i][editable] = false;
				$i++;
			}
		break;
      
		//일정 매월 반복
		case "month":
			
			for($t = 0; $t < 3; $t++)
			{
				$list[$i] = $row;				
				if($list[$i][allDay] == "1") $list[$i][allDay] = true; else $list[$i][allDay] = false;		
				$list[$i][start] = date("Y-m", mktime(0,0,0, date("n", $start) + $t, 1, date("Y", $start))).substr($row[start], 7);
				$list[$i][end] = date("Y-m", mktime(0,0,0, date("n", $start) + $t, 1, date("Y", $start))).substr($row[end], 7);
				if($list[$i][wr_10] == '100') { // 일정완료일 경우
					$importance4 = "importance4_100";
					$importance3 = "importance3_100";
					$importance2 = "importance2_100";
					$importance1 = "importance1_100";
					$importance0 = "importance0_100";
				}else{ // 일정완료 아닐 경우
					$importance4 = "importance4";
					$importance3 = "importance3";
					$importance2 = "importance2";
					$importance1 = "importance1";
					$importance0 = "importance0";
				}
				switch($list[$i][className])
				{
					case "004": $list[$i][className] = $importance4 ; break; // 프로젝트
					case "003": $list[$i][className] = $importance3 ; break; // 매우종요
					case "002": $list[$i][className] = $importance2 ; break; // 중요
					case "001": $list[$i][className] = $importance1 ; break; // 일반
					case "000": $list[$i][className] = $importance0 ; break; // 개인일정
					//default: $list[$i][className] = ""; break; // 일반
				}
				$list[$i][editable] = false;
				$i++;
			}		
		break;

		// 일정 매주 반복
		case "week":
			
			for($t = 0; $t < 7; $t++)
			{
				$list[$i] = $row;						
				if($list[$i][allDay] == "1") $list[$i][allDay] = true; else $list[$i][allDay] = false;	
				$chk_week = date("w", strtotime($row[start]));
				$chk_week1 = date("w", strtotime($row[end]));
				if($chk_week > $chk_week1){ $k = $t + 1; }else{	$k = $t; }
				$list[$i][start] = date("Y-m-d", mktime(0,0,0, date("n", $start), date("j", $start) + $chk_week + $t*7, date("Y", $start))).substr($row[start], 10);
				$list[$i][end] = date("Y-m-d", mktime(0,0,0, date("n", $start), date("j", $start) + $chk_week1 + $k*7, date("Y", $start))).substr($row[end], 10);
				if($list[$i][wr_10] == '100') { // 일정완료일 경우
					$importance4 = "importance4_100";
					$importance3 = "importance3_100";
					$importance2 = "importance2_100";
					$importance1 = "importance1_100";
					$importance0 = "importance0_100";
				}else{ // 일정완료 아닐 경우
					$importance4 = "importance4";
					$importance3 = "importance3";
					$importance2 = "importance2";
					$importance1 = "importance1";
					$importance0 = "importance0";
				}
				switch($list[$i][className])
				{
					case "004": $list[$i][className] = $importance4 ; break; // 프로젝트
					case "003": $list[$i][className] = $importance3 ; break; // 매우종요
					case "002": $list[$i][className] = $importance2 ; break; // 중요
					case "001": $list[$i][className] = $importance1 ; break; // 일반
					case "000": $list[$i][className] = $importance0 ; break; // 개인일정
					//default: $list[$i][className] = ""; break; // 일반
				}
				$list[$i][editable] = false;
				$i++;
			}		
		break;
	} //end switch
}; //end while

$sql = "select mb_id as name, CONCAT( wr_subject,'[', CASE 
												    WHEN wr_10 <= 0 THEN 0
												    ELSE wr_10
												  END , '%][' , wr_name, '][', wr_2,'][', wr_6  ,']') as title, wr_id as id, trim(concat_ws(' ', wr_1, wr_4)) as start, trim(concat_ws(' ', wr_2, wr_5)) as end, wr_3 as className, '$bo_table' as bo_table, IF(wr_4 <> '', 0, 1) as allDay, wr_10 from $g4[write_prefix]$bo_table where wr_8 = '' and ( (unix_timestamp(wr_1) between '$start' and '$end' or  unix_timestamp(wr_2) between '$start' and '$end') or (unix_timestamp(wr_1) < '$start' and unix_timestamp(wr_2) > '$end') ) and wr_6 = '$department' order by wr_1";

ChromePhp::log($sql);


$result = sql_query($sql);
while($row = sql_fetch_array($result))
{
	$list[$i] = $row;	
	if($list[$i][allDay] == "1") $list[$i][allDay] = true; else $list[$i][allDay] = false;
	if($list[$i][wr_10] == '100')  // 일정완료일 경우
	{	 
		$importance4 = "importance4_100";
		$importance3 = "importance3_100";
		$importance2 = "importance2_100";
		$importance1 = "importance1_100";
		$importance0 = "importance0_100";
	}else{ // 일정완료 아닐 경우
		$importance4 = "importance4";
		$importance3 = "importance3";
		$importance2 = "importance2";
		$importance1 = "importance1";
		$importance0 = "importance0";
	}
	switch($list[$i][className])
	{
		case "004": $list[$i][className] = $importance4 ; break; // 프로젝트
		case "003": $list[$i][className] = $importance3 ; break; // 매우종요
		case "002": $list[$i][className] = $importance2 ; break; // 중요
		case "001": $list[$i][className] = $importance1 ; break; // 일반
		case "000": $list[$i][className] = $importance0 ; break; // 개인일정
		//default   : $list[$i][className] = $importance1; //분류미선택시
	}
	/////////////////////////////////////////////
	$i++;
};

echo json_encode($list);
?>