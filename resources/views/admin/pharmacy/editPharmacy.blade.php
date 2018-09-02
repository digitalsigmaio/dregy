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
                        <h2>Edit <b>{{$pharmacy->en_name}}</b></h2>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" action="{{ route('updatePharmacy') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                <input type="hidden" class="form-control" name="user_id"  value="{{auth('admin')->user()->id}}">
                                <input type="hidden" class="form-control" name="id"  value="{{$pharmacy->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic Name</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" value="{{ $pharmacy->ar_name}}" name="ar_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $pharmacy->en_name}}" name="en_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" value="{{ $pharmacy->ar_address}}" name="ar_address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{$pharmacy->en_address}}" name="en_address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic Note <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea dir="rtl" style="text-align:right" class="form-control" rows="3" name="ar_note">{{$pharmacy->ar_note}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Note <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" rows="3" name="en_note">{{$pharmacy->en_note}}</textarea>
                                </div>
                            </div>
                            <edit-region-city   :regions = "{{$regions}}" 
                                                :current_region = "{{ json_encode($pharmacy->region->id) }}"
                                                :current_city = "{{ json_encode($pharmacy->city->id) }}">
                            
                            ></edit-region-city>
                            <premium-edit :premium = "{{ json_encode($pharmacy->premium) }}"
                                            :status = "{{ json_encode($pharmacy->featured) }}"
                            ></premium-edit>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Time</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="checkbox" name="full_time" {{$pharmacy->full_time == 1 ? 'checked': ''}} value="{{$pharmacy->full_time}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arbic Work Times</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" value="{{$pharmacy->ar_work_times}}" name="ar_work_times">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Work Times</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $pharmacy->en_work_times}}" name="en_work_times">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="checkbox" name="delivery" {{$pharmacy->delivery == 1 ? 'checked': ''}} value="{{$pharmacy->delivery}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{$pharmacy->website}}" name="website" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" value="{{$pharmacy->email}}" name="email" required>
                                </div>
                            </div>
                            <phone-edit :phones= "{{ json_encode($pharmacy->phoneNumbers) }}"></phone-edit>
                            <!-- Image input -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="file-field medium">
                                        <input type="file" name="img" class="form-control">
                                        <small>Leave it empty if no update</small>
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