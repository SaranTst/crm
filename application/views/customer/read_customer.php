
    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block">Chulalongkorn Hospital</a>
        </div>
        <div class="col-md-8"></div>
      </div>
    </div> <!-- .container-fluid -->

    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <ul class="nav nav-pills">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>Export to PDF</p></a>
        </div>
      </div>
    </div> <!-- .container-fluid -->

    <div class="tab-content">
      <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
        
        <div class="jumbotron jumbotron-fluid p-3">
          <div class="container-fluid">
              
            <div class="row mb-3">
              <div class="col-md-3">
                <div class="z-depth-1-half text-center">
                  <img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 180px;">
                </div>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>CustomerID</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="text" class="form-control text-center" placeholder="Customer ID" value="000001" disabled>
                      </div>
                      <label class="col-md-2 col-form-label"><p>Rating</p></label>
                      <div class="col-md-3 pt-1 text-center">
                        <i class="fa fa-star select"></i>
                        <i class="fa fa-star select"></i>
                        <i class="fa fa-star select"></i>
                        <i class="fa fa-star-o select"></i>
                        <i class="fa fa-star-o select"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>HospitalName</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="text" class="form-control text-center" placeholder="Hospital Name Eng" value="Chulalongkorn Hospital" disabled>
                      </div>
                      <div class="col-md-5 pt-1">
                        <input type="text" class="form-control text-center" placeholder="Hospital Name Thai" value="โรงพยาบาลจุฬาลงกรณ" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>Orderamount</p></label>
                      <div class="col pt-1">
                        <input type="text" class="form-control text-center" placeholder="Order amount" value="50,000,000" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-3">
                <div class="z-depth-1-half text-center">
                  <img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 180px;">
                </div>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>Name</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="text" class="form-control text-center" placeholder="Name" value="ศ.นพ.สุทธิพงศ์ วัชรสินธุ" disabled>
                      </div>
                      <label class="col-md-3 col-form-label"><p>Relationship</p></label>
                      <div class="col-md-2 pt-1 text-center">
                        <input type="number" class="form-control text-center" placeholder="Relationship" value="4" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>E-mail</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="email" class="form-control text-center" placeholder="E-mail" value="Sutipong@gmail.com" disabled>
                      </div>
                      <label class="col-md-1 col-form-label"><p>Tel.</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="text" class="form-control text-center" placeholder="Tel" value="089-000-0000" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>Date Birthday</p></label>
                      <div class="col pt-1">
                        <input type="date" class="form-control text-center" value="1956-09-12" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-md-3">
                <div class="z-depth-1-half text-center">
                  <img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 180px;">
                </div>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>Name</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="text" class="form-control text-center" placeholder="Name" value="นาย สกัด เหรดีวดเริ่ฟย" disabled>
                      </div>
                      <label class="col-md-3 col-form-label"><p>Relationship</p></label>
                      <div class="col-md-2 pt-1 text-center">
                        <input type="number" class="form-control text-center" placeholder="Relationship" value="4" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>E-mail</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="email" class="form-control text-center" placeholder="E-mail" value="cbfgnsfgn@gmail.com" disabled>
                      </div>
                      <label class="col-md-1 col-form-label"><p>Tel.</p></label>
                      <div class="col-md-4 pt-1">
                        <input type="text" class="form-control text-center" placeholder="Tel" value="089-111-1111" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"><p>Date Birthday</p></label>
                      <div class="col pt-1">
                        <input type="date" class="form-control text-center" value="1966-10-31" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div> <!-- .jumbotron jumbotron-fluid p-3 -->

        <div class="row">
          <div class="col">
            <a href="<?php echo base_url(); ?>customer/more_read_customer" class="btn crm-btn-orange btn-lg btn-block">More Info</a>
          </div>
        </div>


      </div>
    </div> <!-- .tab-content -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->