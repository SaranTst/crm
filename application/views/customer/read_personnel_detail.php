
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

            <div class="card">
              <div class="card-header card-header-hover" id="headingOne">
                <div class="row text-center" data-toggle="collapse" data-target="#collapseOne">
                  <div class="col-md-1">1.</div>
                  <div class="col-md-2"><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></div>
                  <div class="col-md-2">XXXX XXXXXXXXXX</div>
                  <div class="col-md-1">Hitachi</div>
                  <div class="col-md-1">Lisendo 880</div>
                  <div class="col-md-2"><button type="button" class="btn crm-btn-purple">นำเสนอลูกค้า</button></div>
                  <div class="col-md-2">
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star-o select"></i>
                    <i class="fa fa-star-o select"></i>
                  </div>
                  <div class="col-md-1" id="collapse-click"><i class="fa fa-plus fa-lg"></i></div>
                </div>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body-fluid">
                  <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container-fluid">

                      <div class="row mb-3">
                        <div class="col-md-12">
                          <img src="<?php echo base_url(); ?>images/login/Icon-BJHMedical.png" class="img-fluid">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                          <h3 id="id-jumbotron-personnel">1.</h3>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-md-5 col-form-label">Relationship</label>
                            <div class="col-md pt-1 text-center">
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star-o select"></i>
                              <i class="fa fa-star-o select"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="z-depth-1-half text-center">
                            <img src="<?php echo base_url(); ?>images/180.png" class="img-thumbnail" style="height: 180px;">
                          </div>
                        </div>
                        <div class="col-md-6 mt-3">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Prefix</label>
                                <input type="text" class="form-control" placeholder="Prefix" value="Prefix" readonly>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" placeholder="Position" value="Doctor" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Thai)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Thai)" value="XXXX XXXXXXXXXXX" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Eng)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Eng)" value="XXXX XXXXXXXXXXX" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" placeholder="E-mail" value="Xxxxxxxx@hotmail.com" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tel.</label>
                            <input type="text" class="form-control" placeholder="Tel." value="089-106-7777" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label>Date Birthday</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="1940-07-12" readonly>
                            </div>
                            <div class="col text-center">
                              <i class="fa fa-calendar fa-lg"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control" placeholder="Gender" value="Male" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Salesperson</label>
                            <input type="text" class="form-control" placeholder="Salesperson" value="XXXXXXXX" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Channal</label>
                            <input type="text" class="form-control" placeholder="Contact Channal" value="Event" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Event</label>
                            <input type="text" class="form-control" placeholder="Event" value="งานราชวิทยารังสีวิทยาแห่งประเทศไทย" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Date Stamp</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="2019-09-02" readonly>
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
                            <input type="text" class="form-control" placeholder="Brands" value="Hitachi" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Model</label>
                            <input type="text" class="form-control" placeholder="Model" value="Lisendo 880" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" placeholder="Status" value="นำเสนอลูกค้า" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Confident (%)</label>
                            <input type="text" class="form-control" placeholder="Confident (%)" value="50 (%)" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" class="form-control" placeholder="Remarks" value="-" readonly>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div> <!-- .jumbotron jumbotron-fluid mb-0 -->
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-header-hover" id="headingTwo">
                <div class="row text-center" data-toggle="collapse" data-target="#collapseTwo">
                  <div class="col-md-1">2.</div>
                  <div class="col-md-2"><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></div>
                  <div class="col-md-2">XXXX XXXXXXXXXX</div>
                  <div class="col-md-1">Hitachi</div>
                  <div class="col-md-1">A70</div>
                  <div class="col-md-2"><button type="button" class="btn crm-btn-blue">ประมูลราคา</button></div>
                  <div class="col-md-2">
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star-o select"></i>
                    <i class="fa fa-star-o select"></i>
                    <i class="fa fa-star-o select"></i>
                    <i class="fa fa-star-o select"></i>
                  </div>
                  <div class="col-md-1" id="collapse-click"><i class="fa fa-plus fa-lg"></i></div>
                </div>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body-fluid">
                  <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container-fluid">

                      <div class="row mb-3">
                        <div class="col-md-12">
                          <img src="<?php echo base_url(); ?>images/login/Icon-BJHMedical.png" class="img-fluid">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                          <h3 id="id-jumbotron-personnel">2.</h3>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-md-5 col-form-label">Relationship</label>
                            <div class="col-md pt-1 text-center">
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star-o select"></i>
                              <i class="fa fa-star-o select"></i>
                              <i class="fa fa-star-o select"></i>
                              <i class="fa fa-star-o select"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="z-depth-1-half text-center">
                            <img src="<?php echo base_url(); ?>images/180.png" class="img-thumbnail" style="height: 180px;">
                          </div>
                        </div>
                        <div class="col-md-6 mt-3">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Prefix</label>
                                <input type="text" class="form-control" placeholder="Prefix" value="Prefix" readonly>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" placeholder="Position" value="Doctor" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Thai)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Thai)" value="XXXX XXXXXXXXXXX" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Eng)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Eng)" value="XXXX XXXXXXXXXXX" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" placeholder="E-mail" value="Xxxxxxxx@hotmail.com" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tel.</label>
                            <input type="text" class="form-control" placeholder="Tel." value="089-106-7777" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label>Date Birthday</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="1940-07-12" readonly>
                            </div>
                            <div class="col text-center">
                              <i class="fa fa-calendar fa-lg"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control" placeholder="Gender" value="Male" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Salesperson</label>
                            <input type="text" class="form-control" placeholder="Salesperson" value="XXXXXXXX" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Channal</label>
                            <input type="text" class="form-control" placeholder="Contact Channal" value="Event" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Event</label>
                            <input type="text" class="form-control" placeholder="Event" value="งานราชวิทยารังสีวิทยาแห่งประเทศไทย" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Date Stamp</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="2019-09-02" readonly>
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
                            <input type="text" class="form-control" placeholder="Brands" value="Hitachi" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Model</label>
                            <input type="text" class="form-control" placeholder="Model" value="A70" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" placeholder="Status" value="ประมูลราคา" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Confident (%)</label>
                            <input type="text" class="form-control" placeholder="Confident (%)" value="50 (%)" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" class="form-control" placeholder="Remarks" value="-" readonly>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div> <!-- .jumbotron jumbotron-fluid mb-0 -->
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-header-hover" id="headingThree">
                <div class="row text-center card-header-hover" data-toggle="collapse" data-target="#collapseThree">
                  <div class="col-md-1">3.</div>
                  <div class="col-md-2"><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></div>
                  <div class="col-md-2">XXXX XXXXXXXXXX</div>
                  <div class="col-md-1">Ziehm</div>
                  <div class="col-md-1">RFD Hybrid</div>
                  <div class="col-md-2"><button type="button" class="btn crm-btn-light-orange">ส่งของแล้ว</button></div>
                  <div class="col-md-2">
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star-o select"></i>
                  </div>
                  <div class="col-md-1" id="collapse-click"><i class="fa fa-plus fa-lg"></i></div>
                </div>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body-fluid">
                  <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container-fluid">

                      <div class="row mb-3">
                        <div class="col-md-12">
                          <img src="<?php echo base_url(); ?>images/login/Icon-BJHMedical.png" class="img-fluid">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                          <h3 id="id-jumbotron-personnel">3.</h3>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-md-5 col-form-label">Relationship</label>
                            <div class="col-md pt-1 text-center">
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star select"></i>
                              <i class="fa fa-star-o select"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="z-depth-1-half text-center">
                            <img src="<?php echo base_url(); ?>images/180.png" class="img-thumbnail" style="height: 180px;">
                          </div>
                        </div>
                        <div class="col-md-6 mt-3">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Prefix</label>
                                <input type="text" class="form-control" placeholder="Prefix" value="Prefix" readonly>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" placeholder="Position" value="Doctor" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Thai)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Thai)" value="XXXX XXXXXXXXXXX" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name - Surname (Eng)</label>
                            <input type="text" class="form-control" placeholder="Name - Surname (Eng)" value="XXXX XXXXXXXXXXX" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" placeholder="E-mail" value="Xxxxxxxx@hotmail.com" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tel.</label>
                            <input type="text" class="form-control" placeholder="Tel." value="089-106-7777" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label>Date Birthday</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="1940-07-12" readonly>
                            </div>
                            <div class="col text-center">
                              <i class="fa fa-calendar fa-lg"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control" placeholder="Gender" value="Male" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Salesperson</label>
                            <input type="text" class="form-control" placeholder="Salesperson" value="XXXXXXXX" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Channal</label>
                            <input type="text" class="form-control" placeholder="Contact Channal" value="Event" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Event</label>
                            <input type="text" class="form-control" placeholder="Event" value="งานราชวิทยารังสีวิทยาแห่งประเทศไทย" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Date Stamp</label>
                          <div class="form-group row">
                            <div class="col-10">
                              <input type="date" class="form-control" value="2019-09-02" readonly>
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
                            <input type="text" class="form-control" placeholder="Brands" value="Ziehm" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Model</label>
                            <input type="text" class="form-control" placeholder="Model" value="RFD Hybrid" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" placeholder="Status" value="ส่งของแล้ว" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Confident (%)</label>
                            <input type="text" class="form-control" placeholder="Confident (%)" value="50 (%)" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" class="form-control" placeholder="Remarks" value="-" readonly>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div> <!-- .jumbotron jumbotron-fluid mb-0 -->
                </div>
              </div>
            </div>
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