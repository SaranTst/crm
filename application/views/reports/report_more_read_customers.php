<!DOCTYPE html>
<html>
<head>
<title><?php echo $title.' '.$subtitle_time; ?></title>
<style>
body {
    font-family: sarabun;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

</style>
</head>
<body>

<h1 align="center"><?php echo $title; ?></h1>
<h3 align="center"><?php echo $subtitle_time; ?></h3>

  <?php
  $data_sale = array();
  $data_service = array();
  $data_bjc_product = array();
  $data_other_product = array();
  $data_personnel = array();

  if ($datas['status']==1) {
     $data_sale = $datas['data'][0]['salse_detail'];
     $data_service = $datas['data'][0]['service_detail'];
     $data_bjc_product = $datas['data'][0]['product_bjc'];
     $data_other_product = $datas['data'][0]['product_other'];
     $data_personnel = $datas['data'][0]['personnel_detail'];
  ?>

  <!-- Sales Detail -->
  <?php $count_data_sale = count($data_sale); ?>
  <table>
    <tr style="border: 0px">
      <th align="left" style="border: 0px"><h2>SALES DETAIL</h2></th>
      <th align="right" style="border: 0px"><b><?php echo 'ทั้งหมด [ '.$count_data_sale.' ]'; ?></b></th>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <th>No.</th>
      <th>Image</th>
      <th>Customer ID</th>
      <th>Name-Surename (Thai)</th>
      <th>Nickname (Thai)</th>
      <th>Department</th>
      <th>Position</th>
    </tr>
    <?php foreach ($data_sale as $key => $value) { ?>
    <tr>
      <td><?php echo ($key+1); ?></td>
      <td style="text-align: center;"><img src="<?php echo $value['IMAGE'] ? base_url().$value['IMAGE'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 45px;"></td>
      <td><?php echo $value['CUSTOMER_ID_HOSPITAL']; ?></td>
      <td><?php echo $value['FIRST_NAME_TH'].' '.$value['LAST_NAME_TH']; ?></td>
      <td><?php echo $value['NICKNAME_TH']; ?></td>
      <td><?php echo ARR_DEPARTMENT_ADMIN_SALE[$value['DEPARTMENT_ID']]; ?></td>
      <td><?php echo ARR_POSITION[$value['POSITION_ID']]; ?></td>
    </tr>
    <?php } ?>
  </table>
  <hr>
  
  <!-- Service Detail -->
  <?php $count_data_service = count($data_service); ?>
  <table>
    <tr style="border: 0px">
      <th align="left" style="border: 0px"><h2>SERVICE DETAIL</h2></th>
      <th align="right" style="border: 0px"><b><?php echo 'ทั้งหมด [ '.$count_data_service.' ]'; ?></b></th>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <th>No.</th>
      <th>Image</th>
      <th>Customer ID</th>
      <th>Name-Surename (Thai)</th>
      <th>Nickname (Thai)</th>
      <th>Department</th>
      <th>Position</th>
    </tr>
    <?php foreach ($data_service as $key => $value) { ?>
    <tr>
      <td><?php echo ($key+1); ?></td>
      <td style="text-align: center;"><img src="<?php echo $value['IMAGE'] ? base_url().$value['IMAGE'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 45px;"></td>
      <td><?php echo $value['CUSTOMER_ID_HOSPITAL']; ?></td>
      <td><?php echo $value['FIRST_NAME_TH'].' '.$value['LAST_NAME_TH']; ?></td>
      <td><?php echo $value['NICKNAME_TH']; ?></td>
      <td><?php echo ARR_DEPARTMENT_ADMIN_SALE[$value['DEPARTMENT_ID']]; ?></td>
      <td><?php echo ARR_POSITION[$value['POSITION_ID']]; ?></td>
    </tr>
    <?php } ?>
  </table>

  <?php 
  }else{ ?>
  <table>
    <tr>
      <td><b><?php echo $datas['message']; ?></b></td>
    </tr>
  </table>
  <?php } ?>
</body>
</html>