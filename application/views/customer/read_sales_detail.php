
          <div class="table-responsive">
            <table class="table table-striped" style="text-align: center;">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Image</th>
                  <th scope="col">Customer ID</th>
                  <th scope="col">Name-Surename (Thai)</th>
                  <th scope="col">Nickname (Thai)</th>
                  <th scope="col">Department</th>
                  <th scope="col">Position</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($datas['status']==1 && isset($datas['data'][0]['salse_detail']) && sizeof($datas['data'][0]['salse_detail'])>0) { 
                  foreach ($datas['data'][0]['salse_detail'] as $key => $value) { ?>
                <tr>
                  <th scope="row"><?php echo ($key+1).'.' ?></th>
                  <td><img src="<?php echo $value['IMAGE'] ? base_url().$value['IMAGE'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 75px;"></td>
                  <td><?php echo $value['CUSTOMER_ID_HOSPITAL']; ?></td>
                  <td><?php echo $value['FIRST_NAME_TH'].' '.$value['LAST_NAME_TH']; ?></td>
                  <td><?php echo $value['NICKNAME_TH']; ?></td>
                  <td><?php echo ARR_DEPARTMENT_ADMIN_SALE[$value['DEPARTMENT_ID']]; ?></td>
                  <td><?php echo ARR_POSITION[$value['POSITION_ID']]; ?></td>
                </tr>
                <?php }
                } ?>
<!--                 <tr>
                  <th scope="row">2.</th>
                  <td><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></td>
                  <td>000002</td>
                  <td>XXXX XXXXXXXXXX</td>
                  <td>XXXX</td>
                  <td>CEO</td>
                  <td>Product</td>
                </tr>
                <tr>
                  <th scope="row">3.</th>
                  <td><img src="<?php echo base_url(); ?>images/180.png" id="preview-hospital" class="img-thumbnail" style="height: 75px;"></td>
                  <td>000003</td>
                  <td>XXXX XXXXXXXXXX</td>
                  <td>XXXX</td>
                  <td>LCS3</td>
                  <td>Sales</td>
                </tr> -->
              </tbody>
            </table>
          </div> <!-- .table-responsive -->