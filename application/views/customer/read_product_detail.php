          
          <h3 class="m-3">BJC Product</h3>
          <div class="table-responsive">
            <table class="table table-striped" style="text-align: center;">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Image</th>
                  <th scope="col">SN</th>
                  <th scope="col">Brands</th>
                  <th scope="col">Model</th>
                  <th scope="col">Unit</th>
                  <th scope="col">Price</th>
                  <th scope="col">Saleperson</th>
                  <th scope="col">Serviceperson</th>
                  <th scope="col">Warranty</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($datas['status']==1 && isset($datas['data'][0]['product_bjc']) && sizeof($datas['data'][0]['product_bjc'])>0) { 
                  foreach ($datas['data'][0]['product_bjc'] as $key => $value) { ?>
                <tr>
                  <th scope="row"><?php echo ($key+1).'.' ?></th>
                  <td><img src="<?php echo $value['LOGO'] ? base_url().$value['LOGO'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 75px;"></td>
                  <td><?php echo $value['SN']; ?></td>
                  <td><?php echo $value['VENDOR_NAME']; ?></td>
                  <td><?php echo $value['MODEL']; ?></td>
                  <td><?php echo number_format($value['UNIT']); ?></td>
                  <td><?php echo number_format($value['PRICE']); ?></td>
                  <td><?php echo $value['SALES_FIRST_NAME_TH'].' '.$value['SALES_LAST_NAME_TH']; ?></td>
                  <td><?php echo $value['SERVICES_FIRST_NAME_TH'].' '.$value['SERVICES_LAST_NAME_TH']; ?></td>
                  <td><?php echo date('d/m/Y', strtotime($value['WARRANTY'])); ?></td>
                </tr>
                <?php }
                } ?>
                <!-- <tr>
                  <th scope="row">2.</th>
                  <td><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></td>
                  <td>346861</td>
                  <td>Hitachi</td>
                  <td>Lisendo 880</td>
                  <td>1</td>
                  <td>3,000,000</td>
                  <td>XXXX XXXXXXXX</td>
                  <td>XXXX XXXXXXXX</td>
                  <td>24/07/2565</td>
                </tr>
                <tr>
                  <th scope="row">3.</th>
                  <td><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></td>
                  <td>823474</td>
                  <td>Shimadzu</td>
                  <td>CathLab</td>
                  <td>1</td>
                  <td>1,500,000</td>
                  <td>XXXX XXXXXXXX</td>
                  <td>XXXX XXXXXXXX</td>
                  <td>03/09/2569</td>
                </tr> -->
              </tbody>
            </table>
          </div> <!-- .table-responsive -->

          <h3 class="m-3">Other Product</h3>
          <div class="table-responsive">
            <table class="table table-striped" style="text-align: center;">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Image</th>
                  <th scope="col">Brands</th>
                  <th scope="col">Model</th>
                  <th scope="col">Unit</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($datas['status']==1 && isset($datas['data'][0]['product_other']) && sizeof($datas['data'][0]['product_other'])>0) { 
                  foreach ($datas['data'][0]['product_other'] as $key => $value) { ?>
                <tr>
                  <th scope="row"><?php echo ($key+1).'.' ?></th>
                  <td><img src="<?php echo $value['LOGO'] ? base_url().$value['LOGO'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 75px;"></td>
                  <td><?php echo $value['VENDOR_NAME']; ?></td>
                  <td><?php echo $value['MODEL']; ?></td>
                  <td><?php echo number_format($value['UNIT']); ?></td>
                </tr>
                <?php }
                } ?>
                <!-- <tr>
                  <th scope="row">2.</th>
                  <td><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></td>
                  <td>CMC</td>
                  <td>XXXXXXXX</td>
                  <td>1</td>
                  <td>3,000,000</td>
                </tr> -->
              </tbody>
            </table>
          </div> <!-- .table-responsive -->