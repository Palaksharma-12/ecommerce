<x-header title="Orders"/>
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 mx-auto">
                <div class="section-title">
                    <h2> MY Order History </h2>
               </div>
               <table class="table">
                 <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Total bill
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Order Date
                        </th>
                        <th>
                          View Product  
                        </th>
                    </tr>
                 </thead>
                 <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($orders as $item)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td>
                          {{$i}}
                        </td>
                        <td>
                          {{$item->bill}}
                        </td>
                        <td>
                          {{$item->fullname}}
                        </td>
                        <td>
                          {{$item->address}}
                        </td>
                        <td>
                          {{$item->phone}}
                        </td>
                        <td>
                          {{$item->status}}
                        </td>
                        <td>
                          {{$item->created_at}}
                        </td>
                        <td>
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$i}}">
                            Products
                        </button>
                     <div class="modal" id="myModal{{$i}}">
                      <div class="modal-dialog">
                         <div class="modal-content">
                            
                            <div class="modal-header">
                                <h4 class="modal-title">ALL Products</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   </div>

                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Product
                                                    </th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                    <th>
                                                        subtotal
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $product)
                                                @if($item->id ==$product->orderId)
                                                  <tr>
                                                    <td>
                                                        <img src="{{ URL::asset('Source/products/' .$product->picture)}}" width="100px">
                                                        {{$product->title}}
                                                    </td>
                                                    <td>
                                                        {{$product->quantity}}
                                                    </td>
                                                    <td>
                                                        {{$product->price}}
                                                    </td>
                                                    <td>
                                                        {{$product->price * $product->quantity}}
                                                    </td>
                                                  </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>

                                 </div>
                               </div>
                             </div>
                          </td>
                       </tr>
                    @endforeach
                </tbody>
              </table>
           </div>
        </div>
       </div>
    </section> 
<x-footer />     