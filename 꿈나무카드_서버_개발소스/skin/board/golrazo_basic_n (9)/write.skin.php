<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/css/style.css">', 0);

//$notag = array('free','feedback');
//if(!in_array($bo_table,$notag)) $tagon = 1;
?>

<section id="bo_w" class="ctin" >
<form name="fwrite" id="wform" class="grz_frm" style="border: 0 !important;" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data">
<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
<input type="hidden" name="w" value="<?php echo $w ?>">
<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
<input type="hidden" name="sca" value="<?php echo $sca ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="spt" value="<?php echo $spt ?>">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<?php
$option = '';
$option_hidden = '';
if ($is_notice || $is_html || $is_secret || $is_mail) {
	$option = '';
	if ($is_notice) {
		$option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
	}

	if ($is_html) {
		if ($is_dhtml_editor) {
			$option_hidden .= '<input type="hidden" value="html1" name="html">';
		} else {
			//$option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
		}
	}

	if ($is_secret) {
		if ($is_admin || $is_secret==1) {
			$option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
		} else {
			$option_hidden .= '<input type="hidden" name="secret" value="secret">';
		}
	}

	if ($is_mail) {
		$option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
	}
}

echo $option_hidden;
?>

<script type="text/javascript">
        $(function() {
            $("#imgInp").on('change', function(){
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

              reader.readAsDataURL(input.files[0]);
            }
        }


    </script>

<table style="font-family:맑은고딕; font-weight:bold; text-align:center; font-size:14px; margin:0 auto; margin-top:15px;">
<tr><th style="width:60px;"></th><th></th></tr>
<tr style="height:44px;">
<td style="border-bottom:1px solid #CCC;"><i class="glyphicon glyphicon-camera"></i>사진
</td>
<td colspan="3" style="border-bottom:1px solid #CCCCCC;">		
<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
<div class="item">
<input id="imgInp" style="margin-left:5px;" accept="image/*" type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능">
<?php if ($is_file_content) { ?>
			<input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" size="50">
			<?php } ?>
			<?php if($w == 'u' && $file[$i]['file']) { ?>
			<input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
			<?php } ?>
		</div>
<?php } ?>
</td>
</tr>

<tr>
<td style="height:60px;border-bottom:1px solid #CCC;"><i class="glyphicon glyphicon-map-marker"></i>제목

</td>
<td style="border-bottom:1px solid #CCC; "colspan="2"><input style="border:0px;margin-top:px;width:100%;height:40px;" value="" name="wr_subject" id="wr_subject" value="<?php echo $subject ?>" required maxlength="255" class="g_text" /></td>

</tr>

<tr>
<td style="height:60px;border-bottom:1px solid #CCC;"><i class="glyphicon glyphicon-map-marker"></i>주소

</td>
<td style="border-bottom:1px solid #CCC; "colspan="2"><input style="border:0px;margin-top:px;width:100%;height:40px;" value="" name="wr_3" id="wr_3" value="<?php echo $subject ?>" required maxlength="255" class="g_text" /></td>

</tr>

<tr style="height:44px;">
<td style="border-bottom:1px solid #CCC;"><i class="glyphicon glyphicon-pencil"></i>후기

</td>
<td colspan="3" style="border-bottom:1px solid #CCC;" >

<? if(!$is_dhtml_editor){?><label class="rlbl" style="margin-top:8px;" ><?}else{?><div class="dhtml" ><?}?>
		<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
		<? if(!$is_dhtml_editor){?></label><?}else{?></div><?}?>
		<?php if($write_min || $write_max) { ?>
		<?php } ?>
</td>
</tr>
<style>
#wr_content{height:38px !important;resize: none;}
</style>
<tr style="height:40px;">
<td></td><td style="width:240px;" colspan="3"><img style="width:240px;" onERROR="this.src='http://bigberd.com/img/preview.png'" id="blah" src="#" style=""alt="your image" /></td>
</tr>
</table>
		
		


		
		<div style="height:0px !important; visibility:hidden;">
		<input type="text" value="<?php echo $board['bo_subject']; ?>"name="wr_4" id="wr_4" value="<?php echo get_text($write['wr_4']); ?>" maxlength="255" style="width:100%;"/>
		</div>

		<div class="item" style="height:0px!important; visibility:hidden;">
<label class="g_label">사진</label>
<input type="text" value="<?php echo $member['photo']; ?>"name="wr_5" id="wr_5" value="<?php echo get_text($write['wr_5']); ?>" maxlength="255" style="width:100%;"/>
</div>

	<div class="frm_tl" style="background-color:#FFF !important">
		<center><input style="font-family:맑은고딕; font-size:15px; margin-top:0px;margin-bottom:10px;background-color:#FFF; border:1px solid #3B5998; color:#3B5998; padding:10px; width:250px; height:40px;" type="submit" class="submit" accesskey="s" value="등록하기

" /></center>
	</div>
</form>


<script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
	
<? if($tagon){?>
$( document ).ready(function() {
	$("#tag_inp").keypress(function(e) {
		if(e.which == 13 || e.which == 44) {
			tag_chk();			
			return false;
		}
	}).focusout(function(e){
			tag_chk();
	});

	function tag_chk(){
		var inp = $("#tag_inp");
		var inpv = $("#tag_inp").val();
		var iparr = inpv.split(",");
		var isz = iparr.length;

		for(var a = 0;a<isz;a++){
			var garr = new Array();
			var act = 0;
			inpv = iparr[a].trim();
			if(inpv != ""){
				var j = $("#g_tagbox div.gtag").length;
				if(j > 0){
					for(var i=0;i<j;i++){
						var hh = $("#g_tagbox div.gtag a.gt_name").eq(i).html();
						if(garr.indexOf(hh) == -1) garr.push(hh);
					}			
				}
				if(garr.indexOf(inpv) != -1) act = 1;
				else garr.push(inpv);

				var txt = '<div class="gtag"><a class="gt_name">'+inpv+'</a><a class="cls">&times;</a></div>';
				if(act == 0) $("#g_tagbox").append(txt);
				$("#tag_inp").val("");
				$("#wr_1").val(garr);
			}
		}

		return false;
	}

	$("#g_tagbox .gtag .cls" ).live("click", function() {
		$(this).parent().remove();

		var garr = new Array();
		var j = $("#g_tagbox div.gtag").length;
		for(var i=0;i<j;i++){
			var hh = $("#g_tagbox div.gtag a.gt_name").eq(i).html();
			garr.push(hh);
		}			

		$("#wr_1").val(garr);
	});

	$("#g_tagbox .gtag .gt_name" ).live(" dblclick", function() {
		var hh = $(this).html();
		$("#tag_inp").val(hh);
		$(this).parent().remove();
	});

	var wr_1 = '<?=$write[wr_1]?>';
	if(wr_1 != ''){
		var warr = wr_1.split(",");
		
		for(var i=0;i<warr.length;i++){
			var txt = '<div class="gtag"><a class="gt_name">'+warr[i]+'</a><a class="cls">&times;</a></div>';
			$("#g_tagbox").append(txt);
		}
	}
});
<?}?>
    </script>
