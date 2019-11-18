        <!-- Bjc Product Detail -->
        <form id="bjc-product-detail">
          <div class="jumbotron jumbotron-fluid p-3" id="bjc-product">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-7">
                      <h3 id="id-jumbotron-bjc-product">1. BJC Product</h3>
                    </div>
                    <label class="col-md-1 col-form-label">SN</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="SN" name="bjc_product_detail[0][sn]">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Brands</label>
                    <select class="custom-select" name="bjc_product_detail[0][brands]">
                      <option value="" selected>Choose Brands</option>
                      <option value="1">Brands 1</option>
                      <option value="2">Brands 2</option>
                      <option value="3">Brands 3</option>
                      <option value="4">Brands 4</option>
                      <option value="5">Brands 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Model</label>
                    <select class="custom-select" name="bjc_product_detail[0][model]">
                      <option value="" selected>Choose Model</option>
                      <option value="1">Model 1</option>
                      <option value="2">Model 2</option>
                      <option value="3">Model 3</option>
                      <option value="4">Model 4</option>
                      <option value="5">Model 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Unit</label>
                        <input type="number" class="form-control" min="1" placeholder="Unit" name="bjc_product_detail[0][unit]">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" min="1" placeholder="Price" name="bjc_product_detail[0][price]">
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
                      <option value="" selected>Choose Saleperson</option>
                      <option value="1">Saleperson 1</option>
                      <option value="2">Saleperson 2</option>
                      <option value="3">Saleperson 3</option>
                      <option value="4">Saleperson 4</option>
                      <option value="5">Saleperson 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Serviceperson</label>
                    <select class="custom-select" name="bjc_product_detail[0][serviceperson]">
                      <option value="" selected>Choose Serviceperson</option>
                      <option value="1">Serviceperson 1</option>
                      <option value="2">Serviceperson 2</option>
                      <option value="3">Serviceperson 3</option>
                      <option value="4">Serviceperson 4</option>
                      <option value="5">Serviceperson 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Warranty</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="bjc_product_detail[0][warranty]" id="warranty-bjc-product-1">
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
          <div class="jumbotron jumbotron-fluid p-3" id="other-product">
            <div class="container-fluid">
              <div class="row">
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
                      <option value="" selected>Choose Brands</option>
                      <option value="1">Brands 1</option>
                      <option value="2">Brands 2</option>
                      <option value="3">Brands 3</option>
                      <option value="4">Brands 4</option>
                      <option value="5">Brands 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Model</label>
                    <select class="custom-select" name="other_product_detail[0][model]">
                      <option value="" selected>Choose Model</option>
                      <option value="1">Model 1</option>
                      <option value="2">Model 2</option>
                      <option value="3">Model 3</option>
                      <option value="4">Model 4</option>
                      <option value="5">Model 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Unit</label>
                    <input type="number" class="form-control" min="1" placeholder="Unit" name="other_product_detail[0][unit]">
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
      var clone_dom_bjc_product = $("form#bjc-product-detail").children().last().clone();
      var length_dom_bjc_product = $("form#bjc-product-detail").children().length;

      // Edit Dom
      var id_dom = (length_dom_bjc_product+1);
      var id_input_new = (id_dom-1);
      var id_input = (length_dom_bjc_product-1);

      clone_dom_bjc_product.find('#id-jumbotron-bjc-product').text(id_dom+'. BJC Product');
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+id_input+'][sn]"]').attr('name', 'bjc_product_detail['+id_input_new+'][sn]');
      clone_dom_bjc_product.find('select[name="bjc_product_detail['+id_input+'][brands]"]').attr('name', 'bjc_product_detail['+id_input_new+'][brands]');
      clone_dom_bjc_product.find('select[name="bjc_product_detail['+id_input+'][model]"]').attr('name', 'bjc_product_detail['+id_input_new+'][model]');
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+id_input+'][unit]"]').attr('name', 'bjc_product_detail['+id_input_new+'][unit]');
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+id_input+'][price]"]').attr('name', 'bjc_product_detail['+id_input_new+'][price]');
      clone_dom_bjc_product.find('select[name="bjc_product_detail['+id_input+'][saleperson]"]').attr('name', 'bjc_product_detail['+id_input_new+'][saleperson]');
      clone_dom_bjc_product.find('select[name="bjc_product_detail['+id_input+'][serviceperson]"]').attr('name', 'bjc_product_detail['+id_input_new+'][serviceperson]');
      clone_dom_bjc_product.find('input[name="bjc_product_detail['+id_input+'][warranty]"]').attr('name', 'bjc_product_detail['+id_input_new+'][warranty]');
      clone_dom_bjc_product.find('#warranty-bjc-product-'+length_dom_bjc_product).attr('id', 'warranty-bjc-product-'+id_dom);

      // Appent Dom
      clone_dom_bjc_product.appendTo("form#bjc-product-detail");

      // Datepicker New Dom
      $('#warranty-bjc-product-'+id_dom).datepicker({
        format: "yyyy-mm-dd",
        language: "th",
        autoclose: true
      })
    });

    /* Add Dom Other Product */
    $('#add_content_other_product').click(function(){

      // Clone Dom
      var clone_dom_other_product = $("form#other-product-detail").children().last().clone();
      var length_dom_other_product = $("form#other-product-detail").children().length;

      // Edit Dom
      var id_dom = (length_dom_other_product+1);
      var id_input_new = (id_dom-1);
      var id_input = (length_dom_other_product-1);

      clone_dom_other_product.find('#id-jumbotron-other-product').text(id_dom+'. Other Product');

      clone_dom_other_product.find('select[name="other_product_detail['+id_input+'][brands]"]').attr('name', 'other_product_detail['+id_input_new+'][brands]');
      clone_dom_other_product.find('select[name="other_product_detail['+id_input+'][model]"]').attr('name', 'other_product_detail['+id_input_new+'][model]');
      clone_dom_other_product.find('input[name="other_product_detail['+id_input+'][unit]"]').attr('name', 'other_product_detail['+id_input_new+'][unit]');

      // Appent Dom
      clone_dom_other_product.appendTo("form#other-product-detail");
    });

  </script>