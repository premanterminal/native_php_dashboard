	<!-- DataTables.net -->
    <script type="text/javascript" src="views/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="views/assets/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>

    <!-- Highchart -->
    <script type="text/javascript" src="views/assets/plugins/highchart/js/highcharts.js"></script>
    <script type="text/javascript" src="views/assets/plugins/highchart/js/modules/exporting.js"></script>

    <!-- Collaptable -->
    <script type="text/javascript" src="views/assets/js/modules/jquery.aCollapTable.js"></script>

    <!-- Dependent Dropdown -->
    <script type="text/javascript" src="views/assets/plugins/dependent-dropdown/js/dependent-dropdown.js"></script>

    <!--Custom scripts-->
    <script type="text/javascript">
        $('#scriptx').highcharts({
                chart: {
        type: 'spline'
    },
    title: {
        text: 'GRAFIK TOTAL REVENUE '
    },
    subtitle: {
        text: 'SUMBAGUT'
    },
    xAxis: {
        type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
            month: '%e. %b',
            year: '%b'
        },
        title: {
            text: 'Date'
        }
    },
    yAxis: {
        title: {
            text: 'Revenue (M)'
        },
        min: 0
    },
    tooltip: {
        headerFormat: '<b>{series.name}</b><br>',
        pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
    },

    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        },
		spline: {
            marker: {
                enabled: true
            }
        }
    },

    series: [{
        name: 'Voice',
        data: [
            [Date.UTC(2018, 0, 1), 12.91],
            [Date.UTC(2018, 0, 2), 12.93],
            [Date.UTC(2018, 0, 3), 12.90],
            [Date.UTC(2018, 0, 4), 11.79],
            [Date.UTC(2018, 0, 5), 11.50],
            [Date.UTC(2018, 0, 6), 11.55],
            [Date.UTC(2018, 0, 7), 10.58],
            [Date.UTC(2018, 0, 8), 11.73],
            [Date.UTC(2018, 0, 9), 11.17],
            [Date.UTC(2018, 0, 10), 11.17],
            [Date.UTC(2018, 0, 11), 10.77],
            [Date.UTC(2018, 0, 12), 10.68],
            [Date.UTC(2018, 0, 13), 10.82],
            [Date.UTC(2018, 0, 14), 9.89],
            [Date.UTC(2018, 0, 15), 11.20],
            [Date.UTC(2018, 0, 16), 10.65],
            [Date.UTC(2018, 0, 17), 10.66],
            [Date.UTC(2018, 0, 18), 10.36],
            [Date.UTC(2018, 0, 19), 10.34],
            [Date.UTC(2018, 0, 20), 10.64]
        ]
    }, {
        name: 'SMS',
        data: [
            [Date.UTC(2018, 0, 1), 2.76],
            [Date.UTC(2018, 0, 2), 2.57],
            [Date.UTC(2018, 0, 3), 2.66],
            [Date.UTC(2018, 0, 4), 2.43],
            [Date.UTC(2018, 0, 5), 2.43],
            [Date.UTC(2018, 0, 6), 2.42],
            [Date.UTC(2018, 0, 7), 2.29],
            [Date.UTC(2018, 0, 8), 2.50],
            [Date.UTC(2018, 0, 9), 2.39],
            [Date.UTC(2018, 0, 10), 2.41],
            [Date.UTC(2018, 0, 11), 2.34],
            [Date.UTC(2018, 0, 12), 2.27],
            [Date.UTC(2018, 0, 13), 2.34],
            [Date.UTC(2018, 0, 14), 2.18],
            [Date.UTC(2018, 0, 15), 2.38],
            [Date.UTC(2018, 0, 16), 2.27],
            [Date.UTC(2018, 0, 17), 2.31],
            [Date.UTC(2018, 0, 18), 2.28],
            [Date.UTC(2018, 0, 19), 2.21],
            [Date.UTC(2018, 0, 20), 2.29]
		]
    }, {
        name: 'Broadband',
        data: [
            [Date.UTC(2018, 0, 1), 3.89],
            [Date.UTC(2018, 0, 2), 3.99],
            [Date.UTC(2018, 0, 3), 3.97],
            [Date.UTC(2018, 0, 4), 4.13],
            [Date.UTC(2018, 0, 5), 3.82],
            [Date.UTC(2018, 0, 6), 4.01],
            [Date.UTC(2018, 0, 7), 3.75],
            [Date.UTC(2018, 0, 8), 3.90],
            [Date.UTC(2018, 0, 9), 3.90],
            [Date.UTC(2018, 0, 10), 3.98],
            [Date.UTC(2018, 0, 11), 4.12],
            [Date.UTC(2018, 0, 12), 4.03],
            [Date.UTC(2018, 0, 13), 4.09],
            [Date.UTC(2018, 0, 14), 3.47],
            [Date.UTC(2018, 0, 15), 3.76],
            [Date.UTC(2018, 0, 16), 3.81],
            [Date.UTC(2018, 0, 17), 3.80],
            [Date.UTC(2018, 0, 18), 7.01],
            [Date.UTC(2018, 0, 19), 5.27],
            [Date.UTC(2018, 0, 20), 8.00]
  
        ]
    }, {
        name: 'Digital Services',
        data: [
            [Date.UTC(2018, 0, 1), 1.03],
            [Date.UTC(2018, 0, 2), 1.09],
            [Date.UTC(2018, 0, 3), 1.07],
            [Date.UTC(2018, 0, 4), 1.05],
            [Date.UTC(2018, 0, 5), 1.13],
            [Date.UTC(2018, 0, 6), 1.03],
            [Date.UTC(2018, 0, 7), 1.07],
            [Date.UTC(2018, 0, 8), 0.99],
            [Date.UTC(2018, 0, 9), 1.04],
            [Date.UTC(2018, 0, 10), 1.05],
            [Date.UTC(2018, 0, 11), 1.03],
            [Date.UTC(2018, 0, 12), 1.00],
            [Date.UTC(2018, 0, 13), 1.03],
            [Date.UTC(2018, 0, 14), 0.98],
            [Date.UTC(2018, 0, 15), 0.90],
            [Date.UTC(2018, 0, 16), 1.00],
            [Date.UTC(2018, 0, 17), 1.05],
            [Date.UTC(2018, 0, 18), 0.99],
            [Date.UTC(2018, 0, 19), 0.99],
            [Date.UTC(2018, 0, 20), 0.96]
  
        ]
    }]

        });

        $(document).ready(function () {
            $("#cluster").depdrop({
                url: 'controllers/RevenueController.php?cluster',
                depends: ['branch']
            });
            $('#branch').on('change', function() {
                id_branch = $('#branch').val();
                branch = $('#branch :selected').text();
                if(branch === 'All')
                {
                    var subtitle = 'SUMBAGUT - Revenue All';
                }
                else
                {
                    var subtitle = branch + ' - Revenue All';
                }
                chart.setTitle(null, { text: subtitle});

                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php?cluster',
                    async: false,
                    success : function()
                    {
                        $('#cluster').material_select();
                    }
                });
            });
            $('#cluster').on('change', function() {
                id_cluster = $('#cluster').val();
                cluster = $('#cluster :selected').text();
                var subtitle = cluster + ' - Revenue All';
                chart.setTitle(null, { text: subtitle});

                var arr = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];
                var one = [403.91604166667, 0, 0, 156.421875, 190.48708333333, 121.66145833333, 52.140625, 104.28125, 440.41447916667, 472.04645833334, 0, 178.3209375];
                var two = [100, 112, 0, 0, 360, 330, 141, 150, 100, 0, 0, 0];
                var three = [10, 12, 60, 70, 60, 300, 101, 100, 100, 67, 110, 10];
                var four = [2, 7.5, 8, 8.2, 9, 11, 7, 18, 21, 7, 9, 10];

                chart.series[0].setData(eval(one), false, true);
                chart.series[1].setData(eval(two), false, true);
                chart.series[2].setData(eval(three), false, true);
                chart.series[3].setData(eval(four), false, true);
                chart.xAxis[0].setCategories(arr, true, true);

                $('#bulan').removeAttr('disabled');
                $('#bulan').material_select();
            });
        });

        // Material Select Initialization
        $(document).ready(function () {
            $('.mdb-select').material_select();
        });

        $(document).ready(function(){
            $('.collaptable').aCollapTable({ 
                startCollapsed: true,
                addColumn: false, 
                plusButton: '<span class="i">+</span>', 
                minusButton: '<span class="i">-</span>' 
            });
        });

        function fungsi_hide() {
            var x = document.getElementById("chart_total");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>