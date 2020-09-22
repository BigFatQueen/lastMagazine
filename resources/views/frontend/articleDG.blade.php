<x-frontend>
	<div class="row p-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h2>{{$m->title}}</h2>
					<span class="small"> Posted on {{Carbon\Carbon::parse($m->created_at)->diffForHumans()}} </span>
					<span>
						By {{$m->record->student->user->name}},{{$m->record->faculty->name}}
					</span>
				</div>
				<div class="card-body">
					<img src="{{$m->photo}}" class="card-img-top" height="200" alt="">
					<div class="card-text">
						{!!$m->description!!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<embed src="{{$m->article}}#toolbar=0" style="width:100%; height:570px;">
		</div>
	</div>
	<x-slot name='script'>
		
	</x-slot>
</x-frontend>