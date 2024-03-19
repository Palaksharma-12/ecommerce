<x-adminheader  title="Profile"/>
<!-- <section> -->

    <div class="main-panel" style="border:1px solid red;">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header text-center mb-2">
                            <h2> My Account </h2>
                        </div>
                        <div class="card-body">
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
            </div>
        </div>
    </div>
    

<!-- </section> -->

 <x-adminfooter />