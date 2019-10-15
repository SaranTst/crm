<!-- JS topbar & sidebar -->
<script src="<?php echo base_url(); ?>assets/js/util.js"></script>
<script src="<?php echo base_url(); ?>assets/js/menu-aim.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!-- JS Rating -->
<script src="<?php echo base_url(); ?>assets/js/rater.min.js"></script>

<script type="text/javascript">

    // rating
    var options_rating = {
      max_value: 5,
      step_size: 1,
      initial_value: 0
    }
    $(".rating").rate(options_rating);

    // mouseover #profile_header
    $("#profile_header").mouseover(function() {
      $(this).find("i.fa").addClass("fa-caret-up").removeClass("fa-caret-down");
    })
    .mouseout(function() {
      $(this).find("i.fa").addClass("fa-caret-down").removeClass("fa-caret-up");
    });

    function upload_and_preview(idinputfile, idshowfilename, idpreview) {
    
      $("#"+idinputfile).trigger("click");
      $("#"+idinputfile).change(function(e) {
        var fileName = e.target.files[0].name;
        $("#"+idshowfilename).val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById(idpreview).src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
      });
    }

</script>

</body>
</html>