<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
  <title>Giỏ Hàng</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  <style type="text/css">
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
      vertical-align: middle;
    }

    @media screen and (max-width: 600px) {
      table#cart tbody td .form-control {
        width: 20%;
        display: inline !important;
      }

      .actions .btn {
        width: 36%;
        margin: 1.5em 0;
      }

      .actions .btn-info {
        float: left;
      }

      .actions .btn-danger {
        float: right;
      }

      table#cart thead {
        display: none;
      }

      table#cart tbody td {
        display: block;
        padding: .6rem;
        min-width: 320px;
      }

      table#cart tbody tr td:first-child {
        background: #333;
        color: #fff;
      }

      table#cart tbody td:before {
        content: attr(data-th);
        font-weight: bold;
        display: inline-block;
        width: 8rem;
      }

      table#cart tfoot td {
        display: block;
      }

      table#cart tfoot td .btn {
        display: block;
      }
    }
  </style>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<?php
include 'connectDB.php';
$db = new Database('localhost:3306', 'root', '11301130nam.', 'webshop');
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
  $name = $_POST['name'];
  $size =  $_POST['size'];
  $quantity = $_POST['quantity'];
  $result = $db->updatePro($name, $size, $quantity);
}
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
  $name = $_POST['name'];
  $size =  $_POST['size'];
  $result = $db->deletePro($name, $size);
}
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['f5'])) {
  $result = $db->deleteAll();
}
$result = $db->showCart();
?>

<body>
  <h2 class="text-center">Giỏ hàng</h2>
  <div class="container">
    <table id="cart" class="table table-hover table-condensed">
      <thead>
        <tr>
          <th style="width:50%">Tên sản phẩm</th>
          <th style="width:10%">Giá</th>
          <th style="width:8%">Số lượng</th>
          <th style="width:22%" class="text-center">Thành tiền</th>
          <th style="width:22%" class="text-center"></th>
          <th style="width:10%"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($result)) {
          $total = 0;
          while ($row = $result->fetch_assoc()) {
            $namep = $row['name'];
            $imgp = $row['img'];
            $pricep = $row['price'];
            $quantityp = $row['quantity'];
            $subTotal = $pricep * $quantityp;
            $total += $subTotal;
            $sizep = $row['size'];
            echo "<td data-th=\"Product\">
                  <div class=\"row\">";
            echo "<div class=\"col-sm-2 hidden-xs\">";
            echo "<img src= $imgp  width=\"100\" class=\"img-responsive\"/></div>";
            echo "<div class=\"col-sm-10\">";
            echo "<h4 class=\"nomargin\">" . $row['name'] . '</h4>';
            echo "<p>" . $row['size'] . '</p>';
            echo " </div></div></td>";
            echo "<td>" . $row['price'] . '</td>';
            echo "<td data-th=\"Quantity\">";
            echo "<form method=\"POST\" action=\"\">";
            echo "<input type=\"number\" class=\"form-control text-center\" name = \"quantity\" value= '$quantityp' ></td>";
            echo "<td class=\"text-center\">" . $subTotal . '</td>';
            echo "<input type=\"hidden\" name=\"name\" value = '$namep' >";
            echo "<input type=\"hidden\" name=\"size\" value = '$sizep'  >";
            echo "<td><button class=\"btn btn-info btn-sm\" name=\"update\" value=\"update\" ><i class=\"fa fa-edit\"></i></button>";
            echo "<button class=\"btn btn-danger btn-sm\" name=\"delete\" value=\"delete\"><i class=\"fa fa-trash-o\" ></i></button></td>";
            echo "</form>";
            echo "<tr/>";
          }
          echo "<tr>";
          echo "<form method=\"POST\" action=\"\">";
          echo "<td><button class=\"btn btn-warning\" name=\"f5\" value=\"f5\"><i class=\"fa fa-angle-left\"></i> Làm mới đơn hàng</a></td>";
          echo "</form>";
          echo "<td colspan=\"2\" class=\"hidden-xs\"></td>";
          echo "<td class=\"hidden-xs text-center\"><strong>Tổng tiền $total đ</strong></td>";
          echo "<td><a href=\"thanhtoan.php\" class=\"btn btn-success btn-block\">Thanh toán <i class=\"fa fa-angle-right\"></i></a></td>";
          echo "</tr>";

        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>