<div class="jumbotron jumbotron-fluid p-3">
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
        <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-file-pdf-o fa-fw"></i><p>&nbsp; Export to PDF</p></a>
      </div>
      <div class="col-md-3 pt-2">
        <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" onclick="$('#create_brand_form')[0].reset();$('#create_brand_modal').modal('show');"><i class="fa fa-plus fa-fw"></i><p>&nbsp; CreateBrand</p></a>
      </div>
    </div>

    <div class="row">
      <div class="table-responsive">
      <table class="table table-striped" style="text-align: center;">
        <thead>
          <tr>
            <th scope="col-1">No.</th>
            <th scope="col-2">Name</th>
            <th scope="col-2">Logo</th>
            <th scope="col-2">Country</th>
            <th scope="col-2">Team</th>
            <th scope="col-2">Expertise</th>
            <th scope="col-1">Edit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1.</th>
            <td>LAERDAL</td>
            <td><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></td>
            <td>Norway</td>
            <td>LCS1</td>
            <td>Medical Education</td>
            <td>
              <div class="text-center">
                <a href="javascript:void(0)"><i class="fa fa-pencil-square-o fa-lg"></i></a>
              </div>
            </td>
          </tr>
          <tr>
            <th scope="row">2.</th>
            <td>KYOTO KAGAKU</td>
            <td><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></td>
            <td>JAPAN</td>
            <td>LCS1</td>
            <td>Medical Education</td>
            <td>
              <div class="text-center">
                <a href="javascript:void(0)"><i class="fa fa-pencil-square-o fa-lg"></i></a>
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
        <div class="float-right" id="pagination-brand"></div>
      </div>
    </div>

  </div>
</div> <!-- .jumbotron jumbotron-fluid p-3 -->

<!-- Modal Create Brand -->
<div id="create_brand_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Create Brand</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-fw fa-md"></i></button>
          </div>
          <div class="modal-body">
          <form id="create_brand_form">
            <div class="row">
              <div class="col-md-3 mb-3">
                <div class="z-depth-1-half text-center">
                  <img src="<?php echo base_url(); ?>images/180.png" id="preview-brand" class="img-thumbnail" style="height: 180px;">
                </div>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-brand" disabled>
                      <ul class="mb-4">
                        <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                        <li><small class="text-muted">*Please select the picture first</small></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <input id="input-file-brand" type="file" name="logo" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                    <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview('input-file-brand' ,'show-file-name-brand' ,'preview-brand')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Vender Name</label>
                      <input type="text" class="form-control" placeholder="Vender Name" name="vender_name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Country</label>
                      <input type="text" class="form-control" placeholder="Country" name="country">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Team</label>
                  <input type="text" class="form-control" placeholder="Team" name="team">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Expertise</label>
                  <select class="custom-select" name="expertise">
                    <option value="" selected disabled hidden>Choose Expertise</option>
                    <?php foreach (ARR_EXPERTISE as $key => $value) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Solution/Equipment</label>
                  <input type="text" class="form-control" placeholder="Solution/Equipment" name="solution_equipment">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" placeholder="Address" name="address">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Website</label>
                  <input type="text" class="form-control" placeholder="Website" name="website">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contact Person RA</label>
                  <input type="text" class="form-control" placeholder="Contact Person RA" name="contact_person_ra">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contact Inter Support</label>
                  <input type="text" class="form-control" placeholder="Contact Inter Support" name="contact_inter_support">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Manufacturing</label>
                  <input type="text" class="form-control" placeholder="Manufacturing" name="manufacturing">
                </div>
              </div>
            </div>
          </form>            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn crm-btn-orange">Create</button>
          </div>
      </div>
  </div>
  </div>

  <script type="text/javascript">

    $("#pagination-brand").pagination({
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