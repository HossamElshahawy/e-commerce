@extends('admin.layout.main')


@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
                <form method="post" action="{{route('admin.settingSaveUpdate')}}">
                    @csrf
                    @if(isset($setting))
                        @method('PUT')
                    @endif
                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                            <h3 class="text-white mb-0">Website</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Website Name</label>
                                    <input type="text" name="website_name" class="form-control" value="{{$setting->website_name}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Website Url</label>
                                    <input type="text" name="website_url" class="form-control" value="{{$setting->website_url}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Page Title</label>
                                    <input type="text" name="page_title" class="form-control" value="{{$setting->page_title}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control" value="{{$setting->meta_keywords}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control" rows="3">{{$setting->meta_description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                            <h3 class="text-white mb-0">Website Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Address</label>
                                    <textarea type="text" name="address" class="form-control">{{$setting->address}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone 1 *</label>
                                    <input type="text" name="phone1" class="form-control" value="{{$setting->phone1}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone No. 2</label>
                                    <input type="text" name="phone2" class="form-control" value="{{$setting->phone2}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email 1 *</label>
                                    <input type="text" name="email1" class="form-control" value="{{$setting->email1}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email 2</label>
                                    <input type="text" name="email2" class="form-control" value="{{$setting->email2}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                            <h3 class="text-white mb-0">Website - Social Media</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Facebook (optional)</label>
                                    <input type="text" name="facebook" class="form-control" value="{{$setting->facebook}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" class="form-control" value="{{$setting->twitter}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Instgram</label>
                                    <input type="text" name="instgram" class="form-control" value="{{$setting->instgram}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" class="form-control" value="{{$setting->youtube}}">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary text-white">Save Setting</button>
                        </div>

                </form>
        </div>
    </div>

@endsection
