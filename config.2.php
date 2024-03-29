<?
// 이 상수가 정의되지 않으면 각각의 개별 페이지는 별도로 실행될 수 없음
define("_GNUBOARD_", TRUE);

// $qstr이 없는 상황에서 필요한 것을 넘기기 위해서 사용 (메뉴 변수 등...)
$mstr = "";
if (isset($mnb))  { // 불당빌더 기본메뉴
    $mnb = mysql_real_escape_string($mnb);
    $mstr .= '&mnb=' . urlencode($mnb);
}

if (isset($snb))  { // 불당빌더 서브메뉴
    $snb = mysql_real_escape_string($snb);
    $mstr .= '&snb=' . urlencode($snb);
}
if ($sfl == "wr_good" || $sfl == "wr_nogood" || $sfl == "wr_nogood_down" || $sfl == "wr_7" || $sfl == "wr_hit")  {
    $mstr .= '&sfl=' . urlencode($sfl);
    $mstr .= '&stx=' . urlencode($stx);
}

// 메뉴 문자열을 합쳐 줍니다.
$qstr .= $mstr;

// 네이버 API
$g4['naver_api'] = "";

//------------------------------------------------------------------------------
// SMS 변수 모음 시작
//------------------------------------------------------------------------------
// SMS 디렉토리
$g4['sms']            = "sms";
$g4['sms_path']       = "$g4[path]/$g4[sms]";
$g4['sms_url']        = "$g4[url]/$g4[sms]";

$g4['sms_admin']      = "sms_admin";
$g4['sms_admin_path'] = "$g4[path]/$g4[admin]/$g4[sms_admin]";
$g4['sms_admin_url']  = "$g4[url]/$g4[admin]/$g4[sms_admin]";

// SMS 테이블명
$g4['sms4_prefix']            = "sms4_";
$g4['sms4_config_table']      = $g4['sms4_prefix'] . "config";
$g4['sms4_write_table']       = $g4['sms4_prefix'] . "write";
$g4['sms4_history_table']     = $g4['sms4_prefix'] . "history";
$g4['sms4_book_table']        = $g4['sms4_prefix'] . "book";
$g4['sms4_book_group_table']  = $g4['sms4_prefix'] . "book_group";
$g4['sms4_form_table']        = $g4['sms4_prefix'] . "form";
$g4['sms4_form_group_table']  = $g4['sms4_prefix'] . "form_group";

$g4['sms4_member_history_table']  = $g4['sms4_prefix'] . "member_history";

// SMS4 Demo 설정
if (file_exists("$g4[path]/DEMO"))
{
    // 받는 번호를 010-000-0000 으로 만듭니다.
    $g4['sms4_demo'] = true;

    // 실제로 보내지 않고 가상(Random)으로 전송결과를 저장합니다.
    $g4['sms4_demo_send'] = true;
}
?>
