
@extends('layouts.answerHead')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @foreach ($questions as $question)

                  <div id="question"> Questions : {{$question -> questions }}</div>

                  <div id="answerno"> Answer : </div>

                  <div id="question"> Questions : {{$question -> summary}}</div>

                  <div id="answerno"> Summary : </div>
                  <div id="question"> Questions : {{ Storage::get($question -> 
                  summary)}}</div>


                @endforeach

              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
