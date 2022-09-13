<x-admin.layout>

	<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Doctors</h4>
          <div class="table-responsive">
          	@if($doctors->count() < 1)
          	  <h1 class="mb-10 text-center font-italic">No doctor available!</h1>
          	@else
             <table class="table">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th> Doctor </th>
                  <th> Speciality </th>
                  <th> Tel </th>
                  <th> Room </th>
                  <th> Enrolled </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              	@php $count = 0; @endphp
              	@foreach($doctors as $doctor)
              	 @php $count += 1 @endphp
                 <tr>
                  <td>
                    {{ $count }}
                  </td>
                  <td>
                    <img src="doctorimages/{{ $doctor->image }}" alt="image" />
                    <span class="ps-2">{{ $doctor->name }}</span>
                  </td>
                  <td> {{ $doctor->speciality }} </td>
                  <td> {{ $doctor->phone }} </td>
                  <td> {{ $doctor->room }} </td>
                  <td> {{ $doctor->created_at->diffForHumans() }} </td>
                  <td>
                  	<div class="d-sm-flex">
	                  	<form class="px-1" action="{{ route('doctor.destroy', $doctor->id) }}" method="POST">                  		
	                  		@csrf @method('delete')
	                  		<button 
	                  			type="submit" 
	                  			class="btn badge badge-outline-danger"
	                  			onclick="return confirm('Are you sure you want to remove the Doctor?')" 
	                  		>Delete</button>	
	                  	</form>
	                  	
	                  	<a href="{{ route('doctor.edit', $doctor->id) }}" class="btn badge badge-outline-info">Update</a>
                  	</div>
                  </td>
                 </tr>
                @endforeach
              </tbody>
             </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin.layout>