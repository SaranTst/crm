
    <div class="cd-content-wrapper">
    <div class="container-fluid">

   	<div class="row mb-3" id="header-table">
			<div class="col-md-4 pt-2">
			  <a href="javascript:void(0)" class="btn crm-btn-light-green-add-sales btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp; Add Sales</a>
			</div>
			<div class="col-md-8"></div>
		</div> <!-- #header-table -->

		<div class="row mb-3">
        <div class="col-md-4">
          <ul class="nav nav-pills nav-pills-add-sales nav-fill flex-column flex-sm-row">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-8"></div>
    </div>

    <div class="tab-content">
      <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
        
        <form id="add-sales">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-add-sales" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Upload Image" name="image" id="show-file-name-add-sales" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-add-sales" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-add-sales" onclick="upload_and_preview_ajax('input-file-add-sales' ,'show-file-name-add-sales' ,'preview-add-sales')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Prefix</label>
                        <select class="custom-select" name="prefix">
                          <option value="" selected disabled hidden>Choose Prefix</option>
                          <?php foreach (ARR_PREFIX as $key => $value) { 
                            if ($value) { ?>
                          <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                          <?php } 
                            } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" placeholder="ID" name="id_sale">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Thai)" name="name_surname_th">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Eng)" name="name_surname_eng">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Thai)" name="nickname_th">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Eng)" name="nickname_eng">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="e_mail">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel.</label>
                    <input type="text" class="form-control" placeholder="Tel." name="telephone">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="birthday" id="date-birthday">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Position</label>
                    <select class="custom-select" name="position">
                      <option value="" selected>Choose Position</option>
                      <option value="1">Position 1</option>
                      <option value="2">Position 2</option>
                      <option value="3">Position 3</option>
                      <option value="4">Position 4</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Department</label>
                    <select class="custom-select" name="department">
                      <option value="" selected>Choose Department</option>
                      <option value="1">Department 1</option>
                      <option value="2">Department 2</option>
                      <option value="3">Department 3</option>
                      <option value="4">Department 4</option>
                      <option value="5">Department 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Zone</label>
                    <select class="custom-select" name="zone">
                      <option value="" selected>Choose Zone</option>
                      <option value="1">Zone 1</option>
                      <option value="2">Zone 2</option>
                      <option value="3">Zone 3</option>
                      <option value="4">Zone 4</option>
                      <option value="5">Zone 5</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
              	<div class="col-md-6">
                  <div class="form-group">
                    <label>County</label>
                    <input type="text" class="form-control" placeholder="County" name="county">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Brand</label>
                    <select class="custom-select" name="brand">
                      <option value="" selected>Choose Brand</option>
                      <option value="1">Brand 1</option>
                      <option value="2">Brand 2</option>
                      <option value="3">Brand 3</option>
                      <option value="4">Brand 4</option>
                      <option value="5">Brand 5</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 mb-2 text-center">
                  <input type="hidden" class="form-control" name="user_create" value="<?php echo $this->session->userdata("sale")['ID_SALE']; ?>">
                  <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="insert-sales"><p>SAVE</p></a>
                </div>
                <div class="col-md-4"></div>
              </div>

            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->
        </form>

      </div>
    </div> <!-- .tab-content -->


    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

  <script type="text/javascript">

    $('#date-birthday').datepicker({
      format: "dd-mm-yyyy",
      language: "th",
      autoclose: true
    })

    $('#insert-sales').click(function(e) {
      var url = base_url+'api/sales/update_sales';
      var data = $("form#add-sales").serialize();
      console.log(data);

      $.ajax({
        url: url,
        type:"POST",
        data: data,
        dataType:"json",
        success: function( resp ){
          // if (resp.status==1) {
          //   window.location.href = base_url+"dashboard";
          // }else{
          //   $('#msg-error').text(resp.message);
          //   $('#alert_modal').modal('show');
          //   $('form#frm_login')[0].reset();
          // }
          console.log(resp);
        },
        error: function( jqXhr, textStatus, errorThrown ){
          $('#icon-error').css('display', 'none');
          $('#status-error').text( jqXhr.status ).css('display', 'block');
          $('#msg-error').text( errorThrown );
          $('#alert_modal').modal('show');
        }
      });

    });

    // function login() {

    //   var url = base_url+'api/sales/login';
    //   var data = $( "form#frm_login" ).serialize();

    //   var id_sale = $("input[name^=id_sale]");
    //   var password = $("input[name^=password]");

    //   if (! id_sale.val()) {
    //       id_sale.addClass("border border-danger").siblings("p.text-danger").css("display","block");
    //   }else if (! password.val()){
    //       password.addClass("border border-danger").siblings("p.text-danger").css("display","block");
    //   }else{

    //     $.ajax({
    //       url: url,
    //       type:"POST",
    //       data: data,
    //       dataType:"json",
    //       success: function( resp ){
    //         if (resp.status==1) {
    //           window.location.href = base_url+"dashboard";
    //         }else{
    //           $('#msg-error').text(resp.message);
    //           $('#alert_modal').modal('show');
    //           $('form#frm_login')[0].reset();
    //         }
    //       },
    //       error: function( jqXhr, textStatus, errorThrown ){
    //         $('#status-error').append( "<h5 class='text-danger'>"+ jqXhr.status +"</h5>" ).children("span").remove();
    //         $('#msg-error').text( errorThrown );
    //         $('#alert_modal').modal('show');
    //       }
    //     });
    //   }
    // }

    $("input", $("form#frm_login")).on("keyup", function(){
      $(this).removeClass("border border-danger").siblings("p.text-danger").css("display","none");
    })

  </script>