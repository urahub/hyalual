$(document).ready(function(){
	//$("#"+nav_item).css("color","#000");
	$("#"+nav_item).css("background","#b7e");
	
/*	
	$(function() {
		$.post("login_check.php", { }, function(result) {
			loggedIn = result;
			loginStatusSwitch (result);
		});
	});
*/	
/*
	$("#send_email input")
		.each(function(){
			if (this.value) {
				$(this).prev().hide();
			}
		})
		.focus(function(){
			$(this).prev().hide();
		})
		.blur(function(){
			if (!this.value) {
				$(this).prev().show();
			}
		});
		
	$('#email_submit').click(function(e) {
		//e.preventDefault();
		$.post("hyalual.php", { 
			action: "email_submit", 
			email: $('#email_address').val(), 
			content: $('#email_content').val() }, 
			function(result) {
			//alert("result = " + result);
				if(result == 1)
					email_close();
				else
					$('#email_message').html("Email has not been sent");
			}
		);
	});
*/
});

function email_open() {
	//alert("open");
	$('#cover').css("display", "block");
	$('#send_email').css("display", "block");
	$('#send_email').css("opacity", "1");
	$('#send_email').css("z-index", "3");
	//$('#send_email').css("visibility", "visible");
}

function email_close() {
	//alert("close");
	$('#cover').css("display", "none");
	$('#send_email').css("display", "none");
}

function email_send() {
	//alert("submit");
	var errors = "";
	var email = $('#email_address').val();
	if(email.length == 0)
		errors = "Enter your E-Mail please<br/>";
	else if(!email_validation(email)) {
		errors += "Please enter a valid email address<br/>";
		//return;
	}
	if(errors.length > 0) {
		$('#email_errors_div').html(errors);
		return;
	}
	
	//alert("dddddddd");
	$.ajax({
		url: "ajaxFunctions.php?email_send=true",
		dataType: "json",
		type: "POST",
		data: {
			email: $('#email_address').val(),
			content: $('#email_content').val()
		},
		success: function(response) {
			if(response.result == "success") {
				//alert("response +++ = " + response.result);
				$('#email_errors_div').html("Your email has been sent successfully.<br/>Thank you.");
				return;
			} else {
				//alert("response --- = " + response.result);
				$('#email_errors_div').html(response.result);
			}
		},
		error: function(jqXHR, response) {
			//alert("error = " + jqXHR.toString());
			//alert("response = " + response.result);
			$('#email_errors_div').html(jqXHR.toString());
			//alert("error = " + jqXHR.toString());
		}
		
	});
}
function email_validation(email) {
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	return reg.test(email);
}

/*
function cancel_email() {
	$('#cover').css("display", "none");
	$('#nav-top').css("opacity", "1");
	$('#login_form ').css("display", "none");
}
function start_login_alert() {
	$('#cover').css("display", "block");
	$('#nav-top').css("opacity", "0.5");
	$('#login_alert ').css("display", "block");
}
function cancel_login_alert() {
	$('#cover').css("display", "none");
	$('#nav-top').css("opacity", "1");
	$('#login_alert ').css("display", "none");
}
function login_click() {
	if(loggedIn == 0) {
		$('#cover').css("display", "block");
		$('#nav-top').css("opacity", "0.5");
		$('#login_section').css("display", "block");
		//$('#nav-top').css("display", "none");
	}
}
function login_cancel() {
	$('#cover').css("display", "none");
	$('#nav-top').css("opacity", "1");
	$('#login_section').css("display", "none");
	//$('#nav-top').css("display", "block");
}
function ree_chart_open() {
	$('#cover').css("display", "block");
	$('#nav-top').css("opacity", "0.5");
	$('#ree_chart').css("display", "block");
}
function ree_chart_close() {
	$('#cover').css("display", "none");
	$('#nav-top').css("opacity", "1");
	$('#ree_chart').css("display", "none");
}
function ree_login_open() {
	$('#cover').css("display", "block");
	$('#nav-top').css("opacity", "0.5");
	$('#ree_login').css("display", "block");
}
function ree_login_close() {
	$('#cover').css("display", "none");
	$('#nav-top').css("opacity", "1");
	$('#ree_login').css("display", "none");
}

function ree_login_submit() {
	var success_var = false;
	//alert("success 111 = " + success_var);
	$.ajax({
		url: "ajaxResponse.php?ree_login=true",
		dataType: "json",
		type: "POST",
		data: {
			email: $('#ree_eMail').val(),
			pswd: $('#ree_pswd').val()
		},
		async:false,
		success: function(response) {
			if(response.result == "success") {
				//alert("response.email = "+response.email);
				success_var = true;
				$('#msg_ree_login').html("");
				//alert("we closing and opening");
			} else {
				//alert("We are here - not good");
				$('#msg_ree_login').html(response.result);
			}
			return;
		},
		error: function(jqXHR, response) {
			$('#msg_ree_login').html(jqXHR.toString());
			return;
		}
	});
	//alert("success 222 = " + success_var);
	if(success_var) {
		window.open('http://proedgenet.com/Reports/Reports.php?id=REE&type=REE&orig=pew');
		ree_login_close();
	}
}

function change_top_menu_background(menuItem) {
	switch(menuItem)
	{
	case "global":
		$('#top_menu_global').css("background-color", "#fff");
		break;
	case "leader":
		$('#top_menu_leader').css("background-color", "#fff");
		break;
	case "sharia":
		$('#top_menu_sharia').css("background-color", "#fff");
		break;
	default:
		$('#top_menu_home').css("background-color", "#fff");
	}	
}

function loginStatusSwitch (result) {
	$('#login_wrong').html("");
	$('#username').val("");
	$('#password').val("");
	if(result == 1) {
		$('.nav-top-drop-li-rules').css("color", "black");
		$('.nav-left-li-another a').css("color", "#284c82");
		//$('#login_top').css("color", "#888");
		$('#login_top').css("opacity", ".3");
		$('#login_top').css("cursor", "auto");
		$('#logout_top').css("color", "#eee");
		$('#logout_top').css("cursor", "pointer");
		$('#logout_bottom').css("color", "#999");
		$('#logout_bottom').css("cursor", "pointer");
		
		$('#username').attr("disabled", true);
		$('#password').attr("disabled", true);
		$('#login_cover').css("display", "block");

	} else {
		$('.nav-top-drop-li-rules').css("color", "#666");
		$('.nav-left-li-another a').css("color", "#777");
		//$('#login_top').css("color", "#eee");
		$('#login_top').css("display", "block");
		$('#login_top').css("cursor", "pointer");
		$('#logout_top').css("color", "#888");
		$('#logout_top').css("cursor", "auto");
		$('#logout_bottom').css("color", "#ccc");
		$('#logout_bottom').css("cursor", "auto");
		
		$('#login_cover').css("display", "none");
		$('#username').removeAttr("disabled");
		$('#password').removeAttr("disabled");
	}
}

function goToByScroll(id){
	//alert("ahooooo");
	//$('#section-center').animate({scrollTop: $("#"+id).offset().top},'slow');
	$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}

function scrollDown(level) {
	var divOffset = $('#section-center').offset().top;
    var pOffset = $('#section-center div:eq(' + level + ')').offset().top;
    var pScroll = pOffset - divOffset;
	$('.scrollPane').data('jsp').scrollByY(pScroll);
	//$('.scrollPane').data('jsp').scrollToY(level);
	return false;
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function getChartByPriod(period) {
	var graphWidth = '600';
	var graphHeight = '400';
	
	if(period > 25) {
		$('#ree_chart').css('left', '0px');
		$('#ree_chart').css('top', '20px');
		graphWidth = '980';
		graphHeight = '500';
	} else {
		$('#ree_chart').css('left', '198px');
		$('#ree_chart').css('top', '70px');
	}
	
	$('#player').html(
		'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+graphWidth+'" height="'+graphHeight+'" >' +
			'<param name="movie" value="FCF_Line.swf" />' +
			'<param name="FlashVars" value="&dataURL=getData.php?prm='+period+'&chartWidth='+graphWidth+'&chartHeight='+graphHeight+'">' +
			'<param name="quality" value="high" />' +
			'<embed src="FCF_Line.swf" width="'+graphWidth+'" height="'+graphHeight+'" flashVars="&dataURL=getData.php?prm='+period+'&chartWidth='+graphWidth+'&chartHeight='+graphHeight+'" quality="high" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />' +
		'</object>');

	var period_name = "";
	switch(period) {
		case 5:
			period_name = "Last Week";
			break;
		case 25:
			period_name = "Last Month";
			break;
		case 70:
			period_name = "Last 3 Months";
			break;
		case 140:
			period_name = "Last 6 Months";
			break;
		case 210:
			period_name = "Last 9 Months";
			break;
		case 280:
			period_name = "Last Year";
			break;
	}
	$('#period_name').html(period_name);
}

function ree_chart_get(id) {
	var img_path = "http://proedgenet.com/public/ree-chart-";
	if(id.substring(0,2) == "20")
		img_path = "http://proedgenet.com/public/";
	$('#ree_chart_img').attr('src', img_path + id + ".png");
	$('#ree_chart_img').load( function() {
		var width = $('#ree_chart_img').css("width");
		$('#ree_chart').css('width', width);
		$('#ree_chart').css('left', (($('#container').css("width").slice(0,-2) - width.slice(0,-2) - 25)/2));
    });
	if(id.substring(0,2) == "20") {
		$('#'+id.substring(0,4)+"_charts").css("display", "none");
	}
	$('.ree-chart-link').css('display', 'block')
	if(id == "big") {
		$('#ree_chart_link_big').css("display", "none");
	}
	//$('.ree-chart-link').css('display', 'block')
	//$('#ree_chart_link_'+id).css('display', 'none');
	//alert($('#page').css("width").slice(0,-2) - $('#ree_chart_img_'+id).css('width').slice(0,-2));
}

/*
function SendEmail() {
var body = escape(document.textfieldName.value +"\n"+document.textfieldEmail.value +"\n"+document.textfieldMessage.value);
var sTo="yuriy@pro-edge.com";
var subject = "REE Stocks login request";
window.location.href = "mailto:"+sTo+"?subject="+subject+"&body="+body;
}

$myFile = "testFile.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "Bobby Bopper\n";
fwrite($fh, $stringData);
$stringData = "Tracy Tanner\n";
fwrite($fh, $stringData);
fclose($fh);
*/
