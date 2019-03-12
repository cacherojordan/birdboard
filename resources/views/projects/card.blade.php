<div class="card" style="height: 200px;">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ $project->path() }}">{{ $project->title }}</a>
        </h5>
        <p class="card-text text-black-50" aria-details="{{ $project->description }}">{{ str_limit($project->description) }}</p>
    </div>
    {{--<div class="card-footer bg-white">--}}
    {{--<a href="{{ $project->path() }}" class="card-link">View</a>--}}
    {{--</div>--}}
</div>