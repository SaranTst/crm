
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-3 col-sm-12 mb-1">
          <ul class="nav nav-pills">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-5 col-sm-12 mb-2">
          
        </div>
        <div class="col-md-2 col-sm-12 mb-2">
          <a href="<?php echo base_url(); ?>customer/more_create_customer" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-arrow-right fa-fw"></i><p>More info</p></a>
        </div>
        <div class="col-md-2 col-sm-12 mb-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-check fa-fw"></i><p>SUMMIT</p></a>
        </div>
      </div>
    </div> <!-- .container-fluid -->

    <div class="tab-content">
      <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
        
        <div class="jumbotron jumbotron-fluid p-3">
          <div class="container-fluid">
            <form id="detail-hospital">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="row mb-3">
                  <div class="col">
                    <h2>1.Detail Hospital</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-12 mb-2">
                    <div class="z-depth-1-half text-center">
                      <img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Upload File" id="show-file-name-hospital" disabled>
                      <ul class="mb-4">
                        <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                        <li><small class="text-muted">*Please select the picture first</small></li>
                      </ul>
                      <input id="input-file-hospital" type="file" name="img-hospital[]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview('input-file-hospital' ,'show-file-name-hospital' ,'preview-hospital')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Order amount</label>
                      <input type="text" class="form-control" placeholder="Order amount" name="order-amount">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="row mt-4">
                  <div class="col-md-5 col-sm-12">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="form-group row">
                      <label class="col-4">Rating</label>
                      <div class="col">
                        <select class="custom-select">
                          <option selected>Choose Rating</option>
                          <option value="1">1 ดาว</option>
                          <option value="2">2 ดาว</option>
                          <option value="3">3 ดาว</option>
                          <option value="4">4 ดาว</option>
                          <option value="5">5 ดาว</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Customer ID</label>
                      <input type="text" class="form-control" placeholder="Customer ID" name="customer-id">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Hospital Name (Thai)</label>
                      <input type="text" class="form-control" placeholder="Hospital Name (Thai)" name="hospital-name-th">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Hospital Name (Eng)</label>
                      <input type="text" class="form-control" placeholder="Hospital Name (Eng)" name="hospital-name-eng">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div> <!-- .jumbotron jumbotron-fluid p-3 -->

        <div class="jumbotron jumbotron-fluid p-3">
          
        </div> <!-- .jumbotron jumbotron-fluid p-3 -->

        <div class="jumbotron jumbotron-fluid p-3">
          <div class="container">
            <!-- <h1 class="display-4">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
          </div>
        </div> <!-- .jumbotron jumbotron-fluid p-3 -->

      </div>
    </div> <!-- .tab-content -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

<!--   <script type="text/javascript">
    $('#date-birthday-detail-doctor').datepicker({
      format: "dd-mm-yyyy",
      language: "th"
    })
  </script> -->