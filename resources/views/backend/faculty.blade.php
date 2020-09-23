<x-backend>
  <div class="row">
   <div class="col-xl-8 mb-5 mb-xl-0">
      <div class="card  shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <h2 class=" mb-0">Faculty List</h2>
               </div>
               
            </div>
         </div>
         <div class="card-body">
            <!-- Chart -->
            <div class="chart">
               <!-- Chart wrapper -->
               <div class="table-responsive p-2">
                      <table class="table table-hover" id="facultyTable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Name</th>
                            
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
   <div class="col-xl-4">
      <div class="card shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0 title">Faculty Create</h2>
               </div>
            </div>
         </div>
         <div class="card-body">
            <!-- Chart -->
            <div class="chart">
                @if (session('messge'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{route('faculty.store')}}" id="add-form" method="post" enctype="multipart/form-data">
                  @csrf
                   <div class="form-group">

                      <label for="name">Faculty Name</label>
                      @error('name')
                      <span class="text-danger d-block">{{$message}}</span>
                     @enderror
                      <input type="text" name="name" class="form-control" id="name" placeholder="name@example.com">
                   </div>
                   <div class="form-group">
                      <label for="logo">Faculty Logo</label>
                       @error('logo')
                      <span class="text-danger d-block">{{$message}}</span>
                     @enderror
                      <input type="file" name="logo" class="form-control" id="logo" placeholder="name@example.com">
                   </div>
                
                <button type="submit"  class="btn btn-primary">Add Faulty</button>
                </form>

                <form  id="edit-form" method="post" enctype="multipart/form-data">
                  
                  <input type="hidden" name="id" >
                  <input type="hidden" name="oldlogo" >
                   <div class="form-group">
                      <label for="name">Faculty Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="name@example.com">
                   </div>
                   <div class="form-group">
                      <label for="logo">Faculty Logo</label>
                      <input type="file" name="logo" class="form-control" id="logo" placeholder="name@example.com">
                   </div>
                
                <button type="submit"  class="btn btn-primary">Update Faulty</button>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>


           
<x-slot name="script">
  <script>
    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#edit-form').hide();

      $('#facultyTable').DataTable({
        "serverSide": true,
        "processing": true,
        
        "sort":false,
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
        "ajax": "{{route('getFaculties')}}",
       "columns":[
        {"data":"DT_RowIndex"},
        {"data":function(data){
          return `<p class="d-inline">${data.name}</p>
          <img src="${data.logo}" width="40" height = "40"/>`;
        }},
        {"data":function(data){
          return `<button data-id=${data.id} class="btn btn-danger btn-sm btn-Delete"> <i class="ni ni-fat-delete " ></i></button>
                              <button data-id=${data.id} data-name=${data.name} data-logo=${data.logo} class="btn btn-primary btn-sm btn-Edit"> <i class="ni ni-settings-gear-65 "></i></button>`;
        }}
       ],
        info:false    
      });

      $('#facultyTable').on('click','.btn-Delete',function(){
        var id=$(this).data('id');
        var url="faculty/"+id;
        
        $.ajax({
          url:url,
          type:"POST",
          data:{"id":id,"_method": 'DELETE'},
          success:function(res){
            if(res){
              $('#facultyTable').DataTable().ajax.reload();
            }
          },
          error:function(error){
            console.log(error);
          }

        })
      });


      $('#facultyTable').on('click','.btn-Edit',function(){
        $('#add-form').hide();
        $('#edit-form').show();
        $('.title').text('Faculty Update');
          var id=$(this).data('id');
          var name=$(this).data('name');
          var logo=$(this).data('logo');

          $('#edit-form input[name="id"]').val(id);
          $('#edit-form input[name="name"]').val(name);
          $('#edit-form input[name="oldlogo"]').val(logo);
      });

      $('#edit-form button[type="submit"]').click(function(e){
        e.preventDefault();

        var id=$('#edit-form input[name="id"]').val();
        // console.log(id);

    var formData = new FormData($('#edit-form')[0]);

    // let file = $('#edit-form input[type=file]')[0].files[0];
         formData.append('_method', 'put');
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
           var url="{{route('faculty.update',':id')}}";
           url=url.replace(':id',id);
           $.ajax({
            url:url,
            type:'post',
            data:formData,
            dataType:'json',
            contentType: false,
             processData: false,
            success:function(data){

               $('#facultyTable').DataTable().ajax.reload();
               $('#edit-form').trigger("reset");
            },
            error:function(error){
              console.log(error);
            }
           })
      })
    })
  </script>
</x-slot>

</x-backend>