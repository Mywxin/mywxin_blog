
$(document).ready(function(e) {
	$("html,#about_content").niceScroll({ autohidemode: false });
	$("a.signUp").click(function(e){
		e.preventDefault();
		//alert();
		$(this).parent("p").parent("div.login").hide(500, false, function(){
			$(this).next("div.signup").show(500);
		});
		
	});
	$("input.logIn").click(function(e){
		e.preventDefault();
		//alert();
		$(this).parent("form").parent("div.signup").hide(500, false, function(){
			$(this).prev("div.login").show(500);
		});
		
	});

	$('.menu > li').click(function(){
		$('.menu > li').not(this).removeClass('active');
		$(this).addClass('active');
	});

	$("ul.menu").children("li").children("a").click(function(){
		$(this).next("ul").stop().slideToggle(300);
	});
	$("a#addCntnt").click(function(){
		$(".content").stop().fadeOut(300);
		$("#aContent").stop().slideDown(300);
	});
	$("a#vCont").click(function(){
		$(".content").stop().fadeOut(300);
		$("#viewContent").stop().slideDown(300);
	});
	$("a#addMenu").click(function(){
		$(".content").stop().fadeOut(300);
		$("#aMenu").stop().slideDown(300);
	});
	$("a#vMenu").click(function(){
		$(".content").stop().fadeOut(300);
		$("#viewMenus").stop().slideDown(300);
	});
	$("span.fa-close").click(function(){
		$(this).parent("h4").parent("div").stop().slideUp(300);
	});
	$('#button-send').click(function(event){
		$('#button-send').html('Sending E-Mail...');
		event.preventDefault();		
		$.ajax({
			type: 'POST',
			url: 'send_form_email.php',
			data: $('#contact_form').serialize(),
			success: function(html) {
				if(html.success == '1')
				{
					$('#button-send').html('Send');
					$('#success').show();
				}
				else
				{
					$('#button-send').html('Send');
					$('#error').show();
				}					
			},
			error: function(){
				$('#button-send').html('Send');
				$('#error').show();
			}
		});
		
	});
});


function valemail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}