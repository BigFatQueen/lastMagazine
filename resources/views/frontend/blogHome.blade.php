<x-frontend>
	 <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8 mt-4">
@php
$magazines=$magazines
@endphp

  @role('student')
        
     @if( strtotime() > time() )
        <!-- Magazine Post Create -->
        <div class="card mb-4 mt-3" id="m-create">
         
          <div class="card-header">
            <div class="card-title">
              <h3>Create New Article</h3>
            </div>
          </div>
            <div class="card-body mt-9">
	            <form method="post" action="{{route('magazine.store')}}" enctype="multipart/form-data">
	                @csrf
	                <div class="form-group">
	                    <label>Title</label>
	                    <input type="text" name="title" class="form-control"/>
	                </div> 
                  <input type="hidden" value="{{$announce->id}}" name="announce_id">
	                <div class="form-group">
					    <label for="exampleFormControlFile1">Cover Poto</label>
					    <input type="file" name="coverphoto" class="form-control-file" id="exampleFormControlFile1">
					 </div> 
	                <div class="form-group">
	                    <label><strong>Description :</strong></label>
	                    <textarea class="summernote" name="description"></textarea>
	                </div>
	                <div class="form-group">
					    <label for="magazine">magazine Pdf</label>
					    <input type="file" name="article" class="form-control-file" id="magazine">
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
            <div class="card-body mt-9">
              <form id="m-edit-form" method="post"  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control"/>
                  </div> 
                 
                  <div class="form-group">
                     <label for="exampleFormControlFile1">Cover Photo</label>
                    
                    
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
                          <input type="file" name="article" class="form-control-file" id="magazine">
                        </div>
                        
                      </div>
                   </div>
                  <div class="form-group text-center">
                      <button type="submit" class="btn form-control btn-success btn-sm">Update Now!</button>
                  </div>
              </form>
          </div>
          
          
        </div>
  @endrole



        <!-- show post list -->
       
        <div id="m-show-list">
              @foreach($magazines as $magazine)
              <!-- Blog Post -->
              <div class="card mb-4">
                @if($magazine->photo != null)
                <img class="card-img-top" src="{{$magazine->photo}}" alt="Card image cap">
                @endif

                <div class="card-body">
                  <h2 class="card-title">{{$magazine->title}}</h2>
                  <p class="card-text">
                    {{ substr(strip_tags($magazine->description), 0, 500) }}
                   {{ strlen(strip_tags($magazine->description)) > 50 ? "..." : "" }}
                   
                </p>
                  <a href="{{route('magazine.show',$magazine->id)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  @role('student')
                      <div class="float-right d-inline">
                      
                       <a class="btn btn-outline-danger btn-sm" href="{{ route('magazine.destroy',$magazine->id) }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                <i class="fas fa-trash " ></i>
                                            </a>

                                            <form id="logout-form" action="{{ route('magazine.destroy',$magazine->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                        <button class="btn btn-outline-primary btn-sm btn-magazineEdit"
                         data-id="{{$magazine->id}}"
                         data-title="{{$magazine->title}}"
                         data-photo="{{$magazine->photo}}"
                         data-description="{{$magazine->description}}"
                         data-article="{{$magazine->article}}"
                        
                          ><i class="fas fa-pen "></i></button>
                      </div>
                      @endrole
                  Posted on {{Carbon\Carbon::parse($magazine->postDate)->diffForHumans()}} by
                  <a href="#">{{$magazine->record->student->user->name}}</a>
                </div>
              </div>
              @endforeach
        </div>
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

            $('.btn-magazineEdit').click(function(){
              // alert('helo');
              $('#m-edit').removeClass('d-none');
              $('#m-create').addClass('d-none');
              $('#m-show-list').addClass('d-none');
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


	        });
   			 </script>
    	
    </x-slot>
</x-frontend>