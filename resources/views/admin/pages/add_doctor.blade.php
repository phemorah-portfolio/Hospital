<x-admin.layout>
    
    <h1>Add Doctor</h1>
    <div class="container" align="center" style="padding-top: 50px;">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
        @endif
        <form action="{{route('doctor.store')}}" method="POST" enctype="multipart/form-data">            
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
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                <input type="text" class="form-control" name="name" placeholder="Doctor's name" required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <input type="text" class="form-control" name="phone" placeholder="Phone number" required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="text" name="room" class="form-control" placeholder="Room number" required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                <select name="speciality" class="form-control text-white" required>
                    <option>--Select Speciality--</option>
                    <option value="skin">Skin</option>
                    <option value="heart">Heart</option>
                    <option value="eye">Eye</option>
                    <option value="nose">Nose</option>
                </select>
              </div>
              <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <input type="file" class="form-control" name="file">
              </div>
            </div>

            <button type="submit" class="btn btn-success mt-3 wow zoomIn">Add Doctor</button>
      </form>
    </div>

</x-admin.layout>