<x-backend>
    
   <div class="row" id="showTable">
      <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card  shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <a href="{{route('announcelist')}}" class="btn btn-outline-primary float-right btn-new">Back</a>
                  <h2 class=" mb-0">Articles List for {{$announce->title}}</h2>
               </div>
               
            </div>
            <span class="text-success d-none success"></span>
         </div>
         <div class="card-body">
          <div>
            <div class="d-flex flex-row-reverse">
              @role('coordinator')
              <button class="btn btn-sm btn-info ml-3 noComment14-btn" data-id="{{$announce->id}}">No Comment with 14 days</button>
              <button class="btn btn-sm btn-info ml-3 noComment-btn" data-id="{{$announce->id}}">No Comment</button>
               <a class="btn btn-sm btn-info " href="{{route('getArticleforFID',encrypt($announce->id))}}" >All</a>
               @endrole
            </div>
          </div>
            <!-- Chart -->
            <div class="normaldiv ">
               <!-- Chart wrapper -->
               <div class="table-responsive p-5">
                      <table class="table table-hover datatable" id="cmtable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>Student</th>
                            <th>Faculty</th>
                            <th>Upload Date</th>
                            
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @php $i=1; @endphp
                          @foreach($magazines as $magazine)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$magazine->title}}</td>
                            <td>{{$magazine->record->student->user->name}}</td>
                            <td>{{$magazine->record->faculty->name}}</td>
                            <td>{{$magazine->created_at}}</td>

                            <td><a href="{{route('magazine.show',encrypt($magazine->id))}}" class="btn btn-sm btn-light">Detail</a>
                              @role('manager')
                              <a href="{{route('downloadzip',encrypt($magazine->id))}}" class="btn btn-sm btn-success">Download</a>
                              @endrole
                            </td>
                          </tr>
                          @endforeach


                          

                            
                        </tbody>
                      </table>
                    </div>
            </div>

            <div class="commentdiv d-none">
               <!-- Chart wrapper -->
               <div class="table-responsive p-5">
                      <table class="table table-hover datatable" id="commenttable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>Student</th>
                            <th>Faculty</th>
                            <th>Upload Date</th>
                            
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                      </table>
                    </div>
            </div>
         </div>
      </div>
   </div>


   




           
<x-slot name="script">

  <script>
    $(document).ready(function(){
      $('#cmtable').dataTable({
        sort:false,
    pagingType: 'full_numbers',
                 pageLength: 10,
                 language: {
                   oPaginate: {
                     sNext: '<i class="fa fa-forward"></i>',
                     sPrevious: '<i class="fa fa-backward"></i>',
                     sFirst: '<i class="fa fa-step-backward"></i>',
                     sLast: '<i class="fa fa-step-forward"></i>'
                     }
                   } ,
      });

      $('.noComment-btn').click(function(){
        // alert('helo');
        $(this).addClass('active');
        $('.noComment14-btn').removeClass('active');
        // $('.noComment14-btn').toggle();
        $('.normaldiv').addClass('d-none');
        $('.commentdiv').removeClass('d-none');
        var id=$(this).data('id');
        var url="{{route('getNoComment',':id')}}";
        url=url.replace(':id',id);
        $.get(url,function(res){
           console.log(res);

          var data=res.data;
          $('#commenttable').dataTable({
            destroy: true,
            sort:false,
    pagingType: 'full_numbers',
                 pageLength: 10,
                 language: {
                   oPaginate: {
                     sNext: '<i class="fa fa-forward"></i>',
                     sPrevious: '<i class="fa fa-backward"></i>',
                     sFirst: '<i class="fa fa-step-backward"></i>',
                     sLast: '<i class="fa fa-step-forward"></i>'
                     }
                   } ,
            data:data,
            columns:[
            {data:'DT_RowIndex'},
            {data:'title'},
            {data:'record.student.user.name'},
            {data:'record.faculty.name'},
            {data:'created_at',render:function(data){
              return moment(data).format('l'); ;
            }},
            {data:function(data){
              var url="{{route('magazineShow',':id')}}";
              url= url.replace(':id',data.id);
              return `<a href="${url}" class="btn btn-sm btn-light">Detail</a>`
            }}


            ]
          })

        })
      })

       $('.noComment14-btn').click(function(){
        // alert('helo');
        
          $(this).addClass('active');
        $('.noComment-btn').removeClass('active');
        $('.normaldiv').addClass('d-none');
        $('.commentdiv').removeClass('d-none');
        var id=$(this).data('id');
        var url="{{route('getNoComment14',':id')}}";
        url=url.replace(':id',id);
        $.get(url,function(res){
           console.log(res);

          var data=res.data;
          // $('#commenttable').destroy();
          $('#commenttable').dataTable({
            sort:false,
    pagingType: 'full_numbers',
                 pageLength: 10,
                 language: {
                   oPaginate: {
                     sNext: '<i class="fa fa-forward"></i>',
                     sPrevious: '<i class="fa fa-backward"></i>',
                     sFirst: '<i class="fa fa-step-backward"></i>',
                     sLast: '<i class="fa fa-step-forward"></i>'
                     }
                   } ,
             destroy: true,
            data:data,
            columns:[
            {data:'DT_RowIndex'},
            {data:'title'},
            {data:'record.student.user.name'},
            {data:'record.faculty.name'},
            {data:'postDate'},
            {data:function(data){
              var url="{{route('magazineShow',':id')}}";
              url= url.replace(':id',data.id);
              return `<a href="${url}" class="btn btn-sm btn-light">Detail</a>`
            }}


            ]
          })

        })
      })
    })


    function getTable(data){

    }
  </script>
      
    </x-slot>
</x-backend>