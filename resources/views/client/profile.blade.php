@extends('client.home')

@section('userContent')
    <h2 class="blue-grey-text">Account Info</h2>
    <div class="col-md-6 offset-md-1 mb-1 mt-5">

        <div class="details">
            <div class="card">
                <div class="card-body">
                    <div class="btn-edit sky-gradient rounded-circle pl-2">
                        <i class="fa fa-pencil white-text pl-1"></i>
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
                        <i class="fa fa-times white-text pl-1"></i>
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

                            <li><label for="email"><strong>E-mail address:</strong></label> <input type="email" value="{{ $user->email }}" name="email" id="email" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </li>

                            <li><label for="oldPassword"><strong>Old Password:</strong></label> <input type="password" name="oldPassword" id="oldPassword" class="form-control"></li>

                            <li><label for="newPassword"><strong>New Password:</strong></label> <input type="password" name="newPassword" id="newPassword" class="form-control"></li>

                        </ul>
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
<script>
    $('.btn-edit').on('click', function () {
        $('.details').hide();
        $('.info-edit').show();
    })

    $('.btn-cancel').on('click', function () {
        $('.details').show();
        $('.info-edit').hide();
    })

</script>
@endpush