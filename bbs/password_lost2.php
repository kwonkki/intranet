<?
include_once("./_common.php");
include_once("$g4[path]/lib/mailer.lib.php");

if ($member[mb_id]) 
{
    echo "<script type='text/javascript'>";
    echo "alert('you are already loggined-in.');";
    echo "window.close();";
    echo "opener.document.location.reload();";
    echo "</script>";
    exit;
}

include_once("$g4[path]/zmSpamFree/zmSpamFree.php");
if ( !zsfCheck( $_POST['wr_key'], 'password_lost' ) ) { alert ('CAPCHA SPAM CODE is wrong.'); }

$email = trim($_POST['mb_email']);

if (!$email) 
    // 메일주소 오류입니다.
    alert_close("not normal access - 100");

$sql = " select count(*) as cnt from $g4[member_table] where mb_email = '$email' ";
$row = sql_fetch($sql);
if ($row[cnt] > 1)
    alert("same email existing tow. contact admin.");

$sql = " select mb_no, mb_id, mb_name, mb_nick, mb_email, mb_datetime from $g4[member_table] where mb_email = '$email' ";
$mb = sql_fetch($sql);
$msg = "";
if (!$mb[mb_id])
    // 존재하지 않는 회원입니다.
    $msg = "not normal access - 110";
else if (is_admin($mb[mb_id])) 
    // 관리자 아이디는 접근 불가합니다.
    $msg = "not normal access - 120";

// 불당팩 - 패스워드 찾기로 장난질 하는 것을 막아야죠.
if ($msg) {

    // 코드 호환성을 위해서 변수를 setting
    $mb_id = $mb[mb_id];

    // 불당팩 : 아래 코드는 불당팩의 /bbs/login_check.php와 동일 합니다. ---------------------------------------

    // 로그인 오류를 db에 기록 합니다.
    $sql = " insert into $g4[login_fail_log_table] (mb_id, ip_addr, log_datetime, log_url) values ('$mb_id', '$remote_addr', '$g4[time_ymdhis]', '/bbs/password_lost2.php') ";
    sql_query($sql);

    // 오류 횟수를 체크해서 차단할지를 결정 합니다.
    if ($config['cf_retry_time_interval'] > 0 && $config['cf_retry_count'] > 0) {
        $sql = " select count(*) as cnt from $g4[login_fail_log_table] where log_datetime >= '" . date("Y-m-d H:i:s", $g4[server_time] - $config['cf_retry_time_interval'] ) . "' and ip_addr='$remote_addr' ";
        $result = sql_fetch($sql);

        $ip = $_SERVER[REMOTE_ADDR];
        
        // 회수 -2일때, 경고 메시지, 4회 이후에 IP 차단을 하는 경우 메시지 없이 차단 될 수 있으므로, 횟수를 5회 이상으로 하는게 좋습니다.
        if (($result['cnt']+3) == $config['cf_retry_count']) {
            alert("if you type worng 2times more, your ip will be blocked.");
        }

        // 횟수 초과시 차단
        if ($result['cnt'] >= $config['cf_retry_count']) {
            $pattern = explode("\n", trim($config['cf_intercept_ip']));
            if (empty($pattern[0])) // ip 차단목록이 비어 있을 때
                $cf_intercept_ip = $ip;
            else
                $cf_intercept_ip = trim($config['cf_intercept_ip'])."\n{$ip}";
            $sql = " update {$g4['config_table']} set cf_intercept_ip = '$cf_intercept_ip' ";
            sql_query($sql);

            alert_close($msg);
        } else {
            alert($msg);
        }
    }
}

// 난수 발생
srand(time());
$randval = rand(4, 6); 

$change_password = substr(md5(get_microtime()), 0, $randval);

$mb_lost_certify = sql_password($change_password);
$mb_datetime     = sql_password($mb[mb_datetime]);

$sql = " update $g4[member_table]
            set mb_lost_certify = '$mb_lost_certify'
          where mb_id = '$mb[mb_id]' ";
$res = sql_query($sql);

// $mb_no를 암호화 합니다.
$mb_no = encrypt($mb[mb_no], $g4[encrypt_key]);

$href = "$g4[url]/$g4[bbs]/password_lost_certify.php?mb_no=$mb_no&mb_datetime=$mb_datetime&mb_lost_certify=$mb_lost_certify";

$subject = "your requested id/password information.";

$content = "";
$content .= "<div style='line-height:180%;'>";
$content .= "<p>Your account information would be like this below.</p>";
$content .= "<hr>";
$content .= "<ul>";
$content .= "<li>member ID : $mb[mb_id]</li>";
$content .= "<li>Changed password : <span style='color:#ff3300; font:13px Verdana;'><strong>$change_password</strong></span></li>";
$content .= "<li>name : ".addslashes($mb[mb_name])."</li>";
$content .= "<li>nickname : ".addslashes($mb[mb_nick])."</li>";
$content .= "<li>email access : ".addslashes($mb[mb_email])."</li>";
$content .= "<li>requested date : $g4[time_ymdhis]</li>";
$content .= "<li>homepage : $g4[url]</li>";
$content .= "<li>click the link to change the password: <a href='$href' target='_blank'>$href</a></p>";
$content .= "</ul>";
$content .= "<hr>";
$content .= "<p>";
/*
$content .= "1. click the link. if you cant, copy the url and paste inthe browser address bar.<br />";
$content .= "2. 링크를 클릭하시면 패스워드가 변경 되었다는 인증 메세지가 출력됩니다.<br />";
$content .= "3. 홈페이지에서 회원아이디와 위에 적힌 변경 패스워드로 로그인 하십시오.<br />";
$content .= "4. 로그인 하신 후 새로운 패스워드로 변경하시면 됩니다.<br />";
$content .= "5. <font color=red>위의 링크를 두번 두르면 비밀번호가 임의로 변경 되므로, 비밀번호 찾기로 새로운 패스워드를 받아야 합니다.</font><br />";
$content .= "6. 아이디만을 확인기를 원하는 경우에는, 위의 링크를 누르지 않고 회원아이디와 알고 있는 기존의 비밀번호로 로그인 하면 됩니다.<br />";
$content .= "</p>";
*/
$content .= "<p>Thank you.</p>";
$content .= "<p>[END]</p>";
$content .= "</div>";

$admin = get_admin('super');
mailer($admin[mb_nick], $admin[mb_email], $mb[mb_email], $subject, $content, 1);

alert_close("$email : our system sending the email for your verification. please check the email.");
?>
