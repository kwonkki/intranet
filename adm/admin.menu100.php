<?
$menu["menu100"] = array (
    array("100000", "환경설정", ""),
    array("", "기본환경설정", "$g4[admin_path]/config_form.php"),
    array("", "관리권한설정", "$g4[admin_path]/auth_list.php"),
    array("-"),
    array("100200", "소스파일백업", "$g4[admin_path]/source_backup.php"),
    array("100210", "db백업", "$g4[admin_path]/db_backup.php"),
    array("-"),
    array("100300", "메일 테스트", "$g4[admin_path]/sendmail_test.php"),
    array("-"),
    array("100410", "db상태정보", "$g4[admin_path]/db_status.php"),
    array("100400", "버전정보", "$g4[admin_path]/version.php"),
    array("100520", "g4_info()", "$g4[admin_path]/g4_info.php"),
    array("100500", "phpinfo()", "$g4[admin_path]/phpinfo.php"),
    array("100510", "gd_info()", "$g4[admin_path]/gd_info.php"),
    array("-"),
    array("100700", "복구/최적화", "$g4[admin_path]/repair.php"),
    array("100710", "DB 최적화", "$g4[admin_path]/optimize.php"),
    array("100800", "세션 삭제", "$g4[admin_path]/session_delete.php"),
    array("-"),
    array("100900", "불당팩 버전정보", "$g4[admin_path]/version_bd.php"),
    array("100910", "불당팩 업그레이드", "$g4[admin_path]/upgrade_bd.php"),
    array("-"),
    array("", "phpMyAdmin", "$g4[phpmyadmin_dir]", "new")
);
?>
