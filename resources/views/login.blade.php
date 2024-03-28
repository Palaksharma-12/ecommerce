<x-header title="Login Page"/>
    <!-- <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 pt-4"> -->

          <form action="{{ URL::to('/lang') }}" method="POST">
                    @csrf
                    <div class="form-container">
                        <!-- <label for="dropdown">Select language</label> -->
                        <select class="form-control" id="dropdown" name="code">
                          
                     <!-- <input type="hidden" name="code" value="en"> -->
                            <option value="en">Select language</option> 
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
                         <h2> {{__('lang.login_here')}} </h2>
                       </div>
                    <!-- <div class="contact__form">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('success') }}</p>
                        </div>
                        @endif
                        @if(session()->has('error'))
                       
                        @endif -->

                        <!-- @include('components.message')  -->
                        <div class="alert alert-warning alert-dismissible fade show" id="login_error" role="alert" style="display:none">
                          
                        </div>

                        <form id="login_form">
                        <!-- <form action="{{ URL::to('/auth_login') }}" method="post"> -->

                           <div class="form-group">
                             <label for="name">{{__('lang.email')}}</label>
                              <input type="email" class="form-control"  placeholder="{{__('lang.email')}}" name="email" id="email">
                              <span class="text-danger" id="email_error" style="display:none">
                                <!-- @error('email')
                                {{$message}}
                                @enderror -->
                              </span>
                             </div>

                            <div class="form-group">
                              <label for="name">{{ __('lang.password')}}</label>
                               <input type="password" class="form-control"  placeholder="{{ __('lang.password')}}" name="password" id="password">
                               <span class="text-danger" id="password_error" style="display:none">
                                <!-- @error('password')
                                {{$message}}
                                @enderror -->
                              </span>
                            </div>
                                
                               <div class="form-group small">
                                  <a href="{{route('Mails.forgotPassword')}}" class="forgot-link">{{ __('lang.forgot_password')}}</a>
                               </div>
                               <button type ="Login"  name="login" class="site-btn mb-2">{{ __('lang.login')}}</button>
                        
                        </form>
                   
                  </div>
                
               
             </div>
           
         </div>
        
    </div>
    

<x-footer />
     <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
     <script>
       $(document).ready(function() { 
       $('#login_error').hide();

    // This function runs when the document (HTML page) is fully loaded and ready for manipulation
    // It's a jQuery shorthand for $(function() { ... });
    // It ensures that the DOM elements are ready before executing the code inside
    
         $('#login_form').submit(function(e) {
          $('#login_error').hide();
          $('#email_error').hide();
          $('#password_error').hide();
        // This function handles the form submission event
           e.preventDefault(); // Prevents the default form submission behavior, which would cause a page reload
        
        // Get form data
            var formData = {
            email: $('#email').val(), // Retrieve the value of the username input field
            password: $('#password').val()  // Retrieve the value of the password input field
          };
          console.log(formData);

           var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Setup CSRF token for all AJAX requests
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });


        // Send AJAX request
        $.ajax({
            type: 'POST', // HTTP method used for the request
            url: '/auth_login', // URL to which the request is sent
            data: formData, // Data to be sent in the request body (the form data)
            dataType: 'json', // Expected data type of the response
            success: function(response) {

              console.log(response);
             window.location.href = response.redirect;
                
            },
            error: function(error) {
                $('.error').hide(); // Hide all error containers

                console.log(error.status);
                // 

                if(error.status === 400) {
                  $('#login_error').show().text(error.responseJSON.error).append(`<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`);
                }

                if(error.status === 422 && error.responseJSON.errors) {
                  var errors = error.responseJSON.errors;
                    // Display errors for each field
                    if (errors.email) {
                        $('#email_error').text(errors.email[0]).show();
                    }
                    if (errors.password) {
                        $('#password_error').text(errors.password[0]).show();
                    }
                    else{
                      $('#password_error').new(errors.password[0]).show();
                    }
                    
                 
                }
                // if (error.responseJSON.errors) {
                //     var errors = error.responseJSON.errors;
                //     // Display errors for each field
                //     if (errors.email) {
                //         $('#email_error').text(errors.email[0]).show();
                //     }
                //     if (errors.password) {
                //         $('#password_error').text(errors.password[0]).show();
                //     }
                // } else {
                //   $('#login_error').show().text(error.responseJSON.error);
                // }
                // console.error(error.responseJSON.errors);
            }

          });
         
          
        
        });
    });
    </script>
