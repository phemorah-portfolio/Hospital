<x-frontend.layout>
 
 <div class="container">
 	<div class="main-form_ mt-10 mb-10">
 		<h1 class="mb-10 text-center font-bold text-3xl">My Appointment</h1>
 		@if($myappointments->count() < 1) 
 			<h1 class="mb-10 text-center font-italic">You don't have any booked appointent</h1>
 		@else
	 	 <table class="table table-sm table-dark">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">DOCTOR</th>
		      <th scope="col">SPECIALITY</th>
		      <th scope="col">MESSAGE</th>
		      <th scope="col">APPT DATE</th>
		      <th scope="col">BOOKED SINCE</th>
		      <th scope="col">STATUS</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@php $count = 0; @endphp
		  	@foreach($myappointments as $appoint)
		  	 @php $count += 1 @endphp
			    <tr>
			      <th scope="row">{{ $count }}</th>
			      <td><small>{{ $appoint->doctor->name }}</small></td>
			      <td><small>{{ ucfirst($appoint->doctor->speciality) }} Doctor</small></td>
			      <td><small>{{ $appoint->message }}</small></td>
			      <td><small>{{ $appoint->date }}</small></td>
			      <td><small>{{ $appoint->created_at->diffForHumans() }}</small></td>
			      <td><small>{{ $appoint->status }}</small></td>
			      <td>
			      	<a
			      	 href="{{route('cancel-apt', $appoint->id)}}" 
			      	 class="btn btn-sm btn-danger"
			      	 onClick="return confirm('Are you sure you want to delete this appointment?')"
			      	>
			      		Cancel
			      	</a>
			      </td>
			    </tr>
		  	@endforeach
		  </tbody>
		 </table>
		@endif
	</div>
 </div>

</x-frontend.layout>