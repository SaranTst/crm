
    <div class="cd-content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3" id="header-table">
        <div class="col-md-6 pt-2">
          <form class="form-inline md-form form-sm active-pink-2 mt-1">
            <input class="form-control form-control-md mr-3" id="crm-input-search" type="text" placeholder="Search"
              aria-label="Search">
            <a href="javascript:void(0)"><i class="fa fa-search fa-lg"></i></a>
          </form>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>Export to PDF</p></a>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" onclick="$('#create_sale_form')[0].reset();$('#create_sale_modal').modal('show');"><i class="fa fa-plus fa-fw"></i><p>Create Sale</p></a>
        </div>
      </div>

      <div class="row">
        <div class="table-responsive">
        <table class="table table-striped" style="text-align: center;">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Role</th>
              <th scope="col">Create Date</th>
              <th scope="col">Update Date</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1.</th>
              <td>นายภาณุวัฒน์ พวงทอง</td>
              <td>Super Admin</td>
              <td>07-10-2019 09:45</td>
              <td>08-10-2019 13:00</td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>add_sales/create_sales"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>add_sales"><i class="fa fa-times fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">2.</th>
              <td>นางสาวเมธาวดี ไมอักรี</td>
              <td>Admin</td>
              <td>08-10-2019 10:00</td>
              <td>08-10-2019 15:30</td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>add_sales/create_sales"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>add_sales"><i class="fa fa-times fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">3.</th>
              <td>นายอนุพล  พูลสุข</td>
              <td>Viewer</td>
              <td>09-10-2019 17:00</td>
              <td>09-10-2019 21:30</td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>add_sales/create_sales"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>add_sales"><i class="fa fa-times fa-lg"></i></a>
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

  <!-- Modal Create Sale -->
  <div id="create_sale_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Sale</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <form id="create_sale_form">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Role</label>
                        <select class="custom-select" name="role">
                          <option selected>Choose Role</option>
                          <option value="1">Super Admin</option>
                          <option value="2">Admin</option>
                          <option value="3">Viewer</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm-password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first-name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last-name">
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn crm-btn-orange">Create</button>
            </div>
        </div>
    </div>
  </div>