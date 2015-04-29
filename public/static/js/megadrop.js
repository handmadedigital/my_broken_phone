$(function(){
	hoverMenu();
	adjustWidth();
});

function hoverMenu()
{
	$('.tgl-megadrop .has-submenu').hover(function(){
		$(this).find('.submenu-wrapper').stop().fadeIn("slow");
	}, function(){
		$(this).find('.submenu-wrapper').stop().fadeOut("fast");
	});
}

function adjustWidth()
{
	setWidth();
	$(window).resize(function(){
		setWidth();
	});
}

function setWidth()
{
	var mega_submenu = $('.tgl-megadrop .has-submenu .submenu-wrapper');
	var menu_width = $('.tgl-megadrop').width();
	var left_margin = $('.tgl-megadrop').offset().left;

	if(mega_submenu.hasClass('mega-full-width'))
	{
		mega_submenu.css({
			"left": left_margin + "px",
			"max-width": menu_width + "px"
		});
	}
	else
	{
		mega_submenu.css({
			"max-width": menu_width + "px"
		});
	}
}
