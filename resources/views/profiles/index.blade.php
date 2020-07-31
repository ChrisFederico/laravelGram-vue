@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            <img class="rounded-circle w-100" src="{{ $user->profile->profileImage() }} "/>
        </div>
        <div class="col-md-9 p-5">
            <div class="row" id="nickname">
                <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center">
                        <div class="pr-3 font-weight-bold" style="font-size: 25px;">{{ $user->username }}</div>
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>                
                    @endcan
                </div>
            </div>

            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit your profile</a>
            @endcan

            <div class="row pt-3" id="general_data">
                <div class="col-md-4"><strong>{{ $user->profile->followers->count() }}</strong> Followers</div>
                <div class="col-md-4"><strong>{{ $user->following->count() }}</strong> Following</div>
                <div class="col-md-4"><strong>{{ $user->posts()->count() }}</strong> Posts</div>
            </div>
            <div class="row pt-3">
                <div class="col-md-12">
                <strong>{{ $user->profile->title }}</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">{{ $user->profile->description }}</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a href="#">{{ $user->profile->url ?? 'N/A' }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-12">
            POSTS/TAGGED
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-md-4 pb-4">
                <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection
