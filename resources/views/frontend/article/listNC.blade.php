<x-backend>
    
   <div class="row" id="showTable">
      <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card  shadow">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <a href="{{route('announcelist')}}" class="btn btn-outline-primary float-right btn-new">Back</a>
                  <h2 class=" mb-0">Articles List for {{$announce->title}}</h2>
               </div>
               
            </div>
            <span class="text-success d-none success"></span>
         </div>
         <div class="card-body">
            <!-- Chart -->
            <div class="chart">
               <!-- Chart wrapper -->
               <div class="table-responsive p-2">
                      <table class="table table-hover datatable" id="cmtable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>Student</th>
                            <th>Faculty</th>
                            <th>Upload Date</th>
                            
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @php $i=1; @endphp
                          @foreach($magazines as $magazine)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$magazine->title}}</td>
                            <td>{{$magazine->record->student->user->name}}</td>
                            <td>{{$magazine->record->faculty->name}}</td>
                            <td>{{$magazine->created_at}}</td>

                            <td><a href="{{route('magazine.show',$magazine->id)}}" class="btn btn-sm btn-light">Detail</a>
                              @role('manager')
                              <a href="{{route('downloadzip',$magazine->id)}}" class="btn btn-sm btn-success">Download</a>
                              @endrole
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
      
    </x-slot>
</x-backend>