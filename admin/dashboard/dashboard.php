
<?php

    $doanhthu_ngay=doanhthu_ngay();
    $doanhthu_thang=doanhthu_thang();
    $load_tongsanphamdaban=load_tongsanphamdaban();
    $load_tongtien=load_tongtien();
    $load_tongtienchuahoanthanh =load_tongtienchuahoanthanh();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ cột theo sản phẩm</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="box1 row">
    <h3>Thống kê sản phẩm theo ngày / tháng</h3>
    <canvas id="myChart" width="400" height="200" ></canvas>
    <canvas id="yourChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var ttx = document.getElementById('yourChart').getContext('2d');

        
        var month = <?php echo json_encode(array_column($doanhthu_thang,'month')); ?>;
        var doanhthu_thang = <?php echo json_encode(array_column($doanhthu_thang,'doanhthu_thang')); ?>;
        var day = <?php echo json_encode(array_column($doanhthu_ngay,'date')); ?>;
        var doanhthu_ngay = <?php echo json_encode(array_column($doanhthu_ngay,'doanhthu_ngay')); ?>;

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: day,
                datasets: [{
                    label: 'Doanh số theo ngày',
                    data: doanhthu_ngay,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var yourChart = new Chart(ttx, {
            type: 'bar',
            data: {
                labels: month,
                datasets: [{
                    label: 'Doanh số theo tháng',
                    data: doanhthu_thang,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    </div>
    <hr>
    <div class="box3 row">
        <?php foreach ($load_tongsanphamdaban as $tong): ?>
            <div class="col-md-4 bg-light box1 m-1 card">
                <div class="box1">
                <h3 style="text-align: center;color:#3081D0">Tổng sản phẩm đã bán</h3>
                <h1 style="text-align: center;color:#EEC759"><?php echo $tong['tongsanpham']?></h1>
                </div>
            </div>
        <?php endforeach; ?>

        <?php foreach ($load_tongtien as $tongtien): ?>
              <div class="col-md-3 bg-light box1 m-1 card">
                <div class="box1">
                <h3 style="text-align: center;color:#3081D0">Tổng tiền đơn hàng đã hoàn thành</h3>
                <h1 style="text-align: center;color:#EEC759"><?php echo number_format($tongtien['tongtien']) ; ?> VND</h1>
                </div>
              </div>
        <?php endforeach; ?>
        
        <?php foreach ($load_tongtienchuahoanthanh as $tongtien): ?>
              <div class="col-md-3 bg-light box1 m-1 card">
                <div class="box1">
                <h3 style="text-align: center;color:#3081D0">Tổng tiền đơn hàng đang đợi xác nhận</h3>
                <h1 style="text-align: center;color:#EEC759"><?php echo number_format($tongtien['tongtien']) ; ?> VND</h1>
                </div>
              </div>
        <?php endforeach; ?>

            
            
    </div>
<!-- <h3>Thống kê sản phẩm theo ngày / tháng</h3> -->
    <hr>

    <div  class="box2 row" >
            <h3>Sản phẩm theo danh mục </h3>   
            <br>      
                <table class="table table-bordered border-primary">
                    <tr>     
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>            
                    </tr>
                    <?php
                        foreach($listthongke as $thongke){
                            extract($thongke);
                            echo '<tr>
                                    <td>'.$madm.'</td>
                                    <td>'.$tendm.'</td>
                                    <td>'.$countsp.'</td>
                                    <td>'.number_format($maxprice) .' VND</td>
                                    <td>'.number_format($minprice).' VND</td>
                                    <td>'.number_format($avgprice).' VND</td>
                                <tr>';
                            }
                    ?>  
                </table>
            <!-- <div>
            <a href="?act=bieudo" class="btn btn-success">Biểu đồ</a>
            </div> -->
            <div id="piechart"></div>

    


<!-- <a href="?act=dstk" class="btn btn-success">Quay lại</a> -->
    <div class="boxcenter">
    <div class="row">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
<?php
    $tongdm=count($listthongke);
    $i=1;
    foreach($listthongke as $thongke){
        extract($thongke);
        if($i==$tongdm) $dauphay=""; else $dauphay=",";
        echo "['".$thongke['tendm']."', ".$thongke['countsp']."]".$dauphay;
        $i+=1;
    }
?>

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Thống kê sản phẩm theo danh mục:', 'width':1230, 'height':800};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
    </div>
    </div>
    </div>


</body>
</html>
