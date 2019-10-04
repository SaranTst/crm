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

<!--   <script type="text/javascript">
  $(document).on("click", "#uploadf", function() {
    var file = $(this).parents().find("#ipfile");
    file.trigger("click");
  });
  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#name_file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  });
  </script> -->

</body>
</html>