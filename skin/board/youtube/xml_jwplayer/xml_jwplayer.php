<?
// 이 상수가 정의되지 않으면 각각의 개별 페이지는 별도로 실행될 수 없음
 define("_GNUBOARD_", TRUE);


######################환경변수#########################

$laguage_ = "UTF-8"; //xml 생성파일은 utf-8 로 생성되어야 함.


//개별정보를 사용할경우
//$xml_dir  = $g4[path]."/xml_jwplayer/".$po_poll1; //
//$xml_path = $xml_dir."/".$po_poll1.".xml";

//
$xml_dir  = $board_skin_path."/xml_jwplayer/xml"; //
$xml_path = $xml_dir."/info.xml";


#######################################################

//디렉토리가 존재하지 않는다면 신규생성한다
@mkdir($xml_dir, 0707);
@chmod($xml_dir, 0707);


//파일이 존재하지 않는다면 신규생성한다.
if(!$xml_path){
fwrite($xml_file, "");
fclose($xml_file);
@chmod($xml_path, 0707);
}

$xml_file = fopen($xml_path, "w+")or die("xml file open erro.");



//xml 갱신함
$rows              = 20;
$sql              = " select * from $write_table where wr_is_comment = 0 order by wr_id desc limit 0, $rows ";
$result           = sql_query($sql);
$total_count      = mysql_num_rows($result);

 

$data[lauage]       = "<?xml version=\"1.0\"  encoding=\"{$laguage_}\" ?>";  
$data[playlist]     = "<playlist version=\"1\" xmlns=\"http://xspf.org/ns/0/\">";
$data[playlist_end]     = "</playlist>";
$data[title]        = "<title>playlist</title>";
$data[tracklist]    = "<tracklist>";
$data[tracklist_end]    = "</tracklist>";

$data[xml_start]    = "<track>";
$data[xml_end]      = "</track>";

$get_xml   = "";

$get_xml  .= $data[lauage];
$get_xml  .= $data[playlist];
$get_xml  .= $data[title];
$get_xml  .= $data[tracklist];

/*xml 생성*/
      while ($list= sql_fetch_array($result)){ 

       $get_sql = " select bf_file from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '{$list[wr_id]}' and bf_no = 0 ";
       $img_row = sql_fetch($get_sql);
	   

	   //유튜브 URL이 존재할경우 XML 생성함
	   if($list[wr_3]) {
		 $img_path  = "$g4[path]/data/file/$bo_table";
		 $img_path .= "/".$img_row[bf_file];

         $get_xml  .= $data[xml_start];

	     $view_subject = conv_subject($list[wr_subject], 10, "");
		 $view_content = conv_content($list[wr_content], 90, "");
         $string = $list[wr_3];
		 $url = parse_url($string);
	     		parse_str($url['query']); 
         $sm = "$v";	
         $get_xml    .= "<title>{$view_subject}</title>";

         $get_xml    .= "<creator>the Peach Open Movie Project</creator>";

         $get_xml    .= "<location>http://www.youtube.com/watch?v={$string}</location>";

         $get_xml    .= "<annotation>{$view_content}</annotation>";        

         $get_xml      .= $data[xml_end];

	   }	 
	  }




$get_xml   .= $data[tracklist_end];
$get_xml   .= $data[playlist_end];

/****************************xml data end**************************/

//변환
$get_xml = iconv("utf-8", "utf-8",$get_xml); 

// write action
if(!fwrite($xml_file, $get_xml)) echo "file wite erro.";

// file close
fclose($xml_file);

?>
