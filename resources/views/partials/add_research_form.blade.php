<div class="modal fade" id="add_research" tabindex="-1" role="dialog" aria-labelledby="add_research" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Add Research</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/research" method="POST" autocomplete="off">
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
                        <label for="type">Type:</label>
                        <select name="type" class="form-control" required>
                            <option value="free">Free</option>
                            <option value="paid">Paid</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="document">Document text:</label>
                        <textarea class="form-control" name="document" placeholder="Enter text" required> </textarea>
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