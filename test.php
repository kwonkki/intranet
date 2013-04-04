
<!-- 왼쪽 side div 시작 -->
<div class="snb">

<?
// 아웃로그인
include_once("$g4[path]/lib/outlogin.lib.php");
echo outlogin("transparent");
?>

<!--좌측 메뉴 -->
<table><tr><td height="1px"></td></tr></table>
<div id="menu_v" class="<?=$side_menu?>">
    <?
    switch ($mnb) {
        case "myon"     : print_snb($snb_arr['myon'], 'MyOn'); print_snb($snb_arr['myboard'], '나의 게시판'); print_snb($snb_arr['myvisit'], '내가 방문한 게시판');break;
        case "tips"     :
        case "gnu4_b4"  :
        case "gblog"    :
        case "club2"    :
        case "android"  : // 통상적인 경우에는 아래처럼만 해주면 된다.
        case "mart"     : print_snb($snb_arr[$mnb], mnb_name($mnb_arr, $mnb)); break;
                          // 2번째 메뉴인 yc4_old나 test는 $mnb가 아니므로, 제목을 그냥 지정해준다. 이런식으로 몇개라도 메뉴를 내려 보낼 수 있다.
        case "yc4"      : print_snb($snb_arr[$mnb], mnb_name($mnb_arr, $mnb)); print_snb($snb_arr['yc4_old'], "영카트4(옛날자료)"); break;
        case "gnu4"     :
        case "talk"     : print_snb($snb_arr[$mnb], mnb_name($mnb_arr, $mnb)); print_snb($snb_arr['test'], '테스트');break;
        case "info"     : print_snb($snb_arr[$mnb], 'Info'); break;
        default         : // $mnb가 지정 범위를 벗어나면 내맘대로 출력한다.
                          print_snb($snb_arr['talk'], mnb_name($mnb_arr, 'talk'));
                          break;
    }
    ?>
</div>

<!--//ui object -->

<!-- 로그인박스와의 여백 -->
    <table><tr><td height="1px"></td></tr></table>
    <?
    // 투표
    include_once("$g4[path]/lib/poll.lib.php");
    echo poll();
    ?>
    
    <table><tr><td height="1px"></td></tr></table>
    <?
    // 방문자
    include_once("$g4[path]/lib/visit.lib.php");
    echo visit();
    ?>

    <table><tr><td height="1px"></td></tr></table>

    <table><tr><td height="1px"></td></tr></table>
    <? // 현재접속자
    include_once("$g4[path]/lib/connect.lib.php");
    echo connect();
    ?>

    <table><tr><td height="1px"></td></tr></table>
</div>
<!-- 왼쪽 side 메뉴 끝 -->