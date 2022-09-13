<x-admin.layout>
    
    <h1>Send Email</h1>
    <div class="container" align="center" style="padding-top: 50px;">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
        @endif
        <form action="{{route('sendmail')}}" method="POST">            
            @csrf
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  
            <div class="row mt-5_">
            	<input type="hidden" name="appoint_id" value="{{$id}}">
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                <input type="text" class="form-control" name="greeting" placeholder="Enter greeting here..." required>
              </div>

			  <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="text" name="action_text" class="form-control" placeholder="Action text" required>
              </div>
              
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="text" name="action_url" class="form-control" placeholder="Action url" required>
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                <input type="text" name="end_part" class="form-control" placeholder="End part" required>
              </div>
              
              <div class="col-12 col-sm-6_ py-2 wow fadeInRight">
                <textarea class="form-control" name="body" placeholder="Enter your message here" required></textarea> 
              </div>
            </div>
            <button type="submit" class="btn btn-success mt-3 wow zoomIn">Submit</button>
      	</form>
    </div>

</x-admin.layout>