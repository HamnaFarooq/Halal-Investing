<div class="modal fade" id="request_research_form" tabindex="-1" role="dialog" aria-labelledby="request_research_form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Request Research</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/request_research" method="POST" autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <label for="company_name">Company Name:</label>
                        <input type="text" class="form-control" name="company_name" placeholder="Enter company name" required>
                    </div>

                    <div class="form-group">
                        <label for="sector">Sector:</label>
                        <input type="text" class="form-control" name="sector" placeholder="Enter sector" required>
                    </div>

                    <div class="form-group">
                        <label for="expected_by">Expected by:</label>
                        <input type="date" class="form-control" name="expected_by" placeholder="Enter date" required>
                        <small class="form-text text-muted">if no calander appears on your browser, type in Format: YYYY-MM-DD</small>
                    </div>

                    <div class="form-group">
                        <label for="request">Request:</label>
                        <textarea class="form-control" name="request" placeholder="Enter any thing you might want to add to the request"> </textarea>
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