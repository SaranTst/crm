
    <div class="cd-content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3" id="header-table">
        <!-- <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-user fa-fw"></i><p>Customer Management</p></a>
        </div> -->
        <div class="col-md-6 pt-2">
          <form class="form-inline md-form form-sm active-pink-2 mt-1">
            <input class="form-control form-control-md mr-3" id="crm-input-search" type="text" placeholder="Search"
              aria-label="Search">
            <a href="javascript:void(0)"><i class="fa fa-search fa-lg"></i></a>
          </form>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>&nbsp; Export to PDF</p></a>
        </div>
        <div class="col-md-3 pt-2">
          <a href="<?php echo base_url(); ?>customer/create_customer" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-plus fa-fw"></i><p>&nbsp; CreateCustomer</p></a>
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
              <td><a href="<?php echo base_url(); ?>customer/read_customer">Chulalongkorn Hospital</a></td>
              <td><a href="<?php echo base_url(); ?>customer/read_customer">โรงพยาบาลจุฬาลงกรณ์</a></td>
              <td>000001</td>
              <td>50,000,000</td>
              <td><div class="rating" data-rate-value="2"></div></td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>customer/read_customer"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">2.</th>
              <td><a href="<?php echo base_url(); ?>customer/read_customer">Chulalongkorn Hospital</a></td>
              <td><a href="<?php echo base_url(); ?>customer/read_customer">โรงพยาบาลจุฬาลงกรณ์</a></td>
              <td>000001</td>
              <td>50,000,000</td>
              <td>
                <i class="fa fa-star select"></i>
                <i class="fa fa-star select"></i>
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
      <div class="row mb-3">
        <div class="col-md-6">
          <small class="text-muted">Showing 1 to 4 of 48 entries</small>
        </div>
        <div class="col-md-6">
          <div class="float-right" id="pagination-customer"></div>
        </div>
      </div>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

  <script type="text/javascript">

    $("#pagination-customer").pagination({
        items: 500,
        itemsOnPage: 10,
        displayedPages: 3,
        edges: 1,
        onPageClick: function(pageNumber) {
            window.location.hash = '#page-'+pageNumber;
            console.log(pageNumber);
      }
    });
  </script>