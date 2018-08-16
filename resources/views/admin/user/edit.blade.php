@extends('admin.app')

@section('content')
<div class="row">
        @if($flash = session('message'))
            {{$flash}}
        @endif
    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
    <form method="post" action="/admin/users/update/{{$user->id}}">
        @csrf
        @method('put')
        <!--Form with header-->
        <div class="card wow fadeIn" data-wow-delay="0.3s">
            <div class="card-body">

                <!--Header-->
                <div class="form-header sky-gradient">
                    <h3><i class="fa fa-user mt-2 mb-2"></i>Create A New User</h3>
                </div>

                <!--Body-->
                <div class="md-form">
                    <i class="fa fa-user prefix white-text"></i>
                    <input type="text" id="orangeForm-name" class="form-control" name="name" value="{{$user->name}}"
                        required autofocus>
                    <label for="orangeForm-name">User Name</label>
                    <span class="invalid-feedback">
                        <strong></strong>
                    </span>
                </div>

                <div class="md-form">
                    <i class="fa fa-envelope prefix white-text"></i>
                    <input type="text" id="orangeForm-email" class="form-control"  name="email" value="{{$user->email}}"
                         required autofocus>
                    <label for="orangeForm-email">Email</label>
                    <span class="invalid-feedback">
                        <strong></strong>
                    </span>
                </div>


                <div class="md-form">
                    <input type="submit" class="form-control">
                </div>

            </div>
        </div>
        <!--/Form with header-->
        </form>
    </div>
</div>
@endsection