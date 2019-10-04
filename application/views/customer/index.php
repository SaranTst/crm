
    <div class="cd-content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3" id="header-table">
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-2">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-user fa-fw"></i> <p>Customer Management</p></a>
        </div>
        <div class="col-xl-5 col-lg-8 col-md-8 col-sm-12 mb-2">
          <form class="form-inline md-form form-sm active-pink-2 mt-1">
            <input class="form-control form-control-md mr-3" id="crm-input-search" type="text" placeholder="Search"
              aria-label="Search">
            <a href="#"><i class="fa fa-search fa-lg"></i></a>
          </form>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mb-2">
          <a href="" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>Export to PDF</p></a>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mb-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-plus fa-fw"></i><p>Create Customer</p></a>
        </div>
      </div>

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
          <tbody>
            <tr>
              <th scope="row">1.</th>
              <td>Chulalongkorn Hospital</td>
              <td>โรงพยาบาลจุฬาลงกรณ์</td>
              <td>000001</td>
              <td>50,000,000</td>
              <td><div class="rating"></div></td>
              <td>
                <div class="text-center">
                  <a href="#"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">2.</th>
              <td>Chulalongkorn Hospital</td>
              <td>โรงพยาบาลจุฬาลงกรณ์</td>
              <td>000001</td>
              <td>50,000,000</td>
              <td><div class="rating" data-rate-value="2"></div></td>
              <td>
                <div class="text-center">
                  <a href="#"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">3.</th>
              <td>Chulalongkorn Hospital</td>
              <td>โรงพยาบาลจุฬาลงกรณ์</td>
              <td>000001</td>
              <td>50,000,000</td>
              <td><div class="rating"></div></td>
              <td>
                <div class="text-center">
                  <a href="#"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">4.</th>
              <td>Chulalongkorn Hospital</td>
              <td>โรงพยาบาลจุฬาลงกรณ์</td>
              <td>000001</td>
              <td>50,000,000</td>
              <td>
                <i class="fa fa-star select"></i>
                <i class="fa fa-star select"></i>
                <i class="fa fa-star-o select"></i>
              </td>
              <td>
                <div class="text-center">
                  <a href="#"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->