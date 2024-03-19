<x-header title="ChangePassword"/>
<div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 pt-4">
                       <div class="text-center">
                         <h2> Reset Password </h2>
                       </div>
                    <div class="contact__form">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('success') }}</p>
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <p>{{ session()->get('error') }}</p>
                       </div>
                        @endif
                         @include('components.message')  
                        <form action="{{ route('processResetPassword') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                           <div class="form-group">
                             
                              <input type="password" class="form-control"  placeholder="New Password" name="password">
                              <span class="text-danger">
                                @error('new_password')
                                {{$message}}
                                @enderror
                              </span>

                              <input type="password" class="form-control"  placeholder="Confirm Password" name="confirm_password">
                              <span class="text-danger">
                                @error('confirm_password')
                                {{$message}}
                                @enderror
                              </span>
                             </div>
                             <input type="submit" class="btn btn-dark btn-block btn-lg" value="submit">
</form>
                         

                       
                        
                  </div>
                
               
             </div>
           
         </div>
        
    </div>
    
<x-footer />
