@extends('telebot::webapp')

@section('template')
    <h1>Hello, world!</h1>
@endsection

@push('scripts')
    <script>
        console.log('Hello, world!');
    </script>
@endpush

@push('styles')
    <style>
        h1 {
            color: red;
        }
    </style>
@endpush