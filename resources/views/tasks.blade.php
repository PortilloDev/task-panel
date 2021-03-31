@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($tasks as $task )
                <div class="card mb-4">

                        @if ($task->image)
                            <img src="{{ $task->get_image }}" class="card-img-top">
                        @elseif ($task->iframe)
                            <div class="embed-responsive embed-responsive-16by9">
                                {!! $task->iframe !!}
                            </div>
                        @endif
                      <div class="card-body">
                        <h5 class="card-title"> {{ $task->title }}</h5>
                        <p class="card-text">
                            {{ $task->get_excerpt }}
                            <a href="{{ route('task', $task) }}">Leer más..</a>
                        </p>
                        <p class="text-muted mb-0">
                            <em>
                                &ndash; {{ $task->user->name }}
                            </em>
                            {{ $task->created_at->format('d M Y') }}
                        </p>
                      </div>
                </div>
            @endforeach
                {{$tasks->links() }}
        </div>
    </div>
</div>
@endsection
