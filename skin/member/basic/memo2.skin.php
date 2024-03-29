<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// head - 좌측 메뉴
include_once("$memo_skin_path/memo2.head.skin.php");

// 메인에 출력될 내용들이 있는 곳----
if ($class == "view") {
    // 쪽지 보기
    include_once("$memo_skin_path/memo2_view.skin.php");
} else { 
    // 쪽지 보기가 아닌경우
    switch ($kind) {
      case 'write' : 
            include_once("$memo_skin_path/memo2_write.skin.php"); 
            break;
      case 'online' :
            include_once("$memo_skin_path/memo2_online.skin.php"); 
            break;        
      case 'memo_group' :
            include_once("$memo_skin_path/memo2_group_member.skin.php"); 
            break;
      case 'memo_group_admin' :
            include_once("$memo_skin_path/memo2_group_admin.skin.php"); 
            break;
      case 'memo_address_book' :
            include_once("$memo_skin_path/memo2_memo_address_book.skin.php"); 
            break;
      case 'memo_config' :
            include_once("$memo_skin_path/memo2_config.skin.php"); 
            break;
      default :
            include_once("$memo_skin_path/memo2_list.skin.php"); 
    }
} 
// 메인에 출력될 내용들의 끝----

// tail - 하단부 영역
include_once("$memo_skin_path/memo2.tail.skin.php"); 
?>

<script type="text/javascript">
// 회원ID 찾기  
function popup_id(frm_name, ss_id, top, left) 
{ 
    url = './write_id.php?frm_name='+frm_name+'&ss_id='+ss_id; 
    opt = 'scrollbars=yes,width=320,height=470,top='+top+',left='+left; 
    window.open(url, "write_id", opt); 
} 

function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_me_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str) {
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_me_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "할 쪽지를 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete() {
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 쪽지를 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./memo2_form_delete.php";
    f.submit();
}

// 모든 게시물 삭제
function all_delete_trash() {
    var f = document.fboardlist;

    str = "삭제";

    if (!confirm("모든 쪽지를 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./memo2_form_delete_all_trash.php";
    f.submit();
}

// 윈도우 크기를 조정해 줍니다.
window.resizeTo( 730 , 600);
</script>
