@extends('client.home')

@section('userContent')
<h2 class="blue-grey-text">Jobs</h2>
<section id="jobs" class="mt-5">
    @if(count($jobs))
    <div class="col-md-8 card">

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($jobs as $index => $job)
                        <tr>
                            <th scope="row">{{ ++$index }}</th>
                            <td>{{ $job->title }}</td>
                            <td>
                                <a class="blue-text pr-2" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-user"></i></a>
                                <a class="teal-text pr-2" data-toggle="tooltip" data-placement="top" title="Edit" href="/job-ads/{{ $job->id }}/edit"><i class="fa fa-pencil"></i></a>
                                <a class="red-text pr-2 delete" data-toggle="tooltip" data-placement="top" title="Remove" href="/job-ads/{{$job->id}}/delete"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
        @else
        <div class="row p-3 rgba-grey-light">
            <h1 class="white-text m-auto">You have no job listed yet</h1>
        </div>
    @endif


</section>
@endsection

@push('scripts')
<script>
    $('.delete').on('click', function () {
        return confirm('Are you sure?');
    })
</script>
@endpush