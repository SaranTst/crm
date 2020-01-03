
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block no-hover"><?php echo $datas['status']==1 ? strtoupper($datas['data'][0]['HOSPITAL_NAME_ENG']) : $datas['message']; ?></a>
        </div>
        <div class="col-md-8"></div>
      </div>

      <div class="row" id="header-table">
        <div class="col-md-4 pt-2">
          <div class="form-group row">
            <label class="col-md-4 col-form-label">Expertise</label>
            <div class="col">
              <select class="custom-select" id="more_read_customer_expertise">
                <option value="" selected disabled hidden>Choose Expertise</option>
                <?php foreach (ARR_EXPERTISE as $key => $value) { ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
                <option value="">-- No Expertise --</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-5 pt-2">
          <form class="form-inline md-form form-sm active-pink-2 mt-1">
            <input class="form-control form-control-md mr-3" id="crm-input-search" type="text" placeholder="Search"
              aria-label="Search" name="search" onkeydown="return event.key != 'Enter';">
            <a href="javascript:void(0)" id="btn-search-more-read-customer"><i class="fa fa-search fa-lg"></i></a>
          </form>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>&nbsp; Export to PDF</p></a>
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

      <?php if ($datas['status']==1) { ?>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="SALES" role="tabpanel" aria-labelledby="SALES-tab">
          <?php include_once("read_sales_detail.php"); ?>
        </div> <!-- SALES-tab -->

        <div class="tab-pane fade" id="SERVICE" role="tabpanel" aria-labelledby="SERVICE-tab">
          <?php include_once("read_service_detail.php"); ?>
        </div> <!-- SERVICE-tab -->

        <div class="tab-pane fade" id="PRODUCT" role="tabpanel" aria-labelledby="PRODUCT-tab">
          <?php include_once("read_product_detail.php"); ?>
        </div> <!-- PRODUCT-tab -->

        <div class="tab-pane fade" id="PERSONNEL" role="tabpanel" aria-labelledby="PERSONNEL-tab">
          <?php include_once("read_personnel_detail.php"); ?>
        </div> <!-- PERSONNEL-tab -->
        
      </div> <!-- .tab-content -->
      <?php }else{ ?>
        <h3 class="text-center pt-5"><?php echo $datas['message']; ?></h3>
      <?php } ?>

      <div class="d-flex justify-content-center pt-3" id="pagination-more-read-customer"></div>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

  <script type="text/javascript">
    var total = <?php echo isset($datas['total']) ? $datas['total'] : 0; ?>;
    var perpage = <?php echo isset($datas['limit']) ? $datas['limit'] : 0; ?>;
    var current_page = <?php echo isset($datas['page']) ? $datas['page'] : 1; ?>;

    var search_url = '';
    var current_tab = new URL(window.location.href).searchParams.get('tab');
    var search = new URL(window.location.href).searchParams.get('search');
    var hospital = new URL(window.location.href).searchParams.get('hospital');
    var expertise = new URL(window.location.href).searchParams.get('expertise');

    $(document).ready(function(){

      if (current_tab) {
        $("#"+current_tab).tab('show');
      }

      $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
        current_tab = e.target.id;
      })

      $("#pagination-more-read-customer").pagination({
        items: total,
        itemsOnPage: perpage,
        displayedPages: 3,
        edges: 1,
        onPageClick: function(pageNumber) {

          search_url += '?hospital='+hospital;
          search_url += '&page='+pageNumber;
          if (current_tab) {
            search_url += '&tab='+current_tab;
          }
          if (search) {
            search_url += '&search='+search;
          }
          if (expertise) {
            search_url += '&expertise='+expertise;
          }
          window.location.href = window.location.pathname+search_url;

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
          return false;
        }
      });

      $('#pagination-more-read-customer').pagination('drawPage', current_page);

      $('#btn-search-more-read-customer').click(function(){
        search = $("[name='search']").val();

        search_url += '?hospital='+hospital;
        search_url += '&search='+search;

        if (expertise) {
          search_url += '&expertise='+expertise;
        }
        window.location.href = window.location.pathname+search_url;

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
        return false;
      });

      $('#more_read_customer_expertise').change(function(e) {
        Swal.fire({
          title: 'Are you sure?',
          text: "คุณต้องการค้นหา "+$(this).find("option:selected").text()+" นี้ใช่หรือไม่",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then((result) => {
          if (typeof result.dismiss === "undefined") {

            search_url += '?hospital='+hospital;

            expertise = this.value;
            search_url += '&expertise='+expertise;
            if (search) {
              search_url += '&search='+search;
            }
            window.location.href = window.location.pathname+search_url;

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
            return false;
          }
        })
      });

      $('#more_read_customer_expertise').val(expertise).change(false);
      $('#crm-input-search').val(search);

    });

  </script>