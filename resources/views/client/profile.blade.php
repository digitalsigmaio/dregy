@extends('client.home')

@section('userContent')
    <h2 class="blue-grey-text">Account Info</h2>
    <div class="col-md-6 offset-md-1 mb-1 mt-5">

        <div class="details">
            <div class="card">
                <div class="card-body">
                    <div class="btn-edit sky-gradient rounded-circle pl-2">
                        <a data-toggle="tooltip" data-placement="top" title="Edit account">
                            <i class="fa fa-pencil white-text pl-1"></i>
                        </a>
                    </div>
                    <ul class="striped list-unstyled">

                        <li><strong>Name:</strong> {{ $user->name }}</li>

                        <li><strong>E-mail address:</strong> {{ $user->email }}</li>

                        <li><strong>Account created:</strong> {{ $user->created_at->toFormattedDateString() }}</li>

                        <li><strong>Job ads created:</strong> {{ $user->jobAds->count() }}</li>

                        <li><strong>Product ads created:</strong> {{ $user->productAds->count() }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-edit">
            <div class="card">
                <div class="card-body">
                    <div class="btn-cancel peach-gradient rounded-circle pl-2">
                        <a data-toggle="tooltip" data-placement="top" title="Cancel edit">
                        <i class="fa fa-times white-text pl-1"></i>
                        </a>
                    </div>
                    <form action="/users" method="post">
                        @csrf
                        @method('PUT')
                        <ul class="striped list-unstyled">

                            <li><label for="name"><strong>Name:</strong></label> <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </li>

                            <li><label for="userEmail"><strong>E-mail address:</strong></label> <input type="email" value="{{ $user->email }}" name="email" id="userEmail" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </li>

                            <li><label for="oldPassword"><strong>Old Password:</strong></label> <input type="password" name="oldPassword" id="oldPassword" class="form-control">
                                @if ($errors->has('oldPassword'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('oldPassword') }}</strong>
                                </span>
                                @endif
                            </li>

                            <li><label for="newPassword"><strong>New Password:</strong></label> <input type="password" name="newPassword" id="newPassword" class="form-control">
                                @if ($errors->has('newPassword'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('newPassword') }}</strong>
                                </span>
                                @endif
                            </li>

                        </ul>
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="sideModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Success</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>@if(session('success'))
                                {{ session()->get('success') }}
                            @endif.</p>
                    </div>
                </div>


            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->

    <!-- Central Modal Medium Danger -->
    <div class="modal fade" id="sideModalDanger" tabindex="-1" role="dialog" aria-labelledby="errorLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Fail</p>

                    <button type="button" class="close" @click.prevent="dismissModal">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-exclamation-circle fa-4x mb-3 animated flash"></i>
                        <p>@if(session('fail'))
                                {{ session()->get('fail') }}
                            @endif.</p>
                    </div>
                </div>


            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Danger-->

@endsection

@push('scripts')
<script>
    $('.btn-edit').on('click', function () {
        $('.details').hide();
        $('.info-edit').show();
    });

    $('.btn-cancel').on('click', function () {
        $('.details').show();
        $('.info-edit').hide();
    });

    @if(session('success'))
        $('#sideModalSuccess').modal('show');
    @endif

    @if(session('fail'))
        $('.details').hide();
        $('.info-edit').show();
        $('#sideModalFail').modal('show');
    @endif

    @if($errors->any())
        $('.details').hide();
        $('.info-edit').show();
    @endif

</script>
@endpush