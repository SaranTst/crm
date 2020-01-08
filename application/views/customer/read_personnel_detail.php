
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header">
                <div class="row text-center">
                  <div class="col-md-1">No.</div>
                  <div class="col-md-2">Image</div>
                  <div class="col-md-2">Name - Surname (Thai)</div>
                  <div class="col-md-1">Brands</div>
                  <div class="col-md-1">Model</div>
                  <div class="col-md-2">Status</div>
                  <div class="col-md-2">Relationship</div>
                  <div class="col-md-1"></div>
                </div>
              </div>
            </div>

            <?php if ($datas['status']==1 && isset($datas['data'][0]['personnel_detail']) && sizeof($datas['data'][0]['personnel_detail'])>0) { 
                  foreach ($datas['data'][0]['personnel_detail'] as $key => $value) { ?>
            <div class="card">
              <div class="card-header card-header-hover" id="heading-<?php echo ($key+1); ?>">
                <div class="row text-center" data-toggle="collapse" data-target="#collapse<?php echo ($key+1); ?>">
                  <div class="col-md-1"><?php echo ($key+1).'.'; ?></div>
                  <div class="col-md-2"><img src="<?php echo $value['IMAGE'] ? base_url().$value['IMAGE'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 75px;"></div>
                  <div class="col-md-2"><?php echo $value['FIRST_NAME_TH'].' '.$value['LAST_NAME_TH']; ?></div>
                  <div class="col-md-1"><?php echo $value['BRANDS_VENDOR_NAME']; ?></div>
                  <div class="col-md-1"><?php echo $value['MODEL']; ?></div>
                  <div class="col-md-2"><button type="button" class="<?php echo ARR_STATUS_BTN[$value['STATUS']]; ?>"><?php echo ARR_STATUS_TH[$value['STATUS']]; ?></button></div>
                  <div class="col-md-2">
                    <?php 
                    for ($i=1; $i<=5; $i++) { 
                      if ($value['RELATIONSHIP']>=$i) {
                        echo '<i class="fa fa-star select"></i>'; 
                      }else{
                        echo '<i class="fa fa-star-o select"></i>'; 
                      }
                    } ?>
                  </div>
                  <div class="col-md-1" id="collapse-click"><i class="fa fa-plus fa-lg"></i></div>
                </div>
              </div>
              <div id="collapse<?php echo ($key+1); ?>" class="collapse" aria-labelledby="heading-<?php echo ($key+1); ?>" data-parent="#accordionExample">
                <div class="card-body-fluid">
                  <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container-fluid">

                      <div class="row mb-3">
                        <div class="col-md-12">
                          <img src="<?php echo base_url().'images/step/step-'.$value['STATUS'].'.png'; ?>" class="img-fluid">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                          <h3 id="id-jumbotron-personnel"><?php echo ($key+1).'.'; ?></h3>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-md-5 col-form-label">Relationship</label>
                            <div class="col-md pt-1 text-center">
                              <?php 
                              for ($i=1; $i<=5; $i++) { 
                                if ($value['RELATIONSHIP']>=$i) {
                                  echo '<i class="fa fa-star select"></i>'; 
                                }else{
                                  echo '<i class="fa fa-star-o select"></i>'; 
                                }
                              } ?>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="z-depth-1-half text-center">
                            <img src="<?php echo $value['IMAGE'] ? base_url().$value['IMAGE'] : base_url().'images/180.png'; ?>" class="img-thumbnail" style="height: 180px;">
                          </div>
                        </div>
                        <div class="col-md-6 mt-3">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Prefix</label>
                                <input type="text" class="form-control" placeholder="Prefix" value="<?php echo ARR_PREFIX_TH[$value['PREFIX']]; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" placeholder="Position" value="<?php echo ARR_POSITION[$value['POSITION_ID']]; ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Thai)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Thai)" value="<?php echo $value['FIRST_NAME_TH'].' '.$value['LAST_NAME_TH']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Eng)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Eng)" value="<?php echo $value['FIRST_NAME_ENG'].' '.$value['LAST_NAME_ENG']; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" placeholder="E-mail" value="<?php echo $value['EMAIL']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tel.</label>
                            <input type="text" class="form-control" placeholder="Tel." value="<?php echo $value['TELEPHONE']; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label>Date Birthday</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="<?php echo $value['BIRTHDAY']; ?>" readonly>
                            </div>
                            <div class="col text-center">
                              <i class="fa fa-calendar fa-lg"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control" placeholder="Gender" value="<?php echo ARR_GENDER_TH[$value['GENDER']]; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Salesperson</label>
                            <input type="text" class="form-control" placeholder="Salesperson" value="<?php echo $value['SALES_FIRST_NAME_TH'].' '.$value['SALES_LAST_NAME_TH']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Channal</label>
                            <input type="text" class="form-control" placeholder="Contact Channal" value="<?php echo ARR_CONTACT_CHANNAL[$value['CONTACT_CHANNAL']]; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Event</label>
                            <input type="text" class="form-control" placeholder="Event" value="<?php echo $value['EVENT']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Date Stamp</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="<?php echo $value['DATE_STAMP']; ?>" readonly>
                            </div>
                            <div class="col text-center">
                              <i class="fa fa-calendar fa-lg"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Brands</label>
                            <input type="text" class="form-control" placeholder="Brands" value="<?php echo $value['BRANDS_VENDOR_NAME']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Model</label>
                            <input type="text" class="form-control" placeholder="Model" value="<?php echo $value['MODEL']; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" placeholder="Status" value="<?php echo ARR_STATUS_TH[$value['STATUS']]; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Confident (%)</label>
                            <input type="text" class="form-control" placeholder="Confident (%)" value="<?php echo ARR_CONFIDENT[$value['CONFIDENT']]; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" class="form-control" placeholder="Remarks" value="<?php echo $value['REMARKS']; ?>" readonly>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div> <!-- .jumbotron jumbotron-fluid mb-0 -->
                </div>
              </div>
            </div>
            <?php }
            } ?>
            
            <div class="card">
              <div class="card-header">
                <div class="row text-center">
                  <div class="col-md">
                  <div class="form-group row">
                    <button type="button" class="btn crm-btn-light-purple">นำเสนอลูกค้า</button>
                    <button type="button" class="btn crm-btn-purple">สาธิตสินค้า</button>
                    <button type="button" class="btn crm-btn-dark-blue">ต่อรองราคา</button>
                    <button type="button" class="btn crm-btn-blue">ประมูลราคา</button>
                    <button type="button" class="btn crm-btn-dark-green">ชนะประมูล</button>
                    <button type="button" class="btn crm-btn-light-green">ทำสัญญา</button>
                    <button type="button" class="btn crm-btn-yellow">ออกบิลแล้ว</button>
                    <button type="button" class="btn crm-btn-light-orange">ส่งของแล้ว</button>
                    <button type="button" class="btn crm-btn-dark-orange">ตรวจรับ</button>
                    <button type="button" class="btn crm-btn-light-red">แพ้ประมูล</button>
                    <button type="button" class="btn crm-btn-pink">เกินกำหนดการส่งสินค้า</button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- .accordion -->

<script>
    $(document).ready(function(){
      // Add minus icon for collapse element which is open by default
      $(".collapse.show").each(function(){
        $(this).prev(".card-header").find("#collapse-click .fa").addClass("fa-minus").removeClass("fa-plus");
        $(this).prev(".card-header").addClass("active-card-header-hover");
      });
      
      // Toggle plus minus icon on show hide of collapse element
      $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find("#collapse-click .fa").removeClass("fa-plus").addClass("fa-minus");
        $(this).prev(".card-header").addClass("active-card-header-hover");
      }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find("#collapse-click .fa").removeClass("fa-minus").addClass("fa-plus");
        $(this).prev(".card-header").removeClass("active-card-header-hover");
      });
    });
</script>