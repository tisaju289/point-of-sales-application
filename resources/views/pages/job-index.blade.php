<!-- resources/views/jobs/index.blade.php -->

<div class="row justify-content-center">
    <div class="col-xl-10">
        @foreach ($jobs as $job)
            <div class="single-job-items mb-30">
                <div class="job-items">
                    <div class="company-img">
                        <a href="{{ route('job.details', $job->id) }}"><img src="assets/img/icon/job-list1.png" alt=""></a>
                    </div>
                    <div class="job-tittle">
                        <a href="{{ route('job.details', $job->id) }}"><h4>{{ $job->title }}</h4></a>
                        <ul>
                            <li>{{ $job->company }}</li>
                            <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                            <li>${{ $job->salary_min }} - ${{ $job->salary_max }}</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link f-right">
                    <a href="{{ route('job.details', $job->id) }}">Full Time</a>
                    <span>{{ $job->created_at->diffForHumans() }}</span> <!-- Assuming 'created_at' column exists -->
                </div>
            </div>
        @endforeach
    </div>
</div>
