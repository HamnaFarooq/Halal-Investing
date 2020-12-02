<div class="modal fade" id="add_to_portfolio_form" tabindex="-1" role="dialog" aria-labelledby="add_to_portfolio_form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Add to Portfolio</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/portfolio" method="POST" autocomplete="off">
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
                        <label for="action">Action:</label>
                        <select name="action" class="form-control" required>
                            <option value="buy">buy</option>
                            <option value="sell">sell</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="share_price">Share Price ($):</label>
                        <input type="float" class="form-control" name="share_price" placeholder="Enter price" required>
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