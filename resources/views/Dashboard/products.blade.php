<x-adminheader title="Products" />
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
         
         
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                @include('components.message') 
                <p class="card-title mb-0">Top Products</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewModal">
                   Add New
                 </button>

                       <!-- The Modal -->
                    <div class="modal" id="addNewModal">
                   <div class="modal-dialog">
                   <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title">Add New Product</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                  <div class="modal-body">
                 <form action="{{URL::TO('AddNewPRODUCT')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                         <label for="">Title</label>
                         <input type="text" name="title" placeholder="Enter Title" class="form-control mb-2" id="">
                         <label for="">Price</label>
                         <input type="text" name="price" placeholder="Enter Price ($)" class="form-control mb-2" id="">
                         <label for="">Quantity</label>
                         <input type="number" name="quantity" placeholder="Enter Quantity" class="form-control mb-2" id="">
                         <label for="">Picture</label>
                         <input type="file" name="file" class="form-control mb-2" id="">
                         <label for="">Description</label>
                         <input type="text" name="description" placeholder="Enter Description" class="form-control mb-2" id="">

                         <label>Category</label><br>
                        <input type="radio" name="category" id="accessories" value="Accessories" >
                        <label for="accessories">Accessories</label><br>

                        <input type="radio" name="category" id="shoes" value="Shoes" >
                        <label for="shoes">Shoes</label><br>

                        <input type="radio" name="category" id="clothes" value="Clothes" >
                         <label for="clothes">Clothes</label><br>

                      
                         <label>Type</label><br>
                        <input type="radio" name="type" id="sale" value="Sale">
                        <label for="sale">Sale</label><br>

                        <input type="radio" name="type" id="New Arrival" value="New Arrival" >
                        <label for="New Arrival">New Arrival</label><br>

                        <input type="radio" name="type" id="Best Seller" value="Clothes" >
                         <label for="Best Seller">Best Sellers</label><br>

                         <input type="radio" name="type" id="Hot Sales" value="Hot Sales" >
                         <label for="Hot Sales">Hot sales</label><br>
                        
                        
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
                      <th>Title</th>
                      <th>Picture</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Category</th>
                      <th>Type</th>
                      <th>Update</th>
                      <th>Delete</th>
                        
                   </tr>  
                </thead>
                  <tbody>
                  @php
                  $i=0;
                  @endphp
                  @foreach ($products as $item)
                  @php
                  $i++;
                  @endphp
                    <tr>
                       <td>{{ $item->title}}</td>
                      <td><img src="{{URL::asset('Source/products/' .$item->picture)}}" width="100px"></td>
                      <td class="font-weight-bold">${{$item->price}}</td>
                      <td>{{$item->quantity}}</td>
                      <td class="font-weight-medium"><div class="badge badge-success">{{$item->category}}</div></td>
                      <td class="font-weight-medium"><div class="badge badge-info">{{$item->type}}</div></td>
                      <td class="font-weight-medium">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$i}}" >
                   Update
                 </button>

                       <!-- The Modal -->
                    <div class="modal" id="updateModal{{$i}}">
                   <div class="modal-dialog">
                   <div class="modal-content">

                  <div class="modal-header">
                   <h4 class="modal-title"> Update Product</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                  <div class="modal-body">
                 <form action="{{URL::TO('UpdateProduct')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                         <label for="">Title</label>
                         <input type="text" name="title" value="{{ $item->title }}" placeholder="Enter Title" class="form-control mb-2" id="">
                         <label for="">Price</label>
                         <input type="text" name="price" value="{{ $item->price}}" placeholder="Enter Price ($)" class="form-control mb-2" id="">
                         <label for="">Quantity</label>
                         <input type="number" name="quantity" value="{{ $item->quantity}}"placeholder="Enter Quantity" class="form-control mb-2" id="">
                         <label for="">Picture</label>
                         <input type="file" name="file" class="form-control mb-2" id="">
                         <label for="">Description</label>
                         <input type="text" name="description"value="{{ $item->description}}" placeholder="Enter Description" class="form-control mb-2" id="">

                        
                          <label>Category</label><br>
                        <input type="radio" name="category" id="accessories" value="Accessories" {{ $item->category === 'Accessories' ? 'checked' : '' }}>
                        <label for="accessories">Accessories</label><br>

                        <input type="radio" name="category" id="shoes" value="Shoes" {{ $item->category === 'Shoes' ? 'checked' : '' }}>
                        <label for="shoes">Shoes</label><br>

                        <input type="radio" name="category" id="clothes" value="Clothes" {{ $item->category === 'Clothes' ? 'checked' : ''  }}>
                         <label for="clothes">Clothes</label><br>

                         <label>Type</label><br>
                        <input type="radio" name="type" id="sale" value="Sale" {{ $item->type === 'Sale' ? 'checked' : '' }}>
                        <label for="sale">Sale</label><br>

                        <input type="radio" name="type" id="New Arrival" value="New Arrival" {{ $item->type === 'New Arrival' ? 'checked' : '' }}>
                        <label for="New Arrival">New Arrival</label><br>

                        <input type="radio" name="type" id="Best Seller" value="Clothes" {{ $item->type === 'Best Sellers' ? 'checked' : ''  }}>
                         <label for="Best Seller">Best Sellers</label><br>

                         <input type="radio" name="type" id="Hot Sales" value="Hot Sales" {{ $item->type === 'Hot Sales' ? 'checked' : ''  }}>
                         <label for="Hot Sales">Hot sales</label><br>

                         <!-- <label for="">Type</label>
                         <input type="text" name="type" value="{{ $item->type}}" placeholder="Enter type" class="form-control mb-2" id="">  -->
                        
                        
                              <input type="hidden" name="id" value="{{ $item->id }}" id="">
                             <input type="submit" name="save" class="btn btn-success" value="Save changes" id="">
                        </form>
                      </div>

                                        

               </div>
              </div>
              </div>
                   </td>
                   <td>
                       <a onclick="return confirm('Do you want to delete')" href="{{URL::to('deleteProduct/'.$item->id)}}" class="btn btn-danger">Delete</a>

                    </td>
                  </tr>
                 @endforeach
                        
             </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
            
<x-adminfooter />