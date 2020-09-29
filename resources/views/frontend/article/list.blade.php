<x-backend>
  <div class="row" id="add-form">
      <div class="col-xl-12">
       
        <!-- announce create form start-->

     @role('student')
        @php
        $deadline=Carbon\Carbon::parse($announce->deadline)->addDay(1);
        

         @endphp
     @if( strtotime($deadline) > time() )
        <!-- Magazine Post Create -->
        <div class="card mb-4 mt-3" id="m-create">
         
          <div class="card-header">
            <div class="card-title">
              <a href="#magazintable" class="float-right"><h3 class="btn btn-sm btn-outline-primary">My Article List</h3></a>
              <h3>Create New Article</h3>
            </div>
          </div>
            <div class="card-body ">
              <form method="post" id="adding" action="{{route('magazine.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control"/>
                  </div> 
                  <input type="hidden" value="{{$announce->id}}" name="announce_id">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Cover Photo</label>
                    @error('coverphoto')
                        <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                    <input type="file" name="coverphoto" class="form-control-file" id="exampleFormControlFile1">

                 </div> 
                  <div class="form-group">
                      <label><strong>Description :</strong></label>
                      <textarea class="summernote" name="description"></textarea>
                  </div>
                  <div class="form-group">
                  <label for="magazine">magazine Pdf</label>
                  @error('article')
                        <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                  <input type="file" name="article" class="form-control-file" id="magazine">
               </div>
               <div class="form-group form-check">
                <input type="checkbox" name="accept" class="form-check-input" id="exampleCheck1">
                
                <label class="form-check-label accept-label" for="exampleCheck1">Accept term and conditions</label>
                @error('accept')
                        <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
              </div>
                  <div class="form-group text-center">
                      <button type="submit" class="btn form-control btn-success btn-sm">Upload Now!</button>
                  </div>
              </form>
          </div>
          
          
        </div>
        @endif

       <!--  edit for admin -->

        <div class="card mb-4 mt-3 d-none" id="m-edit">
         
          <div class="card-header">
            <div class="card-title">
              <h3>Update New Article</h3>
            </div>
          </div>
            <div class="card-body">
              <form id="m-edit-form" method="post"  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control"/>
                  </div> 
                 
                  <div class="form-group">
                     <label for="exampleFormControlFile1">Cover Photo</label>
                     <span class="photo-error text-danger"></span>
                    
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>

                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
                      </li>
                      
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <img class="oldimg-show"  width="100" height="100" 
                      alt="">
                      <input type="hidden" value="" name="oldPhoto">
                      <input type="hidden" value="" name="oldArticle">
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <input type="file" name="coverphoto" class="form-control-file" id="exampleFormControlFile1"> 
                      </div>
                      
                    </div>

                  </div> 


                  <div class="form-group">
                      <label><strong>Description :</strong></label>
                      <textarea class="summernote" name="description"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="magazine">magazine Pdf</label>
                      <span class="file-error text-danger"></span>
                      
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">Old Article</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">New Article</a>
                          
                        </li>
                        
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                          <a class="old-article" target="_blank" >
                            <span class="old-article-name"></span>
                          </a>
                        </div>
                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">

                          <input type="file" name="article"  class="form-control-file" id="magazine">
                        </div>
                        
                      </div>
                   </div>
                  <div class="form-group text-center">
                      <button type="submit" class="btn form-control btn-success btn-sm btn-update">Update Now!</button>
                  </div>
              </form>
          </div>
          
          
        </div>
  @endrole

        

   <div class="row" id="showTable">
      <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card  shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <!-- <button class="btn btn-outline-primary float-right btn-new">Add New</button> -->
                  <h2 class=" mb-0">Articles List</h2>
               </div>
               
            </div>
            <span class="text-success d-none success"></span>
         </div>
         <div class="card-body">
            <!-- Chart -->
            <div class="">
               <!-- Chart wrapper -->
               <div class="table-responsive p-2">
                      <table class="table table-hover datatable" id="magazintable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>CoverPoto</th>
                            <th>Upload Date</th>
                            
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @php $i=1; @endphp


                          @foreach($magazines[0]->magazines as $magazine)
                          
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$magazine->title}}</td>
                            
                            <td><img src="{{$magazine->photo}}" width="80" height="50" alt=""></td>
                            <td>{{Carbon\Carbon::parse($magazine->created_at)->toDateString()}}</td>
                            <td>
                              
                              
                             @role('student')
                             @php
                                $editlast=Carbon\Carbon::parse($announce->editLDate)->addDay(1);
                                

                              @endphp

                              @if( strtotime($editlast) > time() )



                              <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm btn-magazineEdit"   data-id="{{$magazine->id}}"
                         data-title="{{$magazine->title}}"
                         data-photo="{{$magazine->photo}}"
                         data-description="{{$magazine->description}}"
                         data-article="{{$magazine->article}}">Edit </a>


                             {{--<form id="logout-form" action="{{ route('magazine.destroy',$magazine->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                      </form>--}}
                               @endif

                              



                             @endrole
                               <a href="{{route('magazine.show',encrypt($magazine->id))}}" class="btn btn-secondary btn-sm " >Detail </a>
                            </td>
                          </tr>
                          @endforeach

                            
                        </tbody>
                      </table>
                    </div>
            </div>
         </div>
      </div>
   </div>


   




           
<x-slot name="script">
      <script type="text/javascript">


          $(document).ready(function() {

            $('.datatable').DataTable({
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

            
            //adding announce
            $('.btn-new').click(function(){
              $('#m-create').removeClass('d-none');
              
              $('#showTable').addClass('d-none');
            });

            // $('#adding').submit(function(e){
            //   e.preventDefault();
            //   // alert('helo');
            //  var value= $('#adding input[name="accept"]').val();
            //  if($('#adding input[name="accept"]').prop("checked") == true){
            //     $('form').submit();
            //   }else{
            //     $('.accept-label').addClass('text-danger');
            //     $('.accept-label').html('<span>You need to accept term and condition!</span>')
            //   }
            // })




            $('.btn-magazineEdit').click(function(){
              // alert('helo');
              $('#m-edit').removeClass('d-none');
              $('#m-create').addClass('d-none');
              $('#showTable').addClass('d-none');
              var id=$(this).data('id');
              var title=$(this).data('title');
              var photo=$(this).data('photo');
              var description=$(this).data('description');
              var article=$(this).data('article');
              var a='';
              $('#m-edit-form .oldimg-show').attr('src',photo);
              var articleurl="{{route('pdfview',':id')}}";

              var url="{{route('magazine.update',':id')}}";
              url=url.replace(':id',id);
              articleurl=articleurl.replace(':id',id);
              $('#m-edit-form .old-article').attr('href',articleurl);
              if(article!=''){
                a="article.pdf";
              }else{
                a="no article pdf";
              }
              $('#m-edit-form .old-article-name').html(a);
              console.log(description);
              $('#m-edit-form .summernote').summernote('code',description);
              $('#m-edit-form input[name="title"]').val(title);
              $('#m-edit-form input[name="oldPhoto"]').val(photo);
              $('#m-edit-form input[name="oldArticle"]').val(article);
              $('#m-edit-form').attr('action',url);


            })

             $('#m-edit-form input[name="coverphoto"]').change(function(){
              // alert('heo');
               // Allowing file type 
               var val=$(this).val();
            var allowedExtensions= /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
                // console.log(allowedExtensions);
                              
                            if (!allowedExtensions.exec(val)) { 
                                //alert('Invalid file type'); 
                                $(this).val(''); 
                      $('.photo-error').html('png/jpg are only allwed');
                                $('.btn-update').prop('disabled',true);
                                //return false; 
                            } else{
                               $('.photo-error').html('');
                              $('.btn-update').prop('disabled',false);

                            }
            })

            $('#m-edit-form input[name="article"]').change(function(){
              // alert('heo');
               // Allowing file type 
               var val=$(this).val();
            var allowedExtensions =  
                /(\.pdf)$/i; 
                // console.log(allowedExtensions);
                              
                            if (!allowedExtensions.exec(val)) { 
                                //alert('Invalid file type'); 
                                $(this).val(''); 
                                $('.file-error').html('PDF only allwed');
                                $('.btn-update').prop('disabled',true);
                                //return false; 
                            } else{
                               $('.file-error').html('');
                              $('.btn-update').prop('disabled',false);
                            }
            })

           




            // $('#m-edit-form').submit(function(e){
            //   e.preventDefault();
            //   var article=$('#m-edit-form input[name="article"]').val();
            //   var allowedExtensions1 =  
            //       /(\.pdf)$/i; 
            //       // console.log(allowedExtensions);

            //        var photo=$('#m-edit-form input[name="coverphoto"]').val();
                
            //      var allowedExtensions2 =  
            //         /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
            //       // console.log(allowedExtensions);
                                
            //       if (!allowedExtensions1.exec(article)) { 
            //           //alert('Invalid file type'); 
            //           $('#m-edit-form input[name="article"]').val(''); 
            //           $('.file-error').html('PDF only allwed');
                      
                      
            //       }else if(!allowedExtensions2.exec(photo)) { 
            //           //alert('Invalid file type'); 
            //           $('#m-edit-form input[name="coverphoto"]').val(''); 
            //           $('.photo-error').html('png/jpg are only allwed');
                     
            //       } else{
            //         $(this).trigger('submit');
            //       }
            //   })
            //   // alert('helo');
            








          
          });
      </script>
    </x-slot>
</x-backend>