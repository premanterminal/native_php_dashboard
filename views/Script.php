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
        // Inisialisasi data chart script
        var l1_script = "";
        var nama_l1_script = "";
		var id_l1_script = "";
        // Akhir inisialisasi data chart script
		
		// Inisialisasi data chart script
        var l2_script = "";
        var nama_l2_script = "";
		var id_l2_script = "";
        // Akhir inisialisasi data chart script

		// Inisialisasi data chart script
        var l3_script = "";
        var nama_l3_script = "";
		var id_l3_script = "";
        // Akhir inisialisasi data chart script

		
        // Inisialisasi data chart scriptx
        var id_branch_scriptx = "";
        var branch_scriptx = "";
        var id_cluster_scriptx = "";
        var cluster_scriptx = "";
        var bulan_scriptx = "";
        var nama_bulan_scriptx = "";
		var id_bulan_scriptx = "";
        // Akhir inisialisasi data chart scriptx
		
		// Inisialisasi data chart scripty
        var id_branch_scripty = "";
        var branch_scripty = "";
        var id_cluster_scripty = "";
        var cluster_scripty = "";
        var bulan_scripty = "";
        var nama_bulan_scripty = "";
		var id_bulan_scripty = "";
        // Akhir inisialisasi data chart scripty
		
		// Inisialisasi data chart scriptz
        var id_branch_scriptz = "";
        var branch_scriptz = "";
        var id_cluster_scriptz = "";
        var cluster_scriptz = "";
        var bulan_scriptz = "";
        var nama_bulan_scriptz = "";
		var id_bulan_scriptz = "";
        // Akhir inisialisasi data chart scriptz
		
		// Inisialisasi data chart scriptlm
        var id_branch_scriptlm = "";
        var branch_scriptlm = "";
        var id_cluster_scriptlm = "";
        var cluster_scriptlm = "";
        var bulan_scriptlm = "";
        var nama_bulan_scriptlm = "";
		var id_bulan_scriptlm = "";
        // Akhir inisialisasi data chart scriptlm

        // Inisialisasi data home
        var id_branch_home = "";
        var branch_home = "";
        var id_cluster_home = "";
        var cluster_home = "";
        var bulan_home = "";
        var nama_bulan_home = "";
		var id_bulan_home="";
        // Akhir inisialisasi data home
		
		//inisialisasi data script_mkiosdata
		var id_branch_mkiosdata = "";
		var branch_mkiosdata = "";
		var id_cluster_mkiosdata = "";
		var cluster_mkiosdata = "";
		var bulan_script_mkiosdata = "";
		var nama_bulan_script_mkiosdata = "";
		var id_bulan_script_mkiosdata = "";
		// Akhir inisialisasi data script_mkiosdata
		
		//inisialisasi data script_mkiosvoice
		var id_branch_mkiosvoice = "";
		var branch_mkiosvoice = "";
		var id_cluster_mkiosvoice = "";
		var cluster_mkiosvoice = "";
		var bulan_script_mkiosvoice = "";
		var nama_bulan_script_mkiosvoice = "";
		var id_bulan_script_mkiosvoice = "";
		// Akhir inisialisasi data script_mkiosvoice
		
		//inisialisasi data script_mkiosbulk
		var id_branch_mkiosbulk = "";
		var branch_mkiosbulk = "";
		var id_cluster_mkiosbulk = "";
		var cluster_mkiosbulk = "";
		var bulan_mkiosbulk = "";
		var nama_bulan_mkiosbulk = "";
		var id_bulan_mkiosbulk = "";
		// Akhir inisialisasi data script_mkiosbulk
		
		//inisialisasi data script_mkiosdata_inc
		var id_branch_mkiosdata_inc = "";
		var branch_mkiosdata_inc = "";
		var id_cluster_mkiosdata_inc = "";
		var cluster_mkiosdata_inc = "";
		var bulan_mkiosdata_inc = "";
		var nama_bulan_mkiosdata_inc = "";
		var id_bulan_mkiosdata_inc = "";
		// Akhir inisialisasi data script_mkiosdata_inc
		
		//inisialisasi data script_mkiosvoice_inc
		var id_branch_mkiosvoice_inc = "";
		var branch_mkiosvoice_inc = "";
		var id_cluster_mkiosvoice_inc = "";
		var cluster_mkiosvoice_inc = "";
		var bulan_mkiosvoice_inc = "";
		var nama_bulan_mkiosvoice_inc = "";
		var id_bulan_mkiosvoice_inc = "";
		// Akhir inisialisasi data script_mkiosvoice_inc
		
		// Inisialisasi data chart script_region_a
		var id_region_script_region_a = "";
		var region_script_region_a = "";
		var bulan_script_region_a = "";
		var nama_bulan_script_region_a = "";
		var id_bulan_script_region_a = "";
		// Akhir inisialisasi data chart script_region_a
		
		// Inisialisasi data chart script_region_c
		var id_region_script_region_c = "";
		var region_script_region_c = "";
		var bulan_script_region_c = "";
		var nama_bulan_script_region_c = "";
		var id_bulan_script_region_c = "";
		// Akhir inisialisasi data chart script_region_c
		
		$("#loading").ajaxStart(function () {
			$(this).show();
		});

		$("#loading").ajaxStop(function () {
		   $(this).hide();
		});

		//Awal script all tampilan chart
		
		$('#script_region_c').highcharts({
				 chart: {
					type: 'spline'
				},
				title: {
					text: 'GRAFIK COMPARING DAILY'
				},
				subtitle: {
					text: 'REVENUE ALL'
				},
				xAxis: {
					title: {
						text: 'Date'
					},
					categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
				},
				yAxis: [{ // Primary yAxis
				labels: { 
					format: '{value} Billion (M)',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				},
				title: {
					text: 'Revenue Region',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				}
				}, { // Secondary yAxis
				title: {
					text: 'Revenue Area',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				labels: {
					format: '{value} Billion (M)',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				opposite: true
			}],
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					//pointFormat: 'Tanggal {point.x:,.0f}: {point.y:.2f} m'
					formatter:function(){return 'Tanggal '+this.key+':'+parseFloat(this.y).toFixed(1)+ 'm';}
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
				series: [
					{
						name: 'AREA ',
						type: 'column',
						yAxis: 1,
						data: [],
						tooltip: {
							valuePrefix: 'M '
						},
						color: '#003399'
					},
					{
						name: 'AREA M-1',
						type: 'column',
						yAxis: 1,
						data: [],
						tooltip: {
							valuePrefix: 'M '
						},
						color: '#6699ff'
						

					},
					{
						name: 'AREA Y-1',
						type: 'column',
						yAxis: 1,
						data: [],
						tooltip: {
							valuePrefix: 'M '
						},
						color: '#ff9900'
						

					},
					{
						name: 'SUMBAGTENG',
						data: [],
						color: '#000000'
					},
					{
						name: 'SUMBAGTENG M-1',
						data: [],
						color: '#696969',
						dashStyle: 'longdash'
					},
					{
						name: 'SUMBAGTENG Y-1',
						data: [],
						color: '#778899',
						dashStyle: 'shortdash'
					},
					{
						name: 'SUMBAGUT',
						data: [],
						color: '#ff0000'
					},
					{
						name: 'SUMBAGUT M-1',
						data: [],
						color: '#ff3333',
						dashStyle: 'longdash'
					},
					{
						name: 'SUMBAGUT Y-1',
						data: [],
						color: '#FF4D4D',
						dashStyle: 'shortdash'
					},
					{
						name: 'SUMBAGSEL',
						data: [],
						color: '#8a8a5c'
					}
					,
					{
						name: 'SUMBAGSEL M-1',
						data: [],
						color: '#888844',
						dashStyle: 'longdash'
					}
					,
					{
						name: 'SUMBAGSEL Y-1',
						data: [],
						color: '#bbbb77',
						dashStyle: 'shortdash'
					}
				]
			});
		
			$('#script_region_a').highcharts({
				 chart: {
					type: 'spline'
				},
				title: {
					text: 'GRAFIK REVENUE ALL'
				},
				subtitle: {
					text: 'AREA 1'
				},
				xAxis: {
					title: {
						text: 'Date'
					},
					categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
				},
				yAxis: {
					title: {
						text: 'Revenue (M)'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					//pointFormat: 'Tanggal {point.x:,.0f}: {point.y:.2f} m'
					formatter:function(){return 'Tanggal '+this.key+':'+parseFloat(this.y).toFixed(1)+ 'm';}
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
				series: [
					{
						name: 'Lastmonth',
						data: [],
						color: '#003399'
					},
					{
						name: 'Now',
						data: [],
						color: '#0090FF'
					},
					{
						name: 'Lastyear',
						data: [],
						color: '#009933'
					}
				]
			});
			
			$('#scriptx').highcharts({
				 chart: {
					type: 'spline'
				},
				title: {
					text: 'GRAFIK REVENUE L1'
				},
				subtitle: {
					text: 'SUMBAGUT'
				},
				xAxis: {
					title: {
						text: 'Date'
					},
					categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
				},
				yAxis: {
					title: {
						text: 'Revenue (M)'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					//pointFormat: 'Tanggal {point.x:,.0f}: {point.y:.2f} m'
					formatter:function(){return 'Tanggal '+this.key+':'+parseFloat(this.y).toFixed(1)+ 'm';}
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
				series: [
					{
						name: 'Voice',
						data: [],
						color: '#003399'
					},
					{
						name: 'SMS',
						data: []
					},
					{
						name: 'Broadband',
						data: [],
						color: '#009933'
					},
					   {
						name: 'Digital Services',
						data: [],
						color: '#ff6600'
					}
				]
			});
			
			//mkios bulk chart
			$('#script_mkiosbulk').highcharts({
				 chart: {
					type: 'spline'
				},
				title: {
					text: 'GRAFIK MKIOS BULK DAILY'
				},
				subtitle: {
					text: 'SUMBAGUT'
				},
				xAxis: {
					title: {
						text: 'Date'
					},
					categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
				},
				yAxis: {
					title: {
						text: 'Revenue (M)'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					//pointFormat: 'Tanggal {point.x:,.0f}: {point.y:.2f} m'
					formatter:function(){return 'Tanggal '+this.key+':'+parseFloat(this.y).toFixed(1)+ 'm';}
				},
				plotOptions: {
					line: {
						
						enableMouseTracking: true
					},
					spline: {
						marker: {
							enabled: true
						},dataLabels: {
							enabled: true
						}
					}
				},
				series: [
					{
						name: 'Last Month',
						data: []
					},
					{
						name: 'This Month',
						data: []
					}]
			});
			
		//mkios data inc chart
			$('#script_mkiosdata_inc').highcharts({
				 chart: {
					type: 'spline'
				},
				title: {
					text: 'GRAFIK MKIOS DATA DAILY'
				},
				subtitle: {
				text: 'SUMBAGUT'
			},
			xAxis: [{
				categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
				'21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
				crosshair: true
			}],
			yAxis: [{ // Primary yAxis
				labels: { 
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				},
				title: {
					text: 'Revenue Denom',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				}
			}, { // Secondary yAxis
				title: {
					text: 'Revenue Total',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				labels: {
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				opposite: true
			}],
			tooltip: {
				shared: true
			},
			plotOptions: {
					series: {
						enableMouseTracking: true
					}
			},
			series: [
			{
				name: 'Total Last Month',
				type: 'column',
				yAxis: 1,
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
						dashStyle: 'longdash'
				

			},
			{
				name: 'Total This Month',
				type: 'column',
				yAxis: 1,
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
				

			},			
			{
				name: '5k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#8cff1a'
			}, 
			{
				name: '5k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#336600',
						dashStyle: 'longdash'
			},
			{
				name: '10k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#ffb380'
			},
			{
				name: '10k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#ff6600',
						dashStyle: 'longdash'
			},			
			{
				name: '20k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#cc0066'
			},
			{
				name: '20k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#660033',
						dashStyle: 'longdash'
			},			
			{
				name: '25k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#ff794d'
			},
			{
				name: '25k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#cc3300',
						dashStyle: 'longdash'
			},
			{
				name: '50k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#4d79ff'
			},
			{
				name: '50k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#0033cc',
						dashStyle: 'longdash'
			},
			{
				name: '100k This Month',
				type: 'spline',
				tooltip: {
					valuePrefix: 'Jt '
				},
				data: [],
				color: '#d2a679'
			   
			},
			{
				name: '100k Last Month',
				type: 'spline',
				tooltip: {
					valuePrefix: 'Jt '
				},
				data: [],
				color: '#996633',
						dashStyle: 'longdash'
			   
			}
			
			]

			});	
        
		//mkiosvoice inc
			$('#script_mkiosvoice_inc').highcharts({
					chart: {
				zoomType: 'xy'
			},
			title: {
				text: 'Mkios Voice'
			},
			subtitle: {
				text: 'SUMBAGUT'
			},
			xAxis: [{
				categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
				'21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
				crosshair: true
			}],
			yAxis: [{ // Primary yAxis
				labels: { 
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				},
				title: {
					text: 'Revenue Denom',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				}
			}, { // Secondary yAxis
				title: {
					text: 'Revenue Total',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				labels: {
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				opposite: true
			}],
			tooltip: {
				shared: true
			},
			plotOptions: {
					series: {
						enableMouseTracking: true
					}
			},
			series: [
			{
				name: 'Total Last Month',
				type: 'column',
				yAxis: 1,
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
						dashStyle: 'longdash'
				

			},
			{
				name: 'Total This Month',
				type: 'column',
				yAxis: 1,
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
				

			},			
			{
				name: '5k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#8cff1a',
						dashStyle: 'longdash'
			}, 
			{
				name: '5k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#336600'
			},
			{
				name: '10k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#ffb380',
						dashStyle: 'longdash'
			},
			{
				name: '10k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#ff6600'
			},			
			{
				name: '20k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#cc0066',
						dashStyle: 'longdash'
			},
			{
				name: '20k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#660033'
			},			
			{
				name: '25k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#ff794d',
						dashStyle: 'longdash'
			},
			{
				name: '25k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#cc3300'
			},
			{
				name: '50k Last Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#4d79ff',
						dashStyle: 'longdash'
			},
			{
				name: '50k This Month',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				},
				color: '#0033cc'
			},
			{
				name: '100k Last Month',
				type: 'spline',
				tooltip: {
					valuePrefix: 'Jt '
				},
				data: [],
				color: '#d2a679',
						dashStyle: 'longdash'
			   
			},
			{
				name: '100k This Month',
				type: 'spline',
				tooltip: {
					valuePrefix: 'Jt '
				},
				data: [],
				color: '#996633'
			   
			}
			
			]
				});
		
        $('#scriptlm').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'GRAFIK REVENUE TOTAL LAST MONTH'
            },
            subtitle: {
                text: 'SUMBAGUT'
            },
            xAxis: {
                title: {
                    text: 'Date'
                },
                categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
            },
            yAxis: {
                title: {
                    text: 'Revenue (M)'
                },
                min: 0
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                formatter:function(){return 'Tanggal '+this.key+':'+parseFloat(this.y).toFixed(1)+ 'm';}
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
            series: [
                {
                    name: 'Last Year',
                    data: []
                },
                {
                    name: 'Now',
                    data: []
                },
                {
                    name: 'Last Month',
                    data: []
                }
            ]
        });
		
		
				
		$('#script_mkiosvoice').highcharts({
					chart: {
				zoomType: 'xy'
			},
			title: {
				text: 'Mkios Voice'
			},
			subtitle: {
				text: 'SUMBAGUT'
			},
			xAxis: [{
				categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
				'21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
				crosshair: true
			}],
			yAxis: [{ // Primary yAxis
				labels: { 
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				},
				title: {
					text: 'Revenue Denom',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				}
			}, { // Secondary yAxis
				title: {
					text: 'Revenue Total',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				labels: {
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				opposite: true
			}],
			tooltip: {
				shared: true
			},
			plotOptions: {
					series: {
						enableMouseTracking: false
					}
			},
			series: [{
				name: 'Total',
				type: 'column',
				yAxis: 1,
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
				

			}, {
				name: 'Denom 5k',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
			}, {
				name: 'Denom 10k',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
			}, {
				name: 'Denom 20k',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
			}, {
				name: 'Denom 25k',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
			}, {
				name: 'Denom 50k',
				type: 'spline',
				data: [],
				tooltip: {
					valuePrefix: 'Jt '
				}
			}, {
				name: 'Denom 100k',
				type: 'spline',
				tooltip: {
					valuePrefix: 'Jt '
				},
				data: []
			   
			}
			
			]
				});

			$('#script_mkiosdata').highcharts({
			chart: {
				zoomType: 'xy'
			},
			title: {
				text: 'Mkios Data'
			},
			subtitle: {
				text: 'SUMBAGUT'
			},
			xAxis: [{
				categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
				'21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
				crosshair: true
			}],
			yAxis: [{ // Primary yAxis
				labels: { 
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				},
				title: {
					text: 'Revenue Denom',
					style: {
						color: Highcharts.getOptions().colors[1]
					}
				}
			}, { // Secondary yAxis
				title: {
					text: 'Revenue Total',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				labels: {
					format: '{value} Jt',
					style: {
						color: Highcharts.getOptions().colors[0]
					}
				},
				opposite: true
			}],
			tooltip: {
				shared: true
			},
			
			plotOptions: {
					series: {
						enableMouseTracking: false
					}
			},
			series: [{
				name: 'Total',
				type: 'column',
				yAxis: 1,
				data: [],
				color: '#ffb31a'
				/*tooltip: {
					valuePrefix: 'Jt '
				}*/

			}, {
				name: 'Denom 5k',
				type: 'spline',
				data: [],
				color: '#00bfff'
				/*tooltip: {
					valuePrefix: 'Jt '
				}*/
			}, {
				name: 'Denom 10k',
				type: 'spline',
				data: [],
				color: '#ff0000'
				/*tooltip: {
					valuePrefix: 'Jt '
				}*/
			}, {
				name: 'Denom 20k',
				type: 'spline',
				data: [],
				color: '#00e600'
				/*tooltip: {
					valuePrefix: 'Jt '
				}*/
			}, {
				name: 'Denom 25k',
				type: 'spline',
				data: [],
				color: '#339933'
				/*tooltip: {
					valuePrefix: 'Jt '
				}*/
			}, {
				name: 'Denom 50k',
				type: 'spline',
				data: [],
				color: '#0066cc'
				/*tooltip: {
					valuePrefix: 'Jt '
				}*/
			}, {
				name: 'Denom 100k',
				type: 'spline',
				/*tooltip: {
					valuePrefix: 'Jt '
				},*/
				data: [],
				color: '#000000'
			   
			}
			
			]
				});
				//chart mkios voice

				
				
				//chart atas actual revenue
				$('#script').highcharts({
					chart: {

						type: 'spline'
					},
					title: {
						text: 'GRAFIK REVENUE TOTAL'
					},
					subtitle: {
						text: 'SUMBAGUT'
					},
					xAxis: {
						/*type: 'datetime',
						dateTimeLabelFormats: {
							month: '%e. %b',
							year: '%b'
						},*/
						title: {
							text: 'Date'
						},
						categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
					},
					yAxis: {
						title: {
							text: 'Revenue (M)'
						},
						min: 0
					},
					tooltip: {
						headerFormat: '<b>{series.name}</b><br>',
						//pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
						//pointFormat: 'Tanggal {point.x:,.0f}: {point.y:.2f} m'
						formatter:function(){return 'Tanggal '+this.key+':'+parseFloat(this.y).toFixed(1)+ 'm';}
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
					series: [
						{
							name: 'Last Year',
							data: [],
							color: '#00cc00'
						},
						{
							name: 'Now',
							data: [],
							color: '#FF0000'
						},
						{
							name: 'Last Month',
							data: [],
							color: '#000000'
						}
					]
				});
				
				$('#scripty').highcharts({
					chart: {
						type: 'spline'
					},
					title: {
						text: 'GRAFIK REVENUE TOTAL'
					},
					subtitle: {
						text: 'SUMBAGUT'
					},
					xAxis: {
						/*type: 'datetime',
						dateTimeLabelFormats: {
							month: '%e. %b',
							year: '%b'
						},*/
						title: {
							text: 'Date'
						},
						categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
					},
					yAxis: {
						title: {
							text: 'Revenue (M)'
						},
						min: 0
					},
					tooltip: {
						headerFormat: '<b>{series.name}</b><br>',
						//pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
						//pointFormat: 'Tanggal {point.x:,.0f}: {point.y:.2f} m'
						formatter:function(){return 'Tanggal '+this.key+':'+parseFloat(this.y).toFixed(1)+ 'm';}
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
					series: [
						{
							name: 'Last Year',
							data: []
						},
						{
							name: 'M-1',
							data: []
						},
						{
							name: 'M-2',
							data: []
						}
					]
				});

        // Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var script = $('#script').highcharts();
        // Akhir Inisialisasi Chart

        // Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var scriptx = $('#scriptx').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var scripty = $('#scripty').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var scriptlm = $('#scriptlm').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var script_mkiosdata = $('#script_mkiosdata').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var script_mkiosvoice = $('#script_mkiosvoice').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var script_mkiosbulk = $('#script_mkiosbulk').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var script_mkiosdata_inc = $('#script_mkiosdata_inc').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
        var script_mkiosvoice_inc = $('#script_mkiosvoice_inc').highcharts();
        // Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
		var script_region_a = $('#script_region_a').highcharts();
		// Akhir Inisialisasi Chart
		
		// Inisialisasi Chart. Inisialisasi ini harus dibawah Chart yg telah ada
		var script_region_c = $('#script_region_c').highcharts();
		// Akhir Inisialisasi Chart

        // Fungsi Generate Data Chart Sumbagut Dinamis Saat Awal Loading
        $(document).ready(function () {
			
			
			//script mkiosbulk
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosbulk: '' },
                success : function(data)
                {
                    var mkiosbulk = [];
                    var tanggal_mkiosbulk = [];
                    
                    $.each(data, function(i, val) {
                        mkiosbulk.push(parseFloat(val));
                        tanggal_mkiosbulk.push(parseInt(i));
                        $("#tanggal_mkiosbulk").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

                    script_mkiosbulk.xAxis[0].setCategories(tanggal_mkiosbulk, true, true);
                    script_mkiosbulk.series[1].setData(mkiosbulk, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosbulk_lastmonth: '' },
                success : function(data)
                {
                    var mkiosbulk_lastmonth = [];
                    
                    $.each(data, function(i, val) {
                        mkiosbulk_lastmonth.push(parseFloat(val));
                    });
                    script_mkiosbulk.series[0].setData(mkiosbulk_lastmonth, true);
                }
            });
			
			//script mkiosdata inc
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_inc: '' },
                success : function(data)
                {
                    var mkiosdata_inc = [];
                    var tanggal_mkiosdata_inc = [];
                    
                    $.each(data, function(i, val) {
                        mkiosdata_inc.push(parseFloat(val));
                        tanggal_mkiosdata_inc.push(parseInt(i));
                        $("#tanggal_mkiosdata_inc").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

                    script_mkiosdata_inc.xAxis[0].setCategories(tanggal_mkiosdata_inc, true, true);
                    script_mkiosdata_inc.series[1].setData(mkiosdata_inc, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_lastmonth_inc: '' },
                success : function(data)
                {
                    var mkiosdata_lastmonth_inc = [];
                    
                    $.each(data, function(i, val) {
                        mkiosdata_lastmonth_inc.push(parseFloat(val));
                    });
                    script_mkiosdata_inc.series[0].setData(mkiosdata_lastmonth_inc, true);
                }
            });
			
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d5: '' },
			success : function(data)
			{
				var mkiosdata_d5 = [];
				$.each(data, function(i, val) {
					mkiosdata_d5.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[2].setData(mkiosdata_d5, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d10: '' },
			success : function(data)
			{
				var mkiosdata_d10 = [];
				$.each(data, function(i, val) {
				mkiosdata_d10.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[4].setData(mkiosdata_d10, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d25: '' },
			success : function(data)
			{
				var mkiosdata_d25 = [];
				$.each(data, function(i, val) {
				mkiosdata_d25.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[6].setData(mkiosdata_d25, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d20: '' },
			success : function(data)
			{
				var mkiosdata_d20 = [];
				$.each(data, function(i, val) {
				mkiosdata_d20.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[8].setData(mkiosdata_d20, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d50: '' },
			success : function(data)
			{
				var mkiosdata_d50 = [];
				$.each(data, function(i, val) {
				mkiosdata_d50.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[10].setData(mkiosdata_d50, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d100: '' },
			success : function(data)
			{
				var mkiosdata_d100 = [];
				$.each(data, function(i, val) {
				mkiosdata_d100.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[12].setData(mkiosdata_d100, true);
			}
			});


			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d5_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosdata_d5_lastmonth_inc = [];
				$.each(data, function(i, val) {
					mkiosdata_d5_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[3].setData(mkiosdata_d5_lastmonth_inc, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d10_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosdata_d10_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosdata_d10_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[5].setData(mkiosdata_d10_lastmonth_inc, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d25_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosdata_d25_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosdata_d25_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[7].setData(mkiosdata_d25_lastmonth_inc, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d20_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosdata_d20_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosdata_d20_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[9].setData(mkiosdata_d20_lastmonth_inc, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d50_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosdata_d50_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosdata_d50_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[11].setData(mkiosdata_d50_lastmonth_inc, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosdata_d100_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosdata_d100_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosdata_d100_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosdata_inc.series[13].setData(mkiosdata_d100_lastmonth_inc, true);
			}
			});
			
			//script mkiosvoice inc
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_inc: '' },
                success : function(data)
                {
                    var mkiosvoice_inc = [];
                    var tanggal_mkiosvoice_inc = [];
                    
                    $.each(data, function(i, val) {
                        mkiosvoice_inc.push(parseFloat(val));
                        tanggal_mkiosvoice_inc.push(parseInt(i));
                        $("#tanggal_mkiosvoice_inc").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

					
                    script_mkiosvoice_inc.xAxis[0].setCategories(tanggal_mkiosvoice_inc, true, true);
                    script_mkiosvoice_inc.series[1].setData(mkiosvoice_inc, true);
                }
            });
			

			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_lastmonth_inc: '' },
                success : function(data)
                {
					var mkiosvoice_lastmonth_inc = [];
                    $.each(data, function(i, val) {
                        mkiosvoice_lastmonth_inc.push(parseFloat(val));
                    });
                    script_mkiosvoice_inc.series[0].setData(mkiosvoice_lastmonth_inc, true);
                }
            });
			
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d5_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosvoice_d5_lastmonth_inc = [];
				$.each(data, function(i, val) {
					mkiosvoice_d5_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[2].setData(mkiosvoice_d5_lastmonth_inc, true);
			}
			});

			
			
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d10_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosvoice_d10_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosvoice_d10_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[4].setData(mkiosvoice_d10_lastmonth_inc, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d25_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosvoice_d25_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosvoice_d25_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[6].setData(mkiosvoice_d25_lastmonth_inc, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d20_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosvoice_d20_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosvoice_d20_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[8].setData(mkiosvoice_d20_lastmonth_inc, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d50_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosvoice_d50_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosvoice_d50_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[10].setData(mkiosvoice_d50_lastmonth_inc, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d100_lastmonth_inc: '' },
			success : function(data)
			{
				var mkiosvoice_d100_lastmonth_inc = [];
				$.each(data, function(i, val) {
				mkiosvoice_d100_lastmonth_inc.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[12].setData(mkiosvoice_d100_lastmonth_inc, true);
			}
			});


			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d5: '' },
			success : function(data)
			{
				var mkiosvoice_d5 = [];
				$.each(data, function(i, val) {
					mkiosvoice_d5.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[3].setData(mkiosvoice_d5, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d10: '' },
			success : function(data)
			{
				var mkiosvoice_d10 = [];
				$.each(data, function(i, val) {
				mkiosvoice_d10.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[5].setData(mkiosvoice_d10, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d25: '' },
			success : function(data)
			{
				var mkiosvoice_d25 = [];
				$.each(data, function(i, val) {
				mkiosvoice_d25.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[7].setData(mkiosvoice_d25, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d20: '' },
			success : function(data)
			{
				var mkiosvoice_d20 = [];
				$.each(data, function(i, val) {
				mkiosvoice_d20.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[9].setData(mkiosvoice_d20, true);
			}
			});
						
			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d50: '' },
			success : function(data)
			{
				var mkiosvoice_d50 = [];
				$.each(data, function(i, val) {
				mkiosvoice_d50.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[11].setData(mkiosvoice_d50, true);
			}
			});

			$.ajax({ type: "GET",
			url: 'controllers/RevenueController.php',
			data: { branch: 'SUMBAGUT', mkiosvoice_d100: '' },
			success : function(data)
			{
				var mkiosvoice_d100 = [];
				$.each(data, function(i, val) {
				mkiosvoice_d100.push(parseFloat(val));
				});
				script_mkiosvoice_inc.series[13].setData(mkiosvoice_d100, true);
			}
			});




			//script lastmonth up
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', last_year_y: '' },
                success : function(data)
                {
                    var last_year_y = [];
                    var tanggal_scripty = [];
                    
                    $.each(data, function(i, val) {
                        last_year_y.push(parseFloat(val));
                        tanggal_scripty.push(parseInt(i));
                        $("#tanggal_scripty").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

                    scripty.xAxis[0].setCategories(tanggal_scripty, true, true);
                    scripty.series[0].setData(last_year_y, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', now_y: '' },
                success : function(data)
                {
                    var now_y = [];
                    $.each(data, function(i, val) {
                        now_y.push(parseFloat(val));
                    });

                    scripty.series[1].setData(now_y, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', last_month_y: '' },
                success : function(data)
                {
                    var last_month_y = [];
                    $.each(data, function(i, val) {
                        last_month_y.push(parseFloat(val));
                    });

                    scripty.series[2].setData(last_month_y, true);
                }
            });
			
			//script actual up
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', last_year: '' },
                success : function(data)
                {
                    var last_year = [];
                    var tanggal = [];
                    
                    $.each(data, function(i, val) {
                        last_year.push(parseFloat(val));
                        tanggal.push(parseInt(i));
                        $("#tanggal").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

                    script.xAxis[0].setCategories(tanggal, true, true);
                    script.series[0].setData(last_year, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', now: '' },
                success : function(data)
                {
                    var now = [];
                    $.each(data, function(i, val) {
                        now.push(parseFloat(val));
                    });

                    script.series[1].setData(now, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', last_month: '' },
                success : function(data)
                {
                    var last_month = [];
                    $.each(data, function(i, val) {
                        last_month.push(parseFloat(val));
                    });

                    script.series[2].setData(last_month, true);
                }
            });

            
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', last_year_lm: '' },
                success : function(data)
                {
                    var last_year_lm = [];
                    var tanggal_scriptlm = [];
                    
                    $.each(data, function(i, val) {
                        last_year_lm.push(parseFloat(val));
                        tanggal_scriptlm.push(parseInt(i));
                        $("#tanggal_scriptlm").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

                    scriptlm.xAxis[0].setCategories(tanggal_scriptlm, true, true);
                    scriptlm.series[0].setData(last_year_lm, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', now_lm: '' },
                success : function(data)
                {
                    var now_lm = [];
                    $.each(data, function(i, val) {
                        now_lm.push(parseFloat(val));
                    });

                    scriptlm.series[1].setData(now_lm, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', last_month_lm: '' },
                success : function(data)
                {
                    var last_month_lm = [];
                    $.each(data, function(i, val) {
                        last_month_lm.push(parseFloat(val));
                    });

                    scriptlm.series[2].setData(last_month_lm, true);
                }
            });
			
            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', voice: '' },
                success : function(data)
                {
                    var voice = [];
                    $.each(data, function(i, val) {
                        voice.push(parseFloat(val));
                    });

                    scriptx.series[0].setData(voice, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', sms: '' },
                success : function(data)
                {
                    var sms = [];
                    $.each(data, function(i, val) {
                        sms.push(parseFloat(val));
                    });

                    scriptx.series[1].setData(sms, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', broadband: '' },
                success : function(data)
                {
                    var broadband = [];
                    $.each(data, function(i, val) {
                        broadband.push(parseFloat(val));
                    });

                    scriptx.series[2].setData(broadband, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', digital_services: '' },
                success : function(data)
                {
                    var digital_services = [];
                    $.each(data, function(i, val) {
                        digital_services.push(parseFloat(val));
                    });

                    scriptx.series[3].setData(digital_services, true);
                }
            });
			
			//script mkiosdata
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_total: '' },
                success : function(data)
                {
                    var mkiosdata_total = [];
                    var tanggal_mkiosdata = [];
                    
                    $.each(data, function(i, val) {
                        mkiosdata_total.push(parseFloat(val));
                        tanggal_mkiosdata.push(parseInt(i));
                        $("#tanggal_mkiosdata").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

                    script_mkiosdata.xAxis[0].setCategories(tanggal_mkiosdata, true, true);
                    script_mkiosdata.series[0].setData(mkiosdata_total, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_d5: '' },
                success : function(data)
                {
                    var mkiosdata_d5 = [];
                    $.each(data, function(i, val) {
                        mkiosdata_d5.push(parseFloat(val));
                    });

                    script_mkiosdata.series[1].setData(mkiosdata_d5, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_d10: '' },
                success : function(data)
                {
                    var mkiosdata_d10 = [];
                    $.each(data, function(i, val) {
                        mkiosdata_d10.push(parseFloat(val));
                    });

                    script_mkiosdata.series[2].setData(mkiosdata_d10, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_d20: '' },
                success : function(data)
                {
                    var mkiosdata_d20 = [];
                    $.each(data, function(i, val) {
                        mkiosdata_d20.push(parseFloat(val));
                    });

                    script_mkiosdata.series[3].setData(mkiosdata_d20, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_d25: '' },
                success : function(data)
                {
                    var mkiosdata_d25 = [];
                    $.each(data, function(i, val) {
                        mkiosdata_d25.push(parseFloat(val));
                    });

                    script_mkiosdata.series[4].setData(mkiosdata_d25, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_d50: '' },
                success : function(data)
                {
                    var mkiosdata_d50 = [];
                    $.each(data, function(i, val) {
                        mkiosdata_d50.push(parseFloat(val));
                    });

                    script_mkiosdata.series[5].setData(mkiosdata_d50, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosdata_d100: '' },
                success : function(data)
                {
                    var mkiosdata_d100 = [];
                    $.each(data, function(i, val) {
                        mkiosdata_d100.push(parseFloat(val));
                    });

                    script_mkiosdata.series[6].setData(mkiosdata_d100, true);
                }
            });
			
			//mkiosvoice
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_total: '' },
                success : function(data)
                {
                    var mkiosvoice_total = [];
                    var tanggal_mkiosvoice = [];
                    
                    $.each(data, function(i, val) {
                        mkiosvoice_total.push(parseFloat(val));
                        tanggal_mkiosvoice.push(parseInt(i));
                        $("#tanggal_mkiosvoice").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    });

                    script_mkiosvoice.xAxis[0].setCategories(tanggal_mkiosvoice, true, true);
                    script_mkiosvoice.series[0].setData(mkiosvoice_total, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_d5: '' },
                success : function(data)
                {
                    var mkiosvoice_d5 = [];
                    $.each(data, function(i, val) {
                        mkiosvoice_d5.push(parseFloat(val));
                    });

                    script_mkiosvoice.series[1].setData(mkiosvoice_d5, true);
                }
            });

            $.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_d10: '' },
                success : function(data)
                {
                    var mkiosvoice_d10 = [];
                    $.each(data, function(i, val) {
                        mkiosvoice_d10.push(parseFloat(val));
                    });

                    script_mkiosvoice.series[2].setData(mkiosvoice_d10, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_d20: '' },
                success : function(data)
                {
                    var mkiosvoice_d20 = [];
                    $.each(data, function(i, val) {
                        mkiosvoice_d20.push(parseFloat(val));
                    });

                    script_mkiosvoice.series[3].setData(mkiosvoice_d20, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_d25: '' },
                success : function(data)
                {
                    var mkiosvoice_d25 = [];
                    $.each(data, function(i, val) {
                        mkiosvoice_d25.push(parseFloat(val));
                    });

                    script_mkiosvoice.series[4].setData(mkiosvoice_d25, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_d50: '' },
                success : function(data)
                {
                    var mkiosvoice_d50 = [];
                    $.each(data, function(i, val) {
                        mkiosvoice_d50.push(parseFloat(val));
                    });

                    script_mkiosvoice.series[5].setData(mkiosvoice_d50, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { branch: 'SUMBAGUT', mkiosvoice_d100: '' },
                success : function(data)
                {
                    var mkiosvoice_d100 = [];
                    $.each(data, function(i, val) {
                        mkiosvoice_d100.push(parseFloat(val));
                    });

                    script_mkiosvoice.series[6].setData(mkiosvoice_d100, true);
                }
            });
			//script region monthly
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { region: 'AREA SUMATERA', region_now: '' },
                success : function(data)
                {
                    var region_now = [];
                    
                    $.each(data, function(i, val) {
                        region_now.push(parseFloat(val));
                    });

                    script_region_a.series[1].setData(region_now, true);
                }
            });
			
			
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { region: 'AREA SUMATERA', region_lastmonth: '' },
                success : function(data)
                {
                    var region_lastmonth = [];
                    //var tanggal_region = [];
                    
                    
                    $.each(data, function(i, val) {
                        region_lastmonth.push(parseFloat(val));
                    //    tanggal_region.push(parseInt(i));
                    //    $("#tanggal_region").append("<th rowspan='2' style='font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center'><b>"+i+"<b></th>");
                    
					});

                    //script_region_a.xAxis[0].setCategories(tanggal_region, true, true);
                    script_region_a.series[0].setData(region_lastmonth, true);
                }
            });
			
			$.ajax({ type: "GET",
                url: 'controllers/RevenueController.php',
                data: { region: 'AREA SUMATERA', region_lastyear: '' },
                success : function(data)
                {
                    var region_lastyear = [];
                   
                    
                    $.each(data, function(i, val) {
                        region_lastyear.push(parseFloat(val));
                    });

                    script_region_a.series[2].setData(region_lastyear, true);
                }
            });
			//akhir script region monthly
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagut: ''},
				success : function(data)
				{
					var l1_sumbagut = [];

					$.each(data, function(i, val){
						l1_sumbagut.push(parseFloat(val));
					});

					script_region_c.series[6].setData(l1_sumbagut, true);
				}
			});
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagut_lastmonth: ''},
				success : function(data)
				{
					var l1_sumbagut_lastmonth = [];

					$.each(data, function(i, val){
						l1_sumbagut_lastmonth.push(parseFloat(val));
					});

					script_region_c.series[7].setData(l1_sumbagut_lastmonth, true);
				}
			});
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagut_lastyear: ''},
				success : function(data)
				{
					var l1_sumbagut_lastyear = [];

					$.each(data, function(i, val){
						l1_sumbagut_lastyear.push(parseFloat(val));
					});

					script_region_c.series[8].setData(l1_sumbagut_lastyear, true);
				}
			});

			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_area: ''},
				success : function(data)
				{
					var l1_area = [];

					$.each(data,function(i, val){
						l1_area.push(parseFloat(val));
					});

					script_region_c.series[0].setData(l1_area,true);
				}
			});
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_area_lastmonth: ''},
				success : function(data)
				{
					var l1_area_lastmonth = [];

					$.each(data,function(i, val){
						l1_area_lastmonth.push(parseFloat(val));
					});

					script_region_c.series[1].setData(l1_area_lastmonth,true);
				}
			});
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_area_lastyear: ''},
				success : function(data)
				{
					var l1_area_lastyear = [];

					$.each(data,function(i, val){
						l1_area_lastyear.push(parseFloat(val));
					});

					script_region_c.series[2].setData(l1_area_lastyear,true);
				}
			});

			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagteng: ''},
				success : function(data)
				{
					var l1_sumbagteng = [];

					$.each(data, function(i,val){
						l1_sumbagteng.push(parseFloat(val));
					});

					script_region_c.series[3].setData(l1_sumbagteng,true);
				}
			});
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagteng_lastmonth: ''},
				success : function(data)
				{
					var l1_sumbagteng_lastmonth = [];

					$.each(data, function(i,val){
						l1_sumbagteng_lastmonth.push(parseFloat(val));
					});

					script_region_c.series[4].setData(l1_sumbagteng_lastmonth,true);
				}
			});
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagteng_lastyear: ''},
				success : function(data)
				{
					var l1_sumbagteng_lastyear = [];

					$.each(data, function(i,val){
						l1_sumbagteng_lastyear.push(parseFloat(val));
					});

					script_region_c.series[5].setData(l1_sumbagteng_lastyear,true);
				}
			});

			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagsel: ''},
				success : function(data)
				{
					var l1_sumbagsel = [];

					$.each(data, function(i,val){
						l1_sumbagsel.push(parseFloat(val));
					});

					script_region_c.series[9].setData(l1_sumbagsel, true);
				}

			});
			
			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagsel_lastmonth: ''},
				success : function(data)
				{
					var l1_sumbagsel_lastmonth = [];

					$.each(data, function(i,val){
						l1_sumbagsel_lastmonth.push(parseFloat(val));
					});

					script_region_c.series[10].setData(l1_sumbagsel_lastmonth, true);
				}

			});

			$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { l1: 'REVENUE ALL', l1_sumbagsel_lastyear: ''},
				success : function(data)
				{
					var l1_sumbagsel_lastyear = [];

					$.each(data, function(i,val){
						l1_sumbagsel_lastyear.push(parseFloat(val));
					});

					script_region_c.series[11].setData(l1_sumbagsel_lastyear, true);
				}

			});
			
        });
        // Akhir Fungsi Generate Data Chart Sumbagut Dinamis Saat Awal Loading

        // Fungsi Tombol Menu Collapse
        $(".button-collapse").sideNav();
        // Akhir Fungsi Tombol Menu Collapse

        // Fungsi Scroll Page
        var container = document.getElementById('slide-out');
        Ps.initialize(container, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
        // Akhir Fungsi Scroll Page

        // Fungsi Inisialisasi Data Table
        $(document).ready(function() {
            $('#dataTables').DataTable({"order": []});
        });
        // Akhir Fungsi Inisialisasi Data Table

        // Fungsi Select Material Pada Data Table
        $(document).ready(function () {
            $('select[name="dataTables_length"]').material_select();
        });
        // Akhir Fungsi Select Material Pada Data Table
		
		// Fungsi Dropdown Chart Script Region C (Chart Region Sompare)
        $(document).ready(function () {
            // Fungsi Dropdown Region
            $('#l1_script_region_c').on('change', function() {
                id_l1_script_region_c = $('#l1_script_region_c').val();
                l1_script_region_c = $('#l1_script_region_c :selected').text();
                if(l1_script_region_c === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue L1 SUMBAGUT';
                }
                else
                {
                    var subtitle = l1_script_region_c + ' - Revenue L1 SUMBAGUT';
                }
                script_region_c.setTitle(null, { text: subtitle});

                // Fungsi GET Data Region Tanggal dan Area
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { l1: l1_script_region_c, l1_area: '' },
                    success : function(data)
                    {
                        var l1_area = [];
                        var tanggal = [];

                        $("#l1_area").html("");
                        $("#l1_area").append("<td>Area</td>");
                        
                        $.each(data, function(i, val) {
                            l1_area.push(parseFloat(val));
                     		 tanggal.push(parseInt(i));

                            $("#l1_area").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					
					   });

                        script_region_c.xAxis[0].setCategories(tanggal, true, true);
                        script_region_c.series[0].setData(l1_area, true);
                    }
                });
                // Fungsi GET Data Region Tanggal dan Area

                // Fungsi GET Data Region Sumbagteng
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { l1: l1_script_region_c, l1_sumbagteng: '' },
                    success : function(data)
                    {
                        var l1_sumbagteng = [];

                        $("#l1_sumbagteng").html("");
                        $("#l1_sumbagteng").append("<td>Sumbagteng</td>");

                        $.each(data, function(i, val) {
                            l1_sumbagteng.push(parseFloat(val));

                            $("#l1_sumbagteng").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_region_c.series[3].setData(l1_sumbagteng, true);
                    }
                });
                // Akhir Fungsi GET Data Region Sumbagteng

                // Fungsi GET Data Region Sumbagut
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { l1: l1_script_region_c, l1_sumbagut: '' },
                    success : function(data)
                    {
                        var l1_sumbagut = [];

                        $("#l1_sumbagut").html("");
                        $("#l1_sumbagut").append("<td>Sumbagut</td>");

                        $.each(data, function(i, val) {
                            l1_sumbagut.push(parseFloat(val));

                            $("#l1_sumbagut").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_region_c.series[6].setData(l1_sumbagut, true);
                    }
                });
                // Akhir Fungsi GET Data Region Sumbagut
                                
                // Fungsi GET Data Region Sumbagsel
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { l1: l1_script_region_c, l1_sumbagsel: '' },
                    success : function(data)
                    {
                        var l1_sumbagsel = [];

                        $("#l1_sumbagsel").html("");
                        $("#l1_sumbagsel").append("<td>Sumbagsel</td>");

                        $.each(data, function(i, val) {
                            l1_sumbagsel.push(parseFloat(val));

                            $("#l1_sumbagsel").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_region_c.series[9].setData(l1_sumbagsel, true);
                    }
                });
                // Akhir Fungsi GET Data Region Sumbagsel
            });
            // Akhir Fungsi Dropdown Region
	});
	// Fungsi Dropdown Chart Script Region C (Chart Region Sompare)
		
		// Fungsi Dropdown Chart Scrip Mkiosdata Inc 
		$(document).ready(function () {
		//Fungsi Dropdown Branch
		$('#branch_mkiosdata_inc').on('change', function() {
				id_branch_mkiosdata_inc = $('#branch_mkiosdata_inc').val();
                branch_mkiosdata_inc = $('#branch_mkiosdata_inc :selected').text();
                if(branch_mkiosdata_inc === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_mkiosdata_inc + ' - Revenue SUMBAGUT';
                }
                script_mkiosdata_inc.setTitle(null, { text: subtitle});
				
				// Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_mkiosdata_inc },
                    success : function(data)
                    {
                        $("#cluster_mkiosdata_inc").html("");
                        $("#cluster_mkiosdata_inc").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_mkiosdata_inc").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_mkiosdata_inc').removeAttr('disabled');
                        $('#cluster_mkiosdata_inc').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select
				
				// Fungsi GET Data Branch Tanggal dan mkiosdata_inc
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata_inc, mkiosdata_inc: '' },
                    success : function(data)
                    {
                        var mkiosdata_inc = [];
                        var tanggal_mkiosdata_inc = [];

                        $("#mkiosdata_inc").html("");
                        $("#mkiosdata_inc").append("<td>This Month</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_inc.push(parseFloat(val));
                            tanggal_mkiosdata_inc.push(parseInt(i));

                            $("#mkiosdata_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata_inc.xAxis[0].setCategories(tanggal_mkiosdata_inc, true, true);
                        script_mkiosdata_inc.series[1].setData(mkiosdata_inc, true);
                    }
                });
                // Fungsi GET Data Branch Tanggal dan mkiosdata_lastmonth_inc
				$.ajax({ type: "GET",
					url: 'controllers/RevenueController.php',
					data: { branch: branch_mkiosdata_inc, mkiosdata_lastmonth_inc: '' },
					success : function(data)
					{
						var mkiosdata_lastmonth_inc = [];
                        
						$("#mkiosdata_lastmonth_inc").html("");
						$("#mkiosdata_lastmonth_inc").append("<td>Last month</td>");
                        
						$.each(data, function(i, val) {
							mkiosdata_lastmonth_inc.push(parseFloat(val));
                            
							$("#mkiosdata_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
						});

						script_mkiosdata_inc.series[0].setData(mkiosdata_lastmonth_inc, true);
					}
				});
				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d5_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosdata_d5_lastmonth_inc = [];
										
					$("#mkiosdata_d5_lastmonth_inc").html("");
					$("#mkiosdata_d5_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d5_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d5_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[3].setData(mkiosdata_d5_lastmonth_inc, true);
										
					console.log(mkiosdata_d5_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d10_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosdata_d10_lastmonth_inc = [];
										
					$("#mkiosdata_d10_lastmonth_inc").html("");
					$("#mkiosdata_d10_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d10_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d10_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[5].setData(mkiosdata_d10_lastmonth_inc, true);
										
					console.log(mkiosdata_d10_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d20_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosdata_d20_lastmonth_inc = [];
										
					$("#mkiosdata_d20_lastmonth_inc").html("");
					$("#mkiosdata_d20_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d20_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d20_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[7].setData(mkiosdata_d20_lastmonth_inc, true);
										
					console.log(mkiosdata_d20_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d25_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosdata_d25_lastmonth_inc = [];
										
					$("#mkiosdata_d25_lastmonth_inc").html("");
					$("#mkiosdata_d25_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d25_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d25_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[9].setData(mkiosdata_d25_lastmonth_inc, true);
										
					console.log(mkiosdata_d25_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d50_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosdata_d50_lastmonth_inc = [];
										
					$("#mkiosdata_d50_lastmonth_inc").html("");
					$("#mkiosdata_d50_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d50_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d50_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[11].setData(mkiosdata_d50_lastmonth_inc, true);
										
					console.log(mkiosdata_d50_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d100_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosdata_d100_lastmonth_inc = [];
										
					$("#mkiosdata_d100_lastmonth_inc").html("");
					$("#mkiosdata_d100_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d100_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d100_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[13].setData(mkiosdata_d100_lastmonth_inc, true);
										
					console.log(mkiosdata_d100_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d5: '' },
				success : function(data)
				{
					var mkiosdata_d5 = [];
										
					$("#mkiosdata_d5").html("");
					$("#mkiosdata_d5").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d5.push(parseFloat(val));
											
					$("#mkiosdata_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[2].setData(mkiosdata_d5, true);
										
					console.log(mkiosdata_d5);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d10: '' },
				success : function(data)
				{
					var mkiosdata_d10 = [];
										
					$("#mkiosdata_d10").html("");
					$("#mkiosdata_d10").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d10.push(parseFloat(val));
											
					$("#mkiosdata_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[4].setData(mkiosdata_d10, true);
										
					console.log(mkiosdata_d10);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d20: '' },
				success : function(data)
				{
					var mkiosdata_d20 = [];
										
					$("#mkiosdata_d20").html("");
					$("#mkiosdata_d20").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d20.push(parseFloat(val));
											
					$("#mkiosdata_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[6].setData(mkiosdata_d20, true);
										
					console.log(mkiosdata_d20);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d25: '' },
				success : function(data)
				{
					var mkiosdata_d25 = [];
										
					$("#mkiosdata_d25").html("");
					$("#mkiosdata_d25").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d25.push(parseFloat(val));
											
					$("#mkiosdata_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[8].setData(mkiosdata_d25, true);
										
					console.log(mkiosdata_d25);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d50: '' },
				success : function(data)
				{
					var mkiosdata_d50 = [];
										
					$("#mkiosdata_d50").html("");
					$("#mkiosdata_d50").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d50.push(parseFloat(val));
											
					$("#mkiosdata_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[10].setData(mkiosdata_d50, true);
										
					console.log(mkiosdata_d50);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosdata_inc, mkiosdata_d100: '' },
				success : function(data)
				{
					var mkiosdata_d100 = [];
										
					$("#mkiosdata_d100").html("");
					$("#mkiosdata_d100").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d100.push(parseFloat(val));
											
					$("#mkiosdata_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[12].setData(mkiosdata_d100, true);
										
					console.log(mkiosdata_d100);
				}
				});

						});
						// Akhir Fungsi Dropdown Branch
						
						// Fungsi Dropdown Cluster
							$('#cluster_mkiosdata_inc').on('change', function() {
								id_cluster_mkiosdata_inc = $('#cluster_mkiosdata_inc').val();
								cluster_mkiosdata_inc = $('#cluster_mkiosdata_inc :selected').text();
								var subtitle = cluster_mkiosdata_inc + ' - Revenue SUMBAGUT';
								script_mkiosdata_inc.setTitle(null, { text: subtitle});
								
								// Fungsi GET Data Cluster mkiosdata_inc
								$.ajax({ type: "GET",
									url: 'controllers/RevenueController.php',
									data: { cluster: cluster_mkiosdata_inc, mkiosdata_inc: '' },
									success : function(data)
									{
										var mkiosdata_inc = [];
										var tanggal_mkiosdata_inc = [];

										$("#mkiosdata_inc").html("");
										$("#mkiosdata_inc").append("<td>This Month</td>");
										
										$.each(data, function(i, val) {
											mkiosdata_inc.push(parseFloat(val));
											tanggal_mkiosdata_inc.push(parseInt(i));
											
											$("#mkiosdata_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
										});

										script_mkiosdata_inc.xAxis[0].setCategories(tanggal_mkiosdata_inc, true, true);
										script_mkiosdata_inc.series[1].setData(mkiosdata_inc, true);
									}
								});
								// Akhir Fungsi GET Data Cluster mkiosdata_inc
								
								// Fungsi GET Data Cluster mkiosdata_inc
								$.ajax({ type: "GET",
									url: 'controllers/RevenueController.php',
									data: { cluster: cluster_mkiosdata_inc, mkiosdata_lastmonth_inc: '' },
									success : function(data)
									{
										var mkiosdata_lastmonth_inc = [];
										
										$("#mkiosdata_lastmonth_inc").html("");
										$("#mkiosdata_lastmonth_inc").append("<td>Last month</td>");
										
										$.each(data, function(i, val) {
											mkiosdata_lastmonth_inc.push(parseFloat(val));
											
											$("#mkiosdata_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
										});

										script_mkiosdata_inc.series[0].setData(mkiosdata_lastmonth_inc, true);
									}
								});
								
								$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d5_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosdata_d5_lastmonth_inc = [];
										
					$("#mkiosdata_d5_lastmonth_inc").html("");
					$("#mkiosdata_d5_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d5_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d5_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[3].setData(mkiosdata_d5_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d10_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosdata_d10_lastmonth_inc = [];
										
					$("#mkiosdata_d10_lastmonth_inc").html("");
					$("#mkiosdata_d10_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d10_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d10_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[5].setData(mkiosdata_d10_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d20_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosdata_d20_lastmonth_inc = [];
										
					$("#mkiosdata_d20_lastmonth_inc").html("");
					$("#mkiosdata_d20_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d20_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d20_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[7].setData(mkiosdata_d20_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d25_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosdata_d25_lastmonth_inc = [];
										
					$("#mkiosdata_d25_lastmonth_inc").html("");
					$("#mkiosdata_d25_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d25_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d25_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[9].setData(mkiosdata_d25_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d50_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosdata_d50_lastmonth_inc = [];
										
					$("#mkiosdata_d50_lastmonth_inc").html("");
					$("#mkiosdata_d50_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d50_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d50_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[11].setData(mkiosdata_d50_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d100_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosdata_d100_lastmonth_inc = [];
										
					$("#mkiosdata_d100_lastmonth_inc").html("");
					$("#mkiosdata_d100_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d100_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosdata_d100_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[13].setData(mkiosdata_d100_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d5: '' },
				success : function(data)
				{
					let mkiosdata_d5 = [];
										
					$("#mkiosdata_d5").html("");
					$("#mkiosdata_d5").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d5.push(parseFloat(val));
											
					$("#mkiosdata_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[2].setData(mkiosdata_d5, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d10: '' },
				success : function(data)
				{
					let mkiosdata_d10 = [];
										
					$("#mkiosdata_d10").html("");
					$("#mkiosdata_d10").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d10.push(parseFloat(val));
											
					$("#mkiosdata_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[4].setData(mkiosdata_d10, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d20: '' },
				success : function(data)
				{
					let mkiosdata_d20 = [];
										
					$("#mkiosdata_d20").html("");
					$("#mkiosdata_d20").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d20.push(parseFloat(val));
											
					$("#mkiosdata_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[6].setData(mkiosdata_d20, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d25: '' },
				success : function(data)
				{
					let mkiosdata_d25 = [];
										
					$("#mkiosdata_d25").html("");
					$("#mkiosdata_d25").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d25.push(parseFloat(val));
											
					$("#mkiosdata_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[8].setData(mkiosdata_d25, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d50: '' },
				success : function(data)
				{
					let mkiosdata_d50 = [];
										
					$("#mkiosdata_d50").html("");
					$("#mkiosdata_d50").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d50.push(parseFloat(val));
											
					$("#mkiosdata_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[10].setData(mkiosdata_d50, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosdata_inc, mkiosdata_d100: '' },
				success : function(data)
				{
					let mkiosdata_d100 = [];
										
					$("#mkiosdata_d100").html("");
					$("#mkiosdata_d100").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosdata_d100.push(parseFloat(val));
											
					$("#mkiosdata_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosdata_inc.series[12].setData(mkiosdata_d100, true);
				}
				});
                // Akhir Fungsi GET Data Cluster mkiosdata_inc
			});
			//Akhir fungsi Dropdown CLuster
		});
		// Akhir Fungsi Dropdown Chart Script mkiosdata_inc

		// Fungsi Dropdown Chart Scrip mkiosvoice Inc 
		$(document).ready(function () {
		//Fungsi Dropdown Branch
		$('#branch_mkiosvoice_inc').on('change', function() {
				id_branch_mkiosvoice_inc = $('#branch_mkiosvoice_inc').val();
                branch_mkiosvoice_inc = $('#branch_mkiosvoice_inc :selected').text();
                if(branch_mkiosvoice_inc === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_mkiosvoice_inc + ' - Revenue SUMBAGUT';
                }
                script_mkiosvoice_inc.setTitle(null, { text: subtitle});
				
				// Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_mkiosvoice_inc },
                    success : function(data)
                    {
                        $("#cluster_mkiosvoice_inc").html("");
                        $("#cluster_mkiosvoice_inc").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_mkiosvoice_inc").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_mkiosvoice_inc').removeAttr('disabled');
                        $('#cluster_mkiosvoice_inc').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select
				
				// Fungsi GET Data Branch Tanggal dan mkiosvoice_inc
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice_inc, mkiosvoice_inc: '' },
                    success : function(data)
                    {
                        var mkiosvoice_inc = [];
                        var tanggal_mkiosvoice_inc = [];

                        $("#mkiosvoice_inc").html("");
                        $("#mkiosvoice_inc").append("<td>This Month</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_inc.push(parseFloat(val));
                            tanggal_mkiosvoice_inc.push(parseInt(i));

                            $("#mkiosvoice_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice_inc.xAxis[0].setCategories(tanggal_mkiosvoice_inc, true, true);
                        script_mkiosvoice_inc.series[1].setData(mkiosvoice_inc, true);
                    }
                });
                // Fungsi GET Data Branch Tanggal dan mkiosvoice_lastmonth_inc
				$.ajax({ type: "GET",
					url: 'controllers/RevenueController.php',
					data: { branch: branch_mkiosvoice_inc, mkiosvoice_lastmonth_inc: '' },
					success : function(data)
					{
						var mkiosvoice_lastmonth_inc = [];
                        
						$("#mkiosvoice_lastmonth_inc").html("");
						$("#mkiosvoice_lastmonth_inc").append("<td>Last month</td>");
                        
						$.each(data, function(i, val) {
							mkiosvoice_lastmonth_inc.push(parseFloat(val));
                            
							$("#mkiosvoice_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
						});

						script_mkiosvoice_inc.series[0].setData(mkiosvoice_lastmonth_inc, true);
						
						console.log(mkiosvoice_inc_lastmonth);
					}
				});
				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d5_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosvoice_d5_lastmonth_inc = [];
										
					$("#mkiosvoice_d5_lastmonth_inc").html("");
					$("#mkiosvoice_d5_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d5_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d5_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[2].setData(mkiosvoice_d5_lastmonth_inc, true);
										
					console.log(mkiosvoice_d5_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d10_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosvoice_d10_lastmonth_inc = [];
										
					$("#mkiosvoice_d10_lastmonth_inc").html("");
					$("#mkiosvoice_d10_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d10_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d10_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[4].setData(mkiosvoice_d10_lastmonth_inc, true);
										
					console.log(mkiosvoice_d10_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d20_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosvoice_d20_lastmonth_inc = [];
										
					$("#mkiosvoice_d20_lastmonth_inc").html("");
					$("#mkiosvoice_d20_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d20_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d20_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[6].setData(mkiosvoice_d20_lastmonth_inc, true);
										
					console.log(mkiosvoice_d20_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d25_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosvoice_d25_lastmonth_inc = [];
										
					$("#mkiosvoice_d25_lastmonth_inc").html("");
					$("#mkiosvoice_d25_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d25_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d25_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[8].setData(mkiosvoice_d25_lastmonth_inc, true);
										
					console.log(mkiosvoice_d25_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d50_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosvoice_d50_lastmonth_inc = [];
										
					$("#mkiosvoice_d50_lastmonth_inc").html("");
					$("#mkiosvoice_d50_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d50_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d50_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[10].setData(mkiosvoice_d50_lastmonth_inc, true);
										
					console.log(mkiosvoice_d50_lastmonth_inc);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d100_lastmonth_inc: '' },
				success : function(data)
				{
					var mkiosvoice_d100_lastmonth_inc = [];
										
					$("#mkiosvoice_d100_lastmonth_inc").html("");
					$("#mkiosvoice_d100_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d100_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d100_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[12].setData(mkiosvoice_d100_lastmonth_inc, true);
										
					console.log(mkiosvoice_d100_lastmonth_inc);
				}
				});
				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d5: '' },
				success : function(data)
				{
					var mkiosvoice_d5 = [];
										
					$("#mkiosvoice_d5").html("");
					$("#mkiosvoice_d5").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d5.push(parseFloat(val));
											
					$("#mkiosvoice_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[3].setData(mkiosvoice_d5, true);
										
					console.log(mkiosvoice_d5);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d10: '' },
				success : function(data)
				{
					var mkiosvoice_d10 = [];
										
					$("#mkiosvoice_d10").html("");
					$("#mkiosvoice_d10").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d10.push(parseFloat(val));
											
					$("#mkiosvoice_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[5].setData(mkiosvoice_d10, true);
										
					console.log(mkiosvoice_d10);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d20: '' },
				success : function(data)
				{
					var mkiosvoice_d20 = [];
										
					$("#mkiosvoice_d20").html("");
					$("#mkiosvoice_d20").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d20.push(parseFloat(val));
											
					$("#mkiosvoice_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[7].setData(mkiosvoice_d20, true);
										
					console.log(mkiosvoice_d20);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d25: '' },
				success : function(data)
				{
					var mkiosvoice_d25 = [];
										
					$("#mkiosvoice_d25").html("");
					$("#mkiosvoice_d25").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d25.push(parseFloat(val));
											
					$("#mkiosvoice_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[9].setData(mkiosvoice_d25, true);
										
					console.log(mkiosvoice_d25);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d50: '' },
				success : function(data)
				{
					var mkiosvoice_d50 = [];
										
					$("#mkiosvoice_d50").html("");
					$("#mkiosvoice_d50").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d50.push(parseFloat(val));
											
					$("#mkiosvoice_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[11].setData(mkiosvoice_d50, true);
										
					console.log(mkiosvoice_d50);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { branch: branch_mkiosvoice_inc, mkiosvoice_d100: '' },
				success : function(data)
				{
					var mkiosvoice_d100 = [];
										
					$("#mkiosvoice_d100").html("");
					$("#mkiosvoice_d100").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d100.push(parseFloat(val));
											
					$("#mkiosvoice_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[13].setData(mkiosvoice_d100, true);
										
					console.log(mkiosvoice_d100);
				}
				});

		});
		// Akhir Fungsi Dropdown Branch
		
		// Fungsi Dropdown Cluster
            $('#cluster_mkiosvoice_inc').on('change', function() {
                id_cluster_mkiosvoice_inc = $('#cluster_mkiosvoice_inc').val();
                cluster_mkiosvoice_inc = $('#cluster_mkiosvoice_inc :selected').text();
                var subtitle = cluster_mkiosvoice_inc + ' - Revenue SUMBAGUT';
                script_mkiosvoice_inc.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster mkiosvoice_inc
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_inc: '' },
                    success : function(data)
                    {
                        var mkiosvoice_inc = [];
                        var tanggal_mkiosvoice_inc = [];

                        $("#mkiosvoice_inc").html("");
                        $("#mkiosvoice_inc").append("<td>This Month</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_inc.push(parseFloat(val));
                            tanggal_mkiosvoice_inc.push(parseInt(i));
                            
                            $("#mkiosvoice_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice_inc.xAxis[0].setCategories(tanggal_mkiosvoice_inc, true, true);
                        script_mkiosvoice_inc.series[1].setData(mkiosvoice_inc, true);
                    }
				});
                // Akhir Fungsi GET Data Cluster mkiosvoice_inc
				
				// Fungsi GET Data Cluster mkiosvoice_inc
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_lastmonth_inc: '' },
                    success : function(data)
                    {
                        let mkiosvoice_lastmonth_inc = [];
                        
                        $("#mkiosvoice_lastmonth_inc").html("");
                        $("#mkiosvoice_lastmonth_inc").append("<td>Last month</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_lastmonth_inc.push(parseFloat(val));
                            
                            $("#mkiosvoice_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice_inc.series[0].setData(mkiosvoice_lastmonth_inc, true);
                    }
				});
				
				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d5_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosvoice_d5_lastmonth_inc = [];
										
					$("#mkiosvoice_d5_lastmonth_inc").html("");
					$("#mkiosvoice_d5_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d5_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d5_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[2].setData(mkiosvoice_d5_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d10_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosvoice_d10_lastmonth_inc = [];
										
					$("#mkiosvoice_d10_lastmonth_inc").html("");
					$("#mkiosvoice_d10_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d10_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d10_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[4].setData(mkiosvoice_d10_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d20_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosvoice_d20_lastmonth_inc = [];
										
					$("#mkiosvoice_d20_lastmonth_inc").html("");
					$("#mkiosvoice_d20_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d20_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d20_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[6].setData(mkiosvoice_d20_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d25_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosvoice_d25_lastmonth_inc = [];
										
					$("#mkiosvoice_d25_lastmonth_inc").html("");
					$("#mkiosvoice_d25_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d25_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d25_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[8].setData(mkiosvoice_d25_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d50_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosvoice_d50_lastmonth_inc = [];
										
					$("#mkiosvoice_d50_lastmonth_inc").html("");
					$("#mkiosvoice_d50_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d50_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d50_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[10].setData(mkiosvoice_d50_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d100_lastmonth_inc: '' },
				success : function(data)
				{
					let mkiosvoice_d100_lastmonth_inc = [];
										
					$("#mkiosvoice_d100_lastmonth_inc").html("");
					$("#mkiosvoice_d100_lastmonth_inc").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d100_lastmonth_inc.push(parseFloat(val));
											
					$("#mkiosvoice_d100_lastmonth_inc").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[12].setData(mkiosvoice_d100_lastmonth_inc, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d5: '' },
				success : function(data)
				{
					let mkiosvoice_d5 = [];
										
					$("#mkiosvoice_d5").html("");
					$("#mkiosvoice_d5").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d5.push(parseFloat(val));
											
					$("#mkiosvoice_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[3].setData(mkiosvoice_d5, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d10: '' },
				success : function(data)
				{
					let mkiosvoice_d10 = [];
										
					$("#mkiosvoice_d10").html("");
					$("#mkiosvoice_d10").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d10.push(parseFloat(val));
											
					$("#mkiosvoice_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[5].setData(mkiosvoice_d10, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d20: '' },
				success : function(data)
				{
					let mkiosvoice_d20 = [];
										
					$("#mkiosvoice_d20").html("");
					$("#mkiosvoice_d20").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d20.push(parseFloat(val));
											
					$("#mkiosvoice_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[7].setData(mkiosvoice_d20, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d25: '' },
				success : function(data)
				{
					let mkiosvoice_d25 = [];
										
					$("#mkiosvoice_d25").html("");
					$("#mkiosvoice_d25").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d25.push(parseFloat(val));
											
					$("#mkiosvoice_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[9].setData(mkiosvoice_d25, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d50: '' },
				success : function(data)
				{
					let mkiosvoice_d50 = [];
										
					$("#mkiosvoice_d50").html("");
					$("#mkiosvoice_d50").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d50.push(parseFloat(val));
											
					$("#mkiosvoice_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[11].setData(mkiosvoice_d50, true);
				}
				});

				$.ajax({ type: "GET",
				url: 'controllers/RevenueController.php',
				data: { cluster: cluster_mkiosvoice_inc, mkiosvoice_d100: '' },
				success : function(data)
				{
					let mkiosvoice_d100 = [];
										
					$("#mkiosvoice_d100").html("");
					$("#mkiosvoice_d100").append("<td>Last month</td>");
										
					$.each(data, function(i, val) {
					mkiosvoice_d100.push(parseFloat(val));
											
					$("#mkiosvoice_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					});

					script_mkiosvoice_inc.series[13].setData(mkiosvoice_d100, true);
				}
				});
                // Akhir Fungsi GET Data Cluster mkiosvoice_inc
			});
			//Akhir fungsi Dropdown CLuster
		});
		// Akhir Fungsi Dropdown Chart Script mkiosvoice_inc


		
		// Fungsi Dropdown Chart Scrip Mkiosbulk 
		$(document).ready(function () {
		//Fungsi Dropdown Branch
		$('#branch_mkiosbulk').on('change', function() {
				id_branch_mkiosbulk = $('#branch_mkiosbulk').val();
                branch_mkiosbulk = $('#branch_mkiosbulk :selected').text();
                if(branch_mkiosbulk === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_mkiosbulk + ' - Revenue SUMBAGUT';
                }
                script_mkiosbulk.setTitle(null, { text: subtitle});
				
				// Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_mkiosbulk },
                    success : function(data)
                    {
                        $("#cluster_mkiosbulk").html("");
                        $("#cluster_mkiosbulk").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_mkiosbulk").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_mkiosbulk').removeAttr('disabled');
                        $('#cluster_mkiosbulk').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select
				
				// Fungsi GET Data Branch Tanggal dan Mkiosbulk
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosbulk, mkiosbulk: '' },
                    success : function(data)
                    {
                        var mkiosbulk = [];
                        var tanggal_mkiosbulk = [];

                        $("#mkiosbulk").html("");
                        $("#mkiosbulk").append("<td>This Month</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosbulk.push(parseFloat(val));
                            tanggal_mkiosbulk.push(parseInt(i));

                            $("#mkiosbulk").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosbulk.xAxis[0].setCategories(tanggal_mkiosbulk, true, true);
                        script_mkiosbulk.series[1].setData(mkiosbulk, true);
                    }
                });
                // Fungsi GET Data Branch Tanggal dan Mkiosbulk
				$.ajax({ type: "GET",
					url: 'controllers/RevenueController.php',
					data: { branch: branch_mkiosbulk, mkiosbulk_lastmonth: '' },
					success : function(data)
					{
						var mkiosbulk_lastmonth = [];
                        
						$("#mkiosbulk_lastmonth").html("");
						$("#mkiosbulk_lastmonth").append("<td>Last month</td>");
                        
						$.each(data, function(i, val) {
							mkiosbulk_lastmonth.push(parseFloat(val));
                            
							$("#mkiosbulk_lastmonth").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
						});

						script_mkiosbulk.series[0].setData(mkiosbulk_lastmonth, true);
					}
				});
		});
		// Akhir Fungsi Dropdown Branch
		
		// Fungsi Dropdown Cluster
            $('#cluster_mkiosbulk').on('change', function() {
                id_cluster_mkiosbulk = $('#cluster_mkiosbulk').val();
                cluster_mkiosbulk = $('#cluster_mkiosbulk :selected').text();
                var subtitle = cluster_mkiosbulk + ' - Revenue SUMBAGUT';
                script_mkiosbulk.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster Mkiosbulk
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosbulk, mkiosbulk: '' },
                    success : function(data)
                    {
                        var mkiosbulk = [];
                        var tanggal_mkiosbulk = [];

                        $("#mkiosbulk").html("");
                        $("#mkiosbulk").append("<td>This Month</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosbulk.push(parseFloat(val));
                            tanggal_mkiosbulk.push(parseInt(i));
                            
                            $("#mkiosbulk").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosbulk.xAxis[0].setCategories(tanggal_mkiosbulk, true, true);
                        script_mkiosbulk.series[1].setData(mkiosbulk, true);
                    }
				});
                // Akhir Fungsi GET Data Cluster Mkiosbulk
				
				// Fungsi GET Data Cluster Mkiosbulk
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosbulk, mkiosbulk_lastmonth: '' },
                    success : function(data)
                    {
                        var mkiosbulk_lastmonth = [];
                        
                        $("#mkiosbulk_lastmonth").html("");
                        $("#mkiosbulk_lastmonth").append("<td>Last month</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosbulk_lastmonth.push(parseFloat(val));
                            
                            $("#mkiosbulk_lastmonth").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosbulk.series[0].setData(mkiosbulk_lastmonth, true);
                    }
				});
                // Akhir Fungsi GET Data Cluster Mkiosbulk
			});
			//Akhir fungsi Dropdown CLuster
		});
		// Akhir Fungsi Dropdown Chart Script Mkiosbulk
		
		
        // Fungsi Dropdown Chart Script (Chart Atas)
        $(document).ready(function () {
            // Fungsi Dropdown Branch
            $('#branch_script').on('change', function() {
                id_branch_script = $('#branch_script').val();
                branch_script = $('#branch_script :selected').text();
                if(branch_script === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_script + ' - Revenue SUMBAGUT';
                }
                script.setTitle(null, { text: subtitle});

                // Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_script },
                    success : function(data)
                    {
                        $("#cluster_script").html("");
                        $("#cluster_script").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_script").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_script').removeAttr('disabled');
                        $('#cluster_script').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select

                // Fungsi GET Data Branch Tanggal dan Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_script, last_year: '' },
                    success : function(data)
                    {
                        var last_year = [];
                        var tanggal = [];

                        $("#last_year").html("");
                        $("#last_year").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year.push(parseFloat(val));
                            tanggal.push(parseInt(i));

                            $("#last_year").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.xAxis[0].setCategories(tanggal, true, true);
                        script.series[0].setData(last_year, true);
                    }
                });
                // Fungsi GET Data Branch Tanggal dan Last Year

                // Fungsi GET Data Branch Now
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_script, now: '' },
                    success : function(data)
                    {
                        var now = [];

                        $("#now").html("");
                        $("#now").append("<td>Now</td>");

                        $.each(data, function(i, val) {
                            now.push(parseFloat(val));
							//if (now === 0)

                            $("#now").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.series[1].setData(now, true);
                    }
                });
                // Akhir Fungsi GET Data Branch Now

                // Fungsi GET Data Branch Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_script, last_month: '' },
                    success : function(data)
                    {
                        var last_month = [];

                        $("#last_month").html("");
                        $("#last_month").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month.push(parseFloat(val));
							//var noNulls = last_month.map(function (val) {
							//return (val === 0) ? null : val;
							//});
                            $("#last_month").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
							
                        });

                        script.series[2].setData(last_month, true);
                    }
                });
                // Akhir Fungsi GET Data Branch Last Month
            });
            // Akhir Fungsi Dropdown Branch

            // Fungsi Dropdown Cluster
            $('#cluster_script').on('change', function() {
                id_cluster_script = $('#cluster_script').val();
                cluster_script = $('#cluster_script :selected').text();
                var subtitle = cluster_script + ' - Revenue SUMBAGUT';
                script.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_script, last_year: '' },
                    success : function(data)
                    {
                        var last_year = [];
                        var tanggal = [];

                        $("#last_year").html("");
                        $("#last_year").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year.push(parseFloat(val));
                            tanggal.push(parseInt(i));
                            
                            $("#last_year").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.xAxis[0].setCategories(tanggal, true, true);
                        script.series[0].setData(last_year, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Last Year

                // Fungsi GET Data Cluster Now
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_script, now: '' },
                    success : function(data)
                    {
                        var now = [];

                        $("#now").html("");
                        $("#now").append("<td>Now</td>");

                        $.each(data, function(i, val) {
                            now.push(parseFloat(val));

                            $("#now").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.series[1].setData(now, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Now

                // Fungsi GET Data Cluster Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_script, last_month: '' },
                    success : function(data)
                    {
                        var last_month = [];

                        $("#last_month").html("");
                        $("#last_month").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month.push(parseFloat(val));

                            $("#last_month").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.series[2].setData(last_month, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Last Month
                
                $('#l1_script').removeAttr('disabled');
                $('#l1_script').material_select();
                $('#bulan_script').removeAttr('disabled');
                $('#bulan_script').material_select();
            });
            // Akhir Fungsi Dropdown Cluster

            // Fungsi Dropdown Bulan
            $('#bulan_script').on('change', function() {
                bulan_script = $('#bulan_script').val();
                nama_bulan_script = $('#bulan_script :selected').text();
				id_bulan_script = $('#bulan_script :selected').text();
                var subtitle = cluster_script + ' - ' + nama_bulan_script;
                script.setTitle(null, { text: subtitle});

                /* Ini contoh data array data baru yg akan masuk ke dalam chart 
                var tanggal = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];

                var last_year = [14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 31];
                var now = [100, 112, 0, 0, 360, 330, 141, 150, 100, 0, 0, 0, 10, 12, 60, 70, 60, 300, 101, 100, 100, 67, 110, 10, 101, 100, 100, 67, 80, 66];
                var last_month = [10, 12, 60, 70, 60, 300, 101, 100, 100, 67, 110, 10, 100, 112, 0, 0, 360, 330, 141, 150, 100, 2, 7.5, 8, 8.2, 9, 11, 7, 18, 21, 7];

                Ini contoh insert data baru ke dalam chart 
                script.series[0].setData(eval(last_year), false, true); // insert data des
                script.series[1].setData(eval(now), false, true); // insert data mom
                script.series[2].setData(eval(last_month), false, true); // insert data yoy

                script.xAxis[0].setCategories(tanggal, true, true); // insert data kategori chart*/
				
				// Fungsi GET Data Bulan Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
				data: { bulan: id_bulan_script, last_year:'' },
                    success : function(data)
                    {
                        console.log(data);
                        var last_year = [];
                        var tanggal = [];

                        $("#last_year").html("");
                        $("#last_year").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year.push(parseFloat(val));
                            tanggal.push(parseInt(i));
                            
                            $("#last_year").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.xAxis[0].setCategories(tanggal, true, true);
                        script.series[0].setData(last_year, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Last Year

                // Fungsi GET Data bulan Now
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { bulan: id_bulan_script, now: '' },
                    success : function(data)
                    {
                        var now = [];

                        $("#now").html("");
                        $("#now").append("<td>Now</td>");

                        $.each(data, function(i, val) {
                            now.push(parseFloat(val));

                            $("#now").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.series[1].setData(now, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Now

                // Fungsi GET Data bulan Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { bulan: bulan_script, last_month: '' },
                    success : function(data)
                    {
                        var last_month = [];

                        $("#last_month").html("");
                        $("#last_month").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month.push(parseFloat(val));

                            $("#last_month").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script.series[2].setData(last_month, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Last Month

            });
            // Akhir Fungsi Dropwodn Bulan
        });
        // Akhir Fungsi Dropdown Chart Script (Chart Atas)
		
		// Fungsi Dropdown Chart Scripty (Chart (-1) Month)
        $(document).ready(function () {
            // Fungsi Dropdown Branch
            $('#branch_scripty').on('change', function() {
                id_branch_scripty = $('#branch_scripty').val();
                branch_scripty = $('#branch_scripty :selected').text();
                if(branch_scripty === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_scripty + ' - Revenue SUMBAGUT';
                }
                scripty.setTitle(null, { text: subtitle});

                // Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_scripty },
                    success : function(data)
                    {
                        $("#cluster_scripty").html("");
                        $("#cluster_scripty").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_scripty").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_scripty').removeAttr('disabled');
                        $('#cluster_scripty').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select

                // Fungsi GET Data Branch Tanggal dan Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scripty, last_year_y: '' },
                    success : function(data)
                    {
                        var last_year_y = [];
                        var tanggal = [];

                        $("#last_year_y").html("");
                        $("#last_year_y").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year_y.push(parseFloat(val));
                            tanggal.push(parseInt(i));

                            $("#last_year_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.xAxis[0].setCategories(tanggal, true, true);
                        scripty.series[0].setData(last_year_y, true);
                    }
                });
                // Fungsi GET Data Branch Tanggal dan Last Year

                // Fungsi GET Data Branch Now
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scripty, now_y: '' },
                    success : function(data)
                    {
                        var now_y = [];

                        $("#now_y").html("");
                        $("#now_y").append("<td>Now</td>");

                        $.each(data, function(i, val) {
                            now_y.push(parseFloat(val));
							//if (now_y === 0)

                            $("#now_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.series[1].setData(now_y, true);
                    }
                });
                // Akhir Fungsi GET Data Branch Now

                // Fungsi GET Data Branch Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scripty, last_month_y: '' },
                    success : function(data)
                    {
                        var last_month_y = [];

                        $("#last_month_y").html("");
                        $("#last_month_y").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month_y.push(parseFloat(val));
							//var noNulls = last_month_y.map(function (val) {
							//return (val === 0) ? null : val;
							//});
                            $("#last_month_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
							
                        });

                        scripty.series[2].setData(last_month_y, true);
                    }
                });
                // Akhir Fungsi GET Data Branch Last Month
            });
            // Akhir Fungsi Dropdown Branch

            // Fungsi Dropdown Cluster
            $('#cluster_scripty').on('change', function() {
                id_cluster_scripty = $('#cluster_scripty').val();
                cluster_scripty = $('#cluster_scripty :selected').text();
                var subtitle = cluster_scripty + ' - Revenue SUMBAGUT';
                scripty.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scripty, last_year_y: '' },
                    success : function(data)
                    {
                        var last_year_y = [];
                        var tanggal = [];

                        $("#last_year_y").html("");
                        $("#last_year_y").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year_y.push(parseFloat(val));
                            tanggal.push(parseInt(i));
                            
                            $("#last_year_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.xAxis[0].setCategories(tanggal, true, true);
                        scripty.series[0].setData(last_year_y, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Last Year

                // Fungsi GET Data Cluster Now
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scripty, now_y: '' },
                    success : function(data)
                    {
                        var now_y = [];

                        $("#now_y").html("");
                        $("#now_y").append("<td>Now</td>");

                        $.each(data, function(i, val) {
                            now_y.push(parseFloat(val));

                            $("#now_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.series[1].setData(now_y, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Now

                // Fungsi GET Data Cluster Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scripty, last_month_y: '' },
                    success : function(data)
                    {
                        var last_month_y = [];

                        $("#last_month_y").html("");
                        $("#last_month_y").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month_y.push(parseFloat(val));

                            $("#last_month_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.series[2].setData(last_month_y, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Last Month
                
                $('#bulan_scripty').removeAttr('disabled');
                $('#bulan_scripty').material_select();
            });
            // Akhir Fungsi Dropdown Cluster

            // Fungsi Dropdown Bulan
            $('#bulan_scripty').on('change', function() {
                bulan_scripty = $('#bulan_scripty').val();
                nama_bulan_scripty = $('#bulan_scripty :selected').text();
				id_bulan_scripty = $('#bulan_scripty :selected').text();
                var subtitle = cluster_scripty + ' - ' + nama_bulan_scripty;
                scripty.setTitle(null, { text: subtitle});

                
				// Fungsi GET Data Bulan Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
				data: { bulan: id_bulan_scripty, last_year_y:'' },
                    success : function(data)
                    {
                        console.log(data);
                        var last_year_y = [];
                        var tanggal = [];

                        $("#last_year_y").html("");
                        $("#last_year_y").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year_y.push(parseFloat(val));
                            tanggal.push(parseInt(i));
                            
                            $("#last_year_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.xAxis[0].setCategories(tanggal, true, true);
                        scripty.series[0].setData(last_year_y, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Last Year

                // Fungsi GET Data bulan Now
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { bulan: id_bulan_scripty, now_y: '' },
                    success : function(data)
                    {
                        var now_y = [];

                        $("#now_y").html("");
                        $("#now_y").append("<td>Now</td>");

                        $.each(data, function(i, val) {
                            now_y.push(parseFloat(val));

                            $("#now_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.series[1].setData(now_y, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Now

                // Fungsi GET Data bulan Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { bulan: bulan_scripty, last_month_y: '' },
                    success : function(data)
                    {
                        var last_month_y = [];

                        $("#last_month_y").html("");
                        $("#last_month_y").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month_y.push(parseFloat(val));

                            $("#last_month_y").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scripty.series[2].setData(last_month_y, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Last Month

            });
            // Akhir Fungsi Dropwodn Bulan
        });
        // Akhir Fungsi Dropdown Chart Script (Chart (-1) Month)
		
		// Fungsi Dropdown Chart Scrip Mkiosdata 
		$(document).ready(function () {
		//Fungsi Dropdown Branch
		$('#branch_mkiosdata').on('change', function() {
                id_branch_mkiosdata = $('#branch_mkiosdata').val();
                branch_mkiosdata = $('#branch_mkiosdata :selected').text();
                if(branch_mkiosdata === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_mkiosdata + ' - Revenue SUMBAGUT';
                }
                script_mkiosdata.setTitle(null, { text: subtitle});
				
				// Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_mkiosdata },
                    success : function(data)
                    {
                        $("#cluster_mkiosdata").html("");
                        $("#cluster_mkiosdata").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_mkiosdata").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_mkiosdata').removeAttr('disabled');
                        $('#cluster_mkiosdata').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select
				
				// Fungsi GET Data Branch Tanggal dan Mkiosdata
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata, mkiosdata_total: '' },
                    success : function(data)
                    {
                        var mkiosdata_total = [];
                        var tanggal_mkiosdata = [];

                        $("#mkiosdata_total").html("");
                        $("#mkiosdata_total").append("<td>Total</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_total.push(parseFloat(val));
                            tanggal_mkiosdata.push(parseInt(i));

                            $("#mkiosdata_total").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.xAxis[0].setCategories(tanggal_mkiosdata, true, true);
                        script_mkiosdata.series[0].setData(mkiosdata_total, true);
						//alert(data);
                    },
					error(jXHR, status, Error){
						alert(status+": "+Error);
					}
                });
                // Fungsi GET Data Branch Tanggal dan Mkiosdata
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata, mkiosdata_d5: '' },
                    success : function(data)
                    {
                        var mkiosdata_d5 = [];

                        $("#mkiosdata_d5").html("");
                        $("#mkiosdata_d5").append("<td>5k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d5.push(parseFloat(val));

                            $("#mkiosdata_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[1].setData(mkiosdata_d5, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata, mkiosdata_d10: '' },
                    success : function(data)
                    {
                        var mkiosdata_d10 = [];

                        $("#mkiosdata_d10").html("");
                        $("#mkiosdata_d10").append("<td>10k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d10.push(parseFloat(val));

                            $("#mkiosdata_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[2].setData(mkiosdata_d10, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata, mkiosdata_d20: '' },
                    success : function(data)
                    {
                        var mkiosdata_d20 = [];

                        $("#mkiosdata_d20").html("");
                        $("#mkiosdata_d20").append("<td>20k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d20.push(parseFloat(val));

                            $("#mkiosdata_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[3].setData(mkiosdata_d20, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata, mkiosdata_d25: '' },
                    success : function(data)
                    {
                        var mkiosdata_d25 = [];

                        $("#mkiosdata_d25").html("");
                        $("#mkiosdata_d25").append("<td>25k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d25.push(parseFloat(val));

                            $("#mkiosdata_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[4].setData(mkiosdata_d25, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata, mkiosdata_d50: '' },
                    success : function(data)
                    {
                        var mkiosdata_d50 = [];

                        $("#mkiosdata_d50").html("");
                        $("#mkiosdata_d50").append("<td>50k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d50.push(parseFloat(val));

                            $("#mkiosdata_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[5].setData(mkiosdata_d50, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosdata, mkiosdata_d100: '' },
                    success : function(data)
                    {
                        var mkiosdata_d100 = [];

                        $("#mkiosdata_d100").html("");
                        $("#mkiosdata_d100").append("<td>100k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d100.push(parseFloat(val));

                            $("#mkiosdata_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[6].setData(mkiosdata_d100, true);
                    }
                });
			});
			// Akhir Fungsi Dropdown Branch
	
			// Fungsi Dropdown Cluster
            $('#cluster_mkiosdata').on('change', function() {
                id_cluster_mkiosdata = $('#cluster_mkiosdata').val();
                cluster_mkiosdata = $('#cluster_mkiosdata :selected').text();
                var subtitle = cluster_mkiosdata + ' - Revenue SUMBAGUT';
                script_mkiosdata.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster Mkiosdata
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosdata, mkiosdata_total: '' },
                    success : function(data)
                    {
                        var mkiosdata_total = [];
                        var tanggal_mkiosdata = [];

                        $("#mkiosdata_total").html("");
                        $("#mkiosdata_total").append("<td>Total</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_total.push(parseFloat(val));
                            tanggal_mkiosdata.push(parseInt(i));
                            
                            $("#mkiosdata_total").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.xAxis[0].setCategories(tanggal_mkiosdata, true, true);
                        script_mkiosdata.series[0].setData(mkiosdata_total, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Mkiosdata
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosdata, mkiosdata_d5: '' },
                    success : function(data)
                    {
                        var mkiosdata_d5 = [];

                        $("#mkiosdata_d5").html("");
                        $("#mkiosdata_d5").append("<td>5k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d5.push(parseFloat(val));

                            $("#mkiosdata_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[1].setData(mkiosdata_d5, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosdata, mkiosdata_d10: '' },
                    success : function(data)
                    {
                        var mkiosdata_d10 = [];

                        $("#mkiosdata_d10").html("");
                        $("#mkiosdata_d10").append("<td>10k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d10.push(parseFloat(val));

                            $("#mkiosdata_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[2].setData(mkiosdata_d10, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosdata, mkiosdata_d20: '' },
                    success : function(data)
                    {
                        var mkiosdata_d20 = [];

                        $("#mkiosdata_d20").html("");
                        $("#mkiosdata_d20").append("<td>20k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d20.push(parseFloat(val));

                            $("#mkiosdata_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[3].setData(mkiosdata_d20, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosdata, mkiosdata_d25: '' },
                    success : function(data)
                    {
                        var mkiosdata_d25 = [];

                        $("#mkiosdata_d25").html("");
                        $("#mkiosdata_d25").append("<td>25k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d25.push(parseFloat(val));

                            $("#mkiosdata_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[4].setData(mkiosdata_d25, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosdata, mkiosdata_d50: '' },
                    success : function(data)
                    {
                        var mkiosdata_d50 = [];

                        $("#mkiosdata_d50").html("");
                        $("#mkiosdata_d50").append("<td>50k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d50.push(parseFloat(val));

                            $("#mkiosdata_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[5].setData(mkiosdata_d50, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosdata, mkiosdata_d100: '' },
                    success : function(data)
                    {
                        var mkiosdata_d100 = [];

                        $("#mkiosdata_d100").html("");
                        $("#mkiosdata_d100").append("<td>100k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosdata_d100.push(parseFloat(val));

                            $("#mkiosdata_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosdata.series[6].setData(mkiosdata_d100, true);
                    }
                });
			});
			//Akhir fungsi Dropdown CLuster
		});
		// Akhir Fungsi Dropdown Chart Script Mkiosdata
		
		// Fungsi Dropdown Chart Scrip Mkiosvoice 
		$(document).ready(function () {
		//Fungsi Dropdown Branch
		$('#branch_mkiosvoice').on('change', function() {
                id_branch_mkiosvoice = $('#branch_mkiosvoice').val();
                branch_mkiosvoice = $('#branch_mkiosvoice :selected').text();
                if(branch_mkiosvoice === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_mkiosvoice + ' - Revenue SUMBAGUT';
                }
                script_mkiosvoice.setTitle(null, { text: subtitle});
				
				// Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_mkiosvoice },
                    success : function(data)
                    {
                        $("#cluster_mkiosvoice").html("");
                        $("#cluster_mkiosvoice").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_mkiosvoice").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_mkiosvoice').removeAttr('disabled');
                        $('#cluster_mkiosvoice').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select
				
				// Fungsi GET Data Branch Tanggal dan Mkiosvoice
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice, mkiosvoice_total: '' },
                    success : function(data)
                    {
                        var mkiosvoice_total = [];
                        var tanggal_mkiosvoice = [];

                        $("#mkiosvoice_total").html("");
                        $("#mkiosvoice_total").append("<td>Mkiosvoice</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_total.push(parseFloat(val));
                            tanggal_mkiosvoice.push(parseInt(i));

                            $("#mkiosvoice_total").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.xAxis[0].setCategories(tanggal_mkiosvoice, true, true);
                        script_mkiosvoice.series[0].setData(mkiosvoice_total, true);
                    }
                });
                // Fungsi GET Data Branch Tanggal dan Mkiosvoice
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice, mkiosvoice_d5: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d5 = [];

                        $("#mkiosvoice_d5").html("");
                        $("#mkiosvoice_d5").append("<td>5k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d5.push(parseFloat(val));

                            $("#mkiosvoice_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[1].setData(mkiosvoice_d5, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice, mkiosvoice_d10: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d10 = [];

                        $("#mkiosvoice_d10").html("");
                        $("#mkiosvoice_d10").append("<td>10k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d10.push(parseFloat(val));

                            $("#mkiosvoice_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[2].setData(mkiosvoice_d10, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice, mkiosvoice_d20: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d20 = [];

                        $("#mkiosvoice_d20").html("");
                        $("#mkiosvoice_d20").append("<td>20k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d20.push(parseFloat(val));

                            $("#mkiosvoice_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[3].setData(mkiosvoice_d20, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice, mkiosvoice_d25: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d25 = [];

                        $("#mkiosvoice_d25").html("");
                        $("#mkiosvoice_d25").append("<td>25k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d25.push(parseFloat(val));

                            $("#mkiosvoice_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[4].setData(mkiosvoice_d25, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice, mkiosvoice_d50: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d50 = [];

                        $("#mkiosvoice_d50").html("");
                        $("#mkiosvoice_d50").append("<td>50k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d50.push(parseFloat(val));

                            $("#mkiosvoice_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[5].setData(mkiosvoice_d50, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_mkiosvoice, mkiosvoice_d100: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d100 = [];

                        $("#mkiosvoice_d100").html("");
                        $("#mkiosvoice_d100").append("<td>100k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d100.push(parseFloat(val));

                            $("#mkiosvoice_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[6].setData(mkiosvoice_d100, true);
                    }
                });
			});
			// Akhir Fungsi Dropdown Branch
	
			// Fungsi Dropdown Cluster
            $('#cluster_mkiosvoice').on('change', function() {
                id_cluster_mkiosvoice = $('#cluster_mkiosvoice').val();
                cluster_mkiosvoice = $('#cluster_mkiosvoice :selected').text();
                var subtitle = cluster_mkiosvoice + ' - Revenue SUMBAGUT';
                script_mkiosvoice.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster Mkiosvoice
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice, mkiosvoice_total: '' },
                    success : function(data)
                    {
                        var mkiosvoice_total = [];
                        var tanggal_mkiosvoice = [];

                        $("#mkiosvoice_total").html("");
                        $("#mkiosvoice_total").append("<td>Mkiosvoice</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_total.push(parseFloat(val));
                            tanggal_mkiosvoice.push(parseInt(i));
                            
                            $("#mkiosvoice_total").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.xAxis[0].setCategories(tanggal_mkiosvoice, true, true);
                        script_mkiosvoice.series[0].setData(mkiosvoice_total, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Mkiosvoice
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice, mkiosvoice_d5: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d5 = [];

                        $("#mkiosvoice_d5").html("");
                        $("#mkiosvoice_d5").append("<td>5k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d5.push(parseFloat(val));

                            $("#mkiosvoice_d5").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[1].setData(mkiosvoice_d5, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice, mkiosvoice_d10: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d10 = [];

                        $("#mkiosvoice_d10").html("");
                        $("#mkiosvoice_d10").append("<td>10k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d10.push(parseFloat(val));

                            $("#mkiosvoice_d10").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[2].setData(mkiosvoice_d10, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice, mkiosvoice_d20: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d20 = [];

                        $("#mkiosvoice_d20").html("");
                        $("#mkiosvoice_d20").append("<td>20k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d20.push(parseFloat(val));

                            $("#mkiosvoice_d20").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[3].setData(mkiosvoice_d20, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice, mkiosvoice_d25: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d25 = [];

                        $("#mkiosvoice_d25").html("");
                        $("#mkiosvoice_d25").append("<td>25k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d25.push(parseFloat(val));

                            $("#mkiosvoice_d25").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[4].setData(mkiosvoice_d25, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice, mkiosvoice_d50: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d50 = [];

                        $("#mkiosvoice_d50").html("");
                        $("#mkiosvoice_d50").append("<td>50k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d50.push(parseFloat(val));

                            $("#mkiosvoice_d50").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[5].setData(mkiosvoice_d50, true);
                    }
                });
				
				$.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_mkiosvoice, mkiosvoice_d100: '' },
                    success : function(data)
                    {
                        var mkiosvoice_d100 = [];

                        $("#mkiosvoice_d100").html("");
                        $("#mkiosvoice_d100").append("<td>100k</td>");
                        
                        $.each(data, function(i, val) {
                            mkiosvoice_d100.push(parseFloat(val));

                            $("#mkiosvoice_d100").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        script_mkiosvoice.series[6].setData(mkiosvoice_d100, true);
                    }
                });
			});
			//Akhir fungsi Dropdown CLuster
		});
		// Akhir Fungsi Dropdown Chart Script Mkiosvoice
		
		// Fungsi Dropdown Chart scriptlm (Chart Lastmonth)
        $(document).ready(function () {
            // Fungsi Dropdown Branch
            $('#branch_scriptlm').on('change', function() {
                id_branch_scriptlm = $('#branch_scriptlm').val();
                branch_scriptlm = $('#branch_scriptlm :selected').text();
                if(branch_scriptlm === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_scriptlm + ' - Revenue SUMBAGUT';
                }
                scriptlm.setTitle(null, { text: subtitle});

                // Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_scriptlm },
                    success : function(data)
                    {
                        $("#cluster_scriptlm").html("");
                        $("#cluster_scriptlm").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_scriptlm").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_scriptlm').removeAttr('disabled');
                        $('#cluster_scriptlm').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select

                // Fungsi GET Data Branch tanggal_lm dan Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scriptlm, last_year_lm: '' },
                    success : function(data)
                    {
                        var last_year_lm = [];
                        var tanggal_lm = [];

                        $("#last_year_lm").html("");
                        $("#last_year_lm").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year_lm.push(parseFloat(val));
                            tanggal_lm.push(parseInt(i));

                            $("#last_year_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.xAxis[0].setCategories(tanggal_lm, true, true);
                        scriptlm.series[0].setData(last_year_lm, true);
                    }
                });
                // Fungsi GET Data Branch tanggal_lm dan Last Year

                // Fungsi GET Data Branch now_lm
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scriptlm, now_lm: '' },
                    success : function(data)
                    {
                        var now_lm = [];

                        $("#now_lm").html("");
                        $("#now_lm").append("<td>now_lm</td>");

                        $.each(data, function(i, val) {
                            now_lm.push(parseFloat(val));
							//if (now_lm === 0)

                            $("#now_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.series[1].setData(now_lm, true);
                    }
                });
                // Akhir Fungsi GET Data Branch now_lm

                // Fungsi GET Data Branch Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scriptlm, last_month_lm: '' },
                    success : function(data)
                    {
                        var last_month_lm = [];

                        $("#last_month_lm").html("");
                        $("#last_month_lm").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month_lm.push(parseFloat(val));
							//var noNulls = last_month_lm.map(function (val) {
							//return (val === 0) ? null : val;
							//});
                            $("#last_month_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
							
                        });

                        scriptlm.series[2].setData(last_month_lm, true);
                    }
                });
                // Akhir Fungsi GET Data Branch Last Month
            });
            // Akhir Fungsi Dropdown Branch

            // Fungsi Dropdown Cluster
            $('#cluster_scriptlm').on('change', function() {
                id_cluster_scriptlm = $('#cluster_scriptlm').val();
                cluster_scriptlm = $('#cluster_scriptlm :selected').text();
                var subtitle = cluster_scriptlm + ' - Revenue SUMBAGUT';
                scriptlm.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scriptlm, last_year_lm: '' },
                    success : function(data)
                    {
                        var last_year_lm = [];
                        var tanggal_lm = [];

                        $("#last_year_lm").html("");
                        $("#last_year_lm").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year_lm.push(parseFloat(val));
                            tanggal_lm.push(parseInt(i));
                            
                            $("#last_year_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.xAxis[0].setCategories(tanggal_lm, true, true);
                        scriptlm.series[0].setData(last_year_lm, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Last Year

                // Fungsi GET Data Cluster now_lm
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scriptlm, now_lm: '' },
                    success : function(data)
                    {
                        var now_lm = [];

                        $("#now_lm").html("");
                        $("#now_lm").append("<td>now_lm</td>");

                        $.each(data, function(i, val) {
                            now_lm.push(parseFloat(val));

                            $("#now_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.series[1].setData(now_lm, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster now_lm

                // Fungsi GET Data Cluster Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scriptlm, last_month_lm: '' },
                    success : function(data)
                    {
                        var last_month_lm = [];

                        $("#last_month_lm").html("");
                        $("#last_month_lm").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month_lm.push(parseFloat(val));

                            $("#last_month_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.series[2].setData(last_month_lm, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Last Month
                
                $('#bulan_scriptlm').removeAttr('disabled');
                $('#bulan_scriptlm').material_select();
            });
            // Akhir Fungsi Dropdown Cluster

            // Fungsi Dropdown Bulan
            $('#bulan_scriptlm').on('change', function() {
                bulan_scriptlm = $('#bulan_scriptlm').val();
                nama_bulan_scriptlm = $('#bulan_scriptlm :selected').text();
				id_bulan_scriptlm = $('#bulan_scriptlm :selected').text();
                var subtitle = cluster_scriptlm + ' - ' + nama_bulan_scriptlm;
                scriptlm.setTitle(null, { text: subtitle});

                /* Ini contoh data array data baru yg akan masuk ke dalam chart 
                var tanggal_lm = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];

                var last_year_lm = [14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 31];
                var now_lm = [100, 112, 0, 0, 360, 330, 141, 150, 100, 0, 0, 0, 10, 12, 60, 70, 60, 300, 101, 100, 100, 67, 110, 10, 101, 100, 100, 67, 80, 66];
                var last_month_lm = [10, 12, 60, 70, 60, 300, 101, 100, 100, 67, 110, 10, 100, 112, 0, 0, 360, 330, 141, 150, 100, 2, 7.5, 8, 8.2, 9, 11, 7, 18, 21, 7];

                Ini contoh insert data baru ke dalam chart 
                scriptlm.series[0].setData(eval(last_year_lm), false, true); // insert data des
                scriptlm.series[1].setData(eval(now_lm), false, true); // insert data mom
                scriptlm.series[2].setData(eval(last_month_lm), false, true); // insert data yoy

                scriptlm.xAxis[0].setCategories(tanggal_lm, true, true); // insert data kategori chart*/
				
				// Fungsi GET Data Bulan Last Year
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
				data: { bulan: id_bulan_scriptlm, last_year_lm:'' },
                    success : function(data)
                    {
                        console.log(data);
                        var last_year_lm = [];
                        var tanggal_lm = [];

                        $("#last_year_lm").html("");
                        $("#last_year_lm").append("<td>Lastyear</td>");
                        
                        $.each(data, function(i, val) {
                            last_year_lm.push(parseFloat(val));
                            tanggal_lm.push(parseInt(i));
                            
                            $("#last_year_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.xAxis[0].setCategories(tanggal_lm, true, true);
                        scriptlm.series[0].setData(last_year_lm, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Last Year

                // Fungsi GET Data bulan now_lm
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { bulan: id_bulan_scriptlm, now_lm: '' },
                    success : function(data)
                    {
                        var now_lm = [];

                        $("#now_lm").html("");
                        $("#now_lm").append("<td>now_lm</td>");

                        $.each(data, function(i, val) {
                            now_lm.push(parseFloat(val));

                            $("#now_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.series[1].setData(now_lm, true);
                    }
                });
                // Akhir Fungsi GET Data bulan now_lm

                // Fungsi GET Data bulan Last Month
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { bulan: bulan_scriptlm, last_month_lm: '' },
                    success : function(data)
                    {
                        var last_month_lm = [];

                        $("#last_month_lm").html("");
                        $("#last_month_lm").append("<td>Last Month</td>");

                        $.each(data, function(i, val) {
                            last_month_lm.push(parseFloat(val));

                            $("#last_month_lm").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptlm.series[2].setData(last_month_lm, true);
                    }
                });
                // Akhir Fungsi GET Data bulan Last Month

            });
            // Akhir Fungsi Dropwodn Bulan
        });
        // Akhir Fungsi Dropdown Chart scriptlm (Chart Lastmonth)
		
		
		
        // Fungsi Dropdown Chart Scriptx (Chart Bawah)
        $(document).ready(function () {
            // Fungsi Dropdown Branch
            $('#branch_scriptx').on('change', function() {
                id_branch_scriptx = $('#branch_scriptx').val();
                branch_scriptx = $('#branch_scriptx :selected').text();
                if(branch_scriptx === 'SUMBAGUT')
                {
                    var subtitle = 'SUMBAGUT - Revenue L1 SUMBAGUT';
                }
                else
                {
                    var subtitle = branch_scriptx + ' - Revenue L1 SUMBAGUT';
                }
                scriptx.setTitle(null, { text: subtitle});

                
				// Fungsi GET Data Cluster Untuk Select
                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_scriptx },
                    success : function(data)
                    {
                        $("#cluster_scriptx").html("");
                        $("#cluster_scriptx").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_scriptx").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_scriptx').removeAttr('disabled');
                        $('#cluster_scriptx').material_select();
                    }
                });
                // Akhir Fungsi GET Data Cluster Untuk Select

                // Fungsi GET Data Branch Tanggal dan Voice
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scriptx, voice: '' },
                    success : function(data)
                    {
                        var voice = [];
                        var tanggal = [];

                        $("#voice").html("");
                        $("#voice").append("<td>Voice</td>");
                        
                        $.each(data, function(i, val) {
                            voice.push(parseFloat(val));
                     		 tanggal.push(parseInt(i));

                            $("#voice").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
					
					   });

                        scriptx.xAxis[0].setCategories(tanggal, true, true);
                        scriptx.series[0].setData(voice, true);
                    }
                });
                // Fungsi GET Data Branch Tanggal dan Voice

                // Fungsi GET Data Branch SMS
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scriptx, sms: '' },
                    success : function(data)
                    {
                        var sms = [];

                        $("#sms").html("");
                        $("#sms").append("<td>SMS</td>");

                        $.each(data, function(i, val) {
                            sms.push(parseFloat(val));

                            $("#sms").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptx.series[1].setData(sms, true);
                    }
                });
                // Akhir Fungsi GET Data Branch SMS

                // Fungsi GET Data Branch Broadband
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scriptx, broadband: '' },
                    success : function(data)
                    {
                        var broadband = [];

                        $("#broadband").html("");
                        $("#broadband").append("<td>Broadband</td>");

                        $.each(data, function(i, val) {
                            broadband.push(parseFloat(val));

                            $("#broadband").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptx.series[2].setData(broadband, true);
                    }
                });
                // Akhir Fungsi GET Data Branch Broadband
                                
                // Fungsi GET Data Branch Digital Services
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { branch: branch_scriptx, digital_services: '' },
                    success : function(data)
                    {
                        var digital_services = [];

                        $("#digital_services").html("");
                        $("#digital_services").append("<td>Digital Services</td>");

                        $.each(data, function(i, val) {
                            digital_services.push(parseFloat(val));

                            $("#digital_services").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptx.series[3].setData(digital_services, true);
                    }
                });
                // Akhir Fungsi GET Data Branch Digital Services
            });
            // Akhir Fungsi Dropdown Branch

            // Fungsi Dropdown Cluster
            $('#cluster_scriptx').on('change', function() {
                id_cluster_scriptx = $('#cluster_scriptx').val();
                cluster_scriptx = $('#cluster_scriptx :selected').text();
                var subtitle = cluster_scriptx + ' - Revenue SUMBAGUT';
                scriptx.setTitle(null, { text: subtitle});
                
                // Fungsi GET Data Cluster Voice
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scriptx, voice: '' },
                    success : function(data)
                    {
                        var voice = [];
                        var tanggal = [];

                        $("#voice").html("");
                        $("#voice").append("<td>Voice</td>");
                        
                        $.each(data, function(i, val) {
                            voice.push(parseFloat(val));
                            tanggal.push(parseInt(i));
                            
                            $("#voice").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptx.xAxis[0].setCategories(tanggal, true, true);
                        scriptx.series[0].setData(voice, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Voice

                // Fungsi GET Data Cluster SMS
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scriptx, sms: '' },
                    success : function(data)
                    {
                        var sms = [];

                        $("#sms").html("");
                        $("#sms").append("<td>SMS</td>");
                        
                        $.each(data, function(i, val) {
                            sms.push(parseFloat(val));
                            
                            $("#sms").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptx.series[1].setData(sms, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster SMS

                // Fungsi GET Data Cluster Broadband
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scriptx, broadband: '' },
                    success : function(data)
                    {
                        var broadband = [];

                        $("#broadband").html("");
                        $("#broadband").append("<td>Broadband</td>");
                        
                        $.each(data, function(i, val) {
                            broadband.push(parseFloat(val));
                            
                            $("#broadband").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptx.series[2].setData(broadband, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Broadband
                
                // Fungsi GET Data Cluster Digital Services
                $.ajax({ type: "GET",
                    url: 'controllers/RevenueController.php',
                    data: { cluster: cluster_scriptx, digital_services: '' },
                    success : function(data)
                    {
                        var digital_services = [];

                        $("#digital_services").html("");
                        $("#digital_services").append("<td>Digital Services</td>");
                        
                        $.each(data, function(i, val) {
                            digital_services.push(parseFloat(val));
                            
                            $("#digital_services").append("<td style='font-size:11px'>"+parseFloat(val).toFixed(1)+"</td>");
                        });

                        scriptx.series[3].setData(digital_services, true);
                    }
                });
                // Akhir Fungsi GET Data Cluster Digital Services


                
            //    $('#bulan_scriptx').removeAttr('disabled');
            //    $('#bulan_scriptx').material_select();
            });
            // Akhir Fungsi Dropdown Cluster

            // Fungsi Dropdown Bulan
            $('#bulan_scriptx').on('change', function() {
                bulan_scriptx = $('#bulan_scriptx').val();
                nama_bulan_scriptx = $('#bulan_scriptx :selected').text();
                var subtitle = cluster_scriptx + ' - ' + nama_bulan_scriptx;
                scriptx.setTitle(null, { text: subtitle});

                /* Ini contoh data array data baru yg akan masuk ke dalam chart */
                var tanggal_scriptx = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];

                var voice = [14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 31];
                var sms = [100, 112, 0, 0, 360, 330, 141, 150, 100, 0, 0, 0, 10, 12, 60, 70, 60, 300, 101, 100, 100, 67, 110, 10, 101, 100, 100, 67, 110, 10];
                var broadband = [10, 12, 60, 70, 60, 300, 101, 100, 100, 67, 110, 10, 100, 112, 0, 0, 360, 330, 141, 150, 100, 2, 7.5, 8, 8.2, 9, 11, 7, 18, 21, 7];
                var digital_services = [14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 14, 50, 75, 34, 56, 23, 24, 56, 78, 50, 31];

                /* Ini contoh insert data baru ke dalam chart */
                scriptx.series[0].setData(eval(voice), false, true); // insert data des
                scriptx.series[1].setData(eval(sms), false, true); // insert data mom
                scriptx.series[2].setData(eval(broadband), false, true); // insert data yoy
				scriptx.series[3].setData(eval(digital_services), false, true); // insert data yoy

                scriptx.xAxis[0].setCategories(tanggal, true, true); // insert data kategori chart
            });
            // Akhir Fungsi Dropwodn Bulan
        });
        // Akhir Fungsi Dropdown Chart Script (Chart Bawah)

		

		
        // Fungsi Dropdown Home
        $(document).ready(function () {
            // Fungsi Dropdown Branch
            $('#branch_home').on('change', function() {
                id_branch_home = $('#branch_home').val();
                branch_home = $('#branch_home :selected').text();

                $.ajax({ type: "GET",
                    url: 'controllers/BranchClusterController.php',
                    data: { cluster: '', id_branch: id_branch_home },
                    success : function(data)
                    {
                        $("#cluster_home").html("");
                        $("#cluster_home").append("<option value='' disabled selected>Pilih Cluster</option>");
                        $.each(data, function(i, val) {
                            $("#cluster_home").append("<option value='" + val.id_cluster + "'>" + val.nama_cluster + "</option>");
                        });
                        $('#cluster_home').removeAttr('disabled');
                        $('#cluster_home').material_select();
                    }
                });
            });
            // Akhir Fungsi Dropdown Branch

            // Fungsi Dropdown Cluster
            $('#cluster_home').on('change', function() {
                id_cluster_home = $('#cluster_home').val();
                cluster_home = $('#cluster_home :selected').text();

                $('#bulan_home').removeAttr('disabled');
                $('#bulan_home').material_select();
            });
            // Akhir Fungsi Dropdown Cluster

            // Fungsi Dropdown Bulan
            $('#bulan_home').on('change', function() {
                bulan_home = $('#bulan_home').val();
                nama_bulan_home = $('#bulan_home :selected').text();
            });
            // Akhir Fungsi Dropwodn Bulan
        });
        // Akhir Fungsi Dropdown Home

        // Fungsi Inisialisasi Material Select
        $(document).ready(function () {
            $('.mdb-select').material_select();
        });
        // Akhir Fungsi Inisialisasi Material Select

        // Fungsi Inisialisasi Collaptable
        $(document).ready(function(){
            $('.collaptable').aCollapTable({ 
                startCollapsed: true,
                addColumn: false, 
                plusButton: '<span class="i">+</span>', 
                minusButton: '<span class="i">-</span>' 
            });
        });
        // Akhir Fungsi Inisialisasi Collaptable

        // Fungsi Hidden Div Chart Layer
        function fungsi_hide() {
            var x = document.getElementById("chart_total");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        // Akhir Fungsi Hidden Div Chart Layer

        // Fungsi Onclick Tombol Reset User
        $(document).on("click", "#reset", function () {
            var username = $(this).data('id');
            $("#modal-reset #username").val(username);
        });
        // Akhir Fungsi Onclick Tombol Reset User

        // Fungsi Onclick Tombol Nonaktif User
        $(document).on("click", "#nonaktif", function () {
            var username = $(this).data('id');
            $("#modal-nonaktif #username").val(username);
        });
        // Akhir Fungsi Onclick Tombol Nonaktif User

        // Fungsi Onclick Tombol Aktivasi User
        $(document).on("click", "#aktif", function () {
            var username = $(this).data('id');
            $("#modal-aktif #username").val(username);
        });
        // Akhir Fungsi Onclick Tombol Aktivasi User

        // Fungsi Onclick Tombol Hapus User
        $(document).on("click", "#hapus", function () {
            var username = $(this).data('id');
            $("#modal-hapus #username").val(username);
        });
        // Akhir Fungsi Onclick Tombol Hapus User

        // Fungsi Onclick Hapus Whitelist
        $(document).on("click", "#hapus-whitelist", function () {
            var id_file = $(this).data('id');
            var program = $(this).data('program');
            var cluster = $(this).data('cluster');
            var nama_file = $(this).data('nama_file');
            $("#modal-hapus-whitelist #id").val(id_file);
            $("#modal-hapus-whitelist #program").val(program);
            $("#modal-hapus-whitelist #clusters").val(cluster);
            $("#modal-hapus-whitelist #nama_file").val(nama_file);
        });
        // Akhir Fungsi Onclick Hapus Whitelist
		
		// Fungsi Dropdown Region L1
			
		// Akhir Dropdown Fungsi Region L1
    </script>
	<script>
        // Satellite map
        function satellite_map() {
            var var_location = new google.maps.LatLng(48.856847, 2.296832);

            var var_mapoptions = {
                center: var_location,
                zoom: 16,
                mapTypeId: 'satellite'
            };

            var var_map = new google.maps.Map(document.getElementById("map-container-3"),
                var_mapoptions);

            var var_marker = new google.maps.Marker({
                position: var_location,
                map: var_map,
                title: "Paris, France"
            });

        }

		
		
        // Regular map
        function regular_map() {
            var var_location = new google.maps.LatLng(40.725118, -73.997699);

            var var_mapoptions = {
                center: var_location,
                zoom: 14
            };

            var var_map = new google.maps.Map(document.getElementById("map-container"),
                var_mapoptions);

            var var_marker = new google.maps.Marker({
                position: var_location,
                map: var_map,
                title: "New York"
            });

        }

        
    </script>
