// 회원아이디 검사
function reg_mb_id_check() {
   var check_mb_id_val = document.fregisterform.mb_id.value;
   var check_mb_id_len = document.fregisterform.mb_id.value.length;
    if(check_mb_id_len >= 3){
      $.ajax({
        type: 'POST',
        url: member_skin_path+'/ajax_mb_id_check.php',
        data: {
            'reg_mb_id': encodeURIComponent(check_mb_id_val)
        },
        async: false,
        cache: false,
        success: function(msg){
            return_reg_mb_id_check(msg);
        }
      });
    } else {
        return_reg_mb_id_check('120');
    }
}

function return_reg_mb_id_check(req) {
    var msg = $('#msg_mb_id');

    switch(req) {
        case '110' : msg.text('eng, num, _ available.').css( "color", "red" ); break;
        case '120' : msg.text('please input more than 4 characters.').css( "color", "red" ); break;
        case '130' : msg.text('already used id.').css( "color", "red" ); break;
        case '140' : msg.text('reserved word not available.').css( "color", "red" ); break;
        case '000' : msg.text('okay to use.').css( "color", "blue" );break;
        default : alert( 'wrong access.\n\n' + req ); break;
    }
    $('#mb_id_enabled').val(req);    
}

// 별명 검사
function reg_mb_nick_check() {
    var reg_mb_nick = $('#mb_nick').val();
    if (check_byte2(reg_mb_nick) < 4) {
        return_reg_mb_nick_check('120');
    }
    
    $.ajax({
        type: 'POST',
        url: member_skin_path + "/ajax_mb_nick_check.php",
        data: "reg_mb_nick="+encodeURIComponent(reg_mb_nick),
        async: false,
        success: function(msg){
            return_reg_mb_nick_check(msg);
        }
    });
}

function return_reg_mb_nick_check(req) {
    var msg = $('#msg_mb_nick');
    switch(req) {
        case '110' : msg.text('please type english and number.').css( "color", "red" ); break;
        case '120' : msg.text('please type more than 4 characters.').css( "color", "red" ); break;
        case '130' : msg.text('already used nick name.').css( "color", "red" ); break;
        case '140' : msg.text('reserved word not available.').css( "color", "red" ); break;
        case '150' : msg.text('cant use the this nickname..').css( "color", "red" ); break;
        case '000' : msg.text('okay to use.').css( "color", "blue" ); break;
        default : alert( 'wrong access.\n\n' + req ); break;
    }
    $('#mb_nick_enabled').val(req);
}

// E-mail 주소 검사
function reg_mb_email_check() {
    if($('#mb_email').val().length >= 4){
        $.ajax({
            type: 'POST',
            url: member_skin_path + "/ajax_mb_email_check.php",
            data: "reg_mb_email="+encodeURIComponent($('#mb_email').val())+"&"+"reg_mb_id="+encodeURIComponent($('#mb_id').val()),
            async: false,
            success: function(msg){
                return_reg_mb_email_check(msg);
            }
        });
    } else {
        return_reg_mb_email_check('120');
    }
}

function return_reg_mb_email_check(req) {
    var msg = $('#msg_mb_email');
    switch(req) {
        case '110' : msg.text('please type the E-mail .').css( "color", "red" ); break;
        case '120' : msg.text('wrong E-mail format.').css( "color", "red" ); break;
        case '130' : msg.text('already used E-mail .').css( "color", "red" ); break;
        case '140' : msg.text('reserved word not available.').css( "color", "red" ); break;
        case '150' : msg.text('prohibited email domain.').css( "color", "red" ); break;
        case '000' : msg.text('okay to use.').css( "color", "blue" ); break;
        default : alert( 'wrong access.\n\n' + req ); break;
    }
    $('#mb_email_enabled').val(req);
}

// 회원이름 검사
function reg_mb_name_check() {
   if($('#mb_name').val().length >= 2){
      $.ajax({
        type: 'POST',
        url: member_skin_path + "/ajax_mb_name_check.php",
        data: "mb_name="+encodeURIComponent($('#mb_name').val()),
        async: false,
        success: function(msg){
            return_reg_mb_name_check(msg);
        }
      });
    } else {
        return_reg_mb_name_check('120');
    }
}

function return_reg_mb_name_check(req) {
    var msg = $('#msg_mb_name');
    switch(req) {
        case '110' : msg.text('pleaes type the english.').css( "color", "red" ); break;
        case '120' : msg.text('please type more than 2 characters.').css( "color", "red" ); break;
        case '140' : msg.text('reserved word not available.').css( "color", "red" ); break;
        case '000' : msg.text('').css( "color", "blue" ); break;
        default : alert( 'wrong access.\n\n' + req ); break;
    }
    $('#mb_name_enabled').val(req);
}
