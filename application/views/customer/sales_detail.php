        <form id="sales-detail">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-9">
                  <h3 id="id-jumbotron-sales">1.</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">ID</label>
                    <div class="col">
                      <select class="custom-select" name="sales_detail[0][id]">
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
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-sales-1" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-sales-1" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-sales-1" type="file" name="sales_detail[0][img_sales]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-sales-1" onclick="upload_and_preview('input-file-sales-1' ,'show-file-name-sales-1' ,'preview-sales-1')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Thai)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Thai)" name="sales_detail[0][name_surname_th]">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Eng)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Eng)" name="sales_detail[0][name_surname_eng]">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Thai)" name="sales_detail[0][nickname_th]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Eng)" name="sales_detail[0][nickname_eng]">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Department</label>
                    <select class="custom-select" name="sales_detail[0][department]">
                      <option value="" selected>Choose Department</option>
                      <option value="1">Department 1</option>
                      <option value="2">Department 2</option>
                      <option value="3">Department 3</option>
                      <option value="4">Department 4</option>
                      <option value="5">Department 5</option>
                    </select>
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
                <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="add_content_sale_detail"><i class="fa fa-plus fa-fw fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>

  <script type="text/javascript">

    /* Add Dom SALES DETAIL */
    $('#add_content_sale_detail').click(function(){

      // Clone Dom
      var clone_dom_sales = $("form#sales-detail").children().last().clone();
      var length_dom_sales = $("form#sales-detail").children().length;

      // Edit Dom
      var id_dom = (length_dom_sales+1);
      var id_input_new = (id_dom-1);
      var id_input = (length_dom_sales-1);

      clone_dom_sales.find('#id-jumbotron-sales').text(id_dom+'.');
      clone_dom_sales.find('#preview-sales-'+length_dom_sales).attr('id', 'preview-sales-'+id_dom);
      clone_dom_sales.find('#show-file-name-sales-'+length_dom_sales).attr('id', 'show-file-name-sales-'+id_dom);
      clone_dom_sales.find('#input-file-sales-'+length_dom_sales).attr('name', 'sales_detail['+id_input_new+'][img_sales]');
      clone_dom_sales.find('#input-file-sales-'+length_dom_sales).attr('id', 'input-file-sales-'+id_dom);
      
      clone_dom_sales.find('#btn-upload-file-sales-'+length_dom_sales).attr('onclick', "upload_and_preview('input-file-sales-"+id_dom+"' ,'show-file-name-sales-"+id_dom+"' ,'preview-sales-"+id_dom+"')");
      clone_dom_sales.find('#btn-upload-file-sales-'+length_dom_sales).attr('id', 'btn-upload-file-sales-'+id_dom);

      clone_dom_sales.find('input[name="sales_detail['+id_input+'][nickname_th]"]').attr('name', 'sales_detail['+id_input_new+'][nickname_th]');
      clone_dom_sales.find('select[name="sales_detail['+id_input+'][department]"]').attr('name', 'sales_detail['+id_input_new+'][department]');
      clone_dom_sales.find('select[name="sales_detail['+id_input+'][id]"]').attr('name', 'sales_detail['+id_input_new+'][id]');
      clone_dom_sales.find('input[name="sales_detail['+id_input+'][name_surname_th]"]').attr('name', 'sales_detail['+id_input_new+'][name_surname_th]');
      clone_dom_sales.find('input[name="sales_detail['+id_input+'][name_surname_eng]"]').attr('name', 'sales_detail['+id_input_new+'][name_surname_eng]');
      clone_dom_sales.find('input[name="sales_detail['+id_input+'][nickname_eng]"]').attr('name', 'sales_detail['+id_input_new+'][nickname_eng]');

      // Appent Dom
      clone_dom_sales.appendTo("form#sales-detail");
   });

  </script>