
{{--@extends('layuot')--}}

{{--<x-layout content="hello saasdaasdsadasdasdasd">--}}

{{--</x-layout>--}}
{{--component blade slot method --}}
{{----------------------------------------------------------------------------------------------------------------------------------------------}}
{{--<x-layout>--}}
{{--<x-slot name="content">--}}
{{--    @foreach($posts as $post)--}}

{{--        <article>--}}
{{--            <h1>--}}
{{--                <a href="posts/{{$post->slug}}">--}}
{{--                    {{$post->title}}--}}
{{--                </a>--}}
{{--            </h1>--}}
{{--            <br>--}}
{{--            <img src="{{$post->image}}" >--}}
{{--            <p>--}}
{{--                {{$post->excerpt}}--}}
{{--            </p>--}}
{{--        </article>--}}

{{--    @endforeach--}}
{{--</x-slot>--}}

{{--</x-layout>--}}
{{--***************************************************************************************************************--}}
{{--@section('my-header')--}}
{{--    <h1>page articals </h1>--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--@endsection--}}
{{--component blade without slot  method but we should put it in layout.blade.php  --}}
<x-layout>
    @foreach($posts as $post)

        <article>
            <h1>
                <a href="posts/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>
            <br>
{{--            <img src="{{$post->image}}" >--}}
            <p>
                {{$post->excerpt}}
            </p>
        </article>

    @endforeach
</x-layout>
