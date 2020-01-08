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

    function report_pdf(name_report, param) {

      Swal.fire({
        title: 'กรุณาระบุวันที่ออกรีพอร์ต',
        type: 'question',
        html: '<div class="row pt-2">'+
          '<div class="col-md-6 pb-2">'+
            '<div class="form-row">'+
              '<label>วันเริ่มต้น : </label>'+
              '<input id="start_date" class="form-control" placeholder="Start Date" autofocus>'+
            '</div>'+
          '</div>'+
          '<div class="col-md-6 pb-2">'+
            '<div class="form-row">'+
              '<label>วันที่สิ้นสุด : </label>'+
              '<input id="end_date" class="form-control" placeholder="End Date" autofocus>'+
            '</div>'+
          '</div>'+
        '</div>',
        customClass: 'warning',
        onOpen:function(){
          $('#start_date').datepicker({
            format: "yyyy-mm-dd",
            language: "th",
            autoclose: true
          });
          $('#end_date').datepicker({
            format: "yyyy-mm-dd",
            language: "th",
            autoclose: true
          });
        }
        }).then(function(result) {
        if (typeof result.dismiss === "undefined") {
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          var url_report = base_url+'api/report_pdf/report_all/'+start_date+'/'+end_date+'?report='+name_report;

          if (param) {
            $.each(param, function(i, v){
              url_report += '&'+i+'='+v;
            })
          }
          window.location.assign(url_report);
          console.log(url_report);
        }
      });
    }

</script>

</body>
</html>