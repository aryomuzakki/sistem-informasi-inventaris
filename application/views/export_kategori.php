<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title ?></title>

  <style>
    table {
      text-align: center;
      border: 1px solid #000;
      border-collapse: collapse;
    }

    th {
      background-color: #f5f5f5;
    }

    th,
    td {
      padding: 3pt 2pt;
    }
  </style>
</head>

<body>
  <h1 style="text-align: center;"><?php echo $page_title ?></h1>

  <div>
    <table border="1" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kategori</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data as $data) {
        ?>
          <?php //echo (($no % 2) != 0) ? 'style="background-color: #fafafa;"' : '' ; 
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data->nama_kategori; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>

</html>