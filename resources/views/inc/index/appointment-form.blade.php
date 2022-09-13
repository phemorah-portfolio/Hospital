<div class="page-section">
  <div class="container">

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert">x</button>
        </div>
    @endif
    
    <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
    <form class="main-form" action="{{route('appointment')}}" method="POST">

      @if($errors->any())
          <div class="mb-4 p-4 bg-red-200 text-red-800">
              <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif        

      @csrf
      <div class="row mt-5 ">

       @guest
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" name="name" class="form-control" placeholder="Full name" autofocus required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" name="email" class="form-control" placeholder="Email address.." required>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="phone" class="form-control" placeholder="Tel. No" required>
        </div>
       @endguest

        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <input type="date" name="date" class="form-control" required>
        </div>

        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">            
          <select name="doctor_id" id="doctor" class="custom-select" required>
            <option value="">-- Pick a Doctor --</option>
            @foreach($doctors as $doctor)
              <option value="{{ $doctor->id }}">
                {{ ucfirst($doctor->name) }} (<small>{{ ucfirst($doctor->speciality) }}</small>)
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.." required></textarea>
        </div>
      </div>

      <button class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
    </form>
  </div>
</div> 