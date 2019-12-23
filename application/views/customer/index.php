
    <div class="cd-content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3" id="header-table">
        <!-- <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-user fa-fw"></i><p>Customer Management</p></a>
        </div> -->
        <div class="col-md-6 pt-2">
          <form class="form-inline md-form form-sm active-pink-2 mt-1">
            <input class="form-control form-control-md mr-3" id="crm-input-search" type="text" placeholder="Search"
              aria-label="Search" name="search">
            <a href="javascript:void(0)" id="btn-search"><i class="fa fa-search fa-lg"></i></a>
          </form>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>&nbsp;Export to PDF</p></a>
        </div>
        <div class="col-md-3 pt-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-plus fa-fw"></i><p>&nbsp;CreateCustomer</p></a>
        </div>
      </div>

      <?php 
      // Cehack Datas
      if ($datas['status']==1) {
        $data = $datas['data'];
        $total = $datas['total'];
        $limit = $datas['limit'];
      }else {
        $data = array();
        $limit = 10;
        $total = 10;
      } ?>
      <div class="row">
        <div class="table-responsive">
        <table class="table table-striped" style="text-align: center;">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Hospital / Royal</th>
              <th scope="col">โรงพยาบาล/สถานบัน</th>
              <th scope="col">Customer ID</th>
              <th scope="col">Order amount</th>
              <th scope="col">Rating</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody id="content-result">
            <?php foreach ($data as $key => $value) { ?>
            <tr>
              <th scope="row" id="txt-id"><?php echo ($key+1); ?>.</th>
              <td><a href="<?php echo base_url().'customer/read_customer?hospital='.$value['HOSPITAL_NAME_ENG']; ?>" id="link-hospital-th"><?php echo $value['HOSPITAL_NAME_ENG']; ?></a></td>
              <td><a href="<?php echo base_url().'customer/read_customer?hospital='.$value['HOSPITAL_NAME_TH']; ?>" id="link-hospital-eng"><?php echo $value['HOSPITAL_NAME_TH']; ?></a></td>
              <td id="txt-customer-id"><?php echo $value['CUSTOMER_ID_HOSPITAL']; ?></td>
              <td id="txt-order-amount"><?php echo $value['ORDER_AMOUNT_HOSPITAL']; ?></td>
              <!-- <td><div class="rating" data-rate-value="2"></div></td> -->
              <td id="txt-rating">
                <?php 
                for ($i=1; $i<=5; $i++) { 
                  if ($value['RATING_HOSPITAL']>=$i) {
                    echo '<i class="fa fa-star select"></i>'; 
                  }else{
                    echo '<i class="fa fa-star-o select"></i>'; 
                  }
                } ?>
                </td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url().'customer/update_customer/'.$value['ID']; ?>" id="link-update"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <?php $current_page = $this->input->get('page') ? $this->input->get('page') : 1; ?>
          <small class="text-muted" id="text-showing">Showing <?php echo $current_page; ?> to <?php echo ($current_page*$limit)>$total ? $total : ($current_page*$limit); ?> of <?php echo $total; ?> entries</small>
        </div>
        <div class="col-md-6">
          <div class="float-right" id="pagination-customer"></div>
        </div>
      </div>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

  <script type="text/javascript">

    $(document).ready(function(){ 

      // window.history.replaceState(null, null, window.location.pathname); // remove all url param

      var total = <?php echo $total; ?>;
      var perpage = <?php echo $limit; ?>;
      var current_page = <?php echo $current_page; ?>;
      set_pagination(current_page, total, perpage); // set pagination firsttime

      $('#btn-search').click(function(){
        ajax_data();
      });

    });

    function ajax_data(pageNumber=1) {

      var url = base_url+'api/customers/lists_customers?page='+pageNumber;
      var formData = {};
      formData['search'] = $("[name='search']").val();

      $.ajax({
        url: url,
        type:"POST",
        data: formData,
        dataType:"json",
        success: function( resp ){

          if (resp.status==1) {

            var content_result = $('#content-result').children().last().clone();
            $('#content-result').children().remove();
            var data = resp.data;
            $.each(data, function(i, v){

              content_result.find('#txt-id').text(((resp.page - 1) * resp.limit) + (i + 1));
              content_result.find('#link-hospital-th').attr('href', base_url+'customer/create_customer/'+v.ID);
              content_result.find('#link-hospital-th').text(v.HOSPITAL_NAME_TH);
              content_result.find('#link-hospital-eng').attr('href', base_url+'customer/create_customer/'+v.ID);
              content_result.find('#link-hospital-eng').text(v.HOSPITAL_NAME_ENG);
              content_result.find('#txt-customer-id').text(v.CUSTOMER_ID_HOSPITAL);
              content_result.find('#txt-order-amount').text(v.ORDER_AMOUNT_HOSPITAL);

              var ics=1;
              content_result.find('#txt-rating').children().remove();
              for (ics; ics<=5; ics++) {
                  if (v.RATING_HOSPITAL>=ics) {
                    content_result.find('#txt-rating').last().append('<i class="fa fa-star select"></i>'); 
                  }else{
                    content_result.find('#txt-rating').last().append('<i class="fa fa-star-o select"></i>');
                  }
              }

              content_result.find('#link-update').attr('href', base_url+'customer/update_customer/'+v.ID);

              // append DOM
              content_result.appendTo('#content-result');

              // clone DOM last content-result
              content_result = $('#content-result').children().last().clone();
            })

            // set pagination
            set_pagination(pageNumber, resp.total, resp.limit);

          }else{
            Swal.fire({
              title: 'Warning!',
              text: resp.message,
              type: 'warning'
            }).then((result) => {
              if (result.value || result.dismiss) {
                $('form#frm_serach')[0].reset();
                ajax_data();
              }
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


    function set_pagination(currentpage=1,total,limit) {

      $("#pagination-customer").pagination({
          items: total,
          itemsOnPage: limit,
          displayedPages: 3,
          edges: 1,
          hrefTextPrefix: "#page=",
          onPageClick: function(pageNumber) {
              ajax_data(pageNumber);
        }
      });
      $('#pagination-customer').pagination('drawPage', currentpage);

      // set text showing pagination
      set_showing_text(currentpage,total,limit);
    }

    function set_showing_text(currentpage=1,total,limit) {

      var showing = ( ((currentpage-1) * limit)>0 ? ((currentpage-1) * limit)+1 : 1 );
      var showing_to = ( (currentpage * limit)<total ? (currentpage * limit) : total );
      $("#text-showing").text('Showing '+showing+' to '+showing_to+' of '+total+' entries');
    }


  </script>