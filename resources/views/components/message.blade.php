@if(!empty(session('success')))
{{-- <div class="alert alert-success" role="alert"> --}}
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('success')}}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif



@if(!empty(session('payment-error')))
<div class="alert alert-error" role="alert">
    {{session('payment-error')}}
</div>
@endif

@if(!empty(session('warning')))
<div class="alert alert-warning" role="alert">
    {{session('warning')}}
</div>
@endif
@if(!empty(session('error')))
{{-- <div class="alert alert-danger" role="alert"> --}}
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('error')}}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif


@if(!empty(session('info')))
<div class="alert alert-info" role="alert">
    {{session('info')}}
</div>
@endif

@if(!empty(session('secondry')))
<div class="alert alert-secondry" role="alert">
    {{session('secondry')}}
</div>
@endif

@if(!empty(session('primary')))
<div class="alert alert-primary" role="alert">
    {{session('primary')}}
</div>
@endif
