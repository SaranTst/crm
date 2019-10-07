        <form id="service-detail">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-9">
                  <h3 id="id-jumbotron-service">1. Service 1</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">ID</label>
                    <div class="col">
                      <select class="custom-select" name="service_detail[0][id]">
                        <option value="" selected>Choose ID</option>
                        <option value="1">100</option>
                        <option value="2">200</option>
                        <option value="3">300</option>
                        <option value="4">400</option>
                        <option value="5">500</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-service-1" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-service-1" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-service-1" type="file" name="service_detail[0][img_service]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-service-1" onclick="upload_and_preview('input-file-service-1' ,'show-file-name-service-1' ,'preview-service-1')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Thai)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Thai)" name="service_detail[0][name_surname_th]">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Eng)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Eng)" name="service_detail[0][name_surname_eng]">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Thai)" name="service_detail[0][nickname_th]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Eng)" name="service_detail[0][nickname_eng]">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Team</label>
                    <input type="text" class="form-control" placeholder="Team" name="service_detail[0][team]">
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
      var clone_dom_service = $("form#service-detail").children().last().clone();
      var length_dom_service = $("form#service-detail").children().length;

      // Edit Dom
      var id_dom = (length_dom_service+1);
      var id_input_new = (id_dom-1);
      var id_input = (length_dom_service-1);

      clone_dom_service.find('#id-jumbotron-service').text(id_dom+'. Service '+id_dom);
      clone_dom_service.find('#preview-service-'+length_dom_service).attr('id', 'preview-service-'+id_dom);
      clone_dom_service.find('#show-file-name-service-'+length_dom_service).attr('id', 'show-file-name-service-'+id_dom);
      clone_dom_service.find('#input-file-service-'+length_dom_service).attr('name', 'service_detail['+id_input_new+'][img_service]');
      clone_dom_service.find('#input-file-service-'+length_dom_service).attr('id', 'input-file-service-'+id_dom);
      
      clone_dom_service.find('#btn-upload-file-service-'+length_dom_service).attr('onclick', "upload_and_preview('input-file-service-"+id_dom+"' ,'show-file-name-service-"+id_dom+"' ,'preview-service-"+id_dom+"')");
      clone_dom_service.find('#btn-upload-file-service-'+length_dom_service).attr('id', 'btn-upload-file-service-'+id_dom);

      clone_dom_service.find('input[name="service_detail['+id_input+'][nickname_th]"]').attr('name', 'service_detail['+id_input_new+'][nickname_th]');
      clone_dom_service.find('input[name="service_detail['+id_input+'][team]"]').attr('name', 'service_detail['+id_input_new+'][team]');
      clone_dom_service.find('select[name="service_detail['+id_input+'][id]"]').attr('name', 'service_detail['+id_input_new+'][id]');
      clone_dom_service.find('input[name="service_detail['+id_input+'][name_surname_th]"]').attr('name', 'service_detail['+id_input_new+'][name_surname_th]');
      clone_dom_service.find('input[name="service_detail['+id_input+'][name_surname_eng]"]').attr('name', 'service_detail['+id_input_new+'][name_surname_eng]');
      clone_dom_service.find('input[name="service_detail['+id_input+'][nickname_eng]"]').attr('name', 'service_detail['+id_input_new+'][nickname_eng]');

      // Appent Dom
      clone_dom_service.appendTo("form#service-detail");
   });

  </script>