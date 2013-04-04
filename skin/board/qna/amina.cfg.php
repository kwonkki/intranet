<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//------------------------------------------------------------------------
// AMINA SKIN 2.0 Basic Setup - http://amina.co.kr
//------------------------------------------------------------------------

//사이트 주소, 마지막에 슬래쉬(/) 제외
$amina[site_url] = "http://amina.co.kr"; 

//그누보드 ROOT(config.php 파일이 있는 곳) 주소, 마지막에 슬래쉬(/) 제외
$amina[gnu_url] = "http://amina.co.kr"; 

//짧은 주소 : 사용 1, 미사용 0 입력
//http://amina.co.kr/skin/1 형태로 http://sir.co.kr/bbs/board.php?bo_table=g4_tiptech&wr_id=20648 글 참고
$amina[use_surl] = 0;

//bit.ly 짧은 주소 : 사용 1, 미사용 0 입력
//bitly.com에서 회원가입하면 Username(bitly_id)과 API Key(bitly_key)가 자동발급됨(https://bitly.com/a/your_api_key 에서 확인가능)
$amina[use_bitly] = 0;
$amina[bitly_id]  = "";
$amina[bitly_key] = "";

//------------------------------------------------------------------------
// AMINA SKIN 2.0 XP Setup - http://amina.co.kr
//------------------------------------------------------------------------

//로그인시 xp 자동적용을 위해 아래 코드를 /skin/member/현재사용중인 member 폴더 안에 있는 login_check.skin.php 에 넣어 주세요.
// 코드 : if($xp[xp_use] == 1 && $mb[mb_id]) check_xp($mb[mb_id]);

// 회원레벨 : XP 사용 1, 미사용 0 입력
$xp[xp_use] = 1;

// XP 적용 기준 : 현재 포인트 1, 총누적 글&댓글 쓰기 포인트 2, 총누적 글&댓글 쓰기 + 출석(로그인) 포인트 3 입력
$xp[xp_rule] = 3; 

// 각 레벨별 요구 XP(포인트)
$xp[xp_point] = 1000; 

// 최대 레벨
$xp[xp_max] = 99; 

// 레벨 표시 스타일 → 레벨 아이콘 사용시 img 라고 입력
$xp[xp_icon] = "txt"; 

// 레벨 아이콘 스킨명(/skin/xp/폴더명)
$xp[xp_icon_skin] = "zb4"; 

// 특별회원(special.gif) 회원아이디 리스트 → 콤마(,)로 회원아이디 구분
$xp[xp_mb_list] = ""; 

// 회원등급 표시 → 그누보드 기본 회원레벨
$xp[grade][1] = "비회원";
$xp[grade][2] = "실버회원";
$xp[grade][3] = "골드회원";
$xp[grade][4] = "로얄회원";
$xp[grade][5] = "프렌드회원";
$xp[grade][6] = "패밀리회원";
$xp[grade][7] = "운영자";
$xp[grade][8] = "운영자";
$xp[grade][9] = "관리자";
$xp[grade][10] = "최고관리자";

//------------------------------------------------------------------------
// AMINA SKIN 2.0 Thema & Etc Lib Setup - http://amina.co.kr
//------------------------------------------------------------------------

//아미나 테마를 사용하시면 주석을 풀어 주세요.
//if(!$thema) $thema = "basic";
//include_once("$g4[path]/lib/amina.lib.thema.php");

//아미나 최근글(latest_amina)을 사용하시면 주석을 풀어 주세요.
//include_once("$g4[path]/lib/amina.lib.latest.php");

//아미나 스킨 1.x 버전을 같이 사용하시면 주석을 풀어 주세요.
//if($board[bo_skin] != "amina-v2") include_once("$g4[path]/lib/amina.lib.1.x.php");

//영카트 상품정보와 연동되는 게시판 아이디 - 콤마(,)로 게시판아이디 구분
$bo_youngcart = "";

?>