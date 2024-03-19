<x-adminheader title="Customer" />
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
         
         
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 @include('components.message') 
                <p class="card-title mb-0">Our Customers</p>
                <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#addNewModal" style="float: right;margin-top: -12px;">
                   Add New
                 </button>
                 <div class="modal" id="addNewModal">
                   <div class="modal-dialog">
                   <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title">Add New Customer</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                
                  <div class="modal-body">
             
                 <form action="{{URL::TO('AddNewCustomer')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                         <label for="">Full Name</label>
                         <input type="text" name="fullname" placeholder="Enter Name" class="form-control mb-2" id="">
                         <label for="">Email</label>
                         <input type="email" name="email" placeholder="Enter Email" class="form-control mb-2" id="">
                         <label for="">Password</label>
                         <input type="Password" name="password" placeholder="Enter Password" class="form-control mb-2" id="">

                         <label>type</label><br>
                        <input type="radio" name="type" id="customer" value="Customer" >
                        <label for="customer">Customer</label><br>

                        <input type="radio" name="type" id="Admin" value="Admin" >
                        <label for="admin">Admin</label><br>

                        
                        <label>Status</label><br>
                        <input type="radio" name="status" id="active" value="Active" >
                        <label for="Active">Active</label><br>

                        <input type="radio" name="status" id="inactive" value="InActive" >
                        <label for="inactive">InActive</label><br>
                         

                         <input type="submit" name="save" class="btn btn-success" value="Save Now" id="">
                        </form>
                      </div>
                   </div>
                    </div>
                </div>
                <div class="table-responsive">
                 <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>#.</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Registration Date</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Edit</th>
                      <th>Delete</th>
                     
                    
                        
                   </tr>  
                </thead>
                  <tbody>
                   @php
                  $i=0;
                  @endphp
                  @foreach ($customers as $item)
                  @php
                  $i++;
                  @endphp 
                    <tr>
                        <td>{{$i}}</td>
                       <td>{{ $item->fullname}}</td>
                       <td>{{ $item->email}}</td>
                      <td class="font-weight-bold">{{$item->type}}</td>
                      <td>{{$item->created_at}}</td>
                      <td class="font-weight-bold">{{$item->status}}</td>
                      <td>
                        @if($item->status=='Active')
                       <a href="{{URL::to('changeUserStatus/Blocked/'.$item->id)}}" class="btn btn-danger">Block</a>
                       @else
                       <a href="{{URL::to('changeUserStatus/Active/'.$item->id)}}" class="btn btn-success">Un-Block</a>
                       @endif
                    </td>
                    <td class="font-weight-medium">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$i}}" >
                   Edit
                 </button>

                       <!-- The Modal -->
                    <div class="modal" id="updateModal{{$i}}">
                   <div class="modal-dialog">
                   <div class="modal-content">

                  <div class="modal-header">
                   <h4 class="modal-title"> Update Customer</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                  <div class="modal-body">
                 <form action="{{URL::TO('EditCustomer')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                         <label for="">Name</label>
                         <input type="text" name="fullname" value="{{ $item->fullname }}" placeholder="Enter Name" class="form-control mb-2" id="">
                         <label for="">Email</label>
                         <input type="text" name="email" value="{{ $item->email}}" placeholder="Enter Email" class="form-control mb-2" id="">
                         <label for="">Password</label>
                         <input type="text" name="password" value="{{ $item->password}}"placeholder="Enter Password" class="form-control mb-2" id="">

                         <label>Type</label><br>
                        <input type="radio" name="type" id="customer" value="Customer" {{ $item->type }}>
                        <label for="customer">Customer</label><br>

                        <input type="radio" name="type" id="admin" value="Admin" {{ $item->type }}>
                        <label for="admin">Admin</label><br>

                         <!-- <label for="">Type</label>
                         <input type="text" name="type"value="{{ $item->type}}" placeholder="Enter Description" class="form-control mb-2" id=""> -->
                         <label>Status</label><br>
                        <input type="radio" name="status" id="active" value="Active" {{ $item->status }}>
                        <label for="active">Active</label><br>

                        <input type="radio" name="status" id="inactive" value="InActive" {{ $item->status }}>
                        <label for="inactive">InActive</label><br>

                         <!-- <label for="">Status</label>
                         <input type="text" name="status"value="{{ $item->status}}" placeholder="Enter category" class="form-control mb-2" id=""> -->
                         <input type="hidden" name="id" value="{{$item->id}}" id="">
                       
                             <input type="submit" name="save" class="btn btn-success" value="Save changes" id="">
                        </form>
                      </div>

                                        

               </div>
              </div>
              </div>
                   </td>

                    <td>
                       <a onclick="return confirm('Do you want to delete')" href="{{URL::to('customerdelete/'.$item->id)}}" class="btn btn-danger">Delete</a>
                       
                    </td>
                  </tr>
                 @endforeach
                 
                        
             </tbody>
          </table>
        </div>        
        
        </div>
      </div>
    </div>
  </div>
            
<x-adminfooter />