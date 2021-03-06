@extends('layouts.app')

@section('title', 'Creating Quotes')

@section('content')
<div class="container">
    @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>

    @endif

    @if (session('msg'))
        <div class="alert alert-danger">
            <p> {{ session('msg') }} </p>
        </div>

    @endif

    <form method="POST" action="/quotes/{{ $quote->id }}">
        <div class="form-group">
            <label for="title">Judul</label>
            <input id="text" class="form-control" type="text" name="title"
                value="{{ (old('title')) ? old('title') : $quote->title }}" placeholder="Tulis judul di sini">
        </div>

        <div class="form-group">
            <label for="subject">Isi Kutipan</label>
            <textarea name="subject" class="form-control" id="" cols="30" rows="10"
                >{{ (old('subject')) ? old('subject') : $quote->subject }}</textarea>
        </div>

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-default btn-block">Edit Kutipan</button>
    </form>
        <p><a href="/quotes/{{ $quote->slug }}" class="btn btn-primary">Ga jadi hehe</a></p>
</div>
@endsection
