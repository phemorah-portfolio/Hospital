<x-admin.layout>
    
    <h1>Update Doctor</h1>
    <div class="container-fluid" align="center" style="padding-top: 50px;">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
        @endif
        <form action="{{route('doctor.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">  @method('put')      
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
                <input type="text" class="form-control" name="name" value="{{$doctor->name}}" placeholder="Doctor's name" required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <input type="text" class="form-control" name="phone" value="{{$doctor->phone}}" placeholder="Phone number" required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="text" name="room" value="{{$doctor->room}}" class="form-control" placeholder="Room number" required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                <select name="speciality" class="form-control text-white" required>
                    <option>--Select Speciality--</option>
                    <option value="skin"{{$doctor->speciality == 'skin' ? 'selected' : ''}}>Skin</option>
                    <option value="heart"{{$doctor->speciality=='heart' ? 'selected':''}}>Heart</option>
                    <option value="eye"{{$doctor->speciality == 'eye' ? 'selected' : ''}}>Eye</option>
                    <option value="nose"{{$doctor->speciality == 'nose' ? 'selected' : ''}}>Nose</option>
                </select>
              </div>
              <div class="d-sm-flex flex-grow col-12 col-sm-6 py-2">
                <img src="{{asset('doctorimages/'.$doctor->image)}}" class="px-1" width="40" height="40">
                <input type="file" class="form-control" name="file">
              </div>
            </div>

            <button type="submit" class="btn btn-success mt-3 wow zoomIn">Submit Update</button>
      </form>
    </div>

</x-admin.layout>