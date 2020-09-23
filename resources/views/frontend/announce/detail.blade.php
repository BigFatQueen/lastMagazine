<x-backend>
    <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
              <div class="mt-3 p-5" >
                    <!-- student -->
                 {{--<a href="{{route('getArticleByAID',$announce->id)}}" class="btn btn-primary float-right ml-1">Submit Article</a>

                  <a href="{{route('getArticleByAID',$announce->id)}}" class="btn btn-success float-right">My Article</a>--}}

                  <a href="{{route('announcelist')}}" class="btn btn-dark float-right">Back </a>

                  <!-- coordinator or market -->
                  {{--<a href="" class="btn btn-success float-right">See Articles</a>--}}

                  <!-- Title -->
                  <h1 class="mt-4 ">{{$announce->title}}</h1>
                  
                  <!-- Author -->
                  
                  </p>

                  <hr>

                  <!-- Date/Time -->
                  <p>Posted on {{Carbon\Carbon::parse($announce->created_at)->diffForHumans()}}</p>

                  <hr>

                  <!-- Preview Image -->
                  <div>
                    {!!$announce->decsription!!}
                  </div>
              </div>
          </div>
        </div>
    <x-slot name="script">
      
    </x-slot>
    
</x-backend>