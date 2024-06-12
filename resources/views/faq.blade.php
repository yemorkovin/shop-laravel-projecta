@extends('main')
@section('title', 'FAQ')
@section('content')
{!!\App\Models\Page::where('id', 3)->first()->content!!}

	<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>

@endsection