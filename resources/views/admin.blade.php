@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Solution Console</div>

                <div class="card-body">
               
                    <div class="form-control" id="preview">
                    $ \textbf{Preview} $</div>

                     <form action="/action_page.php" id="questionSolution">

                      <div class="form-group">
                        <label for="question">Question : </label>
                        <input type="question" class="form-control" id="question">
                      </div>

                      <div class="form-group">
                        <label for="answer">Answer :</label>
                       <textarea id="answer" name="answer" id="answer" class="form-control"></textarea>
                      </div>
                     <div class="form-group">
                        <label for="summary">Summary :</label>
                       <textarea id="summary" name="summary" id="summary" class="form-control"></textarea>
                    </div>
<input type="hidden" name="post_id" id="post_id" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="short_discription ">Short Discription :</label>
                       <textarea name="short_discription" id="short_discription" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="keywords">Keywords :</label>
                       <input type="text" name="keywords" class="form-control" id="keywords"></textarea>

                    </div>

                     
                      <input type="submit" class="btn btn-default">Submit</button>
                    </form> 

                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
var answer; 
var summary; 
//Summer Note Begin
$('#answer').summernote({
  callbacks: {
    onChange: function(contents, $editable) {
     makePreview(contents);
     answer = contents;
      $('#preview').html(contents);
    }
  }
});

$('#summary').summernote({
  callbacks: {
    onChange: function(contents, $editable) {
        summary = contents;
     makePreview(contents);
      $('#preview').html(contents);
    }
  }
});

function makePreview($value) {
    input = $value.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    $('#preview').html("$$" + input + "$$");
    MathJax.Hub.Queue(["Typeset", MathJax.Hub, "preview"]);
  }

// summernote.change
$('#summernote').on('summernote.change', function(we, contents, $editable) {
   
});//Summernote

//Form Submission
$('#questionSolution').on('submit', function(e) {
    e.preventDefault(); 

    var question =$('#question').val();
    var short_discription = $('#short_discription').val();
    var keywords = $('#keywords').val(); 
    var post_id = $('post_id').val();








 $.ajax({
           type: "POST",
           url: '/insertAnwser',
           data: {"question":question, "answer":answer, "summary":summary,"short_discription":short_discription,"keywords":keywords,"_token": "{{ csrf_token() }}"},
           success: function( msg ) {
               alert(msg);
           }
       });







 
   });


});




</script>
@endsection
