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
                        <h2>Edit <b>{{$clinic->en_name}}</b></h2>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" action="{{ route('updateClinic') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                <input type="hidden" class="form-control" name="user_id"  value="{{auth('admin')->user()->id}}">
                                <input type="hidden" class="form-control" name="id"  value="{{$clinic->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic Name</label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" value="{{ $clinic->ar_name}}" name="ar_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $clinic->en_name}}" name="en_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" value="{{ $clinic->ar_address}}" name="ar_address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English address</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $clinic->en_address}}" name="en_address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arabic Note <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea dir="rtl" style="text-align:right" class="form-control" rows="3" name="ar_note">{{ $clinic->ar_note}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Note <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" rows="3" name="en_note">{{ $clinic->en_note}}</textarea>
                                </div>
                            </div>
                            <edit-region-city :regions = "{{$regions}}" 
                                                :current_region = "{{ json_encode($clinic->region->id) }}"
                                                :current_city = "{{ json_encode($clinic->city->id) }}">
                            
                            ></edit-region-city>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Degree</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="degree_id" class="form-control">
                                        <option disabled>Choose Degree</option>
                                        @foreach($degrees as $degree)
                                        <option {{$degree->id === $clinic->degree->first()->id ? 'selected': ''}} value="{{$degree->id}}">{{$degree->en_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Speciality</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="speciality_id" class="form-control">
                                        <option disabled>Choose Speciality</option>
                                        @foreach($specialities as $speciality)
                                        <option {{$speciality->id === $clinic->specialities->first()->id ? 'selected': ''}} value="{{$speciality->id}}">{{$speciality->en_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <premium-edit :premium = "{{ json_encode($clinic->premium) }}"
                                        :status = "{{ json_encode($clinic->featured) }}"
                            ></premium-edit>  
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Arbic Work Times</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input dir="rtl" style="text-align:right" type="text" class="form-control" value="{{ $clinic->ar_work_times}}" name="ar_work_times">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">English Work Times</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $clinic->en_work_times}}" name="en_work_times">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{ $clinic->website}}" name="website" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" value="{{ $clinic->email}}" name="email" required>
                                </div>
                            </div>
                            
                            <phone-edit :phones= "{{ json_encode($clinic->phoneNumbers) }}"></phone-edit>
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