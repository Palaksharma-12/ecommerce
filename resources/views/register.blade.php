<x-header title="Register Page"/>
<section classs="contact-spad">
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 pt-4">
            <div class="text-center">
              <h2> {{ _('lang.Create New Account')}} </h2>
           </div>
           @include('components.message')
            <form action="{{ URL::to('/create_user')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">{{ _('lang.Name')}}</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="fullname">
                    <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                              </span>
                </div>
                <div class="form-group">
                    <label for="name">{{ _('lang.Email')}}</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                    <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                              </span>
                </div>
                <div class="form-group">
                    <label for="name">{{ _('lang.Password')}}</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="password">
                    <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                              </span>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
           
            </form>
        </div>
    </div>
  </div>
</section>
 <x-footer />