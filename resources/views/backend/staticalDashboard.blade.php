<x-backend>
	 <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Yearly</h6>
                  <h2 class=" mb-0">Contributors</h2>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="mychart2" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
           <div class="card shadow mt-3">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Yearly</h6>
                  <h2 class=" mb-0">Contributors</h2>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="myChart" ></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Percentage</h6>
                  <h2 class="mb-0">Contributions</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="myChart3" ></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      
	<x-slot name="script">
		<script>
     $(document).ready(function(){
      url1="{{route('getStatical1')}}";
      $.get(url1,function(data){
        var ya=data.data;
        var rp=data.report;
        console.log(rp);
        var year={
          year1:[],
          year2:[]
        };

        var len=ya.length;
        for(var i=0;i<len;i++){
          if(ya[i].aname =='2019'){

            year.year1.push(ya[i].cm);
          }else if(ya[i].aname =='2020'){
            year.year2.push(ya[i].cm);
          }
        }

        var cp=rp.length;
        $.each(year,function(i,v){
          var vp=v.length;
          if(vp<cp){
            var nl=cp-vp;
            for(let k=0;k<nl;k++){
              v.push(0);
            }
          }else{
            // console.log('2');
          }
        })
         // console.log(year);
      });




      //for the magazines count
      url1="{{route('getStatical1')}}";
      $.get(url1,function(data){
        var ya=data.data;
        var rp=data.report;
        // console.log(rp);
        var year={
          year1:[],
          year2:[]
        };


        var len=ya.length;
        for(var i=0;i<len;i++){
          if(ya[i].aname =='2019'){

            year.year1.push(ya[i].cm);
          }else if(ya[i].aname =='2020'){
            year.year2.push(ya[i].cm);
          }
        }

        

        var cp=rp.length;
        $.each(year,function(i,v){
          var vp=v.length;
          if(vp<cp){
            var nl=cp-vp;
            for(let k=0;k<nl;k++){
              v.push(0);
            }
          }else{
            // console.log('2');
          }
        })



        var ctx=$('#myChart');
        var datas={
          labels:rp,
          datasets:[{
            label:"2019",
            data:year.year1,
            maxBarThickness: 8,
        minBarLength: 2,
            backgroundColor :'#3498db',
            // fill:false,
            borderColor :'green',
            

          },{label:"2020",
            data:year.year2,
            maxBarThickness: 8,
        minBarLength: 2,
          backgroundColor :'red',
          borderColor :'black',
          // fill:false
           
          }]
        }


        // var options={
        //    responsive: true,
        //     title: {
        //         display: true,
        //         text: 'Chart.js'
        //     },
        // };
        var options={
          layout: {
            padding: {
                left: 50,
                right: 0,
                top: 0,
                bottom: 0
            }
        },
        scales: {
            xAxes: [
            { scaleLabel: {
                            display: true,
                            labelString: 'value'
                          },
                stacked: false,
                ticks: {
                      beginAtZero: true,
                      steps: 5,
                      stepValue: 5,
                      max: 100
                  },

            }],
            yAxes: [{
              scaleLabel: {
                            display: true,
                            labelString: 'Faculty Names'
                          },
                stacked: false,
                
            }]
        },
         legend: {
            display: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        },
        title: {
            display: true,
            text: '2019 and 2020 Contributors Chart'
        }
        };

        var chart=new Chart(ctx,{
          type:'horizontalBar',
          data:datas,
          options:options
        })

       })


      //for percentage start
      $.get(url1,function(data){
        var ya=data.data;
        var rp=data.report;
        // console.log(rp);
        var year={
          year1:[],
          year2:[]
        };

        var len=ya.length;
        for(var i=0;i<len;i++){
          if(ya[i].aname =='2019'){

            year.year1.push(ya[i].cm);
          }else if(ya[i].aname =='2020'){
            year.year2.push(ya[i].cm);
          }
        }

        var cp=rp.length;
        $.each(year,function(i,v){
          var vp=v.length;
          if(vp<cp){
            var nl=cp-vp;
            for(let k=0;k<nl;k++){
              v.push(0);
            }
          }else{
            // console.log('2');
          }
        })
        console.log(year);

        var ctx=$('#myChart3');
        // var data={
        //   labels:'',
        //   datasets:[{
        //     label:"2019",
        //     data:year.year1,
        //     maxBarThickness: 8,
        // minBarLength: 2,
        //     backgroundColor :'#3498db',
        //     // fill:false,
        //     borderColor :'green',
            

        //   },{label:"2020",
        //     data:year.year2,
        //     maxBarThickness: 8,
        // minBarLength: 2,
        //   backgroundColor :'red',
        //   borderColor :'black',
        //   // fill:false
           
        //   }]
        // }

         var data = [{
            label: '2019',
            backgroundColor: ["#52DF26",
              "#FFEC00",
              "#FF7300","#FFEC00",
              "#FF7300","#FFEC00",
              "#FF7300"],
            data: year.year1
        }, {
            label: '2020',
            backgroundColor: ["#FF7300",
              "#FFEC00",
              "#52DF26","#FFEC00",
              "#FF7300","#FFEC00",
              "#FF7300"],
            data: year.year2
        }];
        //  var data = [{
        //     label: '2019',
        //     backgroundColor: '#1d3f74',
        //     data: year.year1
        // }, {
        //     label: '2020',
        //     backgroundColor: '#6c92c8',
        //     data: year.year2
        // }];




        // var options={
        //    responsive: true,
        //     title: {
        //         display: true,
        //         text: 'Chart.js'
        //     },
        // };
         var options2 = {
            maintainAspectRatio: false,
            spanGaps: false,
            responsive: true,
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: "#000",
                    boxWidth: 14,
                    fontFamily: 'proximanova'
                }
            },
            tooltips: {
                mode: 'label',
                callbacks: {
                    label: function(tooltipItem, data) {
                        var type = data.datasets[tooltipItem.datasetIndex].label;
                        var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        var total = 0;
                        for (var i = 0; i < data.datasets.length; i++)
                            total += data.datasets[i].data[tooltipItem.index];
                        if (tooltipItem.datasetIndex !== data.datasets.length - 1) {
                            return type + " : " + value.toFixed(0).replace(/(\d)(?=(\d{3})+\.)/g, '1,');
                        } else {
                            return [type + " : " + value.toFixed(0).replace(/(\d)(?=(\d{3})+\.)/g, '1,'), "Overall : " + total];
                        }
                    }
                }
            },
            plugins: {
    //           datalabels: {
    //   color: "#white",
    //   align: "center"
    // }
                datalabels: {
                    display :true,
                    formatter: function(value, ctx) {
                      // console.log(value);
                        let sum = 0;
                        // console.log(sum);
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        //console.log(sum);
                        let percentage = (value * 100 / sum).toFixed(0) + "%";
                        return percentage;
                    },
                    font: {
                        weight: "normal"
                    },
                    color: "#000"
                }
            },
            scales: {
                xAxes: [{
                    stacked: true,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontColor: "#fff"
                    },
                    scaleLabel: {
                            display: true,
                            labelString: 'Faculty Names'
                          }

                }],
                yAxes: [{
                    stacked: true,
                    display: false,
                    ticks: {
                        fontColor: "#fff"
                    },
                }]
            }

        };
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: rp,
                datasets: data
            },
            options: options2
        });

       })
      //for percentage end


      //for student count
      url2="{{route('getStatical2')}}";
      $.get(url2,function(data){
        var ya=data.data;
        var rp=data.report;
        // console.log(rp);
        var year={
          year1:[],
          year2:[]
        };

        var len=ya.length;
        for(var i=0;i<len;i++){
          if(ya[i].aname =='2019'){

            year.year1.push(ya[i].cm);
          }else if(ya[i].aname =='2020'){
            year.year2.push(ya[i].cm);
          }
        }
        var len=ya.length;
        for(var i=0;i<len;i++){
          if(ya[i].aname =='2019'){

            year.year1.push(ya[i].cm);
          }else if(ya[i].aname =='2020'){
            year.year2.push(ya[i].cm);
          }
        }

        var cp=rp.length;
        $.each(year,function(i,v){
          var vp=v.length;
          if(vp<cp){
            var nl=cp-vp;
            for(let k=0;k<nl;k++){
              v.push(0);
            }
          }else{
            // console.log('2');
          }
        })
       // console.log(year);
        var ctx=$('#mychart2');
        var datas={
          labels:rp,
          datasets:[{
            label:"2019",
            data:year.year1,
            maxBarThickness: 8,
        minBarLength: 2,
            backgroundColor :'#3498db',
            // fill:false,
            borderColor :'green',
            

          },{label:"2020",
            data:year.year2,
            maxBarThickness: 8,
        minBarLength: 2,
          backgroundColor :'red',
          borderColor :'black',
          // fill:false
           
          }]
        }


        // var options={
        //    responsive: true,
        //     title: {
        //         display: true,
        //         text: 'Chart.js'
        //     },
        // };
        var options={
          layout: {
            padding: {
                left: 50,
                right: 0,
                top: 0,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                stacked: false,
                ticks: {
                    beginAtZero: true,
                    steps: 10,
                    stepValue: 5,
                    max: 100
                },
                scaleLabel: {
                            display: true,
                            labelString: 'Contributions'
                          },
                          
            }],
            yAxes: [{
                stacked: false,
                scaleLabel: {
                            display: true,
                            labelString: 'Faculty Names'
                          },

            }]
        },title: {
            display: true,
            text: '2019 and 2020 Contributions Chart'
        },
        };







        var chart=new Chart(ctx,{
          type:'horizontalBar',
          data:datas,
          options:options
        })
      })
     })
		</script>
	</x-slot>
</x-backend>