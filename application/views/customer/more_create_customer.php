
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row" id="header-table">
        <div class="col-md-4 pt-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp; GENERAL DETAIL</a>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4 pt-2">
          <div class="form-group row">
            <label class="col-md-4 col-form-label">Expertise</label>
            <div class="col">
              <select class="custom-select">
                <option value="" selected disabled hidden>Choose Expertise</option>
                <?php foreach (ARR_EXPERTISE as $key => $value) { ?>
                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
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
          <?php include_once("sales_detail.php"); ?>
        </div> <!-- SALES-tab -->

        <div class="tab-pane fade" id="SERVICE" role="tabpanel" aria-labelledby="SERVICE-tab">
          <?php include_once("service_detail.php"); ?>
        </div> <!-- SERVICE-tab -->

        <div class="tab-pane fade" id="PRODUCT" role="tabpanel" aria-labelledby="PRODUCT-tab">
          <?php include_once("product_detail.php"); ?>
        </div> <!-- PRODUCT-tab -->

        <div class="tab-pane fade" id="PERSONNEL" role="tabpanel" aria-labelledby="PERSONNEL-tab">
          <?php include_once("personnel_detail.php"); ?>
        </div> <!-- PERSONNEL-tab -->
        
      </div> <!-- .tab-content -->

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
