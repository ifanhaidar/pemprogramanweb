<?php
$this->db->select('jasa,harga');
$dataProdukChart = $this->db->get("transaksi")->result();
foreach ($dataProdukChart as $k => $v) {
    $arrProd[] = ['label' => $v->jasa, 'y' => $v->harga];
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Grafik Transaksi Jasa</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Grafik Transaksi Jasa</li>
        </ol>
    </section>
    <!DOCTYPE HTML>
    <html>

    <head>
        <script type="text/javascript">
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "light1", // "light2", "dark1", "dark2"
                    animationEnabled: false, // change to true		
                    title: {
                        text: "Grafik Transaksi Jasa"
                    },
                    data: [{
                        // Change type to "bar", "area", "spline", "pie",etc.
                        type: "column",

                        dataPoints: <?= json_encode($arrProd, JSON_NUMERIC_CHECK) ?>

                    }]
                });
                chart.render();

            }
        </script>
    </head>

    <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
    </body>

    </html>
    </section>
</div>