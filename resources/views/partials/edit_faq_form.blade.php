<div class="modal fade" id="edit_faq{{$question->id}}_form" tabindex="-1" role="dialog" aria-labelledby="edit_faq{{$question->id}}_form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Edit FAQ</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/update_faq/{{$question->id}}" method="POST" autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <label for="question">Question:</label>
                        <textarea class="form-control" name="question" placeholder="Enter question" required> {{$question->question}} </textarea>
                    </div>

                    <div class="form-group">
                        <label for="answer">Answer:</label>
                        <textarea class="form-control" name="answer" placeholder="Enter answer" required> {{$question->answer}} </textarea>
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>

    </div>
</div>