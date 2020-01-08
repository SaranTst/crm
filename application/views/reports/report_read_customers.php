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
<?php $count_data = (isset($datas['data'])) ? count($datas['data']) : 0; ?>
<h3 align="right"><?php echo 'ทั้งหมด [ '.$count_data.' ]'; ?></h3>

  <?php 
  if ($datas['status']==1) {
  foreach ($datas['data'] as $key => $value) { ?>
  <table>
    <tr>
      <td colspan="5" style="text-align:left;"><b><?php echo ($key+1); ?></b></td>
    </tr>
    <tr>
      <td rowspan="4"><img src="<?php echo $value['IMAGE_HOSPITAL'] ? base_url().$value['IMAGE_HOSPITAL'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 45px;"></td>
    </tr>
    <tr>
      <td><b>CustomerID</b></td>
      <td><?php echo $value['CUSTOMER_ID_HOSPITAL']; ?></td>
      <td><b>Rating</b></td>
      <td><?php echo $value['RATING_HOSPITAL']; ?></td>
    </tr>
    <tr>
      <td><b>Hospital Name ENG</b></td>
      <td><?php echo $value['HOSPITAL_NAME_ENG']; ?></td>
      <td><b>Hospital Name TH</b></td>
      <td><?php echo $value['HOSPITAL_NAME_TH']; ?></td>
    </tr>
    <tr>
      <td><b>Orderamount</b></td>
      <td colspan="3"><?php echo number_format($value['ORDER_AMOUNT_HOSPITAL']); ?></td>
    </tr>

    <tr>
      <td rowspan="4"><img src="<?php echo $value['IMAGE_DOCTOR'] ? base_url().$value['IMAGE_DOCTOR'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 45px;"></td>
    </tr>
    <tr>
      <td><b>Name</b></td>
      <td><?php echo $value['NAME_SURNAME_DOCTOR']; ?></td>
      <td><b>Relationship</b></td>
      <td><?php echo $value['RELATIONSHIP_DOCTOR']; ?></td>
    </tr>
    <tr>
      <td><b>E-mail</b></td>
      <td><?php echo $value['E_MAIL_DOCTOR']; ?></td>
      <td><b>Tel.</b></td>
      <td><?php echo $value['TELEPHONE_DOCTOR']; ?></td>
    </tr>
    <tr>
      <td><b>Date Birthday</b></td>
      <td colspan="3"><?php echo date('d/m/Y', strtotime($value['BIRTHDAY_DOCTOR'])); ?></td>
    </tr>

    <tr>
      <td rowspan="4"><img src="<?php echo $value['IMAGE_PURCHASE'] ? base_url().$value['IMAGE_PURCHASE'] : base_url().'images/150.png'; ?>" class="img-thumbnail" style="height: 45px;"></td>
    </tr>
    <tr>
      <td><b>Name</b></td>
      <td><?php echo $value['NAME_SURNAME_PURCHASE']; ?></td>
      <td><b>Relationship</b></td>
      <td><?php echo $value['RELATIONSHIP_PURCHASE']; ?></td>
    </tr>
    <tr>
      <td><b>E-mail</b></td>
      <td><?php echo $value['E_MAIL_PURCHASE']; ?></td>
      <td><b>Tel.</b></td>
      <td><?php echo $value['TELEPHONE_PURCHASE']; ?></td>
    </tr>
    <tr>
      <td><b>Date Birthday</b></td>
      <td colspan="3"><?php echo date('d/m/Y', strtotime($value['BIRTHDAY_PURCHASE'])); ?></td>
    </tr>
  </table>
  <br/>
  <?php }
  }else{ ?>
  <table>
    <tr>
      <td><b><?php echo $datas['message']; ?></b></td>
    </tr>
  </table>
  <?php } ?>
</body>
</html>