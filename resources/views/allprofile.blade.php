@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Profiles</h2>
        <p></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>USER ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>BODY</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{$profile->id}}</td>
                    <td>{{$profile->user_id}}</td>
                    <td>{{$profile->fname}}</td>
                    <td>{{$profile->lname}}</td>
                    <td>{{$profile->body}}</td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection