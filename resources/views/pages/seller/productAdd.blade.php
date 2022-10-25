@extends('pages/seller/template')
@section('judul')
<div class="d-flex align-items-center">
    <h3 class="h3 mx-4 mb-0">Create New Product</h3>
</div>
@endsection

@section('productAdd')
<div class="row mx-3 my-4">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form action="">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Product Name</label>
                          <input type="text" class="form-control" placeholder="Product Name" aria-label="Product Name">
                        </div>
                        <div class="col">
                            <label for="">Price</label>
                          <input type="number" class="form-control" placeholder="Price" aria-label="Price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <label for="">Stock</label>
                          <input type="number" class="form-control" placeholder="Stock" aria-label="Price">
                        </div>
                        <div class="col">
                            <label class="my-1 me-2" for="">Category</label>
                                <select class="form-select" id="country" aria-label="Default select example">
                                    <option selected>Select Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                        </select>
                        </div>
                    </div>
                    <div class="my-4">
                        <label for="textarea">Description</label>
                        <textarea class="form-control" placeholder="Describe your product here..." id="textarea" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create Product
                        </button>
                    </div>
                    
                </form>     
                
            </div>
        </div>
    </div>
</div>

@endsection