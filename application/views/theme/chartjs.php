<script type="text/javascript">
  // $(function () {
    // Chart JS
    let grafikBarangLabel   =   [];
    let grafikBarangData    =   [];

    function generateGrafikBarang(){
        let salesGraphChartCanvas = $('#grafikBarang').get(0).getContext('2d');

        let salesGraphChartData = {
            labels  : grafikBarangLabel,
            datasets: [{
                label               :   'Jumlah Barang',
                fill                :   false,
                borderWidth         :   2,
                lineTension         :   0,
                spanGaps :  true,
                borderColor         :   '#007bff',
                pointRadius         :   3,
                pointHoverRadius    :   7,
                pointColor          :   '#007bff',
                pointBackgroundColor:   '#007bff',
                data                :   grafikBarangData
            }]
        }

        let salesGraphChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                display: false,
            },
            scales: {
                xAxes: [{
                    ticks : {
                        fontColor: '#007bff',
                    },
                    gridLines : {
                        display : false,
                        color: '#007bff',
                        drawBorder: false
                    }
                }],
                yAxes: [{
                    ticks : {
                        stepSize: 2,
                        fontColor: '#007bff',
                    },
                    gridLines : {
                        display : true,
                        color: '#f0f0f0',
                        drawBorder: false,
                    }
                }]
            }
        }

        let salesGraphChart = new Chart(salesGraphChartCanvas, { 
                type: 'bar', 
                data: salesGraphChartData, 
                options: salesGraphChartOptions
            }
        )
    }
    function doAjaxGrafikBarang(){
        let _kategori   =   ($('#kategori').val() == '') ? ' ';
        let _status     =   $('#status').val();

        $.ajax({
            url     :   `<?=site_url('json/grafikBarang')?>?kategori=${_kategori}&status=${_status}`,
            success :   function(responseFromServer){
                let rFS     =   responseFromServer;
                let grafikBarang    =   rFS.grafikBarang;

                grafikBarangLabel   =   grafikBarang.label;
                grafikBarangData    =   grafikBarang.data;
                generateGrafikBarang();
            }
        })
    }

    doAjaxGrafikBarang();
    generateGrafikBarang();

  // });
</script>