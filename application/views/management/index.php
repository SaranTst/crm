
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block no-hover">Management</a>
        </div>
        <div class="col-md-8"></div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <ul class="nav nav-pills nav-fill flex-column flex-sm-row">
            <li class="nav-item m-1">
              <a class="nav-link active" id="BRAND-tab" data-toggle="tab" href="#BRAND" role="tab" aria-controls="BRAND" aria-selected="true">BRAND</a>
            </li>
          </ul>
        </div>
        <div class="col-md-8"></div>
      </div>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="BRAND" role="tabpanel" aria-labelledby="BRAND-tab">
          <?php include_once("brand.php"); ?>
        </div> <!-- BRAND-tab -->
      </div> <!-- .tab-content -->

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->