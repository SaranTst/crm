        <!-- Bjc Product Detail -->
        <form id="bjc-product-detail">
          <div class="jumbotron jumbotron-fluid p-3" id="dom-bjc-product-1">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2"><i class="fa fa-times fa-2x float-right mb-3" data-toggle="tooltip" data-placement="top" title="Delete" onclick="$('#dom-bjc-product-1').remove();"></i></div>
                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-7">
                      <h3 id="id-jumbotron-bjc-product">1. BJC Product</h3>
                    </div>
                    <label class="col-md-1 col-form-label">SN</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="SN" name="bjc_product_detail[0][sn]" value="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Brands</label>
                    <select class="custom-select" name="bjc_product_detail[0][brands]">
                      <option value="" selected readonly hidden>Choose Brands</option>
                      <?php foreach ($brands as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Model</label>
                    <input type="text" class="form-control" placeholder="Model" name="bjc_product_detail[0][model]" value="">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Unit</label>
                        <input type="number" class="form-control" min="1" placeholder="Unit" name="bjc_product_detail[0][unit]" value="">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" min="1" placeholder="Price" name="bjc_product_detail[0][price]" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Saleperson</label>
                    <select class="custom-select" name="bjc_product_detail[0][saleperson]">
                      <option value="" selected readonly hidden>Choose Saleperson</option>
                      <?php foreach ($sales as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Serviceperson</label>
                    <select class="custom-select" name="bjc_product_detail[0][serviceperson]">
                      <option value="" selected readonly hidden>Choose Serviceperson</option>
                      <?php foreach ($services as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Warranty</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="bjc_product_detail[0][warranty]" id="warranty-bjc-product-1" value="">
                    </div>
                    <div class="col-2 text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
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
                <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="add_content_bjc_product"><i class="fa fa-plus fa-fw fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- End Bjc Product Detail -->

        <!-- Other Product Detail -->
        <form id="other-product-detail">
          <div class="jumbotron jumbotron-fluid p-3" id="dom-other-product-1">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2"><i class="fa fa-times fa-2x float-right mb-3" data-toggle="tooltip" data-placement="top" title="Delete" onclick="$('#dom-other-product-1').remove();"></i></div>
                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-7">
                      <h3 id="id-jumbotron-other-product">1. Other Product</h3>
                    </div>
                    <div class="col-md-5">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Brands</label>
                    <select class="custom-select" name="other_product_detail[0][brands]">
                      <option value="" selected readonly hidden>Choose Brands</option>
                      <?php foreach ($brands as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Model</label>
                    <input type="text" class="form-control" placeholder="Model" name="other_product_detail[0][model]" value="">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Unit</label>
                    <input type="number" class="form-control" min="1" placeholder="Unit" name="other_product_detail[0][unit]" value="">
                  </div>
                </div>
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
                <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="add_content_other_product"><i class="fa fa-plus fa-fw fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- End Other Product Detail -->

  <script type="text/javascript">

    $('#warranty-bjc-product-1').datepicker({
      format: "yyyy-mm-dd",
      language: "th",
      autoclose: true
    })

    /* Add Dom BJC Product */
    $('#add_content_bjc_product').click(function(){

      // Clone Dom
      var clone_dom_bjc_product = $("form#bjc-product-detail").last().clone();

      // Edit Dom
      var id_dom_bjc_product = clone_dom_bjc_product.find('.jumbotron.jumbotron-fluid.p-3').last().attr('id').substring(16);
      var new_id_dom_bjc_product = parseInt(id_dom_bjc_product) + 1;
      var key_arr_dom_bjc_product = parseInt(id_dom_bjc_product) - 1;
      var new_key_arr_dom_bjc_product = key_arr_dom_bjc_product + 1;

      clone_dom_bjc_product.find('#dom-bjc-product-'+id_dom_bjc_product).attr('id', 'dom-bjc-product-'+new_id_dom_bjc_product);
      clone_dom_bjc_product.find('#id-jumbotron-bjc-product').text(new_id_dom_bjc_product+'. BJC Product');

      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][sn]"]').val("");
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][sn]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][sn]');

      clone_dom_bjc_product.find('select[name="bjc_product_detail['+key_arr_dom_bjc_product+'][brands]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][brands]');

      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][model]"]').val("");
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][model]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][model]');

      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][unit]"]').val("");
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][unit]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][unit]');

      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][price]"]').val("");
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][price]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][price]');

      clone_dom_bjc_product.find('select[name="bjc_product_detail['+key_arr_dom_bjc_product+'][saleperson]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][saleperson]');
      clone_dom_bjc_product.find('select[name="bjc_product_detail['+key_arr_dom_bjc_product+'][serviceperson]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][serviceperson]');

      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][warranty]"]').val("");
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+key_arr_dom_bjc_product+'][warranty]"]').attr('name', 'bjc_product_detail['+new_key_arr_dom_bjc_product+'][warranty]');

      clone_dom_bjc_product.find('#warranty-bjc-product-'+id_dom_bjc_product).attr('id', 'warranty-bjc-product-'+new_id_dom_bjc_product);

      // Appent Dom
      clone_dom_bjc_product.children().last().appendTo("form#bjc-product-detail");

      // Datepicker New Dom
      $('#warranty-bjc-product-'+new_id_dom_bjc_product).datepicker({
        format: "yyyy-mm-dd",
        language: "th",
        autoclose: true
      })
    });

    /* Add Dom Other Product */
    $('#add_content_other_product').click(function(){

      // Clone Dom
      var clone_dom_other_product = $("form#other-product-detail").last().clone();

      // Edit Dom
      var id_dom_other_product = clone_dom_other_product.find('.jumbotron.jumbotron-fluid.p-3').last().attr('id').substring(18);
      var new_id_dom_other_product = parseInt(id_dom_other_product) + 1;
      var key_arr_dom_other_product = parseInt(id_dom_other_product) - 1;
      var new_key_arr_dom_other_product = key_arr_dom_other_product + 1;

      clone_dom_other_product.find('#dom-other-product-'+id_dom_other_product).attr('id', 'dom-other-product-'+new_id_dom_other_product);
      clone_dom_other_product.find('#id-jumbotron-other-product').text(new_id_dom_other_product+'. Other Product');

      clone_dom_other_product.find('select[name="other_product_detail['+key_arr_dom_other_product+'][brands]"]').attr('name', 'other_product_detail['+new_key_arr_dom_other_product+'][brands]');

      clone_dom_other_product.find('input[name="other_product_detail['+key_arr_dom_other_product+'][model]"]').val("");
      clone_dom_other_product.find('input[name="other_product_detail['+key_arr_dom_other_product+'][model]"]').attr('name', 'other_product_detail['+new_key_arr_dom_other_product+'][model]');

      clone_dom_other_product.find('input[name="other_product_detail['+key_arr_dom_other_product+'][unit]"]').val("");
      clone_dom_other_product.find('input[name="other_product_detail['+key_arr_dom_other_product+'][unit]"]').attr('name', 'other_product_detail['+new_key_arr_dom_other_product+'][unit]');

      // Appent Dom
      clone_dom_other_product.children().last().appendTo("form#other-product-detail");
    });


    $("input", $("form#bjc-product-detail")).on("keyup", function(){
      $(this).removeClass("border border-danger");
    })
    $("select", $("form#bjc-product-detail")).on("change", function(){
      $(this).removeClass("border border-danger");
    })

  </script>