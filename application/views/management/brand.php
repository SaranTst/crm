<div class="jumbotron jumbotron-fluid p-3">
  <div class="container-fluid">

    <div class="row mb-3" id="header-table">
      <div class="col-md-6 pt-2">
        <form class="form-inline md-form form-sm active-pink-2 mt-1">
          <input class="form-control form-control-md mr-3" id="crm-input-search" type="text" placeholder="Search"
            aria-label="Search" onkeydown="return event.key != 'Enter';">
          <a href="javascript:void(0)" id="ic-search"><i class="fa fa-search fa-lg"></i></a>
        </form>
      </div>
      <div class="col-md-3 pt-2">
        <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block" id="btn-report-brands"><i class="fa fa-file-pdf-o fa-fw"></i><p>&nbsp;Export to PDF</p></a>
      </div>
      <div class="col-md-3 pt-2">
        <a href="<?php echo base_url(); ?>management/create_brand" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-plus fa-fw"></i><p>&nbsp;CreateBrand</p></a>
      </div>
    </div>

    <?php if ($datas['status']==1) {
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
            <th scope="col-1">No.</th>
            <th scope="col-2">Name</th>
            <th scope="col-2">Logo</th>
            <th scope="col-2">Country</th>
            <th scope="col-2">Team</th>
            <th scope="col-2">Expertise</th>
            <th scope="col-1">Edit</th>
            <th scope="col-1">Delete</th>
          </tr>
        </thead>
        <tbody id="content-result">
          <?php foreach ($data as $key => $value) { ?>
          <tr>
            <th scope="row" id="txt-id"><?php echo ($key+1); ?>.</th>
            <td id="txt-vendor-name"><?php echo $value['VENDOR_NAME']; ?></td>
            <td><img src="<?php echo $value['LOGO'] ? base_url().$value['LOGO'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 75px;"></td>
            <td id="txt-county"><?php echo $value['COUNTY']; ?></td>
            <td id="txt-team"><?php echo $value['TEAM']; ?></td>
            <td id="txt-expertise"><?php echo ARR_EXPERTISE[$value['EXPERTISE_ID']]; ?></td>
            <td>
              <div class="text-center">
                <a href="<?php echo base_url().'management/update_brand/'.$value['ID']; ?>" id="link-update" title="Edit"><i class="fa fa-pencil-square-o fa-2x"></i></a>
              </div>
            </td>
            <td>
              <div class="text-center">
                <a href="javascript:void(0)" id="link-delete" onclick='btn_delete(<?php echo $value['ID']; ?>)'><i class="fa fa-times fa-2x" title="Delete"></i></a>
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
        <div class="float-right" id="pagination-brand"></div>
      </div>
    </div>

  </div>
</div> <!-- .jumbotron jumbotron-fluid p-3 -->

<script type="text/javascript">

  var ARR_EXPERTISE = <?php echo json_encode(ARR_EXPERTISE); ?>;

  $(document).ready(function(){ 

      window.history.replaceState(null, null, window.location.pathname); // remove all url param

      var total = <?php echo $total; ?>;
      var perpage = <?php echo $limit; ?>;
      var current_page = <?php echo $current_page; ?>;
      set_pagination(current_page, total, perpage); // set pagination firsttime

      $('#ic-search').click(function(){
        ajax_data();
      });

      $('#btn-report-brands').click(function(){
        report_pdf('brands');
      });
  });

  function ajax_data(pageNumber=1) {

    var url = base_url+'api/brands/lists_brands?page='+pageNumber;
    var formData = {};
    formData['search'] = $('#crm-input-search').val();

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
                content_result.find('#txt-vendor-name').text(v.VENDOR_NAME);
                if (v.LOGO=='') {
                  content_result.find('img').attr('src', base_url+'images/150.png');
                }else{
                  content_result.find('img').attr('src', base_url+v.LOGO);
                }
                content_result.find('#txt-county').text(v.COUNTY);
                content_result.find('#txt-team').text(v.TEAM);
                content_result.find('#txt-expertise').text(ARR_EXPERTISE[v.EXPERTISE]);
                content_result.find('#link-update').attr('href', base_url+'management/update_brand/'+v.ID);
                content_result.find('#link-delete').attr('onclick', 'btn_delete('+v.ID+')');

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

  function ajax_delete(id) {

    var url = base_url+'api/brands/delete_brands/'+id;
    var formData = {};
    formData['user_delete'] = ID_LOGIN;

    $.ajax({
        url: url,
        type:"POST",
        data: formData,
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
              ajax_data($('#pagination-brand').pagination('getCurrentPage'));
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

  function btn_delete(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
    }).then((result) => {
      if (typeof result.dismiss === "undefined") {
        ajax_delete(id);
      }
    })
  }

  function set_pagination(currentpage=1,total,limit) {

    $("#pagination-brand").pagination({
        items: total,
        itemsOnPage: limit,
        displayedPages: 3,
        edges: 1,
        hrefTextPrefix: "#page=",
        onPageClick: function(pageNumber) {
          ajax_data(pageNumber);
      }
    });
    $('#pagination-brand').pagination('drawPage', currentpage);

    // set text showing pagination
    set_showing_text(currentpage,total,limit);
  }

  function set_showing_text(currentpage=1,total,limit) {

    var showing = ( ((currentpage-1) * limit)>0 ? ((currentpage-1) * limit)+1 : 1 );
    var showing_to = ( (currentpage * limit)<total ? (currentpage * limit) : total );
    $("#text-showing").text('Showing '+showing+' to '+showing_to+' of '+total+' entries');
  }
</script>