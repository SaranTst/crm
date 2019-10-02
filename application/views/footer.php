<!-- JS topbar & sidebar -->
<script src="<?php echo base_url(); ?>assets/js/util.js"></script>
<script src="<?php echo base_url(); ?>assets/js/menu-aim.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script type="text/javascript">

	// sidebar menu 
	$('ul.cd-side__list li').click(function(e) { 
		
		var img = $('li.cd-side__item--selected').find("img").attr("src");
    	var img_white = img.replace(".png", "-White.png");
    	$('li.cd-side__item--selected').find("img").attr("src",img_white);
    	$('li.cd-side__item--selected').removeClass('cd-side__item--selected');

    	$(this).addClass("cd-side__item--selected");
    	var img = $('li.cd-side__item--selected').find("img").attr("src");
    	var img_white = img.replace("-White", "");
    	$('li.cd-side__item--selected').find("img").attr("src",img_white);

    });
</script>

</body>
</html>