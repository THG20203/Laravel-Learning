<h2>{{ $job->title }}</h2>

<p>Congratulations! Your job is now live on our website.</p>

<p>
    <!-- Keep in mind when the user receives this email, they're not on this website, so I need to provide the
    full URL, hence {{ url("/jobs/" . $job->id) }} -->
    <a href="{{ url('/jobs/' . $job->id) }}">View Your Job Listing</a>
</p>
