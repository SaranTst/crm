<!-- JS topbar & sidebar -->
<script src="<?php echo base_url(); ?>assets/js/util.js"></script>
<script src="<?php echo base_url(); ?>assets/js/menu-aim.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!-- JS Rating -->
<script src="<?php echo base_url(); ?>assets/js/rater.min.js"></script>

<!-- Sweetalert2 -->
<script src="<?php echo base_url(); ?>assets/sweetalert2/sweetalert2.min.js"></script>

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

    function upload_and_preview_ajax(idinputfile, idshowfilename, idpreview) {

      $("#"+idinputfile).trigger("click");
      $("#"+idinputfile).one( "change", function(e) {
        var url = base_url+'api/uploads/from';
        var fdataimg = new FormData();    
        fdataimg.append( 'file', e.target.files[0] );
        $.ajax({
          url: url,
          type:"POST",
          data: fdataimg,
          processData: false,
          contentType: false,
          dataType:"json",
          success: function( resp ){

            if (resp.status==1) {
              $("#"+idpreview).attr('src', base_url+resp.path);
              $("#"+idshowfilename).val(resp.path);
            }else{
              Swal.fire({
                title: 'Warning!',
                text: resp.message.error,
                type: 'warning'
              })
            }
          },
          error: function( jqXhr, textStatus, errorThrown ){
            Swal.fire({
              title: jqXhr.status,
              text: errorThrown,
              type: 'error'
            })
          }
        });
      });
    }

</script>

</body>
</html>