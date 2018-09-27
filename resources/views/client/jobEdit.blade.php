@extends('client.home')

@section('userContent')
<clientjob-edit     :job_categories="{{ json_encode($categories) }}"
                    :job_regions="{{ json_encode($regions) }}"
                    :job_experiencelevels = "{{ json_encode($experienceLevels) }}"
                    :job_educationlevels = "{{ json_encode($educationLevels) }}"
                    :job_employmenttypes = "{{ json_encode($educationLevels) }}"
                    :jobad="{{ json_encode($jobAd) }}"
></clientjob-edit>
@endsection