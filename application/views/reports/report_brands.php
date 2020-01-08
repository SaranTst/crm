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
    <th>Name</th>
    <th>Logo</th>
    <th>Country</th>
    <th>Team</th>
    <th>Expertise</th>
  </tr>

  <?php 
  if ($datas['status']==1) {
  foreach ($datas['data'] as $key => $value) { ?>
  <tr>
    <td><?php echo ($key+1); ?></td>
    <td><?php echo $value['VENDOR_NAME']; ?></td>
    <td style="text-align: center;"><img src="<?php echo $value['LOGO'] ? base_url().$value['LOGO'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 45px;"></td>
    <td><?php echo $value['COUNTY']; ?></td>
    <td><?php echo $value['TEAM']; ?></td>
    <td><?php echo ARR_EXPERTISE[$value['EXPERTISE_ID']]; ?></td>
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