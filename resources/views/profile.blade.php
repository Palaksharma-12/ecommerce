<x-header  title="Profile"/>
<section classs="contact-spad">
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 pt-4">
            <div class="text-center mb-2">
              <h2> My Account </h2>
           </div>
            @include('components.message') 
            <form action="{{ URL::to('/updateUser')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="Name" value="{{$user->fullname}}"  name="fullname">
                </div>
                <div class="form-group">
                 <input type="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}" name="email">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" id="pwd" placeholder="Password" value="{{$user->password}}" readonly  name="password">
               </div>
                <button type="submit" class="btn btn-primary mb-2">Save changes</button>
           
            </form>
         </div>
     </div>
   </div>
 </section>
<x-footer />