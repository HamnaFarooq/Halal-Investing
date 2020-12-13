<div class="modal fade" id="deliver_research{{$request->id}}_form" tabindex="-1" role="dialog" aria-labelledby="deliver_research{{$request->id}}_form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Deliver Research</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/complete_request/{{$request->id}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="comments">Research Link:</label>
                        <input type="text" class="form-control" name="comments" placeholder="Enter delivery link" required>
                    </div>
                    <button type="submit" class="btn btn-success"> Deliver </button>
                </form>

            </div>

        </div>

    </div>
</div>