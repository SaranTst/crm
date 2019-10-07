
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <ul class="nav nav-pills">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          
        </div>
        <div class="col-md-2">
          <a href="<?php echo base_url(); ?>customer/more_create_customer" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-arrow-right fa-fw"></i><p>More info</p></a>
        </div>
        <div class="col-md-2">
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
                <div class="col-md-8">
                  <h3>1.Detail Hospital</h3>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Rating</label>
                    <div class="col">
                      <select class="custom-select" name="rating">
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
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-hospital" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-hospital" type="file" name="img-hospital[]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview('input-file-hospital' ,'show-file-name-hospital' ,'preview-hospital')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Customer ID</label>
                        <input type="text" class="form-control" placeholder="Customer ID" name="customer-id">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Hospital Name (Thai)</label>
                        <input type="text" class="form-control" placeholder="Hospital Name (Thai)" name="hospital-name-th">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Order amount</label>
                    <input type="text" class="form-control" placeholder="Order amount" name="order-amount">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Hospital Name (Eng)</label>
                    <input type="text" class="form-control" placeholder="Hospital Name (Eng)" name="hospital-name-eng">
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div> <!-- .jumbotron jumbotron-fluid p-3 -->

        <div class="jumbotron jumbotron-fluid p-3">
          <div class="container-fluid">
            <form id="detail-doctor">

              <div class="row">
                <div class="col-md-7">
                  <h3>2.Detail Doctor</h3>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-4 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="relationship-doctor">
                        <option selected>Choose Relationship</option>
                        <option value="1">Relationship 1</option>
                        <option value="2">Relationship 2</option>
                        <option value="3">Relationship 3</option>
                        <option value="4">Relationship 4</option>
                        <option value="5">Relationship 5</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-doctor" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-doctor" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-doctor" type="file" name="img-doctor[]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview('input-file-doctor' ,'show-file-name-doctor' ,'preview-doctor')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ผอ.รพ. Name - Surname</label>
                        <input type="text" class="form-control" placeholder="ผอ.รพ. Name - Surname" name="name-surname">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" placeholder="E-mail" name="e-mail">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="date-birthday-doctor" id="date-birthday-doctor">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel</label>
                    <input type="text" class="form-control" placeholder="Telephone" name="telephone">
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div> <!-- .jumbotron jumbotron-fluid p-3 -->

        <div class="jumbotron jumbotron-fluid p-3">
          <div class="container-fluid">
            <form id="detail-purchase">

              <div class="row">
                <div class="col-md-7">
                  <h3>3.Detail Purchase</h3>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-4 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="relationship-purchase">
                        <option selected>Choose Relationship</option>
                        <option value="1">Relationship 1</option>
                        <option value="2">Relationship 2</option>
                        <option value="3">Relationship 3</option>
                        <option value="4">Relationship 4</option>
                        <option value="5">Relationship 5</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-purchase" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-purchase" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-purchase" type="file" name="img-purchase[]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview('input-file-purchase' ,'show-file-name-purchase' ,'preview-purchase')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>จัดซื้อ Name - Surname (Thai)</label>
                        <input type="text" class="form-control" placeholder="ผอ.รพ. Name - Surname" name="name-surname">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" placeholder="E-mail" name="e-mail">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="date-birthday-purchase" id="date-birthday-purchase">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel</label>
                    <input type="text" class="form-control" placeholder="Telephone" name="telephone">
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div> <!-- .jumbotron jumbotron-fluid p-3 -->

      </div>
    </div> <!-- .tab-content -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

  <script type="text/javascript">
    $('#date-birthday-doctor').datepicker({
      format: "dd-mm-yyyy",
      language: "th",
      autoclose: true
    })

    $('#date-birthday-purchase').datepicker({
      format: "dd-mm-yyyy",
      language: "th",
      autoclose: true
    })
  </script>