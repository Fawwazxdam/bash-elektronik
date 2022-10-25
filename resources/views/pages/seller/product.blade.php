@extends('pages/seller/template')
@section('judul')
<div class="d-flex align-items-center">
    <h3 class="h3 mb-0">My Product</h3>
</div>
@endsection

@section('product')
<div class="py-4">
    <div class="dropdown">
        
        <a href="{{route ('productAdd')}}" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Add New Product
        </a>
    </div>
</div>
<div class="row">
    @foreach ($products as $products)
    <div class="col-3 mb-4">
        
        <div class="card shadow border-0 text-center p-0">
            <img src="{{ Storage::url($products->galleries->first()->photos ?? '')}}" class="card-img-top" alt="...">
            
            <div class="card-body pb-3">
                <h4 class="h3">{{$products->name}}</h4>
                <h5 class="fw-normal">{{$products->category->name}}</h5>
                <p class="text-gray mb-2">IDR {{$products->price}}</p>
                <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="productEdit">
                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                    Edit
                </a>
                <a class="btn btn-sm btn-secondary" href="#">Delete</a>
            </div>
         </div>
    </div>
    @endforeach
</div>


@endsection