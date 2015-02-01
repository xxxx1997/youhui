<div class="w990 clear">
        <div id="main">
            <div class="main_l">
                <div id="main_l_l" class="clear">
                    <h2 class="login_t">会员注册</h2>
                    <ul class="clear">
                    <form action="?r=registered/regist" method="post" id="reg_form" name="reg_form">
                    <table width="100%" border="0" class="login_form">
  <tr>
    <td width="100" align="right">帐号：</td>
    <td><input name="nick" id="nick" type="text" style="width:200px;" onblur="check_nick_valid();" /><label class="error2" id="tip_nick"></label></td>
  </tr>
  <tr>
    <td width="100" align="right">E-mail：</td>
    <td><input name="email" id="email" type="text" style="width:200px;" /></td>
  </tr>
  <tr>
    <td align="right">密码：</td>
    <td><input name="pw" id="pw" type="password" style="width:200px;" onblur="check_nick_valid();" /></td>
  </tr>
  <tr>
    <td align="right">确认密码：</td>
    <td><input id="confirm_pw" type="password" style="width:200px;" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input name="agree" id="agree" type="checkbox" value="1" />&nbsp;<a href="/end/tp-coupon/Html/policy.html" target="_blank" id="label_agree">同意注册协议</a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" value="注册" id="signup-submit" class="formbutton"></td>
  </tr>
</table>
</form>
				</ul>
                </div>
            </div>
            <div class="main_r" style="width: 320px;">
    <ul class="sidebar">
            

        <li class="yellow">
            <h3>已有TP-COUPON帐号？</h3>
            <div class="sidebar_s clear">
                <ul class="twocol user_link">
                    <li><a class="login_btn" href="/end/tp-coupon/index.php?a=login&m=user"></a></li>
                </ul>
            </div>
        </li>
   
             </ul>
</div>
        </div>
    </div>
<script type="text/javascript">
var g = 'Home';
var m = 'User';
var a = 'reg';
var reg_url = "/end/tp-coupon/index.php?a=reg&m=user";
var u_index_url = "/end/tp-coupon/index.php?a=index&m=user";
var dosubmit = false;
function check_nick_valid()
{
	var nick = $('#nick').val();
	if(nick == ''){
		$('#tip_nick').text('');
		return false;
	}
	var url = "index.php?g="+g+"&m="+m+"&ajax=1&a=check_nick_valid&nick="+encodeURIComponent(nick);
		$.getJSON(url, function(data){
									if(data.status == 0){
										$('#tip_nick').html('该帐号已存在');
										dosubmit = false;
									}else{
										$('#tip_nick').html('<font color="green">该帐号可以使用</font>');
										dosubmit = true;
									}
									});
}
function reg()
{
	if(! dosubmit) return false;
	$.ajax({
		url: reg_url,
		type:"POST",
		cache: false,
		data:$("#reg_form").serialize(),
		dataType:"json",
		error: function(){
			
		},
		success: function(result){
			if(result.status==1){
				$.fn.jmodal({
                    data: {},
                    title: '温馨提示',
                    content: '注册成功<br>现在您可以会员身份登陆',
                    buttonText: { ok: '确定', cancel: '' },
                    fixed: false,
					marginTop: 200,
					okEvent: function(data, args) {
                        window.location.href = u_index_url;
                    }
                });
			}else{
				$.fn.jmodal({
                    data: {},
                    title: '温馨提示',
                    content: result.info,
                    buttonText: { ok: '确定', cancel: '' },
                    fixed: false,
					marginTop: 200,
					okEvent: function(data, args) {
                        args.hide();
                    }
                });
			}
		}
	});
}
$(document).ready(function() {
			$("#reg_form").validate({
						 errorPlacement:function(error,element) {
     												if (element.attr("name") == "agree"){
       													error.insertAfter("#label_agree");
													}else{
														error.insertAfter(element);
													}},
						 submitHandler:function(form){
							 						reg();
													return false;
						 						}
						 });
			$('#nick').rules('add', {
						 		required: true,
								rangelength: [2,20]
						});
			$('#email').rules('add', {
						 		required: true,
								email: true
						});
			$('#pw').rules('add', {
						 		required: true,
								rangelength: [6,15]
						});
			$('#confirm_pw').rules('add', {
						 		required: true,
								equalTo: '#pw',
								rangelength: [6,15]
						});
			$('#agree').rules('add', {
						 		required: true
						});
});
</script>