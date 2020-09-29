<x-backend>
    <div class="row mb-5 " >

      <!-- Post Content Column -->
      <div class="col-lg-12 mt-5">

        <!-- Title -->

         <div class="card p-2">
          <div class="card-header">
            @role('coordinator')
            @if($magazine->selected_status !=1)
             <a href="{{route('selectdProposal',$magazine->id)}}" class="btn btn-success float-right
              ">Select Article</a>
              
              <h2> {{$magazine->title}}</h2>
            @else
              <a href="{{route('unselectdProposal',$magazine->id)}}" class="btn btn-success float-right
              ">UnSelect Article</a>
              <h2> {{$magazine->title}}</h2>
              <span class="small text-success">This Article have been selected</span>
            @endif
            @endrole

            @role('manager')
            <a href="{{route('downloadzip',encrypt($magazine->id))}}" class="btn btn-sm btn-success float-right">Download</a>
              <h2> {{$magazine->title}}</h2>
            @endrole

            @role('student')
            <a href="{{route('getArticleByAID',encrypt($magazine->announce_id))}}" class="btn btn-primary float-right
              ">Back</a>
              <h2> {{$magazine->title}}</h2>
            @endrole




                 
                 <p class="">
                  by
                  <a href="#">{{$magazine->record->student->user->name}}</a>  ,{{Carbon\Carbon::parse($magazine->postDate)->isoFormat('MMMM Do YYYY, h:mm:ss A')}}
                </p>
                <div class="row no-gutters p-2">
                  <div class="col-md-4">
                    <div class="col-md-12">
                      <img src="{{$magazine->photo}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-12" class="" style="height:300px;overflow:hidden;overflow-y: scroll;">
                      {!!$magazine->description!!}
                    </div>
                  </div>

                  <div class="col-md-8">
                    @hasanyrole('coordinator|student|people')
                    <embed src="{{$magazine->article}}#toolbar=0" style="width:100%; height:570px;">
                      @endhasanyrole

                      @role('manager')
                      <embed src="{{$magazine->article}}" style="width:100%; height:600px;">
                        @endrole

                  </div>
                  
                 
            
                </div>
                @hasanyrole('coordinator|student')
                <div class="card-body">
                  <div class="" style="height: 100"></div>
                  <div id="app">
                        <!-- Comments Form -->
                        <div class="card my-4">
                          <h5 class="card-header">Leave a Comment:</h5>
                          <div class="card-body">
                            

                              <div class="form-group">
                                <textarea class="form-control comment" rows="3">
                                  
                                </textarea>
                              </div>
                              <button type="JavaScript::void(0)" data-id="{{$magazine->id}}" class="btn btn-primary commentBtn">Submit</button>
                          
                          </div>
                        </div>

                        <!-- Single Comment -->
                        <div class="commentbox"></div>
                   </div>
                </div>
                @endhasanyrole
          </div>
          
         
         </div>

      </div>

      

    </div>
    <x-slot name='script'>
        <script>
            $(document).ready(function(){
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $('.commentBtn').click(function(){
                var id=$(this).data('id');
                var comment=$('.comment').val();
                $.post('/comment',{id:id,comment:comment},function(res){
                  console.log(res);
                  if(res){
                    showcomment(id);
                  }
                })
              })

              var magazineid=$('.commentBtn').data('id');
              showcomment(magazineid);

              // show comment
              function showcomment(id){
                // alert(id);
                
                $.get('/getcomment/'+id,function(res){
                  var html='';
                    if(res){
                      console.log(res);
                      $.each(res,function(i,v){
                          
                          html+=` <div class="media mb-4">
                                <img class="d-flex mr-3 rounded-circle" with="30" height = '30' src="${v.user.avatar}" alt="">
                                <div class="media-body">
                                  <h5 class="mt-0">${v.user.name}</h5>
                                
                                  ${v.comment}
                                </div>
                              </div>`;
                        
                      })
                      console.log(html);
                      $('.commentbox').html(html);

                    }
                })
              }
            })
        </script>
    </x-slot>
</x-backend>