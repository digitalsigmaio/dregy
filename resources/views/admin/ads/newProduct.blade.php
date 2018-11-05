@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($errors->any())
                <div class="row">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </ul>
                </div>
                @endif

                @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>New Product</h2>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" action="/admin/products/ads" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Reference</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="user_id" required>
                                    <input type="hidden" class="form-control" name="admin_id"  value="{{auth('admin')->user()->id}}">
                                    <input type="hidden" class="form-control" name="user_id"  value="{{$user_id}}">
                                </div>
                            </div>
                            -->
                            <input type="hidden" class="form-control" name="admin_id"  value="{{auth('admin')->user()->id}}">
                            <input type="hidden" class="form-control" name="user_id"  value="{{$user_id}}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="radio" class="" name="status" value="1" required>
                                        <label class="control-label"> New</label>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="radio" class="" name="status" value="2" required>
                                        <label class="control-label"> Used</label>
                                    </div>
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">Description</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea dir="" style="" class="form-control" rows="3" name="description"></textarea>
                                </div>
                            </div>
                            <region-city :regions = "{{$regions}}"></region-city>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Categories</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="categoryId" class="form-control">
                                        <option selected disabled>Choose Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->en_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                            <phone-numbers></phone-numbers>
                            <!-- Image input -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="file-field medium">
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection