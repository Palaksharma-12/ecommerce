<x-header title="Login Page"/>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 pt-4">
                       <div class="text-center">
                         <h2> Login Here </h2>
                       </div>
                    <!-- <div class="contact__form">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('success') }}</p>
                        </div>
                        @endif
                        @if(session()->has('error'))
                       
                        @endif -->

                        @include('components.message') 
                        <form action="{{ URL::to('/auth_login') }}" method="post">
                            @csrf
                           <div class="form-group">
                             <label for="name">Email</label>
                              <input type="email" class="form-control"  placeholder="Enter Email" name="email">
                              <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                              </span>
                             </div>

                            <div class="form-group">
                              <label for="name">Password</label>
                               <input type="password" class="form-control"  placeholder="Enter Password" name="password">
                               <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                              </span>
                            </div>
                                
                               <div class="form-group small">
                                  <a href="{{route('Mails.forgotPassword')}}" class="forgot-link">Forgot Password</a>
                               </div>
                               <button type ="Login"  name="login" class="site-btn mb-2">Login</button>
                        
                        </form>
                   
                  </div>
                
               
             </div>
           
         </div>
        
    </div>
    

<x-footer />