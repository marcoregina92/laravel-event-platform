@extends('layouts.admin')


@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="text-center">Events</h1>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>

                @foreach ($events as $event)
                    <div class="col-md-4 py-2">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text"> {{ $event->description }}</p>
                                <p class="card-text"> {{ $event->city }}</p>
                            </div>
                            <h6 class="card-subtitle mb-2 text-muted pt-2">
                                @if (count($event->tags) > 0)
                                    <ul>
                                        @foreach ($event->tags as $tag)
                                            <li> #{{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-center">No Tag #</p>
                                @endif
                            </h6>
                            <div class="col-4 d-flex justify-content-center py-1">
                                <a class="btn btn-outline-info text-body"
                                    href="{{ route('admin.events.edit', $event->id) }}">Modifica</a>
                            </div>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete">
                            </form>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </body>

    </html>
@endsection
