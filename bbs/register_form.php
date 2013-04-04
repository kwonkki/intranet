<?
include_once("./_common.php");

// 불법접근을 막도록 토큰생성
$token = md5(uniqid(rand(), true));
set_session("ss_token", $token);

if ($w == "") {
    // 회원 로그인을 한 경우 회원가입 할 수 없다
    // 경고창이 뜨는것을 막기위해 아래의 코드로 대체
    // alert("이미 로그인중이므로 회원 가입 하실 수 없습니다.", "./");
    if ($member[mb_id])
        goto_url($g4[path]);

    // 리퍼러 체크
    referer_check();

    // 불당팩 - 차단 ip 목록
    if (file_exists("./spam_ip.db")) {
        $spam_ip_file = file("./spam_ip.db");
        $myip = $_SERVER[REMOTE_ADDR];
        while($spam_ip = each($spam_ip_file))
        {
            $spam_ip_addr = trim( substr($spam_ip[1], 0, 12) );
            if($spam_ip_addr !== "" && preg_match("/$spam_ip_addr/", $myip))
            {
                alert("DB Error. Please call admin. Error Code : Reg 9021");
            }
        }
    }

    // 추천에 의해서만 회원 가입이 가능하게 수정 - 추천코드의 유효기간을 추가
    if ($g4['member_suggest_join']) {

        $sql = " select count(*) as cnt 
                  from $g4[member_suggest_table] 
                  where mb_id = '$_POST[mb_recommend]' and join_code = '$_POST[join_code]' and join_mb_id = '' and $g4[member_suggest_join_days] >= (to_days(now())-to_days(suggest_datetime))";
        $result = sql_fetch($sql);

        if ($result['cnt'] == 0)
            alert("wrong code - 3", "./register.php");
    }
	/*
    if (!$_POST[agree])
        alert("you need to agree.", "./register.php");

    if (!$_POST[agree2])
        alert("you need to agree.", "./register.php");
	*/
    // 주민등록번호를 사용한다면 중복검사를 합니다.
    /*
    if ($config[cf_use_jumin]) {
        $jumin = sql_password($mb_jumin);
        $row = sql_fetch(" select mb_name from $g4[member_table] where mb_jumin = '$jumin' ");
        if ($row[mb_name]) {
            if ($row[mb_name] == $mb_name)
                alert("이미 가입되어 있습니다.");
            else
                alert("다른 이름으로 같은 주민등록번호가 이미 가입되어 있습니다.\\n\\n관리자에게 문의해 주십시오.");
        }

        // 주민등록번호의 7번째 한자리 숫자
        $y = substr($mb_jumin, 6, 1);

        // 성별은 F, M 으로 나눈다.
        // 주민등록번호의 7번째 자리가 홀수이면 남자(Male), 짝수이면 여자(Female)
        $sex = $y % 2 == 0 ? "F" : "M";

        // 생일은 8자리로 만든다 (나중에 검색을 편하게 하기 위함)
        // 주민등록번호 앞자리를 그냥 생일로 사용함 ㅠㅠ
        // 주민등록번호 7번째 자리를 따져서...
        $birth = substr($mb_jumin, 0, 6);
        if ($y == 9 || $y == 0) // 1800년대생 (계시려나?)
            $birth = "18" . $birth;
        else if ($y == 1 || $y == 2) // 1900년대생
            $birth = "19" . $birth;
        else if ($y == 3 || $y == 4) // 2000년대생
            $birth = "20" . $birth;
        else // 오류
            $birth = "xx" . $birth;
    }
    */

    // 불당팩 - 회원그룹이 있는 경우 회원그룹의 유효성 검사
    if ($ug_id) {
        $ug = sql_fetch(" select * from $g4[user_group_table] where ug_id = '$ug_id' ");
        if (!ug)
            alert("user group incorrect");
    }
    
    $member[mb_birth] = $birth;
    $member[mb_sex] = $sex;
    $member[mb_name] = $mb_name;

    $g4[title] = "member registration";
} 
else if ($w == "u") 
{
    if ($is_admin) 
        alert("admin cant change the configuration", $g4[path]);

    if (!$member[mb_id])
        alert("after login, use this one.", $g4[path]);

    if ($member[mb_id] != $mb_id)
        alert("login information is different.");

    //if (!($member[mb_password] == sql_password($_POST[mb_password]) && $_POST[mb_password]))
    /*
    if (!($member[mb_password] == sql_password($_POST[mb_password]) && $_POST[mb_password]) && !($member[mb_password] == sql_old_password($_POST[mb_password]) && $_POST[mb_password])) 
        alert("패스워드가 틀립니다.");

    // 수정 후 다시 이 폼으로 돌아오기 위해 임시로 저장해 놓음
    set_session("ss_tmp_password", $_POST[mb_password]);
    */

    if ($_POST['mb_password']) {
        // 수정된 정보를 업데이트후 되돌아 온것이라면 패스워드가 암호화 된채로 넘어온것임
        if ($_POST['is_update'])
            $tmp_password = $_POST['mb_password'];
        else {
            $tmp_password = sql_password($_POST['mb_password']);
            $tmp_password_old = sql_old_password($_POST['mb_password']);
        }

        //if (!($member[mb_password] == sql_password($_POST[mb_password]) && $_POST[mb_password]) && !($member[mb_password] == sql_old_password($_POST[mb_password]) && $_POST[mb_password])) 
        if ($_POST['is_update']) {
            if ($member['mb_password'] != $tmp_password)
                alert("password wrong.");
        } else {
            if (!($member['mb_password'] == $tmp_password) && !($member['mb_password'] == $tmp_old_password))
                alert("password wrong.");
        }
    }

    $g4[title] = "member information update";

    $member[mb_email]       = get_text($member[mb_email]);
    $member[mb_homepage]    = get_text($member[mb_homepage]);
    $member[mb_birth]       = get_text($member[mb_birth]);
    $member[mb_tel]         = get_text($member[mb_tel]);
    $member[mb_hp]          = get_text($member[mb_hp]);
    $member[mb_addr1]       = get_text($member[mb_addr1]);
    $member[mb_addr2]       = get_text($member[mb_addr2]);
    $member[mb_signature]   = get_text($member[mb_signature]);
    $member[mb_recommend]   = get_text($member[mb_recommend]);
    $member[mb_profile]     = get_text($member[mb_profile]);
    $member[mb_1]           = get_text($member[mb_1]);
    $member[mb_2]           = get_text($member[mb_2]);
    $member[mb_3]           = get_text($member[mb_3]);
    $member[mb_4]           = get_text($member[mb_4]);
    $member[mb_5]           = get_text($member[mb_5]);
    $member[mb_6]           = get_text($member[mb_6]);
    $member[mb_7]           = get_text($member[mb_7]);
    $member[mb_8]           = get_text($member[mb_8]);
    $member[mb_9]           = get_text($member[mb_9]);
    $member[mb_10]          = get_text($member[mb_10]);
} else
    alert("no 'w' value ");

// 회원아이콘 경로
$mb_icon = "$g4[data_path]/member/".substr($member[mb_id],0,2)."/$member[mb_id].gif";
$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

include_once("./_head.php");
include_once("$member_skin_path/register_form.skin.php");
include_once("./_tail.php");
?>
