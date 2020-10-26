<x-frontend>
  <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Article lists
          
        </h1>
        @if(!empty($ms))
        @foreach($ms as $m)
        <!-- Blog Post -->
        <div class="card mb-4">
         

          <div class="card-body row">
            <div class="col-md-4">
              <img src="{{$m->photo}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-8 p-2">
              <h2 class="card-title">{{$m->title}}</h2>
              <p class="card-text">
                <?php
                echo strlen($m->description) >= 200 ? 
                substr($m->description, 0, 200) . ' ...' : 
                $m->description;
                ?>
              </p>
              <a href="{{route('articleDGuest',encrypt($m->id))}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
          <div class="card-footer text-muted mt-5">
            <a class="float-right">{{$m->record->faculty->name}}</a>
             Posted on {{Carbon\Carbon::parse($m->created_at)->diffForHumans()}} by
            <a href="#">{{$m->record->student->user->name}}</a>
          </div>
        </div>
        @endforeach
        @endif
      
        {{ $ms->links() }}
        <!-- Pagination -->
        <!-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4 mt-5 pt-4">
        @if(!empty($data[0]))
        <!--  -->
        @php 
        $faculties=$data[0];

        @endphp

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Faculties</h5>
          <div class="card-body">
            
                <ul class="list-group">
                  @foreach($faculties as $faculty)
                  <a href="{{route('getMByFID',$faculty->id)}}">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$faculty->name}}
                    <span class="badge badge-primary badge-pill">{{$faculty->magazines_count}}</span>
                  </li>
                  </a>
                  
                  @endforeach
                  
                  </li>
                </ul>
              
          </div>
        </div>

        @endif

       {{-- @if(!empty($data[1]))
                      @php
                      $magazines=$data[1];
              
                       @endphp
                       @foreach($magazines as $magazine)
                      <!-- Side Widget -->
                      <div class="card my-4">
                        <h5 class="card-header">{{$magazine->title}}</h5>
                        <div class="card-body">
                          {{ substr(strip_tags($magazine->description), 0, 200) }}
                                 {{ strlen(strip_tags($magazine->description)) > 50 ? "..." : "" }}
                                 <div class="d-flex flex-row-reverse"> <a href="{{route('articleDGuest',$magazine->id)}}" class="btn btn-sm btn-info">Read More</a></div>
                        </div>
              
                      </div>
                      @endforeach
              
                      @endif--}}

      </div>

    </div>
  
    <x-slot name="script">
      
    </x-slot>
</x-frontend>