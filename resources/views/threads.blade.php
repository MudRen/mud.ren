@extends('layouts.livewire')

@section('title', 'mudRen社区文章列表')

@section('content')
    <h2 class="text-center mt-3">mudRen社区 - 你要找的都在这里</h2>
    <hr>
    <livewire:threads />
@endsection
