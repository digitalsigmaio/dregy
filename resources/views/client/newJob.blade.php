@extends('layouts.client')

@section('content')
<clientjob-new  :job_regions="{{ json_encode($regions) }}"
                :job_categories="{{ json_encode($categories) }}"
                :jobexperiencelevels="{{ json_encode($experienceLevels) }}"
                :jobeducationlevels="{{ json_encode($educationLevels) }}"
                :jobemploymenttypes="{{ json_encode($employmentTypes) }}"
                
></clientjob-new>
@endsection