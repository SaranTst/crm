
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row" id="header-table">
        <div class="col-md-4 pt-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp; GENERAL DETAIL</a>
        </div>

        <?php
        // Cehack Datas
        if (isset($datas) && !empty($datas)) {
          if ($datas['status']==1) {
            $data = $datas['data'][0];
          }else{
            $data = array();
          }
        }else{
          $data = array();
        } ?>
        <div class="col-md-4"></div>
        <div class="col-md-4 pt-2">
          <div class="form-group row">
            <label class="col-md-4 col-form-label">Expertise</label>
            <div class="col">
              <select class="custom-select" name="customer_expertise" id="customer_expertise">
                <option value="" selected disabled hidden>Choose Expertise</option>
                <?php foreach (ARR_EXPERTISE as $key => $value) { ?>
                <option value="<?php echo $key; ?>" <?php echo $datas['data'][0]['CUSTOMERS_EXPERTISE']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div> <!-- #header-table -->

      <ul class="nav nav-pills nav-fill flex-column flex-sm-row">
        <li class="nav-item m-1">
          <a class="nav-link active" id="SALES-tab" data-toggle="tab" href="#SALES" role="tab" aria-controls="SALES" aria-selected="true">SALES DETAIL</a>
        </li>
        <li class="nav-item m-1">
          <a class="nav-link" id="SERVICE-tab" data-toggle="tab" href="#SERVICE" role="tab" aria-controls="SERVICE" aria-selected="false">SERVICE DETAIL</a>
        </li>
        <li class="nav-item m-1">
          <a class="nav-link" id="PRODUCT-tab" data-toggle="tab" href="#PRODUCT" role="tab" aria-controls="PRODUCT" aria-selected="false">PRODUCT DETAIL</a>
        </li>
        <li class="nav-item m-1">
          <a class="nav-link" id="PERSONNEL-tab" data-toggle="tab" href="#PERSONNEL" role="tab" aria-controls="PERSONNEL" aria-selected="false">PERSONNEL DETAIL</a>
        </li>
      </ul> <!-- .nav nav-pills nav-fill flex-column flex-sm-row -->

      <div class="tab-content">
        <div class="tab-pane fade show active" id="SALES" role="tabpanel" aria-labelledby="SALES-tab">
          <?php include_once("sales_detail.php"); ?>
        </div> <!-- SALES-tab -->

        <div class="tab-pane fade" id="SERVICE" role="tabpanel" aria-labelledby="SERVICE-tab">
          <?php include_once("service_detail.php"); ?>
        </div> <!-- SERVICE-tab -->

        <div class="tab-pane fade" id="PRODUCT" role="tabpanel" aria-labelledby="PRODUCT-tab">
          <?php include_once("product_detail.php"); ?>
        </div> <!-- PRODUCT-tab -->

        <div class="tab-pane fade" id="PERSONNEL" role="tabpanel" aria-labelledby="PERSONNEL-tab">
          <?php include_once("personnel_detail.php"); ?>
        </div> <!-- PERSONNEL-tab -->
        
      </div> <!-- .tab-content -->

  <script type="text/javascript">

    var id_customer = '<?php echo sizeof($data)>0 ? $id : ''; ?>';

    $(document).ready(function(){ 

      var show_tab_status = false;
      $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {

        if (show_tab_status) {
          show_tab_status = false;
          return false;
        }

        // Modal Process
        Swal.fire({
          title: 'แก้ไขข้อมูล',
          html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่ !!! <b></b>',
          allowOutsideClick: false,
          showConfirmButton: false,
          onBeforeOpen: () => {
            Swal.showLoading()
          },
        })

        var before_current_tab_id = e.relatedTarget.id;
        var formDataMoreCustomer = {};
        var formDataArrMoreCustomer = [];
        var id_content_tab = e.relatedTarget.hash.replace('#','');
        formDataArrMoreCustomer = $("#"+id_content_tab+" form").serializeArray();
        for (var i = 0; i < formDataArrMoreCustomer.length; i++){
          if (formDataArrMoreCustomer[i]['value']) {
            formDataMoreCustomer[formDataArrMoreCustomer[i]['name']] = formDataArrMoreCustomer[i]['value'];
          }
        }
        formDataMoreCustomer['user_create'] = ID_LOGIN;

        var url_more_create_customer = '';
        var url_lists_more_create_customer = '';
        var loweridtab = id_content_tab.toLowerCase();
        url_more_create_customer = base_url+'api/customers_'+loweridtab+'/update_customers_'+loweridtab+'/'+id_customer;
        url_lists_more_create_customer = base_url+'api/customers_'+loweridtab+'/lists_customers_'+loweridtab+'/'+id_customer;

        setTimeout(function(){
          $.ajax({
            url: url_more_create_customer,
            type:"POST",
            data: formDataMoreCustomer,
            dataType:"json",
            success: function( resp ){

              if (resp.status==1) {
                Swal.fire({
                  title: 'Success!',
                  text: 'บันทึก / แก้ไข ข้อมูลเรียบร้อย',
                  type: 'success'
                }).then((result) => {

                  // each insert value in input[id_colum] when insert new data
                  if (id_content_tab=='PRODUCT') {
                    set_delete_product(resp.message, loweridtab);
                  }else{
                    if (Array.isArray(resp.message) && resp.message.length>0) {
                      $.each( resp.message, function( key, value ) {
                        // change value of image TAB PERSONNEL
                        if (id_content_tab=='PERSONNEL') {
                            if (value.id_colum!=0) {
                              $('input[name="'+loweridtab+'_detail['+value.k_id_colum+'][id_colum]"]').val(value.id_colum);
                              $('#dom-'+loweridtab+'-'+(value.k_id_colum+1)).find('.fa.fa-times').attr('onclick', "ajax_delete_"+loweridtab+"("+value.id_colum+","+(value.k_id_colum+1)+")");
                            }

                            if (value.upload!='แก้ไขข้อมูลสำเร็จ') {
                              $('input[name="'+loweridtab+'_detail['+value.k_id_colum+'][img_personnel]"]').val(value.upload);
                              $('input[name="'+loweridtab+'_detail['+value.k_id_colum+'][old_img_personnel]"]').val(value.upload);
                            }

                        }else{
                          $('input[name="'+loweridtab+'_detail['+value.k_id_colum+'][id_colum]"]').val(value.id_colum);
                          $('#dom-'+loweridtab+'-'+(value.k_id_colum+1)).find('.fa.fa-times').attr('onclick', "ajax_delete_"+loweridtab+"("+value.id_colum+","+(value.k_id_colum+1)+")");
                        }

                      });
                    }
                  }
                  
                })
              }else{

                if (id_content_tab=='PRODUCT') {

                  var msg_error_pro = '';

                  if (!Array.isArray(resp.message.bjc_product)) {
                    msg_error_pro = resp.message.bjc_product;
                  }
                  if (!Array.isArray(resp.message.other_product)) {
                    msg_error_pro = resp.message.other_product;
                  }

                  set_delete_product(resp.message, loweridtab);
                  Swal.fire({
                    title: 'Warning!',
                    text: msg_error_pro,
                    type: 'warning'
                  }).then((result) => {
                    show_tab_status = true;
                    $("#"+before_current_tab_id).tab('show');
                  })
                  return false;

                }else{

                  Swal.fire({
                    title: 'Warning!',
                    text: resp.message,
                    type: 'warning'
                  }).then((result) => {
                    show_tab_status = true;
                    $("#"+before_current_tab_id).tab('show');
                  })
                }
              }
            },
            error: function( jqXhr, textStatus, errorThrown ){
              Swal.fire({
                title: jqXhr.status,
                text: errorThrown,
                type: 'error'
              }).then((result) => {
                // window.location.reload();
                show_tab_status = true;
                $("#"+before_current_tab_id).tab('show');
              })
            }
          });
        }, 2000);

      })

      var previous = '';
      $('#customer_expertise').on('focus', function () {
        previous = this.value;
      }).change(function() {
        Swal.fire({
          title: 'Are you sure?',
          text: "คุณต้องการแก้ไขข้อมูลนี้ใช่หรือไม่",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then((result) => {
          if (typeof result.dismiss === "undefined") {

            var url_update_expertise = base_url+'api/customers/updates_expertise_customer/'+id_customer;
            var formDataAjax_update_expertise = {};
            formDataAjax_update_expertise['user_create'] = ID_LOGIN;
            formDataAjax_update_expertise['customer_expertise'] = this.value;

            if (formDataAjax_update_expertise) {
              $.ajax({
                url: url_update_expertise,
                type:"POST",
                data: formDataAjax_update_expertise,
                dataType:"json",
                success: function( resp ){
                  
                  if (resp.status==1) {
                    Swal.fire({
                      type: 'success',
                      title: resp.message,
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    })
                  }else{
                    Swal.fire({
                      title: 'Warning!',
                      text: resp.message,
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
            }

          }else{
            $('#customer_expertise').val(previous);
          }
        })

      });

    });

    function set_delete_product(arr, loweridtab) {

      // BJC Product
      if (Array.isArray(arr.bjc_product) && arr.bjc_product.length>0) {
        $.each( arr.bjc_product, function( key, value ) {
          $('input[name="bjc_product_detail['+value.k_id_colum+'][id_colum]"]').val(value.id_colum);
          $('#dom-bjc-product-'+(value.k_id_colum+1)).find('.fa.fa-times').attr('onclick', "ajax_delete_"+loweridtab+"("+value.id_colum+","+(value.k_id_colum+1)+",'bjc')");
        });
      }

      // Other Product
      if (Array.isArray(arr.other_product) && arr.other_product.length>0) {
        $.each( arr.other_product, function( key, value ) {
          $('input[name="other_product_detail['+value.k_id_colum+'][id_colum]"]').val(value.id_colum);
          $('#dom-other-product-'+(value.k_id_colum+1)).find('.fa.fa-times').attr('onclick', "ajax_delete_"+loweridtab+"("+value.id_colum+","+(value.k_id_colum+1)+",'other')");
        });
      }
    }

    </script>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
