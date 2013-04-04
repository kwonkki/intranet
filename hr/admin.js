function check_all(f)
{
    var chk = document.getElementsByName("chk[]");

    for (i=0; i<chk.length; i++)
        chk[i].checked = f.chkall.checked;
}

function btn_check(f, act)
{
    if (act == "update") // 선택수정
    { 
        f.action = 'list_update_php';
        str = "update";
    } 
    else if (act == "delete") // 선택삭제
    { 
        f.action = 'list_delete_php';
        str = "delete";
    } 
    else if (act == "dept_delete")
	{
    	f.action = 'dept_delete.php';
        str = "delete";
	}
    else if (act == "vacation_approve")
    {
    	f.action = 'vacation_approve_update.php';
    	str = "approve";
    }
    else
        return;

    var chk = document.getElementsByName("chk[]");
    var bchk = false;

    for (i=0; i<chk.length; i++)
    {
        if (chk[i].checked)
            bchk = true;
    }

    if (!bchk) 
    {
        alert(str + " : please select the item.");
        return;
    }

    if (act == "delete")
    {
        if (!confirm("Do you want to delete the selected item?"))
            return;
    }

    f.submit();
}

function member_group_update(str, uid, type) 
{ 
var f = document.fmemberG_list; 

var orign_group = f.elements["groupName_["+type+"]"].value; 

if (orign_group != str) 
{ 
if (!confirm('\nDo you want to change the group name\n')) 
{ 
return false; 
} 
} 
else { 
if (!confirm('Do you really want to update? \n')) 
{ 
return false; 
} 
} 

location.href = "./memberGroup_form_update.php?w=u&gl_id=" + uid + "&gl_name=" + orign_group; 

} 
