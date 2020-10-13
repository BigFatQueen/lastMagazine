<x-backend>
  <div class="row" id="add-form">
      <div class="col-xl-12">
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <div class="col-8">
                     <h3 class="mb-0">Creating New Faculty Coordinator</h3>
                  </div>
                  <div class="col-4 text-right">
                     <img class="new-img" src="{{asset('KMDtemplate/assets/img/theme/team-1-800x800.jpg')}}" width="80" height="80" alt="">
                  </div>
               </div>
            </div>
            <div class="card-body">
               <form id="form-add" action="" method="post" enctype="mutlipart/form-data">
                  <!-- accunt createing -->

                 
                  <div class="row align-items-center">
                  <div class="col-8">
                      <h6 class="heading-small text-muted mb-4">Account information</h6>
                  </div>
                  <div class="col-4 ">
                     <div class="form-group">
                        <label for="exampleFormControlSelect1">Choose for Faculty</label>
                        <span class="text-danger d-block faculty_id d-none"></span>
                        <select class="form-control" name="faculty_id" id="exampleFormControlSelect1">
                          <option>Choose Faculty</option>
                          @foreach($faculties as $faculty)
                          <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
               </div>
                  <div class="pl-lg-4">
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-username">Username</label>
                              <span class="text-danger d-block name d-none"></span>
                              <input type="text" id="input-username" name="name" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Email</label>
                              <span class="text-danger d-block email d-none"></span>
                              <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Education</label>
                              <input type="text" id="input-email" name="education" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-username">NRC</label>
                              <input type="text" id="input-username" name="nrc" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Password</label>
                              <span class="text-danger d-block password d-none"></span>
                              <input type="password" id="input-email" name="password" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Phone</label>
                              <input type="text" id="input-email" name="phone" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Profile</label>
                              <input type="file" id="input-first-name" name="avatar" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Confirm Password</label>
                              <span class="text-danger d-block confirm_password d-none"></span>
                              <input type="password" id="input-last-name" name="password_confirm" class="form-control form-control-alternative" placeholder="" >
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Address</label>
                              <input type="text" id="input-last-name" name="address" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                     </div>
                  </div>
                  
                        <div class="row">
                           <div class="col-md-6 col-sm-4 order-lg-1 order-md-1 order-sm-2 order-xs-2 mb-2 order-2">
                              <button type="button" class="btn btn-outline-danger form-control btn-cancel1">Cancel</button>
                           </div>
                           <div class="col-md-6 col-sm-4 order-lg-2 order-md-2 order-sm-1 order-xs-1 order-1 mb-2">
                              <button type="submit" class="btn btn-primary form-control ">Create Now!</button>

                              

                           
                           </div>
                        </div>
                  
               </form>
            </div>
         </div>
      </div>
   </div>

   <div class="row d-none" id="edit-form1">
      <div class="col-xl-10 offset-xl-1">
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <div class="col-8">
                     <h3 class="mb-0">Updating Faculty Coordinator </h3>
                  </div>
                  <div class="col-4 text-right">
                     <img class="old-img-show" src="{{asset('KMDtemplate/assets/img/theme/team-1-800x800.jpg')}}" width="80" height="80" alt="">
                  </div>
               </div>
               <span class="text-success success d-none"></span>
            </div>
            <div class="card-body">
               <form id="form-edit" action=""  enctype="multipart/form-data">
                  <!-- accunt createing -->
                  <input type="hidden" value="{{$faculties}}" name="faculty">
                  <div class="row align-items-center">
                      <div class="col-8">
                          <h6 class="heading-small text-muted mb-4">Account information</h6>
                      </div>
                      <div class="col-4 ">
                         <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose for Faculty</label>
                            <span class="text-danger d-block faculty_id d-none"></span>
                            <div class="selectOption">
                              
                            </div>
                          </div>
                      </div>
                   </div>
                  <div class="pl-lg-4">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-username">Username</label>
                              <input type="text" id="input-username" name="name" class="form-control form-control-alternative" >
                           </div>
                        </div>

                        <input type="hidden" name="oldid">
                        <input type="hidden" name="oldavatar">
                        <!-- <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Email</label>
                              <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div> -->
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-username">NRC</label>
                              <input type="text" id="input-username" name="nrc" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        
                     </div>
                     <div class="row">
                        
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Education</label>
                              <input type="text" id="input-email" name="education" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                        <!-- <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Password</label>
                              <input type="pasword" id="input-email" name="password" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div> -->
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Phone</label>
                              <input type="text" id="input-email" name="phone" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Profile</label>
                              <input type="file" id="input-first-name" name="avatar" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        <!-- <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Confirm Password</label>
                              <input type="password" id="input-last-name" name="password_confirmation" class="form-control form-control-alternative" placeholder="" >
                           </div>
                        </div> -->
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Address</label>
                              <input type="text" id="input-last-name" name="address" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class=" row">
                     <div class="col-md-6 col-sm-4 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-xs-2 order-2 ">
                        <button type="button"  class="btn btn-outline-danger form-control btn-cancel2 ">Cancel</button>
                     </div>
                     <div class="col-md-6 col-sm-4 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-xs-1 order-1 mb-2">
                        <button type="submit" class="btn btn-primary form-control ">Create Now!</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <div class="row" id="cshowTable">
      <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card  shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <button class="btn btn-outline-primary float-right btn-new">Add New</button>
                  <h2 class=" mb-0">Faculty Coordinator List</h2>
               </div>
               
            </div>
            <span class="text-success d-none success"></span>
         </div>
         <div class="card-body">
            <!-- Chart -->
            
               <!-- Chart wrapper -->
               <div class="table-responsive p-2">
                      <table class="table  table-hover " id="cmtable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Faculty</th>
                            <th>Phone</th>
                            <th>Address</th>
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
</div>


           
<x-slot name="script">
  <script>
    $(document).ready(function(){
      $('#add-form').hide();
        
      $('.btn-new').on('click',function(){
         $('#add-form').show();
         $('#cshowTable').hide();
      })








      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#edit-form').hide();

      $('#cmtable').DataTable({
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
        "ajax": "{{route('getCoordinator')}}",
       "columns":[
        {"data":"DT_RowIndex"},
        {"data":function(data){
          return `<p class="d-inline">${data.user.name}</p>
          <img src="${data.user.avatar}" width="40" height = "40"/>`;
        }},
        {"data":"user.email"},
        {"data":"faculty.name"},
        {"data":"phone"},
        {"data":"address"},
        {"data":function(data){
          return `<button data-id=${data.id} class="btn btn-danger btn-sm btn-Delete"> <i class="ni ni-fat-delete " ></i></button>
                              <button data-id=${data.id} 
                              data-name="${data.user.name}"" data-email="${data.user.email}"
                              data-education="${data.education}"
                              data-faculty="${data.faculty_id}"
                              data-avatar="${data.user.avatar}"
                              data-phone="${data.phone}"
                              data-address="${data.address}"
                              data-avatar="${data.user.avatar}"
                              data-nrc="${data.nrc}"
                               class="btn btn-primary btn-sm btn-Edit"> <i class="ni ni-settings-gear-65 "></i></button>`;
        }}
       ],
        info:false    
      });

       $('#form-add input[name="avatar"]').change(function(){
      //alert('hello');
      var  reader=new FileReader();
      reader.onload=(e)=>{

        $('.new-img').attr('src',e.target.result);
       
      }
      reader.readAsDataURL(this.files[0]); 
    })

      $('#form-add').submit(function(e){
         e.preventDefault();
         // alert('hh');
         var formData=new FormData($(this)[0]);
         $.ajax({
            url:"{{route('coordinator.store')}}",
            type:'POST',
            data:formData,
            dataType:'json',
            contentType: false,
             processData: false,
            success:function(data){
               // console.log(data);
                $('#add-form').hide();
                // $('#showTable').show();
                $('#cmtable').DataTable().ajax.reload();
                $('#cshowTable').show();
                $('#form-add').trigger("reset");
               $('.success').removeClass('d-none');
               $('.success').text(data.message);
               

             
            },
            error:function(error){
               var errors=error.responseJSON.errors;
               $.each(errors,function(k,v){
                  console.log(k);
                  $('.'+k).removeClass('d-none');
                  $('.'+k).html(v);
               })
            }

         })
         // $('#add-form').hide();
         console.log('heo');
               
          
      })






      $('#cmtable').on('click','.btn-Delete',function(){
        var id=$(this).data('id');
        var url="coordinator/"+id;
        
        $.ajax({
          url:url,
          type:"POST",
          data:{"id":id,"_method": 'DELETE'},
          success:function(res){
            if(res){
               // var message=JSON.parse(res);
               $('.success').removeClass('d-none');
               $('.success').text(res.message);

              $('#cmtable').DataTable().ajax.reload();
               // $('.success').hide(5000);
            }
          },
          error:function(error){
            console.log(error);
          }

        })
      });


      // $('#cmtable').on('click','.btn-Edit',function(){
      //   $('#add-form').hide();
      //   $('#edit-form').show();
      //   $('.title').text('Faculty Update');
      //     var id=$(this).data('id');
      //     var name=$(this).data('name');
      //     var logo=$(this).data('logo');

      //     $('#edit-form input[name="id"]').val(id);
      //     $('#edit-form input[name="name"]').val(name);
      //     $('#edit-form input[name="oldlogo"]').val(logo);
      // });
      

      $('#cmtable').on('click','.btn-Edit',function(){
        // alert('helo');
          $('#edit-form1').removeClass('d-none');
         // $('#edit-form').show();
         $('#showTable').hide();
         var html='';

         var faculties=$('#form-edit input[name="faculty"]').val();


         var id=$(this).data('id');
         var name=$(this).data('name');
         console.log(name);
         var education=$(this).data('education');
         var phone=$(this).data('phone');
         var address=$(this).data('address');
         var avatar=$(this).data('avatar');
         var nrc=$(this).data('nrc');
         var faculty=$(this).data('faculty');

          var fa=JSON.parse(faculties);
          html+=`<select class="form-control" name="faculty_id" id="exampleFormControlSelect1">`
         $.each(fa,function(i,v){
         console.log(faculty);
            
            html+=`<option value="${v.id}"`
            if(v.id==faculty){
              console.log('ue');
              html+='selected'
            }

            html+=`>${v.name}</option>`
         });
         html+=`</select>`;
         $('.selectOption').html(html);

         $('#form-edit input[name="name"]').val(name);
         $('#form-edit input[name="education"]').val(education);
         $('#form-edit input[name="phone"]').val(phone);
         $('#form-edit input[name="address"]').val(address);
         $('#form-edit input[name="nrc"]').val(nrc);
         $('#form-edit input[name="oldavatar"]').val(avatar);
         $('.old-img-show').attr('src',avatar);
         $('#form-edit input[name="oldid"]').val(id);
         
      });

      $('#form-edit').submit(function(e){

         var id=$('#form-edit input[name="oldid"]').val();
         // console.log(id);
            e.preventDefault();
            var formdata=new FormData($(this)[0]);
            formdata.append('_method', 'PUT');
            var url="{{route('coordinator.update',':id')}}";
            url=url.replace(':id',id);
            $.ajax({
               url:url,
               type:'POST',
               data:formdata,
               contentType: false,
               processData: false,
               success:function(data){
                      if(data){
                     // var message=JSON.parse(res);
                      $('#edit-form1').addClass('d-none');
                        // $('#edit-form').show();
                        // $('#showTable').show();
                     $('.success').removeClass('d-none');
                     $('.success').text(data.message);
                     $('#form-edit').trigger('reset');
                    $('#cmtable').DataTable().ajax.reload();
                    $('#cshowTable').show();
                     // $('.success').hide(5000);
                  }
               },
               error:function(data){
                  // alert('eh');
                  // console.log(data.responseJson);
               }
            })
      })

      $('.btn-cancel1').click(function(){
         // alert('hie');
         $('#add-form').addClass('d-none');
         // $('#edit-form').show();
         $('#cshowTable').show();
      })

      $('.btn-cancel2').click(function(){
         $('.success').addClass('d-none');
         $('#edit-form').addClass('d-none');
         // $('#edit-form').show();
         $('#cshowTable').show();
      })
      
    })
  </script>
</x-slot>

</x-backend>