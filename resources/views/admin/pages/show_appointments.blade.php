<x-admin.layout>

 <div class="row ">
   <h4 class="card-title">All Appointments</h4>     
  	@if($appointments->count() < 1) 
	 <h1 class="mb-10 text-center font-italic">You don't have any booked appointent</h1>
	 @else
      	@php $count = 0; @endphp

	  	@foreach($appointments as $appoint)
	  	 <div class="card mb-1">
			<div class="card-body">
		  	 @php $count += 1 @endphp
	          <div class="d-flex flex-row justify-content-between">
	          	<div>
	            	<h4 class="card-title mb-1_ _mr-2">Doctor
	            	<small class="text-muted">{{ $appoint->doctor->name }}</small></h4>
	            </div>
		      	<div>
	              <h6 class="preview-subject">Speciality:
					<small class="text-muted mb-0">{{ ucfirst($appoint->doctor->speciality) }} Doctor</small>
	              </h6>
	              
	            </div>
	        	@php 
		      	 $status = (str_contains($appoint->status,'progress')) ? 'warning' : 'danger';
		      	 $status = (str_contains($appoint->status,'approved')) ? 'success' : $status;
		      	@endphp      
	            <div class="badge badge-outline-{{$status}}">
	            	<small>{{ $appoint->status }}</small>
		      	</div>
	          </div>
	          <div class="row">
	            <div class="col-12">
	              <div class="preview-list">
	                <div class="preview-item border-bottom">
	                  <div class="preview-item-content d-sm-flex flex-grow">	                    
	                    <div class="flex-grow">
						      		  <h6 class="preview-subject">Appointment Date</h6>		                   
						      		  <small class="text-muted">{{ $appoint->date }}</small>
							        </div>
	                    <div class="flex-grow">
	                      <h6 class="preview-subject">Message</h6>
	                      <p class="text-muted mb-0">{{ $appoint->message }}</p>
	                    </div>
	                    <div class="me-auto text-sm-right pt-2 pt-sm-0">	                     
	                     <h6 class="preview-subject">Booked: <small class="text-muted mb-0">{{ $appoint->created_at->diffForHumans() }}</small></h6>

	                     @if(!str_contains($status,'success'))	                     
								      	 <a
								      	  href="{{route('approve', $appoint->id)}}" 
								      	  class="btn btn-sm btn-success"
								      	 >Approve</a>
								      	 <a
								      	  href="{{route('cancel-apt', $appoint->id)}}" class="btn btn-sm btn-danger"
								      	  onClick="return confirm('Are you sure you want to delete this appointment?')"
								      	 > Cancel 
								      	 </a>
							      	 @endif
							      	 <a
								      	  href="{{route('mailform', $appoint->id)}}" 
								      	  class="btn btn-sm btn-info"
								      	 >Send Mail</a>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
			</div>   
		 </div> 
        @endforeach
	@endif    
  </div>
</x-admin.layout>