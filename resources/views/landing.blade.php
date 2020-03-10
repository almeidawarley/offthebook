@extends('layouts.app')

@section('content')
<div class = "container">
    <div class= "row">

        <!-- https://unsplash.com/photos/gUK3lA3K7Yo -->

        <div class= "col s6 m4">
            <div class= "card center">
                <div class= "card-image">
                    <img src= "{{ URL::asset('img/music.jpg') }}">
                    <span class= "card-title"><b> @lang('title.songs')</b></span>
                </div>
                <div class= "card-action">
                    <a href= "{{route('songs.index')}}" class = "cyan-text center-align"> @lang('button.list.songs') </a>
                </div>
            </div>
        </div>

        <!-- https://unsplash.com/photos/YG5l5XIZ76w -->

        <div class= "col s6 m4">
            <div class= "card center">
                <div class= "card-image">
                    <img src= "{{ URL::asset('img/themes.jpg') }}">
                    <span class= "card-title"><b> @lang('title.themes')</b></span>
                </div>
                <div class= "card-action">
                    <a href= "{{route('tags.index')}}" class = "cyan-text center-align"> @lang('button.list.themes')</a>
                </div>
            </div>
        </div>

        <!-- https://unsplash.com/photos/jLjfAWwHdB8 -->

        <div class= "col s6 m4">
            <div class= "card center">
                <div class= "card-image">
                    <img src= "{{ URL::asset('img/listings.jpg') }}">
                    <span class= "card-title"><b> @lang('title.listings')</b></span>
                </div>
                <div class= "card-action">
                    <a href= "{{route('listings.index')}}" class = "cyan-text center-align"> @lang('button.list.listings')</a>
                </div>
            </div>
        </div>

        <!-- https://unsplash.com/photos/D1Pa78SnrH0 -->

        <!--
        <div class= "col s6 m4">
            <div class= "card center">
                <div class= "card-image">
                    <img src= "{{ URL::asset('img/import.jpg') }}">
                    <span class= "card-title"><b> @lang('title.extsources') </b></span>
                </div>
                <div class= "card-action">
                    <a href= "#" class = "cyan-text center-align"> @lang('button.list.extsources')</a>
                </div>
            </div>
        </div>
        -->

    </div>
</div>
@endsection