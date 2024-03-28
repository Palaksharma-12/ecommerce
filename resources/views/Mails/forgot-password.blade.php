<x-header title="ForgotPaasword"/>
<!-- <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 pt-4"> -->
          <form action="{{ URL::to('/lang') }}" method="POST">
                    @csrf
                    <div class="form-container margin-right">
                        <!-- <label for="dropdown">Select language</label> -->
                        <select id="dropdown" name="code">
                          
                     <!-- <input type="hidden" name="code" value="en"> -->
                            <option>Select language</option>
                            <option value="en">ENGLISH</option>
                            <option value="hi">HINDI</option>
                            <option value="es">SPANISH</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div class="container">
                <div class="row justify-content-center">
                <div class="col-sm-6 pt-4">
                       <div class="text-center">
                         <h2> {{ __('lang.forgot_password')}} </h2>
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
                             <label for="name">{{__('lang.email')}}</label>
                              <input type="email" class="form-control"  placeholder="{{__('lang.email')}}" name="email">
                              <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                              </span>
                             </div>
                             <button type ="submit"  name="submit" class="site-btn mb-2">{{ __('lang.submit')}}</button>
</form>
                

                       
                        
                  </div>
                
               
             </div>
           
         </div>
        
    </div>
    
<x-footer />
