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
                        <label for="share_percentage">Share:</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="float" class="form-control" name="share_percentage" placeholder="Enter share percentage" required pattern="([0-9]|[1-9][0-9]|100)" minlength="1" maxlength="3">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="action">Action:</label>
                        <select name="action" class="form-control" required>
                            <option value="partial_buy">Partial buy</option>
                            <option value="buy">Buy</option>
                            <option value="partial_sell">Partial sell</option>
                            <option value="sell">sell</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="share_price">Share Price ($):</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="float" class="form-control" name="share_price" placeholder="Enter price" required pattern="[+-]?([0-9]*[.])?[0-9]+" minlength="1">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="float" class="form-control" name="share_price" placeholder="Enter price"> -->
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" placeholder="Enter date" required>
                        <small class="form-text text-muted">if no calander appears on your browser, type in Format: YYYY-MM-DD</small>
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