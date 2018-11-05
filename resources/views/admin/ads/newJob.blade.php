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
                        <h2>New Job</h2>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" action="/admin/jobs/ads" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Reference</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="ref_id" required>
                                    <input type="hidden" class="form-control" name="admin_id"  value="{{auth('admin')->user()->id}}">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="salary" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="radio" class="" name="jobTypeId" value="1" required>
                                        <label class="control-label"> Employer</label>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="radio" class="" name="jobTypeId" value="2" required>
                                        <label class="control-label"> Job Seeker</label>
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
                            <custom-regioncity :regions = "{{$regions}}"></custom-regioncity>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Experience</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="experienceLevelId" class="form-control">
                                        <option selected disabled>Experience Level</option>
                                        @foreach($experienceLevels as $experienceLevel)
                                        <option value="{{$experienceLevel->id}}">{{$experienceLevel->en_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Education</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="educationLevelId" class="form-control">
                                        <option selected disabled>Education Level</option>
                                        @foreach($educationLevels as $educationLevel)
                                        <option value="{{$experienceLevel->id}}">{{$experienceLevel->en_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Employment</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="employmentTypeId" class="form-control">
                                        <option selected disabled>Employment Type</option>
                                        @foreach($employmentTypes as $employmentType)
                                        <option value="{{$employmentType->id}}">{{$employmentType->en_name}}</option>
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
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" name="email" required>
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