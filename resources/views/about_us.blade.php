@extends('main')
@section('title', 'О нас')
@section('content')
{!!\App\Models\Page::where('id', 2)->first()->content!!}
<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>

@endsection