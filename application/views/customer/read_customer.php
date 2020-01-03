
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block no-hover">Chulalongkorn Hospital</a>
        </div>
        <div class="col-md-8"></div>
      </div>

      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <ul class="nav nav-pills">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>&nbsp; Export to PDF</p></a>
        </div>
        <div class="col-md-3 pt-2">
          <a href="<?php echo base_url().'customer/more_read_customer?hospital='.$name_hospital; ?>" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-arrow-right fa-fw"></i><p>&nbsp; More info</p></a>
        </div>
      </div>
 
      <div class="tab-content">
        <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
          
          <?php 
          // Cehack Datas
          if ($datas['status']==1) {
            $data = $datas['data'];
            $page = $datas['page'];
          }else {
            $data = array();
            $page = 1;
          } ?>

          <?php foreach ($data as $key => $value) { ?>
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">
                
              <div class="row mb-3">
                <h3 id="num-row"><?php echo ($key+1); ?>.  </h3>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo $value['IMAGE_HOSPITAL'] ?  base_url().$value['IMAGE_HOSPITAL'] : base_url().'images/180.png'; ?>" id="hospital-img" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>CustomerID</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="text" class="form-control text-center" placeholder="Customer ID" value="<?php echo $value['CUSTOMER_ID_HOSPITAL']; ?>" id="hospital-cus-id" disabled>
                        </div>
                        <label class="col-md-2 col-form-label"><p>Rating</p></label>
                        <div class="col-md-3 pt-1 text-center" id="hospital-rating">
                          <?php 
                          for ($i=1; $i<=5; $i++) { 
                            if ($value['RATING_HOSPITAL']>=$i) {
                              echo '<i class="fa fa-star select"></i>'; 
                            }else{
                              echo '<i class="fa fa-star-o select"></i>'; 
                            }
                          } ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>HospitalName</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="text" class="form-control text-center" placeholder="Hospital Name Eng" value="<?php echo $value['HOSPITAL_NAME_ENG']; ?>" id="hospital-name-eng" disabled>
                        </div>
                        <div class="col-md-5 pt-1">
                          <input type="text" class="form-control text-center" placeholder="Hospital Name Thai" value="<?php echo $value['HOSPITAL_NAME_TH']; ?>" id="hospital-name-th" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>Orderamount</p></label>
                        <div class="col pt-1">
                          <input type="text" class="form-control text-center" placeholder="Order amount" value="<?php echo number_format($value['ORDER_AMOUNT_HOSPITAL']); ?>" id="hospital-order" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo $value['IMAGE_DOCTOR'] ?  base_url().$value['IMAGE_DOCTOR'] : base_url().'images/180.png'; ?>" class="img-thumbnail" id="doctor-img" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>Name</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="text" class="form-control text-center" placeholder="Name" value="<?php echo $value['NAME_SURNAME_DOCTOR']; ?>" id="doctor-name" disabled>
                        </div>
                        <label class="col-md-3 col-form-label"><p>Relationship</p></label>
                        <div class="col-md-2 pt-1 text-center">
                          <input type="number" class="form-control text-center" placeholder="Relationship" value="<?php echo $value['RELATIONSHIP_DOCTOR']; ?>" id="doctor-relation" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>E-mail</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="email" class="form-control text-center" placeholder="E-mail" value="<?php echo $value['E_MAIL_DOCTOR']; ?>" id="doctor-email" disabled>
                        </div>
                        <label class="col-md-1 col-form-label"><p>Tel.</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="text" class="form-control text-center" placeholder="Tel" value="<?php echo $value['TELEPHONE_DOCTOR']; ?>" id="doctor-tel" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>Date Birthday</p></label>
                        <div class="col pt-1">
                          <input type="date" class="form-control text-center" value="<?php echo $value['BIRTHDAY_DOCTOR']; ?>" id="doctor-birth" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo $value['IMAGE_PURCHASE'] ?  base_url().$value['IMAGE_PURCHASE'] : base_url().'images/180.png'; ?>" class="img-thumbnail" id="purchase-img" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>Name</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="text" class="form-control text-center" placeholder="Name" value="<?php echo $value['NAME_SURNAME_PURCHASE']; ?>" id="purchase-name" disabled>
                        </div>
                        <label class="col-md-3 col-form-label"><p>Relationship</p></label>
                        <div class="col-md-2 pt-1 text-center">
                          <input type="number" class="form-control text-center" placeholder="Relationship" value="<?php echo $value['RELATIONSHIP_PURCHASE']; ?>" id="purchase-relation" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>E-mail</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="email" class="form-control text-center" placeholder="E-mail" value="<?php echo $value['E_MAIL_PURCHASE']; ?>" id="purchase-email" disabled>
                        </div>
                        <label class="col-md-1 col-form-label"><p>Tel.</p></label>
                        <div class="col-md-4 pt-1">
                          <input type="text" class="form-control text-center" placeholder="Tel" value="<?php echo $value['TELEPHONE_PURCHASE']; ?>" id="purchase-tel" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><p>Date Birthday</p></label>
                        <div class="col pt-1">
                          <input type="date" class="form-control text-center" value="<?php echo $value['BIRTHDAY_PURCHASE']; ?>" id="purchase-birth" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->
          <?php } ?>

        </div>
        <div class="row">
          <div class="col">
            <a href="javascript:void(0)" id="btn-more-info" class="btn crm-btn-orange btn-lg btn-block">More Info</a>
          </div>
        </div>
      </div> <!-- .tab-content -->

      <script type="text/javascript">
        var name_hospital = '<?php echo $name_hospital ? $name_hospital : ''; ?>';
        var page = '<?php echo $page;?>';

        $(document).ready(function(){

          $('#btn-more-info').click(function(){

            page++;
            var url_read_more = base_url+'api/customers/lists_customers_general/'+name_hospital+'?page='+page;

            $.ajax({
              url: url_read_more,
              type:"GET",
              dataType:"json",
              success: function( resp ){
                if (resp.status==1) {

                  var content_result = $('#GENERAL').children().last().clone();
                  var data = resp.data;
                  $.each(data, function(i, v){

                    content_result.find('#num-row').text(((resp.page - 1) * resp.limit) + (i + 1) + '.');

                    /* HOSPITAL */
                    if (v.IMAGE_HOSPITAL=='' || v.IMAGE_HOSPITAL===null) {
                      content_result.find('#hospital-img').attr('src', base_url+'images/180.png');
                    }else{
                      content_result.find('#hospital-img').attr('src', base_url+v.IMAGE_HOSPITAL);
                    }

                    var ih=1;
                    content_result.find('#hospital-rating').children().remove();
                    for (ih; ih<=5; ih++) {
                        if (v.RATING_HOSPITAL>=ih) {
                          content_result.find('#hospital-rating').last().append('<i class="fa fa-star select"></i>'); 
                        }else{
                          content_result.find('#hospital-rating').last().append('<i class="fa fa-star-o select"></i>');
                        }
                    }

                    content_result.find('#hospital-cus-id').val(v.CUSTOMER_ID_HOSPITAL);
                    content_result.find('#hospital-name-eng').val(v.HOSPITAL_NAME_ENG);
                    content_result.find('#hospital-name-th').val(v.HOSPITAL_NAME_TH);
                    content_result.find('#hospital-order').val(parseInt(v.ORDER_AMOUNT_HOSPITAL).toLocaleString());

                    /* End HOSPITAL */


                    /* DOCTOR */
                    if (v.IMAGE_DOCTOR=='' || v.IMAGE_DOCTOR===null) {
                      content_result.find('#doctor-img').attr('src', base_url+'images/180.png');
                    }else{
                      content_result.find('#doctor-img').attr('src', base_url+v.IMAGE_DOCTOR);
                    }

                    content_result.find('#doctor-relation').val(v.RELATIONSHIP_DOCTOR);
                    content_result.find('#doctor-name').val(v.NAME_SURNAME_DOCTOR);
                    content_result.find('#doctor-email').val(v.E_MAIL_DOCTOR);
                    content_result.find('#doctor-tel').val(v.TELEPHONE_DOCTOR);
                    content_result.find('#doctor-birth').val(v.BIRTHDAY_DOCTOR);
                    /* End DOCTOR */

                    /* PURCHASE */
                    if (v.IMAGE_PURCHASE=='' || v.IMAGE_PURCHASE===null) {
                      content_result.find('#purchase-img').attr('src', base_url+'images/180.png');
                    }else{
                      content_result.find('#purchase-img').attr('src', base_url+v.IMAGE_PURCHASE);
                    }

                    content_result.find('#purchase-relation').val(v.RELATIONSHIP_PURCHASE);
                    content_result.find('#purchase-name').val(v.NAME_SURNAME_PURCHASE);
                    content_result.find('#purchase-email').val(v.E_MAIL_PURCHASE);
                    content_result.find('#purchase-tel').val(v.TELEPHONE_PURCHASE);
                    content_result.find('#purchase-birth').val(v.BIRTHDAY_PURCHASE);

                    /* End PURCHASE */

                    // append DOM
                    content_result.appendTo('#GENERAL');

                    // clone DOM last GENERAL
                    content_result = $('#GENERAL').children().last().clone();
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
          });

        });

      </script>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->