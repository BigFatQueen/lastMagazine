<x-backend>
   <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Yearly</h6>
                  <h2 class=" mb-0">Article Contributors</h2>
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
                  <h2 class=" mb-0">Article Contributions </h2>
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
                  <h2 class="mb-0">Contributions for <span class="title">2019</span></h2>
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

          <div class="card shadow mt-3">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Percentage</h6>
                  <h2 class="mb-0">Contributions for <span class="title">2020</span></h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="piechart3" ></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      
  <x-slot name="script">
   <script>
     $(document).ready(function(){
      //contributor start here
      var url2="{{route('getStatical2')}}";
       $.get(url2,function(data){
        var ya=data.data;
        var rp=data.report;
        // var rpid=data.report.id;
        // console.log(rpid);
        // console.log(rp);
         var year11=[]; var year22=[];

          var year={
          year1:[],
          year2:[]
        };



        $.each(ya,function(i,v){
          if(i=='2019'){
            $.each(v,function(j,k){
              year.year1.push(k);
            })
          }else if(i =='2020'){
           $.each(v,function(j,k){
              year.year2.push(k);
            })
         }
          
        })
         console.log(year);
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
            text: '2019 and 2020 Contributions Chart'
        }
        };

        var chart=new Chart(ctx,{
          type:'horizontalBar',
          data:datas,
          options:options
        })
         

        
      });
      //contributor start end

      // alert('elloo');
     var  url1="{{route('getStatical1')}}";
       $.get(url1,function(data){
        var ya=data.data;
        var rp=data.report;
        // var rpid=data.report.id;
        // console.log(rpid);
        // console.log(rp);
         var year11=[]; var year22=[];

          var year={
          year1:[],
          year2:[]
        };



        $.each(ya,function(i,v){
          if(i=='2019'){
            $.each(v,function(j,k){
              year.year1.push(k);
            })
          }else if(i =='2020'){
           $.each(v,function(j,k){
              year.year2.push(k);
            })
         }
          
        })
         console.log(year);
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
            text: '2019 and 2020 Contributions Chart'
        }
        };

        var chart=new Chart(ctx,{
          type:'horizontalBar',
          data:datas,
          options:options
        })
         

        
      });

       // percentage start here
       $.get(url1,function(data){
        var ya=data.data;
        var rp=data.report;
        // var rpid=data.report.id;
        // console.log(rpid);
        // console.log(rp);
         var year11=[]; var year22=[];

          var year={
          year1:[],
          year2:[]
        };



        $.each(ya,function(i,v){
          if(i=='2019'){
            $.each(v,function(j,k){
              year.year1.push(k);
            })
          }else if(i =='2020'){
           $.each(v,function(j,k){
              year.year2.push(k);
            })
         }
          
        })
         console.log(year);
          var ctx = $('#myChart3')[0].getContext('2d');
          var ctx2 = $('#piechart3')[0].getContext('2d');
              var data22 = {
                            datasets: [{
                                data: year.year1,
                                backgroundColor: [
                                    "#FF6384",
                                    "#4BC0C0",
                                    "#FFCE56",
                                    "#E7E9ED",
                                    "#36A2EB"
                                ],
                                label: '2019' // for legend
                            }],
                            labels: rp
                        };

              var data23 = {
                            datasets: [{
                                data:year.year2,
                                backgroundColor: [
                                    "#FF6384",
                                    "#4BC0C0",
                                    "#FFCE56",
                                    "#E7E9ED",
                                    "#36A2EB"
                                ],
                                label: '2020' // for legend
                            }],
                            labels: rp
                        };
                        var options2 = {
        responsive: true,
  maintainAspectRatio: false,
   tooltips: {
     enabled: true
   },
    tooltips: {
      mode: 'label',
      callbacks: {
          label: function(tooltipItem, data) {
              var type = data.datasets[tooltipItem.datasetIndex].label;
              var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
              //console.log(value);
              var total = 0;
              for (var i = 0; i < data.datasets.length; i++)
                  total += parseInt(data.datasets[i].data[tooltipItem.index]);
              if (tooltipItem.datasetIndex !== data.datasets.length - 1) {
                  return type + " : " + parseFloat(value).toFixed(0).replace(/(\d)(?=(\d{3})+\.)/g, '1,');
              } else {
                  return [type + " : " +parseFloat(value).toFixed(0).replace(/(\d)(?=(\d{3})+\.)/g, '1,'), "Overall : " + total];
              }
          }
      }
  },
  animation: {
    duration: 500,
    easing: "easeOutQuart",
    onComplete: function () {
      var ctx = this.chart.ctx;
      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
      ctx.textAlign = 'center';
      ctx.textBaseline = 'bottom';
      var labels=this.data.labels;

      this.data.datasets.forEach(function (dataset) {

        for (var i = 0; i < dataset.data.length; i++) {
          // console.log(dataset.labels);
          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
              start_angle = model.startAngle,
              end_angle = model.endAngle,
              mid_angle = start_angle + (end_angle - start_angle)/2;

          var x = mid_radius * Math.cos(mid_angle);
          var y = mid_radius * Math.sin(mid_angle);

          ctx.fillStyle = '#fff';
          if (i == 3){ // Darker text color for lighter background
            ctx.fillStyle = '#444';
          }
          var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
          var testing=percent+labels[i];
          // ctx.fillText(dataset.data[i], model.x + x, model.y + y);
          // Display percent in another line, line break doesn't work for fillText
          ctx.fillText(testing, model.x + x, model.y + y + 15);
        }
      });               
    }
  }
  
 };
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data22,
            options: options2
        });

        // piechart3 start here
          var myChart = new Chart(ctx2, {
              type: 'pie',
              data: data23,
              options: options2
          });
       });
       //percentage end here



     })
   </script>
  </x-slot>
</x-backend>