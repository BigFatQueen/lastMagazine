<x-backend>
   <div class="container mb-5">
      <div class="row mt-4">
         <div class="col-md-8" style="margin-top: 100px;">
            <div class="card">
               <div class="card-header">
                 <h5> Faculty Create</h5>
               </div>
               <div class="card-body">
                  @if (session('messge'))
					    <div class="alert alert-success">
					        {{ session('message') }}
					    </div>
					@endif
                  <form action="{{route('faculty.store')}}" method="post" enctype="multipart/form-data">
                  	@csrf
                     <div class="form-group">
                        <label for="name">Faculty Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="name@example.com">
                     </div>
                     <div class="form-group">
                        <label for="logo">Faculty Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" placeholder="name@example.com">
                     </div>
                  
                  <button type="submit"  class="btn btn-primary">Add Faulty</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-4"></div>
      </div>
   </div>
</x-backend>