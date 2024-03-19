<x-header title="ForgotPaasword"/>
<div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 pt-4">
                       <div class="text-center">
                         <h2> Forgot Password </h2>
                       </div>
                    <div class="contact__form">
                        <!-- @if(session()->has('success'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('success') }}</p>
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <p>{{ session()->get('error') }}</p>
                       </div>
                        @endif -->
                        @include('components.message') 
                        <form action="{{ route('Mails.processForgotPassword') }}" method="post">
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
                             <button type ="submit"  name="submit" class="site-btn mb-2">Submit</button>
</form>
                

                       
                        
                  </div>
                
               
             </div>
           
         </div>
        
    </div>
    
<x-footer />
