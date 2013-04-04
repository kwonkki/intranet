/*
Calendar for GNUBOARD.
2009-02-20 Han, Su-young.
*/
if (typeof(CALENDAR_JS) == 'undefined') // 한번만 실행
{
	var CALENDAR_JS = true;
    if (typeof g4_path == 'undefined')
        alert('g4_path path not defined. js/calendar.js');

	var Cal_Today = new Date();
	var Cal_Year = Cur_Year = parseInt(Cal_Today.getFullYear(),10);
	var Cal_Month = Cur_Month = parseInt(Cal_Today.getMonth(),10) + 1;
	var Cal_Date = Cur_Date = parseInt(Cal_Today.getDate(),10);
	var Fld_Obj;
/* 달력 환경설정 */
	function Calendar_Config(type){
		//날짜 셀의 크기지정 가로, 세로
		var cell = new Array(25, 21);
		//요일타이틀 색깔지정 혹은 이미지 대체 (일, 월, 화, 수, 목, 금, 토) 순으로
		var yoil = new Array("s","m","t","w","t","f","s");
		//날짜 색깔지정 (일, 월, 화, 수, 목, 금, 토) 순으로
		var yoil_color = new Array("#cc3300", "#000000", "#000000", "#000000", "#000000", "#000000", "#3DA4B7");
		//오늘 날짜 색깔 및 배경지정 (스타일태그시작, 종료,스타일(배경등))
		var today = new Array("<b style='color:#000000'>", "</b>");
		//마우스 오버 색깔
		var over = '#E1E1E1';
		//달력 이동 버튼들
		var move = new Array("< ", "< ", " >", " >");
		//분리문자 2009-01-01
		var sp = "-";
		return eval(type);
	}
/* 달력 초기화 및 삭제 */
	function Calendar_Reset(){
		Fld_Obj = null;
		Cal_Year = parseInt(Cal_Today.getFullYear(),10);
		Cal_Month = parseInt(Cal_Today.getMonth(),10) + 1;
		Cal_Date = parseInt(Cal_Today.getDate(),10);
		var Cal_Div = document.getElementById('Calendar_Div');
		Cal_Div.parentNode.removeChild(Cal_Div);
		//selectBoxVisible();
	}
/* 달력 초기세팅 및 출력 */
	function Calendar_Create(id, move)
	{
		if(id)
		{
			Fld_Obj = document.getElementById(id);
		}
		if((Fld_Obj.value && Fld_Obj.value != ('0000' + Calendar_Config('sp') + '00' + Calendar_Config('sp') + '00')) && !move)
		{
			var tmp = Fld_Obj.value.split(Calendar_Config('sp'));
			Cal_Year = parseInt(tmp[0],10);
			Cal_Month = parseInt(tmp[1],10);
		} else if(!move){
			Cal_Year = parseInt(Cal_Today.getFullYear(),10);
			Cal_Month = parseInt(Cal_Today.getMonth(),10)+1;
		}
		Cal_Date = 1;
		Cal_Time = new Date(Cal_Year, Cal_Month, 1);
		Start_Date = new Date(Cal_Year, Cal_Month-1, 1).getDay();
		Last_Date = Calendar_LastDate(Cal_Year, Cal_Month);

		Calendar_Display(Start_Date, Last_Date);
	}
/* 인풋박스의 위치값 */
	function Calendar_Get_XY(fld){
		Fld_Element = new Object();
		/* 2009-02-20 getBoxObjectFor 파폭 미지원으로 삭제
	    if(document.all) {
			var obj = fld.getBoundingClientRect();
			Fld_Element.left = obj.left + (document.documentElement.scrollLeft || document.body.scrollLeft);
			Fld_Element.top = obj.top + (document.documentElement.scrollTop || document.body.scrollTop);
			Fld_Element.height = obj.bottom - obj.top;
	    } else {
			var obj = document.getBoxObjectFor(fld);
			Fld_Element.left = obj.x;
			Fld_Element.top = obj.y;
			Fld_Element.height = obj.height;
	    }
		*/
		var obj = fld.getBoundingClientRect();
		Fld_Element.left = obj.left + (document.documentElement.scrollLeft || document.body.scrollLeft);
		Fld_Element.top = obj.top + (document.documentElement.scrollTop || document.body.scrollTop);
		Fld_Element.height = obj.bottom - obj.top;
		var XY = new Array(Fld_Element.left, Fld_Element.top, Fld_Element.height);
		return XY;
	}
/* 달력 마지막 일자 계산 */
	function Calendar_LastDate(year, month){
		var dateCount = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

		if( (year%400 == 0) || ((year%4 == 0) && (year % 100 != 0)) ) {
			dateCount[1] = 29;
		}
		return dateCount[Number(month)-1];
	}
/* 년 +, - 이동 */
	function Calendar_Move_Year(num){
		Cal_Year += num;
		Calendar_Create("", true);
	}
/* 월 +, - 이동 */
	function Calendar_Move_Month(num){
		Cal_Month += num;
		if(Cal_Month < 1) { Cal_Year--; Cal_Month = 12; }
		if(Cal_Month > 12) { Cal_Year++; Cal_Month = 1; }
		Calendar_Create("", true);
	}
/* 년월 동시 이동 */
	function Calendar_Move_All(year, month){
		Cal_Year = year;
		Cal_Month = month;
		Calendar_Create("", true);
	}
/* 달력 실제 출력부 */
	function Calendar_Display(sd, ld)
	{
		if(!document.getElementById('Calendar_Div'))
		{
			if(document.layers)
			{ 
				document.layers['Calendar_Div'] = new Layer(1);
			} else if (document.all){ //익스플로러
				document.body.insertAdjacentHTML("BeforeEnd","<DIV ID='Calendar_Div'></DIV>");
			} else { 
				Make_Div = document.createElement('div');
				Make_Div.setAttribute("id", "Calendar_Div");
				document.body.appendChild(Make_Div);
			}
		}

		var Cal_Div = document.getElementById('Calendar_Div');
		var XY = Calendar_Get_XY(Fld_Obj); //위치값 계산
		//환경설정 값 읽어옴
		var disp_date = 1; //날짜출력
		var disp_yoil = 0; //요일출력
		var yoil = Calendar_Config('yoil'); //요일타이틀
		var yoil_color = Calendar_Config('yoil_color'); //요일별 날짜색상
		var today_style = Calendar_Config('today'); //오늘표기
		var button = Calendar_Config('move'); //버튼
		var size = Calendar_Config('cell'); //셀크기
		var div_width = size[0] * 7 + 10; //레이어 크기계산

		with(Cal_Div.style){
			position = 'absolute';
			width =  div_width +'px';
			backgroundColor = '#333333';
			left = XY[0] - 2;
			top = XY[1] + XY[2] - 2;
			padding = '1px';
			display = 'block';
			zIndex = '3000';
		}
		//selectBoxHidden('Calendar_Div');

		var In_HTML = "";
		var disp_y = Cal_Year + "";
		var disp_m = Cal_Month < 10 ? "0"+Cal_Month+"" : Cal_Month+"";
		In_HTML += "<div style='padding:5px; background-color:#ffffff;'>"
				+  "<div style='float:left; font-weight:bold; font-size:14px; color:#444444; width:90%; height:26px; padding:5px 0px 0px 15px;'>"
				+  "&nbsp;&nbsp; <a href='#' onclick='Calendar_Move_Year(-1);'><span style='position:relative; top:-2px; font-size:11px;'>" + button[0] + "</span></a>"
				+  "<b>" + disp_y + "</b>"
				+  "<a href='#' onclick='Calendar_Move_Year(1);'><span style='position:relative; top:-2px; font-size:11px;'>" + button[3] + "</span></a>"
			    +  "&nbsp;&nbsp;"
				+  "<a href='#' onclick='Calendar_Move_Month(-1);'><span style='position:relative; top:-2px; font-size:11px;'>" + button[1] + "</span></a>"
				+  "<b>" + disp_m + "</b>"
				+  "<a href='#' onclick='Calendar_Move_Month(1);'><span style='position:relative; top:-2px; font-size:11px;'>" + button[2] + "</span></a>"
				//+  "&nbsp;&nbsp;&nbsp;<a href='javascript:Calendar_Move_All(" + Cur_Year + ", " + Cur_Month + ");'><span style='font-size:11px; font-weight:normal;'>오늘</span></a>&nbsp;" 
				+  "</div>"
				+  "<div style='position:absolute; padding:5px; float:right; width:10%; text-align:right; top:0px; right:0px;'><a href='#' onclick='Calendar_Reset();'><span style='font-family:굴림,돋움; font-size:14px; color:#000;'><span style='position:relative; left:5px;'>></span><</span></a> </div>"
				+  "<div style='clear:both;'><table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>"
				+  "<tr><td colspan='7' bgcolor='#e1e1e1' height='1px'></td></tr>"
				+  "<tr align='center' height='22px'>";
		//요일출력
		for(var i=0; i<yoil.length; i++){
			In_HTML += "<td><span style='font-size:11px;'>" + yoil[i] + "</span></td>";
		}
		In_HTML += "</tr>"
				+  "<tr><td colspan='7' bgcolor='#e1e1e1' height='1px'></td></tr>";
		//날짜출력
		for(var i=0; i<ld+sd; i++){
			if(disp_yoil > 6) disp_yoil = 0;

			if(i == 0) In_HTML += "<tr height="+size[1]+">";
			if(i>0 && i%7 == 0){
				if(i%7 == 0) In_HTML += "</tr><tr height="+size[1]+">";
			}
			if(i < sd) {
				In_HTML += "<td>&nbsp;</td>";
			} else if(Cal_Year == Cur_Year && Cal_Month == Cur_Month && disp_date == Cur_Date){
				In_HTML += "<td align=center style=\"cursor:pointer;";
				if(today_style[2]) In_HTML += " " + today_style[2];
				In_HTML += "\" onclick='Calendar_SetValue(" + disp_date + ");'>" + today_style[0] + disp_date + today_style[1] + "</td>";
				disp_date++;
			} else {
				In_HTML += "<td align=center style=\"cursor:pointer;\" onclick='Calendar_SetValue(" + disp_date + ");' onmouseover=\"Calendar_ChangeBG(this, 'set');\" onmouseout=\"Calendar_ChangeBG(this, 'unset');\"><span style='color:" + yoil_color[disp_yoil] + ";'>" + disp_date + "</span></td>";
				disp_date++;
			}
			disp_yoil++;
		}
		//빈칸 메꾸기
		if(disp_yoil < 7){
			for(var i=disp_yoil; i<7; i++){
				In_HTML += "<td>&nbsp;</td>";
			}
		}
		In_HTML += "</tr></table></div></div>";

		Cal_Div.innerHTML = In_HTML;
	}
/* 날짜클릭으로 인풋박스에 값 넣기 */
	function Calendar_SetValue(date){
		var sp = Calendar_Config('sp');
		Fld_Obj.value = Cal_Year + sp + (Cal_Month < 10 ? '0'+Cal_Month : Cal_Month) + sp + (date < 10 ? '0'+date : date);
		Calendar_Reset();
	}
/* [오늘] 을 클릭했을시 달력이 사라지면서 오늘날짜를 바로 넣기 */
	function Calendar_SetToday(){
		Cal_Year = Cur_Year;
		Cal_Month = Cur_Month;
		Calendar_SetValue(Cur_Date);
	}
/* 날짜에 마우스 오버시 배경색 변경 */
	function Calendar_ChangeBG(obj, type){
		if(type == 'set'){
			obj.style.backgroundColor = Calendar_Config('over');
		} else {
			obj.style.backgroundColor = '';
		}
	}
}