<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가


// if not login, redirect to the login.php
if (basename($_SERVER["REQUEST_URI"]) != "register_form.php" ){
	if (!$_SESSION['ss_mb_id']){  
		if($_SERVER["REQUEST_URI"] == "{$g4['path']}/login.php"){
			;
		}else{ 
			goto_url("{$g4['path']}/login.php"); 
		}
	}
}


include_once("$g4[path]/head.sub.php");

include_once("$g4[path]/lib/ChromePhp.php");


// 사용자 화면 상단과 좌측을 담당하는 페이지입니다.
// 상단, 좌측 화면을 꾸미려면 이 파일을 수정합니다.

// layout 정의 및 읽기
$g4[layout_path] = $g4[path] . "/layout";                             // layout을 정의 합니다.
$g4[layout_skin] = "naver";                                           // layout skin을 정의 합니다
$g4[layout_skin_path] = $g4[layout_path] . "/" . $g4[layout_skin];    // layout skin path를 정의 합니다.

// top, side 메뉴의 class를 지정
$top_menu = "menu mc_gray";
$side_menu = "menu_v";

// 필요한 레이아웃 파일등을 읽어 들입니다.
include_once("$g4[layout_skin_path]/layout.php");
include_once("$g4[layout_path]/layout.lib.php");
?>
	
<div class="header01_wrapper">
	<div class="header01">
		<div class="header01_right">
			<span class="login01">Welcome to the PSP intranet. "<?=$member[mb_id]?>"</span>  
			<? if($is_admin){ ?><span class="button red"><button class="btn01" href="#" title='Go to the Admin Page' onclick="location.href='<?=$g4['path']?>/hr/' ">Admin</button></span>	<? }?>
			<span class="button"><button class="btn01" href="#" title='Click to Logout ^^' onclick="location.href='<?=$g4['path']?>/bbs/logout.php' ">Log Out</button></span>
			
		</div>
		
	</div>
</div>
<div id="main_header_wrapper">
	<div id="main_header">
		<div class="main_logo">
			<a href="<?=$g4[path]?>"><img src="<?=$g4[path]?>/images/main_logo.png" title="PSP Intranet"></a>
		</div>
		
		<div class="main_right">
			<div id='cssmenu'>
			<ul>
			   <li><a href='<?=$g4[path]?>'><span>Home</span></a></li>
			   <li class='has-sub'><a href='#' title='attendance'><span>Attendance</span></a>
			  		<ul>
			         <li class='has-sub'><a href='<?=$g4[path]?>/attendance.php' title='Login/Logout'><span>Login/Logout</span></a>
				               
				         <? if( $member[mb_level] >= 5){ ?>
				        	<ul>
				        		<? if( $is_admin){ ?>			
				        	    <li ><a href='<?=$g4[path]?>/attendance_status.php' title='Attendance Status'><span>Attendance Status</span></a></li>
				        	    <? } ?>
				                <li class='last'><a href='<?=$g4[path]?>/dept_attendance_status.php' title='Dept Attendance Status'><span>Dept Attendance Status</span></a></li>
				            </ul>
				         <? } ?>
			         </li>
			         <li class='has-sub'><a href='<?=$g4[path]?>/my_status.php' title='My Status'><span>My Status</span></a>
			         	<? if( $member[mb_level] >= 5){ ?>
			        	<ul>
			               <li class='last'><a href='<?=$g4[path]?>/monitor_status.php' title='Review Daily Report'><span>Monitor Status</span></a></li>
			            </ul>
			            <? } ?>
			         </li>
			         <li class='has-sub'><a href='<?=$g4[path]?>/bbs/board.php?bo_table=daily_report' title='Daily Report'><span>Daily Report</span></a>
			         	<? if( $member[mb_level] >= 5){ ?>
			        	<ul>
			               <li class='last'><a href='<?=$g4[path]?>/bbs/board.php?bo_table=daily_report&review_auth=1' title='Review Daily Report'><span>Review Daily Report</span></a></li>
			            </ul>
			            <? } ?>
			         </li>
			      </ul> 
			   </li>
			   <li class='has-sub'><a href='#'><span>Task</span></a>
			  		<ul>
			         <li ><a href='<?=$g4[path]?>/bbs/board.php?bo_table=project'><span>Project Management</span></a>
			         </li>
			         <li ><a href='<?=$g4[path]?>/bbs/board.php?bo_table=request'><span>Request Job</span></a>
			         </li>
			         <!--
			         <li ><a href='#'><span>Marketing</span></a>
			         </li>
			         <li ><a href='#'><span>SEO</span></a>
			         </li>
			         -->
			      </ul> 
			   </li>
			   <li class='has-sub'><a href='#'><span>Asset</span></a>
			  		<ul>
			         <li ><a href='<?=$g4[path]?>/asset_category.php'><span>Asset Category</span></a>
			         </li>
			         <li ><a href='<?=$g4[path]?>/asset_management.php'><span>Asset Management</span></a>
			         </li>
			         
			         
			         <!--
			         <li ><a href='#'><span>Marketing</span></a>
			         </li>
			         <li ><a href='#'><span>SEO</span></a>
			         </li>
			         <li ><a href='<?=$g4[path]?>/bbs/board.php?bo_table=test'><span>test</span></a>
			         </li>
			         -->
			      </ul> 
			   </li>
			   <li class='has-sub'><a href='#'><span>PSP</span></a>
			  		<ul>
			         <li><a href='<?=$g4[path]?>/bbs/board.php?bo_table=notice'><span>PSP Notice</span></a>
			         </li>
			         <li ><a href='<?=$g4[path]?>/handbook.php'><span>Employee Handbook</span></a>
			         </li>			         
			         <li ><a href='#'><span>Video Material</span></a>
			         </li>			         
			      </ul> 
			   </li>
			</ul>
			</div>
		</div>
	</div>
</div>
<!-- 웹페이지 전체의 div -->
<div id="wrap">


<!-- 중간의 메인부 시작 -->
<div id="container">

<!-- 메인 content 메뉴 시작 -->
<div id="content">

<script type="text/javascript">
function fsearchbox_submit(f)
{
    if (f.stx.value.length < 2) {
        alert("search keyword would be more than 2 characters.");
        //alert("검색어는 두글자 이상 입력하십시오.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
    var cnt = 0;
    for (var i=0; i<f.stx.value.length; i++) {
        if (f.stx.value.charAt(i) == ' ')
            cnt++;
    }

    if (cnt > 1) {
        alert("blank cant be more than one");
        //alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    f.action = "<?=$g4['bbs_path']?>/search.php";
    return true;
}
</script>

<?
// 줄바꿈 문자를 없앤다
$reg_e = array('/\n/','/\r/','/\"/'); 
$reg_p = array(' ',' ','\'');
?>
<!--
<script type="text/javascript">
$("#naver_popular").html( " <? echo preg_replace($reg_e, $reg_p, trim( db_cache("main_top_naver_cache", 300, "naver_popular('naver_popular', 4)")))?> " );
</script>
-->
