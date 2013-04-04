<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<script type="text/javascript">
document.location.replace('<?=$g4['bbs_path']?>/board.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&year=<?=$year?>&month=<?=$month?>&day=<?=$day?>&page=<?=$page?>')
</script>