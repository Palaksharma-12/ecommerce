<x-header title="Register Page"/>
<section classs="contact-spad">
    
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 pt-4"> -->
          
        
                <form action="{{ URL::to('/lang') }}" method="POST">
                    @csrf
                    <div class="form-container margin-right">
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
                   <h2> {{ __('lang.create_new_account')}} </h2>
                    </div>
          
                   <div class="alert alert-warning alert-dismissible fade show" id="register_error" role="alert" style="display:none">
                          
                   </div>
            <!-- <form action="{{ URL::to('/create_user')}}" method="POST">
                @csrf -->
                <form id="register_form">
                <div class="form-group">
                    <label for="name">{{__('lang.name')}}</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="fullname">
                    <span class="text-danger" id="name_error" style="display:none">
                                <!-- @error('name')
                                {{$message}}
                                @enderror -->
                              </span>
                </div>
                <div class="form-group">
                    <label for="name">{{__('lang.email')}}</label>
                    <input type="email" class="form-control" id="email" placeholder="{{__('lang.email')}}" name="email">
                    <span class="text-danger" id="email_error" style="display:none">
                                <!-- @error('email')
                                {{$message}}
                                @enderror -->
                              </span>
                </div>
                <div class="form-group">
                    <label for="name">{{ __('lang.password')}}</label>
                    <input type="password" class="form-control" id="password" placeholder="{{ __('lang.password')}}" name="password">
                    <span class="text-danger" id="password_error" style="display:none">
                                <!-- @error('password')
                                {{$message}}
                                @enderror -->
                              </span>
                </div>
                <button type="submit" class="btn btn-primary mb-2">{{ __('lang.submit')}}</button>
           
            </form>
        </div>
    </div>
  </div>
</section>
 <x-footer />

 <script>
  
       $(document).ready(function() { 
       $('#register_error').hide();

    // This function runs when the document (HTML page) is fully loaded and ready for manipulation
    // It's a jQuery shorthand for $(function() { ... });
    // It ensures that the DOM elements are ready before executing the code inside
    
         $('#register_form').submit(function(e) {
          $('#register_error').hide();
          $('#email_error').hide();
          $('#password_error').hide();
          $('#name_error').hide();
        // This function handles the form submission event
           e.preventDefault(); // Prevents the default form submission behavior, which would cause a page reload
        
        // Get form data
            var formData = {
            fullname: $('#name').val(),  
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
            url: '/create_user', // URL to which the request is sent
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
                  $('#register_error').show().text(error.responseJSON.error).append(`<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`);
                }

                if(error.status === 422 && error.responseJSON.errors) {
                  var errors = error.responseJSON.errors;
                    // Display errors for each field
                    if (errors.fullname) {
                        $('#name_error').text(errors.fullname[0]).show();
                    }
                    if (errors.email) {
                        $('#email_error').text(errors.email[0]).show();
                    }
                    if (errors.password) {
                        $('#password_error').text(errors.password[0]).show();
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