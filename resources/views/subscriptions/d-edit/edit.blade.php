@extends('layouts.app')
@section('content')

    <form method="POST" action="{{route('subscriptions.update', ['subscription' => $subscription->id])}}">

        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="title">Durata:</label>
            <input type="text" class="form-control" name="duration" placeholder="Durata in mesi"  value="{{ old('subscription', $subscription->duration) }}">
        </div>

        <div class="form-group">
            <label for="title">Prezzo:</label>
            <input type="text" class="form-control" name="price" placeholder="Prezzo" value="{{ old('subscription', $subscription->price) }}">
        </div>

        <button type="submit" class="btn btn-success">Salva</button>

    </form>
@endsection
