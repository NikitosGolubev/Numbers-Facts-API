@extends('layouts.main')

@section('title', '404 PAGE NOT FOUND')
@section('page-description', 'Error response page')

@section('head-tags')
    <link rel="stylesheet" type="text/css" href="/{{ env('TEMPLATE_DIR') }}/css/main/pages/errors.css" />
@endsection

@section('main')
    <div class='error-response'>
        <div class='error-response__code'>404</div>
        <div class='error-response__message'>Not Found</div>
        <div class='error-response__link'>
        	<a href='/' class='link'>Return to main page</a>
        </div>
    </div>
@endsection

@section('footer', '')

@section('scripts', '')
