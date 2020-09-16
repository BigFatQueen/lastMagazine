<x-frontend>
   <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

        @role('superadmin')
        <!-- announce create form start-->

        <div class="card mb-4">
         <div class="card-header">
            Announcing For School Event
                @if(session('message')) 
                 <span class="text-success">{{session('message')}}</span>
                <?php session()->forget('message');?>
                 @endif
         </div>
          <div class="card-body">
            
            <form method="post" action="{{route('announce.store')}}" enctype="multipart/form-data">
                  @csrf
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
                  <div class="form-group text-center">
                      <button type="submit" class="btn form-control btn-success btn-sm">Upload</button>
                  </div>
              </form>



          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2020 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>
        <!-- announce create form end-->
        @endif
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
                  <div class="form-group text-center">
                      <button type="submit" class="btn form-control btn-success btn-sm">Upload</button>
                  </div>
              </form>



          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2020 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>
        <!-- announce edit form end-->

        <!--announce list start -->
        @foreach($announces as $announce)
        <div class="card mb-4">
          <div class="card-header">
            @role('superadmin')
                <div class="float-right d-inline">
                
                 <a class="btn btn-outline-danger btn-sm" href="{{ route('announce.destroy',$announce->id) }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          <i class="fas fa-trash " ></i>
                                      </a>

                                      <form id="logout-form" action="{{ route('announce.destroy',$announce->id) }}" method="POST" class="d-none">
                                          @csrf
                                          @method('DELETE')
                                      </form>
                  <button class="btn btn-outline-primary btn-sm btn-annonceEdit"
                   data-id="{{$announce->id}}"
                   data-title="{{$announce->title}}"
                   data-decsription="{{$announce->decsription}}"
                   data-deadline="{{$announce->deadline}}"
                  
                    ><i class="fas fa-pen "></i></button>
                </div>
                @endrole
                <h2 class="card-title">{{$announce->title}}</h2>
          </div>
          <div class="card-body">
            
            <p class="card-text">{!!$announce->decsription!!}</p>
            <!-- <a href="#" class="btn btn-primary">Read More &rarr;</a> -->
          </div>
          <div class="card-footer text-muted">
            @role('student')

              @if(strtotime($announce->deadline) < time())

                <a href="{{route('addProposal',$announce->id)}}" class="btn btn-primary mr-2 float-right">My Article</a>
              @else

                <a href="{{route('addProposal',$announce->id)}}" class="btn btn-primary mr-2 float-right">My Proposals</a>
                  <a href="{{route('addProposal',$announce->id)}}" class="mr-3 btn btn-success float-right">Admit Your Articles Here</a>
              @endif

            @endrole



             @hasanyrole('superadmin|manager')
             
              <a href="{{route('addProposal',$announce->id)}}" class="btn btn-success float-right">See Article</a>

              @endhasanyrole

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
              <a href="{{route('addProposal',$announce->id)}}" class="btn btn-success float-right">See Proposals</a>
              @else
              <h6 class="float-right text-info">No Articles</h6>

              @endif

              
              
              
              @endhasanyrole
            Posted on {{Carbon\Carbon::parse($announce->postDate)->diffForHumans()}} 
           
          </div>
        </div>
        @endforeach
        <!-- announce list end -->


        

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <x-slot name="script">
      <script type="text/javascript">
          $(document).ready(function() {

            $('.summernote').summernote();

            $('.btn-annonceEdit').click(function(){
              $('#announce-edit').removeClass('d-none');
              $('#announce-add').addClass('d-none');
              $('#a-show-list').addClass('d-none');
              var id=$(this).data('id');
              var deadline=$(this).data('deadline');
              var description=$(this).data('decsription');
              var title=$(this).data('title');
              $('#a-edit-form input[name="title"]').val(title);
              $('#a-edit-form .summernote').summernote('code',description);
              $('#a-edit-form input[name="deadline"]').val(deadline);

              var url="{{route('announce.update',':id')}}";
              url=url.replace(':id',id);

              $('#a-edit-form').attr('action',url);


              // console.log(deadline);
            })
          });
      </script>
    </x-slot>
</x-frontend>