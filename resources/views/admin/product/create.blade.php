@extends('admin.layout.main')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add Product
                        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm text-white float-right">
                            Back
                        </a>
                    </h3>
                </div>

                    <div class="card-body">
                        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                        Home
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                        Seo Tags
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                        Details
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images-tab-pane" type="button" role="tab" aria-controls="images-tab-pane" aria-selected="false">
                                        Images
                                    </button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <em class="alert-danger">{{$message}}</em> @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label>Product Name</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                        @error('name') <em class="alert-danger">{{$message}}</em> @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                                        @error('slug') <em class="alert-danger">{{$message}}</em> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Select Brand</label>
                                        <select name="brand" class="form-control">
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->name}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand') <em class="alert-danger">{{$message}}</em> @enderror

                                    </div>


                                    <div class="mb-3">
                                        <label>Small Description</label>
                                        <textarea name="small_description" class="form-control" rows="4">{{old('small_description')}}</textarea>
                                        @error('small_description') <em class="alert-danger">{{$message}}</em> @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{old('description')}}</textarea>
                                        @error('description') <em class="alert-danger">{{$message}}</em> @enderror
                                    </div>

                                </div>
                                <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">

                                    <div class="mb-3">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control" value="{{old('meta_keyword')}}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control" value="{{old('meta_description')}}">
                                    </div>



                                </div>
                                <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original Price</label>
                                            <input type="number" name="original_price" class="form-control" value="{{old('original_price')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="number" name="selling_price" class="form-control" value="{{old('selling_price')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="trending">Trending</label>
                                        <select name="trending"  class="form-control">
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                        @error('trending') <em class="alert-danger">{{$message}}</em> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status"  class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">inActive</option>
                                        </select>
                                        @error('status') <em class="alert-danger">{{$message}}</em> @enderror
                                    </div>





                                </div>
                                <div class="tab-pane fade border p-3" id="images-tab-pane" role="tabpanel" aria-labelledby="images-tab" tabindex="0">

                                    <div class="mb-3">
                                        <label>Upload Product Images</label>
                                        <input type="file" name="image[]" class="form-control" multiple>
                                        @error('image') <em class="alert-danger">{{$message}}</em> @enderror

                                    </div>

                                </div>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
@endsection
