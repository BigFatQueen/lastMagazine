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
                  <h2 class=" mb-0">Contributions </h2>
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
         // console.log(year);
      });




      //for the magazines count
      url1="{{route('getStatical1')}}";
      $.get(url1,function(data){
        var ya=data.data;
        var rp=data.report.name;
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
            text: '2019 and 2020 Contributions Chart'
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
        var rp=data.report.;
        // console.log(rp);
        var year={
          year1:[],
          year2:[]
        };

        var len=ya.length;
        for(var i=0;i<len;i++){
          if(ya[i].aname =='2019'){
            if(ya[i].fid==rp[i])
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

        var ctx = $('#myChart3')[0].getContext('2d');
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

        //  var data = [{
        //     label: '2019',
        //     backgroundColor: ["#52DF26",
        //       "#FFEC00",
        //       "#FF7300","#FFEC00",
        //       "#FF7300","#FFEC00",
        //       "#FF7300"],
        //     data: year.year1
        // }, {
        //     label: '2020',
        //     backgroundColor: ["#FF7300",
        //       "#FFEC00",
        //       "#52DF26","#FFEC00",
        //       "#FF7300","#FFEC00",
        //       "#FF7300"],
        //     data: year.year2
        // }];
        //  var data = [{
        //     label: '2019',
        //     backgroundColor: '#1d3f74',
        //     data: year.year1
        // }, {
        //     label: '2020',
        //     backgroundColor: '#6c92c8',
        //     data: year.year2
        // }];


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

        var ctxy=$('#piechart3')[0].getContext('2d');
        var myChart = new Chart(ctxy, {
            type: 'pie',
            data: data23,
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
        // var len=ya.length;
        // for(var i=0;i<len;i++){
        //   if(ya[i].aname =='2019'){

        //     year.year1.push(ya[i].cm);
        //   }else if(ya[i].aname =='2020'){
        //     year.year2.push(ya[i].cm);
        //   }
        // }

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
                            labelString: 'Contributors'
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
            text: '2019 and 2020 Contributors Chart'
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