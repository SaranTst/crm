
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row" id="header-table">
        <div class="col-md-4 pt-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp; GENERAL DETAIL</a>
        </div>

        <?php
        $j_status = 1;
        $j_message = '';

        // Cehack Datas
        if (isset($datas) && !empty($datas)) {
          if ($datas['status']==1) {
            $data = $datas['data'][0];
          }else{
            $j_status = $datas['status'];
            $j_message = $datas['message'];
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
                <option value="<?php echo $key; ?>" <?php echo $data['EXPERTISE']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
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
    var j_status = <?php echo $j_status; ?>;
    var j_message = '<?php echo $j_message; ?>';

    $(document).ready(function(){ 

      // // if data null show modal alert
      // if (j_status==0) {
      //   Swal.fire({
      //     title: 'Warning!',
      //     text: j_message,
      //     type: 'warning'
      //   }).then((result) => {
      //     window.location.href = base_url+'customer';
      //   })
      // }

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

        // console.log(e);
        // var before_current_tab_id = e.relatedTarget.id;
        // var before_current_tab = e.relatedTarget.innerText.replace(' ','-').toLowerCase();
        // var current_tab = e.target.innerText.replace(' ','-').toLowerCase();

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
        console.log(formDataMoreCustomer);
        // Swal.close();
        // return false;

        var url_more_create_customer = '';
        if (id_content_tab=='SALES') {
          url_more_create_customer = base_url+'api/customers_sales/update_customers_sales/'+id_customer;
        }
        if (id_content_tab=='SERVICE') {
          url_more_create_customer = base_url+'api/customers_service/update_customers_service/'+id_customer;
        }
        if (id_content_tab=='PRODUCT') {
          url_more_create_customer = base_url+'api/customers_product/update_customers_product_detail/'+id_customer;

          // check update bjc product and other product
//           var url_product_detail = base_url+'api/customers_product/gets_customers_bjc_product/'+id_customer;
//           $.ajax({
//             url: url_product_detail,
//             type:"GET",
//             dataType:"json",
//             success: function( resp ){

//               if (resp.status==1) {
//                 $.each(resp.data, function(i, v){
//                   $.each(formDataMoreCustomer, function(iarr, varr){
//                     console.log(iarr+'=>'+varr)
//                     console.log(i+'=>'+v.ID)
                   
//                   })
//                 })
//               }else{
//                 Swal.fire({
//                   title: 'Warning!',
//                   text: resp.message,
//                   type: 'warning'
//                 })
//               }
//             },
//             error: function( jqXhr, textStatus, errorThrown ){
//               Swal.fire({
//                 title: jqXhr.status,
//                 text: errorThrown,
//                 type: 'error'
//               })
//             }
//           });

// return false;

        }

        setTimeout(function(){
          if (id_content_tab!='PERSONNEL') {
            $.ajax({
              url: url_more_create_customer,
              type:"POST",
              data: formDataMoreCustomer,
              dataType:"json",
              success: function( resp ){
                console.log(resp);
                if (resp.status==1) {
                  Swal.fire({
                    title: 'Success!',
                    text: resp.message,
                    type: 'success'
                  }).then((result) => {
                  })
                }else{
                  Swal.fire({
                    title: 'Warning!',
                    text: resp.message,
                    type: 'warning'
                  }).then((result) => {
                    show_tab_status = true;
                    $("#"+before_current_tab_id).tab('show')
                    // window.location.reload();
                  })
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
                  $("#"+before_current_tab_id).tab('show')
                })
              }
            });
          }else{
            console.log('last tab !!!');
          }
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
                  console.log(resp);
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


      $('#save-customer').click(function(e) {
        var url = base_url+'api/customers/updates_more_customer/'+id_customer;
        var formDataAjax = {};
        formDataAjax = checkForm_customer();
        formDataAjax['user_create'] = ID_LOGIN;
        console.log(formDataAjax);
        // return false;

        if (formDataAjax) {
          $.ajax({
            url: url,
            type:"POST",
            data: formDataAjax,
            dataType:"json",
            success: function( resp ){
              console.log(resp);
              if (resp.status==1) {
                Swal.fire({
                  title: 'Success!',
                  text: resp.message,
                  type: 'success'
                }).then((result) => {
                  window.location.href = base_url+'customer';
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
      });

    });


// เช็คข้อมูลก่อนส่งไปอัพเดท DB 

    function checkForm_customer() {
      
      var formDataArrSales = $("form#sales-detail").serializeArray();
      var formDataArrService = $("form#service-detail").serializeArray();
      var formDataArrBjcProduct = $("form#bjc-product-detail").serializeArray();
      var formDataArrOtherProduct = $("form#other-product-detail").serializeArray();
      var formDataArrPersonnel = $("form#personnel-detail").serializeArray();
      var formData = {};

      for (var i = 0; i < formDataArrSales.length; i++){
        if (formDataArrSales[i]['value']) {
          formData[formDataArrSales[i]['name']] = formDataArrSales[i]['value'];
        }
      }

      for (var i = 0; i < formDataArrService.length; i++){
        if (formDataArrService[i]['value']) {
          formData[formDataArrService[i]['name']] = formDataArrService[i]['value'];
        }
      }

      for (var i = 0; i < formDataArrBjcProduct.length; i++){
        if (formDataArrBjcProduct[i]['value']) {
          formData[formDataArrBjcProduct[i]['name']] = formDataArrBjcProduct[i]['value'];
        }
      }

      for (var i = 0; i < formDataArrOtherProduct.length; i++){
        if (formDataArrOtherProduct[i]['value']) {
          formData[formDataArrOtherProduct[i]['name']] = formDataArrOtherProduct[i]['value'];
        }
      }

      for (var i = 0; i < formDataArrPersonnel.length; i++){

        var ref_img_personnel = 'personnel_detail['+i+'][img_personnel]';
        var ref_old_img_personnel = 'personnel_detail['+i+'][old_img_personnel]';
        if (formDataArrPersonnel[i]['value'] || formDataArrPersonnel[i]['name']==ref_img_personnel || formDataArrPersonnel[i]['name']==ref_old_img_personnel) {
          formData[formDataArrPersonnel[i]['name']] = formDataArrPersonnel[i]['value'];
        }
      }
      return formData;
    }

    </script>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
