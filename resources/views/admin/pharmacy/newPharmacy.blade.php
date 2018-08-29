@extends('admin.app')

@section('content')
    <div class="container">
        
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>New Pharmacy</h2>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" action="{{ route('storePharmacy') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Reference</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="ref_id" required>
                                    <input type="hidden" class="form-control" name="user_id"  value="{{auth('admin')->user()->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic Name</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" name="ar_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="en_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" name="ar_address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="en_address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic Note <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea dir="rtl" style="text-align:right" class="form-control" rows="3" name="ar_note"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Note <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" rows="3" name="en_note"></textarea>
                                </div>
                            </div>
                            <region-city :regions = "{{$regions}}"></region-city>
                            
                            <premium-check></premium-check>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Time</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="checkbox" name="full_time" value="true"> Yes<br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arbic Work Times</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" name="ar_work_times">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Work Times</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="en_work_times">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="checkbox" name="delivery" value="true"> Yes
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="website" >
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