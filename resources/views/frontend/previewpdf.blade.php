<x-frontend>
	<!-- <div style="overflow: hidden;
  padding-top: 56.25%; /* 16:9*/
  position: relative;">
		<iframe style="border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;" src="{{asset($magazine->article)}}" type="application/pdf" frameborder="0"  seamless="seamless" >
	</div> -->
	<div style="overflow: hidden;
  padding-top: 56.25%; /* 16:9*/
  position: relative;">

  <embed style="border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;" src="{{asset($magazine->article)}}#toolbar=0&navpanes=0&scrollbar=0" width="100vw" height="100vh"> 
		
	</div>
	
	<x-slot name="script">
		
	</x-slot>
</x-frontend>