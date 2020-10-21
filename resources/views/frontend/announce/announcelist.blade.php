<x-backend>
  <div class="row" id="add-form">
      <div class="col-xl-12">
       
        <!-- announce create form start-->

        <div class="card mb-4 d-none" id="announce-add1">
         <div class="card-header">
          <a href="{{route('announcelist')}}" class="btn btn-sm btn-primary float-right"><i class="ni ni-bold-left"></i> </a>
            Announcing For School Event
                                        {{--@if(session('message')) 
                                         <span class="text-success">{{session('message')}}</span>
                                        <?php session()->forget('message');?>
                                         @endif--}}
         </div>
          <div class="card-body">
            
            <form method="post" action="" enctype="multipart/form-data" id="announce-form-adding">
                  @csrf
                  <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control"/>
                      <span class="title text-danger"></span>
                  </div> 
                 
                  <div class="form-group">
                      <label><strong>Description :</strong></label>
                      <p class="description text-danger"></p>
                      <textarea class="summernote" name="description"></textarea>
                      
                  </div>
                  <div class="form-group">
                    <label for="dealline">Define for Closure date: </label>
                    <input type="date" name="deadline" class="form-control" id="dealline">
                    <span class="deadline text-danger"></span>
                 </div>
                 <div class="form-group">
                    <label for="editline">Define for Editing Closure date: </label>
                    <input type="date" name="editline" class="form-control" id="editline">
                    <span class="editline text-danger"></span>
                 </div>
                  <div class="form-group text-center">
                      <button type="reset" class="col-md-4 btn form-control btn-outline-danger btn-sm">Reset</button>
                      <button type="submit" class="col-md-4 btn form-control btn-success btn-form-add">Upload</button>
                  </div>
              </form>



          </div>
          
        </div>
        <!-- announce create form end-->
        
         <!-- announce edit form start-->

        <div class="card mb-4 d-none" id="announce-edit">
         <div class="card-header">
            Announcing For School Event
                @if(session('message')) 
                 <span class="text-success">{{session('message')}}</span>
                <?php session()->forget('message');?>
                 @endif
         </div>
          <div class="card-body">
            
            <form id="a-edit-form" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control"/>
                  </div> 
                  
                  <div class="form-group">
                      <label><strong>Description :</strong></label>
                      <textarea class="summernote" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="dealline">Define for Closure date: </label>
                    <input type="date" name="deadline" class="form-control" id="dealline">
                 </div>
                 <div class="form-group">
                    <label for="editline">Define for Editing Closure date: </label>
                    <input type="date" name="editline" class="form-control" id="editline">
                 </div>
                  <div class="form-group text-center">
                      <button type="submit" class="btn form-control btn-success btn-sm">Upload</button>
                  </div>
              </form>



          </div>
          
        </div>

        

   <div class="row" id="showTable">
      <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card  shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  @role('superadmin')
                  <button class="btn btn-outline-primary float-right btn-new">Add New</button>
                  @endrole
                  <h2 class=" mb-0">Announce List</h2>
               </div>
               
            </div>
            <span class="text-success d-none success"></span>
         </div>
         <div class="card-body">
            <!-- Chart -->
            <div class="">
               <!-- Chart wrapper -->
               <div class="table-responsive p-2">
                      <table class="table table-hover datatable" id="cmtable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>Deadline</th>
                            <th>
                              @role('coordinator')
                              Article
                              @endrole
                              @role('superadmin')
                            Last Edit Date
                              @endrole
                            </th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @php $i=1; @endphp

                          @foreach($announces as $announce)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$announce->title}}</td>
                            <td>{{$announce->deadline}}</td>

                            <td>
                             @hasanyrole('coordinator')
              
                              @php

                              $cf=Auth::user()->coordinator[0]->faculty_id;

                             
                              $freearr=[];
                               foreach($m as $value){
                               if($announce->id==$value->announce_id){
                               array_push($freearr,$value->record->faculty_id);
                                }
                               
                              }
                             
                               
                              

                              @endphp
                             

                              @if(in_array($cf,$freearr))
                              <a href="{{route('getArticleforFID',encrypt($announce->id))}}" class="btn btn-success btn-sm">See Article</a>
                              @else
                              <a href="javascript:void(0)" class="text-danger">No Articles</a>

                              @endif

                              @endhasanyrole

                              @role('manager')

                             
                              @if(sizeof($mselected) > 0)
                              @php 
                              $freearr=[];
                                foreach($mselected as $ms){
                                  if(!in_array($ms->id,$freearr)) {
                                  array_push($freearr,$ms->announce_id);
                                  }
                                  
                                }

                              @endphp
                                
                              @if(in_array($announce->id,$freearr))
                              <a href="{{route('getArticleforFID',encrypt($announce->id))}}" class="btn btn-success btn-sm">See Article</a>
                              @else
                              <a href="javascript:void(0)" class="text-danger">No Articles</a>

                              @endif
                                
                                
                              @else
                              

                              <a href="javascript:void(0)" >No Selected Article</a>
                              @endif

                              @endrole
                              @role('superadmin')
                              {{$announce->editLDate}}
                              @endrole

                              </td>
                            <td>
                              @role('student')
                              @php
                              $deadline=Carbon\Carbon::parse($announce->deadline)->addDay(1);
                               @endphp
                               @if( strtotime($deadline) > time() )
                              <a href="{{route('getArticleByAID',encrypt($announce->id))}}" class="btn btn-outline-danger btn-sm">Submit Article</a>
                              @endif

                              <a href="{{route('getArticleByAID',encrypt($announce->id))}}" class="btn btn-outline-primary btn-sm">My Articles</a>
                              @endrole

                              
                             



                             @role('superadmin')
                              <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm btn-annonceEdit"  data-id="{{$announce->id}}"
                   data-title="{{$announce->title}}"
                   data-decsription="{{$announce->decsription}}"
                   data-editline="{{$announce->editLDate}}"
                   data-deadline="{{$announce->deadline}}">Edit </a>

                             <form id="logout-form" action="{{ route('announce.destroy',$announce->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                      </form>
                              @endrole
                               <a href="{{route('announce.show',$announce->id)}}" class="btn btn-secondary btn-sm " >Detail </a>
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

            // $('.summernote').summernote();
          


            //adding announce
            $('.btn-new').click(function(){
              $('#announce-add1').removeClass('d-none');
              
              $('#showTable').addClass('d-none');
            })






            $('.btn-annonceEdit').click(function(){
              $('#announce-edit').removeClass('d-none');
              $('#announce-add').addClass('d-none');
              $('#showTable').addClass('d-none');
              var id=$(this).data('id');
              var deadline=$(this).data('deadline');
              var editline=$(this).data('editline');
              var description=$(this).data('decsription');
              var title=$(this).data('title');
              $('#a-edit-form input[name="title"]').val(title);
              $('#a-edit-form .summernote').summernote('code',description);
              $('#a-edit-form input[name="deadline"]').val(deadline);
              $('#a-edit-form input[name="editline"]').val(editline);

              var url="{{route('announce.update',':id')}}";
              url=url.replace(':id',id);

              $('#a-edit-form').attr('action',url);


              // console.log(deadline);
            })

            $('#announce-form-adding').submit(function(e){
              e.preventDefault();
              var formData= new FormData(this);
                var url="{{route('announce.store')}}";
                $.ajax({
                          type:'POST',
                          url: url,
                          data: formData,
                          cache:false,
                          contentType: false,
                          processData: false,
                          success: (data) => {
                            $('#announce-form-adding').trigger('reset');
                          window.location.href="{{route('announcelist')}}"
                              
                          },
                          error: function(error){
                             var errors=error.responseJSON.errors;
                             console.log(errors);
                             $.each(errors,function(i,v){
                              $(`.${i}`).html(v);
                             })
                          }
                      });
            })
          });
      </script>
    </x-slot>
</x-backend>