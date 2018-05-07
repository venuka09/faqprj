@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Questions</h2>
        <p></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>USER ID</th>
                <th>BODY</th>
                <th>EDIT QUESTION</th>
                <th>GIVE ANSWER</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{$question->id}}</td>
                    <td>{{$question->user_id}}</td>
                    <td>{{$question->body}}</td>
                    <td><a class="btn btn-primary float-right"
                           href="{{ route('questions.edit',['id'=> $question->id])}}">
                            Here
                        </a>
                    </td>
                    <td><a class="btn btn-primary float-right"
                           href="{{ route('answers.create', ['question_id'=> $question->id])}}">
                            Answer Question
                        </a>
                    </td>

                </tr>
            @endforeach

        </table>
    </div>

@endsection