
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block">Chulalongkorn Hospital</a>
        </div>
        <div class="col-md-8"></div>
      </div>

      <div class="row" id="header-table">
        <div class="col-md-4 pt-2">
          <div class="form-group row">
            <label class="col-md-4 col-form-label">Expertise</label>
            <div class="col">
              <select class="custom-select">
                <option value="" selected>Choose Radiology</option>
                <option value="1">Radiology 1</option>
                <option value="2">Radiology 2</option>
                <option value="3">Radiology 3</option>
                <option value="4">Radiology 4</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-5 pt-2">
          <form class="form-inline md-form form-sm active-pink-2 mt-1">
            <input class="form-control form-control-md mr-3" id="crm-input-search" type="text" placeholder="Search"
              aria-label="Search">
            <a href="javascript:void(0)"><i class="fa fa-search fa-lg"></i></a>
          </form>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>Export to PDF</p></a>
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

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
