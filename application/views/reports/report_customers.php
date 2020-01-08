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
  text-align: left;
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
<?php $count_data = (isset($datas['data'])) ? count($datas['data']) : 0; ?>
<h3 align="right"><?php echo 'ทั้งหมด [ '.$count_data.' ]'; ?></h3>
<table>
  <tr>
    <th>No.</th>
    <th>Hospital / Royal</th>
    <th>โรงพยาบาล / สถานบัน</th>
    <th>Customer ID</th>
    <th>Order amount</th>
    <th>Rating</th>
  </tr>

  <?php 
  if ($datas['status']==1) {
  foreach ($datas['data'] as $key => $value) { ?>
  <tr>
    <td><?php echo ($key+1); ?></td>
    <td><?php echo $value['HOSPITAL_NAME_ENG']; ?></td>
    <td><?php echo $value['HOSPITAL_NAME_TH']; ?></td>
    <td><?php echo $value['CUSTOMER_ID_HOSPITAL']; ?></td>
    <td><?php echo number_format($value['ORDER_AMOUNT_HOSPITAL']); ?></td>
    <td><?php echo $value['RATING_HOSPITAL']; ?></td>
  </tr>
  <?php }
  }else{ ?>
  <tr>
    <td colspan="6" style="text-align:center;"><b><?php echo $datas['message']; ?></b></td>
  </tr>
  <?php } ?>

</table>
</body>
</html>