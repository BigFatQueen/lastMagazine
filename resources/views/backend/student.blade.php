<x-backend>
  <div class="row" id="add-form">
      <div class="col-xl-12">
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <div class="col-8">
                     <h3 class="mb-0">New Student Creating</h3>
                  </div>
                  <div class="col-4 text-right">
                     <img class="new-img" src="{{asset('KMDtemplate/assets/img/theme/team-1-800x800.jpg')}}" width="80" height="80" alt="">
                  </div>
               </div>
            </div>
            <div class="card-body">
               <form id="form-add" action="" method="post" enctype="multipart/form-data">
                  <!-- accunt createing -->

                  <div class="col-3">
                      <h6 class="heading-small text-muted mb-4">Account information</h6>
                  </div>

                  <div class="pl-lg-4">
                      <div class="row align-items-center">
                 
                        <div class="col-4 ">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Choose for Faculty</label>
                              <span class="text-danger d-block faculty_id d-none"></span>
                              <select class="form-control" name="faculty_id" id="facultychoice1">
                                <option value="">Chose option</option>
                                @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-4">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Choose for Level</label>
                              <span class="text-danger d-block faculty_id d-none"></span>
                              <select class="form-control" name="level_id" id="levelchoice1">
                                <option value="">Chose option</option>
                                @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-4">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Choose for Classroom</label>
                              <span class="text-danger d-block faculty_id d-none"></span>
                              <select class="form-control" name="classroom_id" id="classchoice11">
                                
                              </select>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                      <!-- email -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Email</label>
                              <span class="text-danger d-block email d-none"></span>
                              <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                      <!-- username -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-username">Username</label>
                              <span class="text-danger d-block name d-none"></span>
                              <input type="text" id="input-username" name="name" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        
                        <!-- education -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">FatherName</label>
                              <input type="text" id="input-email" name="fName" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                      <!-- password -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Password</label>
                              <span class="text-danger d-block password d-none"></span>
                              <input type="password" id="input-email" name="password" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                      <!-- profile -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Profile</label>
                              <input type="file" id="input-first-name" name="avatar" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        
                        <!-- phone -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-email">Phone</label>
                              <input type="text" id="input-email" name="phone" class="form-control form-control-alternative" placeholder="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                      <!-- confirm password -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Confirm Password</label>
                              <span class="text-danger d-block confirm_password d-none"></span>
                              <input type="password" id="input-last-name" name="password_confirm" class="form-control form-control-alternative" placeholder="" >
                           </div>
                        </div>
                      
                        <!-- nrc -->
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-username">NRC</label>
                              <input type="text" id="input-username" name="nrc" class="form-control form-control-alternative" placeholder="" value="">
                           </div>
                        </div>
                        
                        <!-- address -->
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

   <!--  -->

    <div class="row d-none" id="edit-form1">
        <div class="col-xl-12">
           <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                 <div class="row align-items-center">
                    <div class="col-8">
                       <h3 class="mb-0">Updating Student Creating</h3>
                    </div>
                    <div class="col-4 text-right">
                       <img class="new-img" src="{{asset('KMDtemplate/assets/img/theme/team-1-800x800.jpg')}}" width="80" height="80" alt="">
                    </div>
                 </div>
              </div>
              <div class="card-body">
                 <form id="form-edit" action="" method="post" enctype="mutipart/form-data">
                    <!-- accunt createing -->

                    <div class="col-3">
                        <h6 class="heading-small text-muted mb-4">Account information</h6>
                    </div>
                    <input type="hidden" name="oldavatar">
                    <input type="hidden" name="oldrecordid">
                    <input type="hidden" name="levelarray"  value="{{$levels}}">
                    <input type="hidden" name="facultyarray" value="{{$faculties}}">

                    <div class="pl-lg-4">
                      <div class="row align-items-center">
                   <!-- faulty choice -->
                          <div class="col-6 ">
                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Choose for Faculty</label>
                                <span class="text-danger d-block faculty_id d-none"></span>
                                <div  id="facultychoice22">
                                
                                </div>
                              </div>
                          </div>

                          <!-- username -->
                          <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-control-label" for="input-username">Roll No </label>
                                <span class="text-danger d-block name d-none"></span>
                                <input type="text" id="input-username" name="rollno" class="form-control form-control-alternative" placeholder="" value="">
                             </div>
                          </div>
                          <!-- level choice -->
                          <!-- <div class="col-4">
                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Choose for Level</label>
                                <span class="text-danger d-block faculty_id d-none"></span>
                                <select class="form-control" name="level_id" id="levelchoice22">
                                  
                                </select>
                              </div>
                          </div> -->
                          <!-- classroom choice -->
                         <!--  <div class="col-4">
                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Choose for Classroom</label>
                                <span class="text-danger d-block faculty_id d-none"></span>
                                <select class="form-control" name="classroom_id" id="classchoice22">
                                  
                                </select>
                              </div>
                          </div> -->
                       </div>
                        <div class="row align-items-center">
                   <!-- faulty choice -->
                          <!-- <div class="col-4 ">
                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Choose for Faculty</label>
                                <span class="text-danger d-block faculty_id d-none"></span>
                                <div  id="facultychoice22">
                                
                                </div>
                              </div>
                          </div> -->
                          <!-- level choice -->
                          <div class="col-6">
                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Choose for Level</label>
                                <span class="text-danger d-block faculty_id d-none"></span>
                                <select class="form-control" name="level_id" id="levelchoice22">
                                  
                                </select>
                              </div>
                          </div>
                          <!-- classroom choice -->
                          <div class="col-6">
                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Choose for Classroom</label>
                                <span class="text-danger d-block faculty_id d-none"></span>
                                <select class="form-control" name="classroom_id" id="classchoice22">
                                  
                                </select>
                              </div>
                          </div>
                       </div>
                       <div class="row">
                        
                        <!-- username -->
                          <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-control-label" for="input-username">Username</label>
                                <span class="text-danger d-block name d-none"></span>
                                <input type="text" id="input-username" name="name" class="form-control form-control-alternative" placeholder="" value="">
                             </div>
                          </div>
                          <!-- email -->
                         <!--  <div class="col-lg-4">
                             <div class="form-group">
                                <label class="form-control-label" for="input-email">Email</label>
                                <span class="text-danger d-block email d-none"></span>
                                <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="">
                             </div>
                          </div> -->
                          
                          <!-- education -->
                          <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-control-label" for="input-email">FatherName</label>
                                <input type="text" id="input-email" name="fName" class="form-control form-control-alternative" placeholder="">
                             </div>
                          </div>
                       </div>
                       <div class="row">

                        <!-- profile -->
                          <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Profile</label>
                                <input type="file" id="input-first-name" name="avatar" class="form-control form-control-alternative" placeholder="" value="">
                             </div>
                          </div>
                        <!-- password -->
                          <!-- <div class="col-lg-4">
                             <div class="form-group">
                                <label class="form-control-label" for="input-email">Password</label>
                                <span class="text-danger d-block password d-none"></span>
                                <input type="password" id="input-email" name="password" class="form-control form-control-alternative" placeholder="">
                             </div>
                          </div> -->
                        
                          
                          <!-- phone -->
                          <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-control-label" for="input-email">Phone</label>
                                <input type="text" id="input-email" name="phone" class="form-control form-control-alternative" placeholder="">
                             </div>
                          </div>
                       </div>
                       <div class="row">
                         <!-- nrc -->
                          <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-control-label" for="input-username">NRC</label>
                                <input type="text" id="input-username" name="nrc" class="form-control form-control-alternative" placeholder="" value="">
                             </div>
                          </div>
                        <!-- confirm password -->
                         <!--  <div class="col-lg-4">
                             <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Confirm Password</label>
                                <span class="text-danger d-block confirm_password d-none"></span>
                                <input type="password" id="input-last-name" name="password_confirm" class="form-control form-control-alternative" placeholder="" >
                             </div>
                          </div> -->
                        
                         
                          
                          <!-- address -->
                          <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Address</label>
                                <input type="text" id="input-last-name" name="address" class="form-control form-control-alternative" placeholder="" value="">
                             </div>
                          </div>
                       </div>

                       <div class="row">
                             <div class="col-md-6 col-sm-4 order-lg-1 order-md-1 order-sm-2 order-xs-2 mb-2 order-2">
                                <button type="button" class="btn btn-outline-danger form-control btn-cancel1">Cancel</button>
                             </div>
                             <div class="col-md-6 col-sm-4 order-lg-2 order-md-2 order-sm-1 order-xs-1 order-1 mb-2">
                                <button type="submit" class="btn btn-primary form-control ">Update Now!</button>

                                

                             
                             </div>
                          </div>

                    </div>
                    
                          
                    
                 </form>
              </div>
           </div>
        </div>
     </div>

   <!--  -->

   <div class="row showTable">
      <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card  shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <button class="btn btn-outline-primary float-right btn-new">Add New</button>
                  <h2 class=" mb-0">Student List</h2>
               </div>
               
            </div>
            <span class="text-success d-none success"></span>
         </div>
         <div class="card-body">
            <!-- Chart -->
           
               <!-- Chart wrapper -->
               <div class="table-responsive p-2">
                      <table class="table  table-hover" id="stutable" >
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Classroom</th>
                            <th>Academin</th>
                            <th>Phone</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody >
                            
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

       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#add-form').hide();

       $(document).on('click','.btn-new',function(){
         $('#add-form').show();
         $('.showTable').hide();
      })

      $('#levelchoice1').on('change',function(){
        var levelid=$(this).val();
        var html='';
        $.get('getclassByL/'+levelid,function(res){
          html+=`<option>Chose classroom</option>`
          $.each(res,function(i,v){
            html+=`<option value="${v.id}">${v.name}${v.level.name}</option>`
          });
          console.log(html);
          $('#classchoice11').html(html);
        })
      })

       $('input[name="avatar"]').change(function(){
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
            url:"{{route('student.store')}}",
            type:'POST',
            data:formData,
            dataType:'json',
            contentType: false,
             processData: false,
            success:function(data){
               // console.log(data);
                $('#add-form').hide();
                $('#showTable').show();
               $('.success').removeClass('d-none');
               $('.success').text(data.message);
                $('.success').hide(5000);
                $('#add-form').hide();
               $('#form-add').trigger('reset');
                 $('#stutable').DataTable().ajax.reload();
                 $('#add-form').hide();
         $('.showTable').show();

             
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
         
      })

        $('#stutable').DataTable({
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
        "ajax": "{{route('getStudent')}}",
       "columns":[
        {"data":"DT_RowIndex"},
        {"data":function(data){
          return `<p class="d-inline">${data.student.user.name}</p>
          <img src="${data.student.user.avatar}" width="40" height = "40"/>`;
        }},
        {"data":"student.user.email"},
        {"data":function(data){
          return `${data.faculty.name}-${data.classroom.level.name}(${data.classroom.name})-${data.rollno}`
        }},
        {"data":"academic.name"},
        {"data":"student.phone"},
        
        {"data":function(data){
          return `<button data-recordid=${data.id}   class="btn btn-danger btn-sm btn-Delete"> <i class="ni ni-fat-delete " ></i></button>
                              <button data-recordid=${data.id} 
                              data-name="${data.student.user.name}" 
                              data-email="${data.student.user.email}"
                              data-faculty="${data.faculty_id}"
                              data-level="${data.classroom.level_id}"
                              data-classroom="${data.classroom_id}"
                              data-phone="${data.student.phone}"
                              data-fname="${data.student.fatherName}"
                              data-address="${data.student.address}"
                              data-avatar="${data.student.user.avatar}"
                              data-rollno="${data.rollno}"
                              data-nrc="${data.student.nrc}"
                               class="btn btn-primary btn-sm btn-Edit"> <i class="ni ni-settings-gear-65 "></i></button>`;
        }}
       ],
        info:false    
      });


        // For delete
         $('#stutable').on('click','.btn-Delete',function(){
        var id=$(this).data('recordid');
        var url="student/"+id;
        
        $.ajax({
          url:url,
          type:"POST",
          data:{"id":id,"_method": 'DELETE'},
          success:function(res){
            if(res){
               // var message=JSON.parse(res);
               $('.success').removeClass('d-none');
               $('.success').text(res.message);

              $('#stutable').DataTable().ajax.reload();
               $('.success').hide(3000);
               

            }
          },
          error:function(error){
            console.log(error);
          }

        })
      });

         // Edit form showing
         $('#stutable').on('click','.btn-Edit',function(){
        // alert('helo');
          $('#edit-form1').removeClass('d-none');
         // $('#edit-form').show();
         $('.showTable').hide();
         var html='';var lhtml='';var chtml='';

         var levels=$('#form-edit input[name="levelarray"]').val();
         var faculties=$('#form-edit input[name="facultyarray"]').val();


         var id=$(this).data('recordid');
         var name=$(this).data('name');
         console.log(name);
         var fName=$(this).data('fname');
         var phone=$(this).data('phone');
         var address=$(this).data('address');
         var avatar=$(this).data('avatar');
         var rollno=$(this).data('rollno');
         var nrc=$(this).data('nrc');
         var faculty=$(this).data('faculty');
         var level=$(this).data('level');
         var classroom=$(this).data('classroom');

          var fa=JSON.parse(faculties);
          html+=`<select class="form-control" name="faculty_id" id="exampleFormControlSelect1">`
         $.each(fa,function(i,v){
         
            
            html+=`<option value="${v.id}"`
            if(v.id==faculty){
              console.log('ue');
              html+='selected'
            }

            html+=`>${v.name}</option>`
         });
         console.log(html);
         html+=`</select>`;
         $('#facultychoice22').html(html);


          var la=JSON.parse(levels);
          lhtml+=`<select class="form-control" name="faculty_id" id="exampleFormControlSelect1">`
         $.each(la,function(i,v){
         
            
            lhtml+=`<option value="${v.id}"`
            if(v.id==level){
              // console.log('ue');
              html+='selected'
            }

            lhtml+=`>${v.name}</option>`
         });
         // console.log(lhtml);
         // console.log(fName);
         lhtml+=`</select>`;
         $('#levelchoice22').html(lhtml);


         $('#form-edit input[name="name"]').val(name);
         $('#form-edit input[name="fName"]').val(fName);
         $('#form-edit input[name="phone"]').val(phone);
         $('#form-edit input[name="address"]').val(address);
         $('#form-edit input[name="rollno"]').val(rollno);
         $('#form-edit input[name="nrc"]').val(nrc);
         $('#form-edit input[name="oldavatar"]').val(avatar);
         $('.new-img').attr('src',avatar);
         $('#form-edit input[name="oldrecordid"]').val(id);

         $.get('getclassByL/'+level,function(res){
          chtml+=`<option>Chose classroom</option>`
          $.each(res,function(i,v){
            chtml+=`<option value="${v.id}"`;
            if(v.id==classroom){
              chtml+='selected';
            }
            chtml+=`>${v.name}</option>`
          });
          // console.log(chtml);
          $('#classchoice22').html(chtml);
        })
         
      });
         //edit
         $('#levelchoice22').on('change',function(){
        var levelid=$(this).val();
        var html='';
        $.get('getclassByL/'+levelid,function(res){
          html+=`<option>Chose classroom</option>`
          $.each(res,function(i,v){
            html+=`<option value="${v.id}">${v.name}</option>`
          });
          // console.log(html);
          $('#classchoice22').html(html);
        })
      })

           $('#form-edit').submit(function(e){

         var id=$('#form-edit input[name="oldrecordid"]').val();
         // console.log(id);
            e.preventDefault();
            var formdata=new FormData($(this)[0]);
            formdata.append('_method', 'PUT');
            var url="{{route('student.update',':id')}}";
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
                        // $('.showTable').show();
                     $('.success').removeClass('d-none');
                     $('.success').text(data.message);
                     $('#form-edit').trigger('reset');
                    $('#stutable').DataTable().ajax.reload();
                      $('.success').hide(5000);
                      $('#edit-form1').hide();
                      $('.showTable').show();
                  }
               },
               error:function(data){
                  // alert('eh');
                  // console.log(data.responseJson);
               }
            })
      })

    })
  </script>
</x-slot>
</x-backend>