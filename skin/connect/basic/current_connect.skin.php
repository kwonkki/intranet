<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<style type="text/css">
/*
보더형 테이블 5 
http://html.nhndesign.com/uio_factory/ui_pattern/table/5
*/
.tbl_type,.tbl_type th,.tbl_type td{border:0}
.tbl_type{width:100%;border-bottom:2px solid #dcdcdc;font-family:Tahoma;font-size:11px;text-align:center}
.tbl_type caption{display:none}
.tbl_type th{padding:12px 0 8px;border-top:2px solid #dcdcdc;background-color:#f5f7f9;color:#666;font-family:'돋움',dotum;font-size:12px;font-weight:bold}
.tbl_type td{padding:10px 0 8px;border-top:1px solid #e5e5e5;color:#4c4c4c;}
</style>

<!--ui object -->
<table class="tbl_type" border="1" cellspacing="0" summary="<=$g4[title]?>">
<caption><=$g4[title]?></caption>
<colgroup>
<col width="100px">
<col width="100px">
<col width="100px">
<col width="100px">
<col width="100px">
<col width="100px">
<col>
</colgroup>
<thead>
    <tr>
    <th scope="col" style='text-align:center'>department</th>
    <th scope="col" style='text-align:center'>position</th>
    <th scope="col" style='text-align:center'>local/expat</th>
    <th scope="col" style='text-align:center'>name</th>
    <th scope="col" style='text-align:center'>status</th>
    <th scope="col" style='text-align:center'>changed time</th>
    </tr>
</thead>
<tbody>
<?
for ($i=0; $i<count($list); $i++) {

    echo "<tr>";

    echo "<td>{$list[$i][mb_1]}</td>";
    echo "<td>{$list[$i][mb_2]}</td>";
    echo "<td>{$list[$i][mb_3]}</td>";
    echo "<td>{$list[$i][name]}</td>";
    echo "<td>{$list[$i][status]}</td>";
    echo "<td>{$list[$i][lo_datetime]}</td>";

    $location = $list[$i][lo_location];

    // bot을 구분 합니다.
    /*
    $bot = "";
    if (preg_match('/Googlebot/', $list[$i][lo_agent]))
        $bot = "Google-bot";
    else if (preg_match('/bingbot/', $list[$i][lo_agent]))
        $bot = "bingbot";
    else if (preg_match('/Yeti/', $list[$i][lo_agent]))
        $bot = "Naver-bot";
    else if (preg_match('/Daumoa/', $list[$i][lo_agent]))
        $bot = "Daum-bot";

    // 최고관리자에게만 허용
    // 이 조건문은 가능한 변경하지 마십시오.
    if ($bot)
        echo "<td style='text-align:left'>&nbsp;{$bot}</td>";
    else if ($is_admin == "super" && $list[$i][lo_url])
            echo "<td style='text-align:left'>&nbsp;<a href='{$list[$i][lo_url]}'>{$location}</a></td>";
    else
        echo "<td  style='text-align:left'>&nbsp;{$location}</td>";
*/
    echo "</tr>";

}

if ($i == 0)
    echo "<tr><td colspan=7 height=50 align=center>no employee access now.</td></tr>";
if ($write_pages)
    echo "<tr><td colspan=7 height=30 align=center>$write_pages</td></tr>";
?>
</tbody>
</table>
