
    <div class="cd-content-wrapper">
    <div class="container-fluid">
		<div class="row mb-3" id="header-table">
			<div class="col-md-4 pt-2">
			  <a href="javascript:void(0)" class="btn crm-btn-dark-gray btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp; Services Contact</a>
			</div>
			<div class="col-md-5"></div>
      <div class="col-md-3 pt-2">
        <a href="<?php echo base_url(); ?>services/create_service" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-plus fa-fw"></i><p>&nbsp; CreateServices</p></a>
      </div>
		</div> <!-- #header-table -->

		<div class="row">
		  <div class="col-md-12 mb-3">
		    <div class="card">
			  <div class="card-header crm-bg-dark-gray">Search</div>
			  <div class="card-body">
			  	<div class="row">
			  		<div class="col-md-6">
		  			<div class="form-group">
	                    <label>Department</label>
	                    <select class="custom-select" name="department">
	                      <option value="" selected>Select a Department</option>
	                      <option value="1">Department 1</option>
	                      <option value="2">Department 2</option>
	                      <option value="3">Department 3</option>
	                      <option value="4">Department 4</option>
	                      <option value="5">Department 5</option>
	                    </select>
                  	</div>
			  		</div>
			  		<div class="col-md-6">
			  		<div class="form-group">
	                    <label>Zone</label>
	                    <select class="custom-select" name="zone">
	                      <option value="" selected>Select a Zone</option>
	                      <option value="1">Zone 1</option>
	                      <option value="2">Zone 2</option>
	                      <option value="3">Zone 3</option>
	                      <option value="4">Zone 4</option>
	                      <option value="5">Zone 5</option>
	                    </select>
                  	</div>
			  		</div>
			  		<div class="col-md-6">
			  		<div class="form-group">
	                    <label>County</label>
	                    <select class="custom-select" name="county">
	                      <option value="" selected>Select a County</option>
	                      <option value="1">County 1</option>
	                      <option value="2">County 2</option>
	                      <option value="3">County 3</option>
	                      <option value="4">County 4</option>
	                      <option value="5">County 5</option>
	                    </select>
                  	</div>
			  		</div>
			  		<div class="col-md-6">
			  		<div class="form-group">
	                    <label>Position</label>
	                    <select class="custom-select" name="position">
	                      <option value="" selected>Select a Position</option>
	                      <option value="1">Position 1</option>
	                      <option value="2">Position 2</option>
	                      <option value="3">Position 3</option>
	                      <option value="4">Position 4</option>
	                      <option value="5">Position 5</option>
	                    </select>
                  	</div>
			  		</div>
			  		<div class="col-md-6">
			  		<div class="form-group">
	                    <label>Brand</label>
	                    <select class="custom-select" name="brand">
	                      <option value="" selected>Select a Brand</option>
	                      <option value="1">Brand 1</option>
	                      <option value="2">Brand 2</option>
	                      <option value="3">Brand 3</option>
	                      <option value="4">Brand 4</option>
	                      <option value="5">Brand 5</option>
	                    </select>
                  	</div>
			  		</div>
			  		<div class="col-md-6">
			  		<div class="form-group">
	                    <label>Keyword</label>
	                    <input type="text" class="form-control" placeholder="Enter a keyword (Sale name, Nickname)" name="keyword">
                  	</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<dir class="col-md-8"></dir>
			  		<dir class="col-md-2">
		  				<a href="javascript:void(0)" class="btn crm-btn-dark-blue-sales btn-lg btn-block"><p>Search</p></a>
			  		</dir>
			  		<dir class="col-md-2">
		  				<a href="javascript:void(0)" class="btn crm-btn-dark-gray btn-lg btn-block"><p>Reset</p></a>
			  		</dir>
			  	</div>
			  </div>
			</div>
		  </div>
		  <div class="col-md-12">
			<div class="card">
			  <div class="card-header crm-bg-dark-gray">Result</div>
			  <div class="card-body">

			  	<div class="row mb-3">
			  		<div class="col-md-6">
			  			<small class="text-muted">Showing 1 to 4 of 48 entries</small>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="float-right" id="pagination-sales"></div>
			  		</div>
			  	</div>

			  	<div class="row">
			  		<?php for ($i=0; $i < 9; $i++) { ?>
			  		<div class="col-md-4 mb-3">
			  			<div class="card" onclick="show_contact_sales(<?php echo ($i+1); ?>)">
						  <div class="card-body">
						  	<div class="row">
						  		<div class="col-md-4 mb-3 text-center">
						  			<img src="<?php echo base_url(); ?>images/150.png" class="img-fluid rounded-circle">
						  		</div>
						  		<div class="col-md-8">
					  				<p class="crm-card-sale-text crm-card-sale-text-2dark-blue"><b>Medical Innovation Technology</b></p>
					  				<p class="crm-card-sale-text"><b>Jutarat Chanakitkarnchok (Toon)</b></p>
						  		</div>
						  	</div>
						  	<div class="row">
						  		<div class="col-md-12">
						  			<p class="crm-card-sale-text">Marketing Supervisor</p>
						  		</div>
						  		<div class="col-md-12">
						  			<p class="crm-card-sale-text">Email : JutaratC@bjc.co.th</p>
						  		</div>
						  		<div class="col-md-12">
						  			<p class="crm-card-sale-text">Tel : 089-1080988</p>
						  		</div>
						  	</div>
						  </div>
						</div>
			  		</div>
			  		<?php }  ?>
			  	</div>

			  </div>
			</div>
		  </div>
		</div>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

  <!-- Modal Sale Contact -->
  <div id="sale_contact_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-2">
            	<div class="container-fluid">
                <div class="row" id="header-table">
					<div class="col-md-4">
					  <a href="javascript:void(0)" class="btn crm-btn-dark-gray btn-lg btn-block"><i class="fa fa-user fa-fw"></i><p>&nbsp; Sales Contact</p></a>
					</div>
				</div> <!-- #header-table -->
				</div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-fw fa-md"></i></button>
            </div>
            <div class="modal-body">
            	<div class="container-fluid">
	                <div class="row">
						<div class="col-md-3 text-center mb-3">
							<img src="<?php echo base_url(); ?>images/150.png" class="img-fluid rounded-circle">
						</div>
						<div class="col-md-9">
						
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Name - English : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">Jutarat Chanakitkarnchok</p>
								</label>
							</div>
						
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Name - Thai : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">จุฑารัตน์ ชนะกิจการโชค</p>
								</label>
							</div>
					
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Nickname : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">ตูน</p>
								</label>
							</div>
						
							<hr class="mb-3 mt-3" style="width: 100%; color: #CCCCCC; height: 2px; background-color: #CCCCCC; margin-top: 5px; margin-bottom: 5px;" />
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>ID : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">1012678</p>
								</label>
							</div>
						
						
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Department : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">Medical Innovation Technology (MIT)</p>
								</label>
							</div>
						
							
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Position : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">Marketing Supervisor</p>
								</label>
							</div>
							
						
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Zone : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">Central Thailand</p>
								</label>
							</div>
						
				
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>County : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">Bangkok, Ang Thong, Chainat, Lopburi, Nakhonnayok, Nakhonpathom, Nonthaburi</p>
								</label>
				
							</div>
				
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Brand : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">Hitachi, Ziehm, Shimadzu, Hologic</p>
								</label>
							</div>
					
							<hr class="mb-3 mt-3" style="width: 100%; color: #CCCCCC; height: 2px; background-color: #CCCCCC; margin-top: 5px; margin-bottom: 5px;" />
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Tel : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">089-1080988</p>
								</label>
							</div>
					
			
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Email : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text">JutaratC@bjc.co.th</p>
								</label>
							</div>

						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
  </div>

  <script type="text/javascript">

  	$("#pagination-sales").pagination({
        items: 500,
        itemsOnPage: 10,
        displayedPages: 3,
        edges: 1,
        onPageClick: function(pageNumber) {
            window.location.hash = '#page-'+pageNumber;
            console.log(pageNumber);
	    }
    });

    function show_contact_sales(id_dom) {
      $('#sale_contact_modal').find('#header-table div a p').text('Sales Contact ['+id_dom+']');
	  $('#sale_contact_modal').modal('show');
	}
  </script>