	$(function() {

		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}

			$.plot("#placeholderbasic", data, {
				series: {
					pie: { 
						show: true
					}
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
			
			$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
			$.plot("#placeholdernolegend", data, {
				series: {
					pie: { 
						show: true
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
			$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});


	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot("#placeholdertranslabel", data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						label: {
							show: true,
							radius: 1,
							formatter:labelFormatter,
							background: {
								opacity: 0.8
							}
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});		
			
			$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of transparent label pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
	$.plot('#placeholderradiuslabel', data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						label: {
							show: true,
							radius: 3/4,
							formatter: labelFormatter,
							background: {
								opacity: 0.5
							}
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
	$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of label radius pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
	$.plot('#placeholderstylelabel1', data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						label: {
							show: true,
							radius: 3/4,
							formatter: labelFormatter,
							background: { 
								opacity: 0.5,
								color: "#000"
							}
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
	$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Styled labeld pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
	$.plot('#placeholderstylelabel2', data, {
				series: {
					pie: { 
						show: true,
						radius: 3/4,
						label: {
							show: true,
							radius: 3/4,
							formatter: labelFormatter,
							background: { 
								opacity: 0.5,
								color: "#000"
							}
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Styled labeld pie charts


	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
	$.plot('#placeholderhiddenlabels', data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						label: {
							show: true,
							radius: 2/3,
							formatter: labelFormatter,
							threshold: 0.1
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of hidden labels pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholdercombinedlabels', data, {
				series: {
					pie: { 
						show: true,
						combine: {
							color: "#999",
							threshold: 0.05
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Combined labels pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholderrectangularpie', data, {
				series: {
					pie: { 
						show: true,
						radius: 500,
						label: {
							show: true,
							formatter: labelFormatter,
							threshold: 0.1
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Rectangular pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholdertiltedpie', data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						tilt: 0.5,
						label: {
							show: true,
							radius: 1,
							formatter: labelFormatter,
							background: {
								opacity: 0.8
							}
						},
						combine: {
							color: "#999",
							threshold: 0.1
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Tilted pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholderdonuthole', data, {
				series: {
					pie: { 
						innerRadius: 0.5,
						show: true
					}
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Donet Hole pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholderinteractivity', data, {
				series: {
					pie: { 
						show: true
					}
				},
				grid: {
					hoverable: true,
					clickable: true
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Interactivity pie charts










	function labelFormatter(label, series) {
		return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	}

	//

	function setCode(lines) {
		$("#code").text(lines.join("\n"));
	}

