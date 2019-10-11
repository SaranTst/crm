
    <div class="cd-content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3" id="header-table">
        <div class="col-md-6 pt-2"></div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>Export to PDF</p></a>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" onclick="$('#create_lists_form')[0].reset();$('#create_lists_modal').modal('show');"><i class="fa fa-plus fa-fw"></i><p>Create Lists</p></a>
        </div>
      </div>

      <div class="row">
        <div class="table-responsive">
        <table class="table table-striped" style="text-align: center;">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name Lists</th>
              <th scope="col">Create Date</th>
              <th scope="col">Update Date</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1.</th>
              <td><a href="<?php echo base_url(); ?>management/lists/Brands">Brands</a></td>
              <td>09-10-2019 17:00</td>
              <td>09-10-2019 21:30</td>
              <td>
                <div class="text-center">
                  <a href="javascript:void(0)" onclick="$('#create_lists_form')[0].reset();$('#create_lists_modal').modal('show');"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>management"><i class="fa fa-times fa-lg"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">2.</th>
              <td><a href="<?php echo base_url(); ?>management/lists/Model">Model</a></td>
              <td>05-10-2019 10:15</td>
              <td>06-10-2019 10:18</td>
              <td>
                <div class="text-center">
                  <a href="javascript:void(0)" onclick="$('#create_lists_form')[0].reset();$('#create_lists_modal').modal('show');"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <a href="<?php echo base_url(); ?>management"><i class="fa fa-times fa-lg"></i></a>
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

  <!-- Modal Create Lists -->
  <div id="create_lists_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Lists</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-fw fa-md"></i></button>
            </div>
            <div class="modal-body">
			      <form id="create_lists_form">
                <div class="form-group">
                    <label>Name Lists</label>
                    <input type="text" class="form-control" placeholder="Name Lists" name="name_lists">
                </div>
            </form>            
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn crm-btn-orange">Create</button>
            </div>
        </div>
    </div>
	</div>