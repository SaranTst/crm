        <form id="sales-detail">
          <div class="jumbotron jumbotron-fluid p-3" id="dom-sales-1">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2"><i class="fa fa-times fa-2x float-right mb-3" data-toggle="tooltip" data-placement="top" title="Delete" onclick="$('#dom-sales-1').remove();"></i></div>
                <div class="col-md-9">
                  <h3 id="id-jumbotron-sales">1.</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">ID</label>
                    <div class="col">
                      <select class="custom-select" name="sales_detail[0][id]" onchange="select_sales(1,this)">
                        <option value="" selected readonly hidden>Choose ID</option>
                        <?php foreach ($sales as $key => $value) { ?>
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
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-sales-1" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-6 mt-6">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Thai)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Thai)" id="name-sales-th-1" value="" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name - Surname (Eng)</label>
                        <input type="text" class="form-control" placeholder="Name - Surname (Eng)" id="name-sales-eng-1" value="" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Thai)" id="nickname-sales-th-1" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Eng)" id="nickname-sales-eng-1" value="" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Department</label>
                    <input type="text" class="form-control" placeholder="Department" id="department-sales-1" value="" readonly>
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
                <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="add_content_sale_detail"><i class="fa fa-plus fa-fw fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>

  <script type="text/javascript">

    var ARR_DEPARTMENT_TH = <?php echo json_encode(ARR_DEPARTMENT_TH); ?>;

    /* Add Dom SALES DETAIL */
    $('#add_content_sale_detail').click(function(){

      // Clone Dom
      var clone_dom_sales = $("form#sales-detail").last().clone();

      // Edit Dom
      var id_dom = clone_dom_sales.find('.jumbotron.jumbotron-fluid.p-3').last().attr('id').substring(10);
      var new_id_dom = parseInt(id_dom) + 1;
      var key_arr_dom = parseInt(id_dom) - 1;
      var new_key_arr_dom = key_arr_dom + 1;

      clone_dom_sales.find('#dom-sales-'+id_dom).attr('id', 'dom-sales-'+new_id_dom);
      clone_dom_sales.find('#id-jumbotron-sales').text(new_id_dom+'.');
      clone_dom_sales.find('#preview-sales-'+id_dom).attr('id', 'preview-sales-'+new_id_dom).attr('src', base_url+'images/180.png');
      clone_dom_sales.find('#name-sales-th-'+id_dom).attr('id', 'name-sales-th-'+new_id_dom).attr('value', '');
      clone_dom_sales.find('#name-sales-eng-'+id_dom).attr('id', 'name-sales-eng-'+new_id_dom).attr('value', '');
      clone_dom_sales.find('#nickname-sales-th-'+id_dom).attr('id', 'nickname-sales-th-'+new_id_dom).attr('value', '');
      clone_dom_sales.find('#nickname-sales-eng-'+id_dom).attr('id', 'nickname-sales-eng-'+new_id_dom).attr('value', '');
      clone_dom_sales.find('#department-sales-'+id_dom).attr('id', 'department-sales-'+new_id_dom).attr('value', '');
      clone_dom_sales.find('select[name="sales_detail['+key_arr_dom+'][id]"]').attr('name', 'sales_detail['+new_key_arr_dom+'][id]');
      clone_dom_sales.find('.fa.fa-times').attr('onclick', "$('#dom-sales-"+new_id_dom+"').remove();");
      clone_dom_sales.find('.custom-select').attr('onchange', "select_sales("+new_id_dom+",this)");

      // Appent Dom
      clone_dom_sales.children().last().appendTo("form#sales-detail");
    });

    function select_sales(id_dom, e) {

      var id = parseInt(e.value);
      var url = base_url+'api/sales/gets_sales/'+id;

      var formDataArr = $("form#sales-detail").serializeArray();
      var cout_duplicate = 0;
      for (var i = 0; i < formDataArr.length; i++){
        var value = parseInt(formDataArr[i]['value']);
        if (value==id) {
          cout_duplicate++;
        }
      }

      if (cout_duplicate>=2) {
          Swal.fire({
            title: 'Warning!',
            text: 'เลือกเซลคนนี้ไปแล้ว !!',
            type: 'warning'
          }).then((result) => {
            console.log(cout_duplicate)
          })
      }else{

        $.ajax({
          url: url,
          type:"GET",
          dataType:"json",
          success: function( resp ){

            if (resp.status==1) {
              change_value_dom(id_dom, resp.data[0])
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

    function change_value_dom(id_dom, data) {

      $('#preview-sales-'+id_dom).attr('src', base_url+data.IMAGE);
      $('#name-sales-th-'+id_dom).attr('value', data.FIRST_NAME_TH+' '+data.LAST_NAME_TH);
      $('#name-sales-eng-'+id_dom).attr('value', data.FIRST_NAME_ENG+' '+data.LAST_NAME_ENG);
      $('#nickname-sales-th-'+id_dom).attr('value', data.NICKNAME_TH);
      $('#nickname-sales-eng-'+id_dom).attr('value', data.NICKNAME_ENG);
      $('#department-sales-'+id_dom).attr('value', ARR_DEPARTMENT_TH[data.DEPARTMENT_ID]);
    }



  </script>