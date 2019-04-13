$(document).ready(function()
{
	$('.accordion-isi').hide();
	$('.accordion').click(function()
	{
		if($(this).next().is(':hidden'))
		{
			$('.accordion:first').addClass('active').next().slideDown(300);
			$('.accordion').removeClass('active').next.slideUp(300);
			$(this).addClass('active').next().slideDown(300);
		}
	});
});

