@extends('layouts.admin')

@section('content')
    <form action=" {{ route('admin.events.update', $event->id) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome Evento</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Città</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>

        <div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <select multiple name="tags[]" id="" class="form-select">
                <option value="">nessun tag</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Modifica</button>
    </form>
@endsection
