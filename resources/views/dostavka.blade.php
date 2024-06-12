@extends('main')
@section('title', 'О нас')
@section('content')
{!!\App\Models\Page::where('id', 1)->first()->content!!}
<style>

</style>
<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>

@endsection