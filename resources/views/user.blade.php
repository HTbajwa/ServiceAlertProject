@extends("layouts.master")
@section("title")
User Dashboard
@endsection
@section("content")

@include('pages.userServices')
@endsection
@section("foot")
@service app User
@endsection