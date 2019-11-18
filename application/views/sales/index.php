
    <div class="cd-content-wrapper">
    <div class="container-fluid">
		<div class="row mb-3" id="header-table">
			<div class="col-md-4 pt-2">
			  <a href="javascript:void(0)" class="btn crm-btn-dark-gray btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp;Sales Contact</a>
			</div>
			<div class="col-md-5"></div>
			<div class="col-md-3 pt-2">
				<a href="<?php echo base_url(); ?>sales/create_sale" class="btn crm-btn-orange btn-lg btn-block"><i class="fa fa-plus fa-fw"></i><p>&nbsp;CreateSale</p></a>
			</div>
		</div> <!-- #header-table -->

	  	<?php 
	  	// Cehack Datas
	  	if ($datas['status']==1) {
          $data = $datas['data'];
          $total = $datas['total'];
          $limit = $datas['limit'];
        }else {
          $data = array();
          $limit = 10;
          $total = 10;
        } 

        // Check Brand
        if ($brands['status']==1) {
          $data_brand = $brands['data'];
        }else {
          $data_brand = array();
        } 
        ?>
		<div class="row">
		  <div class="col-md-12 mb-3">
		    <div class="card">
			  <div class="card-header crm-bg-dark-gray">Search</div>
			  <div class="card-body">
			  	<form id="frm_serach" onsubmit="return false;">
				  	<div class="row">
				  		<div class="col-md-6">
			  			<div class="form-group">
		                    <label>Department</label>
		                    <select class="custom-select" name="department_id">
		                      <option value="" selected readonly hidden>Choose Department</option>
		                      <?php foreach (ARR_DEPARTMENT_TH as $key => $value) { ?>
		                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
		                      <?php } ?>
		                    </select>
	                  	</div>
				  		</div>
				  		<div class="col-md-6">
				  		<div class="form-group">
		                    <label>Zone</label>
		                    <select class="custom-select" name="zone_id">
		                      <option value="" selected readonly hidden>Choose Zone</option>
		                      <?php foreach (ARR_ZONE as $key => $value) { ?>
		                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
		                      <?php } ?>
		                    </select>
	                  	</div>
				  		</div>
				  		<div class="col-md-6">
	                  	<div class="form-group">
		                    <label>Brand</label>
		                    <select class="custom-select" name="brand_id">
		                      <option value="" selected readonly hidden>Select a Brand</option>
		                      <?php foreach ($data_brand as $key => $value) { ?>
		                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
		                      <?php } ?>
		                    </select>
	                  	</div>
				  		</div>
				  		<div class="col-md-6">
				  		<div class="form-group">
		                    <label>Position</label>
		                    <select class="custom-select" name="position_id">
		                    <option value="" selected readonly hidden>Select a Position</option>
							<?php foreach (ARR_POSITION as $key => $value) { 
								if (!empty(ARR_POSITION_OPTGROUP[$key])) {
									echo '<optgroup label="'.ARR_POSITION_OPTGROUP[$key].'">';
									echo '<option value="'.$key.'">'.$value.'</option>';
								}else{
									echo '<option value="'.$key.'">'.$value.'</option>';
								}
							} ?>
							</select>
	                  	</div>
				  		</div>
				  		<div class="col-md-6">
				  		<div class="form-group">
		                    <label>County</label>
		                    <input type="text" class="form-control" placeholder="Enter a County" name="county">
	                  	</div>
				  		</div>
				  		<div class="col-md-6">
				  		<div class="form-group">
		                    <label>Keyword</label>
		                    <input type="text" class="form-control" placeholder="Enter a keyword (Sale name, Nickname)" name="keyword">
	                  	</div>
				  		</div>
				  	</div>
				</form>
			  	<div class="row">
			  		<dir class="col-md-8"></dir>
			  		<dir class="col-md-2">
		  				<a href="javascript:void(0)" class="btn crm-btn-dark-blue-sales btn-lg btn-block" id="btn-search"><p>Search</p></a>
			  		</dir>
			  		<dir class="col-md-2">
		  				<a href="javascript:void(0)" class="btn crm-btn-dark-gray btn-lg btn-block" id="btn-reset"><p>Reset</p></a>
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
			  			<?php $current_page = $this->input->get('page') ? $this->input->get('page') : 1; ?>
			  			<small class="text-muted" id="text-showing">Showing <?php echo $current_page; ?> to <?php echo ($current_page*$limit)>$total ? $total : ($current_page*$limit); ?> of <?php echo $total; ?> entries</small>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="float-right" id="pagination-sales"></div>
			  		</div>
			  	</div>

			  	<div class="row" id="content-result">
			  		<?php foreach ($data as $key => $value) { ?>
			  		<div class="col-md-4 mb-3">
			  			<div class="card">

			  			  <div class="card-header pt-0 pb-0">
						  	  <a href="javascript:void(0)" id="link-delete" onclick='btn_delete(<?php echo $value['ID']; ?>)'><i class="fa fa-times fa-lg float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
	      					  <a href="<?php echo base_url().'sales/update_sale/'.$value['ID']; ?>" id="link-update"><i class="fa fa-pencil-square-o fa-lg float-right p-1 my-1 mr-2" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
					  	  </div>
						  <div class="card-body" onclick='show_contact_sales(<?php echo json_encode($value); ?>)'>
						  	<div class="row">
						  		<div class="col-md-4 mb-3 text-center">
						  			<img src="<?php echo $value['IMAGE'] ? base_url().$value['IMAGE'] : base_url().'images/150.png'; ?>" class="img-fluid rounded-circle">
						  		</div>
						  		<div class="col-md-8">
					  				<p class="crm-card-sale-text crm-card-sale-text-2dark-blue" id="txt-department"><b><?php echo ARR_DEPARTMENT_TH[$value['DEPARTMENT_ID']]; ?></b></p>
					  				<p class="crm-card-sale-text" id="txt-name-nickname"><b><?php echo $value['FIRST_NAME_ENG'].' '.$value['LAST_NAME_ENG'].' ('.$value['NICKNAME_ENG'].')'; ?></b></p>
						  		</div>
						  	</div>
						  	<div class="row">
						  		<div class="col-md-12">
						  			<p class="crm-card-sale-text" id="txt-position"><?php echo ARR_POSITION[$value['POSITION_ID']]; ?></p>
						  		</div>
						  		<div class="col-md-12">
						  			<p class="crm-card-sale-text" id="txt-email">Email : <?php echo $value['EMAIL']; ?></p>
						  		</div>
						  		<div class="col-md-12">
						  			<p class="crm-card-sale-text" id="txt-telephone">Tel : <?php echo $value['TELEPHONE']; ?></p>
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
					  <a href="javascript:void(0)" class="btn crm-btn-dark-gray btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i><p>&nbsp; Sales Contact</p></a>
					</div>
				</div> <!-- #header-table -->
				</div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-fw fa-md"></i></button>
            </div>
            <div class="modal-body">
            	<div class="container-fluid">
	                <div class="row">
						<div class="col-md-3 text-center mb-3">
							<img src="<?php echo base_url(); ?>images/150.png" class="img-fluid rounded-circle" id="modal-image">
						</div>
						<div class="col-md-9">
						
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Name - English : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-name-eng">Jutarat Chanakitkarnchok</p>
								</label>
							</div>
						
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Name - Thai : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-name-th">จุฑารัตน์ ชนะกิจการโชค</p>
								</label>
							</div>
					
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Nickname : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-nickname">ตูน</p>
								</label>
							</div>
						
							<hr class="mb-3 mt-3" style="width: 100%; color: #CCCCCC; height: 2px; background-color: #CCCCCC; margin-top: 5px; margin-bottom: 5px;" />
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>ID : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-id">1012678</p>
								</label>
							</div>
						
						
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Department : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-department">Medical Innovation Technology (MIT)</p>
								</label>
							</div>
						
							
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Position : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-position">Marketing Supervisor</p>
								</label>
							</div>
							
						
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Zone : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-zone">Central Thailand</p>
								</label>
							</div>
						
				
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>County : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-county">Bangkok, Ang Thong, Chainat, Lopburi, Nakhonnayok, Nakhonpathom, Nonthaburi</p>
								</label>
				
							</div>
				
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Brand : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-brand">Hitachi, Ziehm, Shimadzu, Hologic</p>
								</label>
							</div>
					
							<hr class="mb-3 mt-3" style="width: 100%; color: #CCCCCC; height: 2px; background-color: #CCCCCC; margin-top: 5px; margin-bottom: 5px;" />
					
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Tel : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-telephone">089-1080988</p>
								</label>
							</div>
					
			
							<div class="form-group row mb-0">
								<label class="col-md-4">
									<p class="crm-modal-sale-text"><b>Email : </b></p>
								</label>
								<label class="col-md-8">
									<p class="crm-modal-sale-text" id="modal-email">JutaratC@bjc.co.th</p>
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

  	var ARR_DEPARTMENT_TH = <?php echo json_encode(ARR_DEPARTMENT_TH); ?>;
  	var ARR_POSITION = <?php echo json_encode(ARR_POSITION); ?>;
  	var ARR_ZONE = <?php echo json_encode(ARR_ZONE); ?>;
  	var ARR_BRAND = <?php echo json_encode($data_brand); ?>;

  	$(document).ready(function(){ 

  		window.history.replaceState(null, null, window.location.pathname); // remove all url param

	  	var total = <?php echo $total; ?>;
	  	var perpage = <?php echo $limit; ?>;
	  	var current_page = <?php echo $current_page; ?>;
	  	set_pagination(current_page, total, perpage); // set pagination firsttime

	    $('#btn-search').click(function(){
			ajax_data();
	    });

	    $('#btn-reset').click(function(){
	    	$('form#frm_serach')[0].reset();
	    	ajax_data();
	    });

		$("#sale_contact_modal").on('hide.bs.modal', function() { 
	        $('#sale_contact_modal').find('#modal-image').attr('src',base_url+'images/150.png');
	    });

	});

	    function show_contact_sales(values) {
			if (values.IMAGE) {
				$('#sale_contact_modal').find('#modal-image').attr('src',base_url+values.IMAGE);
			}
			$('#sale_contact_modal').find('#modal-name-eng').text(values.FIRST_NAME_ENG+' '+values.LAST_NAME_ENG);
			$('#sale_contact_modal').find('#modal-name-th').text(values.FIRST_NAME_TH+' '+values.LAST_NAME_TH);
			$('#sale_contact_modal').find('#modal-nickname').text(values.NICKNAME_ENG);
			$('#sale_contact_modal').find('#modal-id').text(values.ID_EMPLOYEE);
			$('#sale_contact_modal').find('#modal-department').text(ARR_DEPARTMENT_TH[values.DEPARTMENT_ID]);
			$('#sale_contact_modal').find('#modal-position').text(ARR_POSITION[values.POSITION_ID]);
			$('#sale_contact_modal').find('#modal-zone').text(ARR_ZONE[values.ZONE_ID]);
			$('#sale_contact_modal').find('#modal-county').text(values.COUNTY);
			$('#sale_contact_modal').find('#modal-brand').text(ARR_BRAND[values.BRAND_ID]);
			$('#sale_contact_modal').find('#modal-telephone').text(values.TELEPHONE);
			$('#sale_contact_modal').find('#modal-email').text(values.EMAIL);

			$('#sale_contact_modal').modal('show');
		}

		function ajax_data(pageNumber=1) {

		    var url = base_url+'api/sales/lists_sales?page='+pageNumber;
	    	var formDataArr = $("form#frm_serach").serializeArray();
			var formData = {};
			for (var i = 0; i < formDataArr.length; i++){
				if (formDataArr[i]['value']) {
				  formData[formDataArr[i]['name']] = formDataArr[i]['value'];
				}
			}

	        $.ajax({
	            url: url,
	            type:"POST",
	            data: formData,
	            dataType:"json",
	            success: function( resp ){

	                if (resp.status==1) {

	                	var content_result = $('#content-result').children().last().clone();
	                	$('#content-result').children().remove();
	                	var data = resp.data;
	                	$.each(data, function(i, v){

	                		content_result.find('#link-update').attr('href', base_url+'sales/update_sale/'+v.ID);
	                		content_result.find('#link-delete').attr('onclick', 'btn_delete('+v.ID+')');
	                		content_result.find('.card-body').attr('onclick', 'show_contact_sales('+JSON.stringify(v)+')');
	                		if (v.IMAGE=='' || v.IMAGE===null) {
	                			content_result.find('img').attr('src', base_url+'images/150.png');
	                		}else{
	                			content_result.find('img').attr('src', base_url+v.IMAGE);
	                		}
	                		content_result.find('#txt-department').html('<b>'+ARR_DEPARTMENT_TH[v.DEPARTMENT_ID]+'</b>');
	                		content_result.find('#txt-name-nickname').html('<b>'+v.FIRST_NAME_ENG+' '+v.LAST_NAME_ENG+' ('+v.NICKNAME_ENG+') </b>');
	                		content_result.find('#txt-position').text(ARR_POSITION[v.POSITION_ID]);
	                		content_result.find('#txt-email').text('Email : '+v.EMAIL);
	                		content_result.find('#txt-telephone').text('Tel : '+v.TELEPHONE);

	                		// append DOM
	                		content_result.appendTo('#content-result');

	                		// clone DOM last content-result
	                		content_result = $('#content-result').children().last().clone();
	                	})

	                	// set pagination
                		set_pagination(pageNumber, resp.total, resp.limit);

	                }else{
	                  Swal.fire({
	                    title: 'Warning!',
	                    text: resp.message,
	                    type: 'warning'
	                  }).then((result) => {
	                    if (result.value || result.dismiss) {
	                      $('form#frm_serach')[0].reset();
	                      ajax_data();
	                    }
	                  })
	                }
	            },
	            error: function( jqXhr, textStatus, errorThrown ){
					Swal.fire({
						title: jqXhr.status,
						text: errorThrown,
						type: 'error'
					})
	            }
	        });
		}

		function ajax_delete(id) {

		    var url = base_url+'api/sales/delete_sales/'+id;
		    var formData = {};
			formData['USER_DELETE'] = ID_LOGIN;

	        $.ajax({
	            url: url,
	            type:"POST",
	            data: formData,
	            dataType:"json",
	            success: function( resp ){

	                if (resp.status==1) {
						Swal.fire({
							type: 'success',
							title: resp.message,
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})

						ajax_data($('#pagination-sales').pagination('getCurrentPage'));
	                }else{
						Swal.fire({
							title: 'Warning!',
							text: resp.message,
							type: 'warning'
						})
	                }
	            },
	            error: function( jqXhr, textStatus, errorThrown ){
					Swal.fire({
						title: jqXhr.status,
						text: errorThrown,
						type: 'error'
					})
	            }
	        });
		}

		function btn_delete(id) {
			Swal.fire({
				title: 'Are you sure?',
				text: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'No',
			}).then((result) => {
			  if (typeof result.dismiss === "undefined") {
			  	ajax_delete(id);
			  }
			})
		}

		function set_pagination(currentpage=1,total,limit) {

			$("#pagination-sales").pagination({
		        items: total,
		        itemsOnPage: limit,
		        displayedPages: 3,
		        edges: 1,
		        hrefTextPrefix: "#page=",
		        onPageClick: function(pageNumber) {
		            ajax_data(pageNumber);
			    }
		    });
		    $('#pagination-sales').pagination('drawPage', currentpage);

		    // set text showing pagination
		    set_showing_text(currentpage,total,limit);
		}

		function set_showing_text(currentpage=1,total,limit) {

        	var showing = ( ((currentpage-1) * limit)>0 ? ((currentpage-1) * limit)+1 : 1 );
        	var showing_to = ( (currentpage * limit)<total ? (currentpage * limit) : total );
        	$("#text-showing").text('Showing '+showing+' to '+showing_to+' of '+total+' entries');
		}


  </script>