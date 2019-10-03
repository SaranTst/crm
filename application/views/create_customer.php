
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
          <a href="" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-arrow-right fa-fw"></i><p>More info</p></a>
        </div>
        <div class="col-md-2 col-sm-12 mb-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-check fa-fw"></i><p>SUMMIT</p></a>
        </div>
      </div>
    </div> <!-- .container-fluid -->

    <div class="tab-content">
      <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
        
        <div class="jumbotron jumbotron-fluid">
          <div class="container-fluid">
            <form id="detail-hospital">
            <div class="row">
            
              <div class="col-md-4 col-sm-12">Span 1</div>
              <div class="col-md-3 col-sm-12">Span 2</div>
              <div class="col-md-5 col-sm-12">
                <!-- <div class="short-div" style="background-color:green">Span 1</div>
                <div class="short-div" style="background-color:purple">Span 2</div>
                <div class="short-div" style="background-color:purple">Span 3</div>
                <div class="short-div" style="background-color:purple">Span 4</div> -->
                <div class="col-md-12 col-sm-12">
                  <div class="row">
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
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Customer ID</label>
                    <input type="text" class="form-control" placeholder="Customer ID" name="customer-id">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Hospital Name (Thai)</label>
                    <input type="text" class="form-control" placeholder="Hospital Name (Thai)" name="hospital-name-th">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Hospital Name (Eng)</label>
                    <input type="text" class="form-control" placeholder="Hospital Name (Eng)" name="hospital-name-eng">
                  </div>
                </div>
              </div>
           
            </div>
            </form>

          </div>
        </div> <!-- .jumbotron jumbotron-fluid -->

        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
          </div>
        </div> <!-- .jumbotron jumbotron-fluid -->

        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
          </div>
        </div> <!-- .jumbotron jumbotron-fluid -->

      </div>
    </div> <!-- .tab-content -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->