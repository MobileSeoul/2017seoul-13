<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<!--[if lte IE 8]>
<script src="http://cyranoch.cafe24.com/js/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "http://cyranoch.cafe24.com";
var g5_bbs_url   = "http://cyranoch.cafe24.com/bbs";
var g5_is_member = "";
var g5_is_admin  = "";
var g5_is_mobile = "";
var g5_bo_table  = "";
var g5_sca       = "";
var g5_editor    = "";
var g5_cookie_domain = "";
</script>
<link rel="canonical" href="http://cyranoch.cafe24.com/index.php">
<meta name="Keywords" content="꿈나무카드" />
<meta name="Description" content="꿈나무카드" />
<meta property="og:site_name" content="꿈나무카드" />
<meta property="og:type" content="website" />
<meta property="og:title" content="꿈나무카드" />
<meta property="og:description" content="꿈나무카드" />
<meta property="og:image" content="http://cyranoch.cafe24.com/css/pexels-photo-113335.jpeg" />
<meta property="og:url" content="http://cyranoch.cafe24.com" />
<title>꿈나무카드</title>
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="stylesheet" href="http://cyranoch.cafe24.com/css/com.css">
</head>

<body class="main">
<div id="wrap">
    <div id="header">
        <div class="util">
            <div class="util_in">
            
            
            
            
                
                <ul class="util_link">
                
                    <li><a href="#">로그인</a></li>
                    <li><a href="#">회원가입</a></li>
                
                </ul>
            </div>
        </div>
        <div class="gnb" id="gnb">

                       <h1 style="margin-left:20px;"><a href="info.php"><img src="http://cyranoch.cafe24.com/css/ggom.png" style="width:180px;"></a></h1>
            <ul class="depth1" style="margin-right:-350px !important;">
                <li class="t m3"><a href="info01.php" class="tl">꿈나무카드</a>
                </li>
                <li class="t m4"><a href="info02.php" class="tl">가맹점안내</a>
                </li>
                <li class="t m5"><a href="info03.php" class="tl">착한가게</a>
                </li>

                <li class="t m6"><a href="info04.php" class="tl">빅리더소개</a>
                </li>
                            
            </ul>
        </div>
    </div>

<div class="snb_nav">
        <div class="snb">
            <div class="dep1">
                <h2>문의하기</h2>
            </div>
                  
            
        </div>
    </div>    
    <!-- //snb_nav -->

    
    <!-- container -->
    <div id="container">

<!-- contents -->
        

        <div id="contents" class="contents">
           
            <h3 class="tit_cnt">문의하기</h3>

			<center><img src="http://cyranoch.cafe24.com/css/2017_01_18_161455.jpg" style="width:1100px;"></center>
<h4  style="padding-left:28px;margin:58px 0 36px;line-height:1;background:url('http://cyranoch.cafe24.com/css/bg_tit1.gif') no-repeat 0 4px;font-size:28px;font-weight:bold;letter-spacing:-2px;color:#333;">문의하기</h4>

<div class="form1" style="text-align:center; ">
<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
	<div class="form" style="width:90%;margin:auto; margin-top:10px;">
    <form style="text-align:left;"
	action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    <ul class="tit_ty4">
				<li>이름</li></ul>
    <input style="border: 1px solid #DADADA;
     color: #888;
     height: 30px;
     margin-right: 6px;
     margin-top: 2px;
     outline: 0 none;
     padding: 3px 3px 3px 5px;
     width: 100%;
     font-size: 12px;
     line-height:15px;
     box-shadow: inset 0px 1px 4px #ECECEC;
     -moz-box-shadow: inset 0px 1px 4px #ECECEC;
     -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
      "  name="name" type="text" value="" size="30"/>
    <ul class="tit_ty4">
				<li>메일주소</li></ul>
    <input style="border: 1px solid #DADADA;
     color: #888;
     height: 30px;
     margin-right: 6px;
     margin-top: 2px;
     outline: 0 none;
     padding: 3px 3px 3px 5px;
     width: 100%;
     font-size: 12px;
     line-height:15px;
     box-shadow: inset 0px 1px 4px #ECECEC;
     -moz-box-shadow: inset 0px 1px 4px #ECECEC;
     -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
      " name="email" type="text" value="" size="30"/><br>
    <ul class="tit_ty4">
				<li>문의내용</li></ul>
    <textarea style="border: 1px solid #DADADA;
     color: #888;
     height: 200px;
     margin-bottom: 40px;
     margin-right: 6px;
     margin-top: 2px;
     outline: 0 none;
     padding: 3px 3px 3px 5px;
     width: 100%;
     font-size: 12px;
     line-height:15px;
     box-shadow: inset 0px 1px 4px #ECECEC;
     -moz-box-shadow: inset 0px 1px 4px #ECECEC;
     -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
      " name="message" rows="7" cols="30"></textarea><br>
    <center><input style="background: #2D66B7;
     border: none;
     padding: 15px 35px 15px 35px;
     color: #FFF;
     box-shadow: 1px 1px 5px #B6B6B6;
     border-radius: 3px;
     text-shadow: 1px 1px 1px #9E3F3F;
     cursor: pointer;
" type="submit" value="전송"/></center>
</form>
	</div>
    <?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
		echo "<p
		font-size:30px;
			color:#4c4c4c;
			font-weight:bold;
			line-height:26px;
		>모든 내용을 작성해 주세요.</p>";
	    }
    else{		
	    $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
		mail("qlqmfql3@naver.com", $subject, $message, $from);
		echo "<p
		font-size:30px;
			color:#4c4c4c;
			font-weight:bold;
			line-height:26px;
		>전송되었습니다.</p>";
	    }
    }  
?>
</div>


        </div>
        <!-- //contents -->
        
	
		
 
        <!-- //contents -->

    </div>
    <!-- //container -->

    <!-- footer -->
        


















    <div id="footer">
        <!-- allmenu -->
         
        <!-- allmenu -->
        <div class="footer_menu">
            <ul>          
                <li><a href="#">이용약관</a></li>
                <li><a href="#"><strong>개인정보처리방침</strong></a></li>
                <li><a href="http://cyranoch.cafe24.com/info06.php">상담센터</a></li>
                <li class="last"><a href="http://cyranoch.cafe24.com/info07.php">문의하기</a></li>                
            </ul>
        </div>
        <div class="footer_in">
			<p class="center_call">
				성북아동청소년센터<strong>02-2241-2451</strong>
			</p>
            <div class="footer_info">
                <address>서울특별시 동대문구 경희대로26 네오르네상스관 B111</address>
                <p>Copyright(c) 2017 bigleader. All Rights Reserved.</p>
            </div>
            
        </div>
    </div>
    

    <!-- //footer -->
</div>
<!-- //wrap -->
</div>

</body>
</html>
