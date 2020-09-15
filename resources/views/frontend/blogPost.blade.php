<x-frontend1>
    <div class="row mb-5 " >

      <!-- Post Content Column -->
      <div class="col-lg-8 mt-5">

        <!-- Title -->

        <h1 class="mt-4">
          @role('coordinator')
              @if($magazine->selected_status !=1)
              <a href="{{route('selectdProposal',$magazine->id)}}" class="btn btn-success float-right
                ">Select Article</a>
              @else

              {{$magazine->title}}</h1>
              @if (session()->has('success')) 
              {{session('success')}}
              @endif
              {{session()->forget('success')}}

              <h6 class="text-success text-uppercase">Congulation! This article is already selcted</h6>
              @endif
          @endrole

         <h2> {{$magazine->title}}</h2>
          
          

        <h4 class="mt-4">Article Pdf:
          <a href="{{route('pdfview',$magazine->id)}}" target="_blank" >
            @if($magazine->article !=null)
            {{--@php
            $name=explode('/',$magazine->article)



            @endphp--}}

            {{--$name[3]--}}
            article.pdf
            @else
            no article
            @endif
          </a>
        </h4>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$magazine->record->student->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{Carbon\Carbon::parse($magazine->postDate)->isoFormat('MMMM Do YYYY, h:mm:ss A')}}</p>

        <hr>

        <!--  Preview Image 
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->

        

        <!-- Post Content -->
        <p class="lead">
          {!!$magazine->description!!}
        </p>

        <hr>

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

            <!-- Comment with nested comments -->
            <!-- <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <div class="media mt-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>

                <div class="media mt-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>

              </div>
            </div> -->
          </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4 mt-5">

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
</x-frontend1>