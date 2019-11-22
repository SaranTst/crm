        <form id="service-detail">
          <div class="jumbotron jumbotron-fluid p-3" id="dom-service-1">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2"><i class="fa fa-times fa-2x float-right mb-3" data-toggle="tooltip" data-placement="top" title="Delete" onclick="$('#dom-service-1').remove();"></i></div>
                <div class="col-md-9">
                  <h3 id="id-jumbotron-service">1. Service 1</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">ID</label>
                    <div class="col">
                      <select class="custom-select" name="service_detail[0][id]" onchange="select_service(1,this)">
                        <option value="" selected readonly hidden>Choose ID</option>
                        <?php foreach ($services as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-6">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-service-1" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-6 mt-6">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Thai)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Thai)" id="name-service-th-1" value="" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Eng)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Eng)" id="name-service-eng-1" value="" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Thai)" id="nickname-service-th-1" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Eng)" id="nickname-service-eng-1" value="" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Team</label>
                    <input type="text" class="form-control" placeholder="Team" id="team-service-1" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6"></div>
              </div>

            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->
        </form>

        <div class="row">
          <div class="col">
            <div class="form-group row">
              <!-- Left column -->
              <div class="col-md-10"></div>
              <!-- Right column -->
              <div class="col-md-2">
                <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="add_content_service_detail"><i class="fa fa-plus fa-fw fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>

  <script type="text/javascript">

    /* Add Dom SERVICE DETAIL */
    $('#add_content_service_detail').click(function(){

      // Clone Dom
      var clone_dom_service = $("form#service-detail").last().clone();

      // Edit Dom
      var id_dom_service = clone_dom_service.find('.jumbotron.jumbotron-fluid.p-3').last().attr('id').substring(12);
      var new_id_dom_service = parseInt(id_dom_service) + 1;
      var key_arr_dom_service = parseInt(id_dom_service) - 1;
      var new_key_arr_dom_service = key_arr_dom_service + 1;

      clone_dom_service.find('#dom-service-'+id_dom_service).attr('id', 'dom-service-'+new_id_dom_service);
      clone_dom_service.find('#id-jumbotron-service').text(new_id_dom_service+'. Service '+new_id_dom_service);
      clone_dom_service.find('#preview-service-'+id_dom_service).attr('id', 'preview-service-'+new_id_dom_service).attr('src', base_url+'images/180.png');
      clone_dom_service.find('#name-service-th-'+id_dom_service).attr('id', 'name-service-th-'+new_id_dom_service).attr('value', '');
      clone_dom_service.find('#name-service-eng-'+id_dom_service).attr('id', 'name-service-eng-'+new_id_dom_service).attr('value', '');
      clone_dom_service.find('#nickname-service-th-'+id_dom_service).attr('id', 'nickname-service-th-'+new_id_dom_service).attr('value', '');
      clone_dom_service.find('#nickname-service-eng-'+id_dom_service).attr('id', 'nickname-service-eng-'+new_id_dom_service).attr('value', '');
      clone_dom_service.find('#team-service-'+id_dom_service).attr('id', 'team-service-'+new_id_dom_service).attr('value', '');
      clone_dom_service.find('select[name="service_detail['+key_arr_dom_service+'][id]"]').attr('name', 'service_detail['+new_key_arr_dom_service+'][id]');
      clone_dom_service.find('.fa.fa-times').attr('onclick', "$('#dom-service-"+new_id_dom_service+"').remove();");
      clone_dom_service.find('.custom-select').attr('onchange', "select_service("+new_id_dom_service+",this)");

      // Appent Dom
      clone_dom_service.children().last().appendTo("form#service-detail");
   });

    function select_service(id_dom, e) {

      var id_service = parseInt(e.value);
      var url_service = base_url+'api/services/gets_services/'+id_service;

      var formDataArr_service = $("form#service-detail").serializeArray();
      var cout_duplicate_service = 0;
      for (var i = 0; i < formDataArr_service.length; i++){
        var value_service = parseInt(formDataArr_service[i]['value']);
        if (value_service==id_service) {
          cout_duplicate_service++;
        }
      }

      if (cout_duplicate_service>=2) {
          Swal.fire({
            title: 'Warning!',
            text: 'เลือกเซอร์วิสคนนี้ไปแล้ว !!',
            type: 'warning'
          }).then((result) => {
            console.log(cout_duplicate_service)
          })
      }else{

        $.ajax({
          url: url_service,
          type:"GET",
          dataType:"json",
          success: function( resp ){

            if (resp.status==1) {
              change_value_dom_service(id_dom, resp.data[0])
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

    }

    function change_value_dom_service(id_dom, data) {

      $('#preview-service-'+id_dom).attr('src', base_url+data.IMAGE);
      $('#name-service-th-'+id_dom).attr('value', data.FIRST_NAME_TH+' '+data.LAST_NAME_TH);
      $('#name-service-eng-'+id_dom).attr('value', data.FIRST_NAME_ENG+' '+data.LAST_NAME_ENG);
      $('#nickname-service-th-'+id_dom).attr('value', data.NICKNAME_TH);
      $('#nickname-service-eng-'+id_dom).attr('value', data.NICKNAME_ENG);
      $('#team-service-'+id_dom).attr('value', ARR_DEPARTMENT_TH[data.DEPARTMENT_ID]);
    }

  </script>