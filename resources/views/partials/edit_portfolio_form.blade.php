<div class="modal fade" id="edit_portfolio{{$share->id}}_form" tabindex="-1" role="dialog" aria-labelledby="edit_portfolio_form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Edit Portfolio</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/update_portfolio/{{ $share->id }}" method="POST" autocomplete="off">
                    @csrf


                    <div class="form-group">
                        <label for="company_name">Company Name:</label>
                        <input type="text" class="form-control" name="company_name" placeholder="Enter company name" value="{{ $share->company_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="share_percentage">Share:</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="float" class="form-control" name="share_percentage" placeholder="Enter share percentage" value="{{ $share->share_percentage }}" required pattern="([0-9]|[1-9][0-9]|100)" minlength="1" maxlength="3">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="action">Action:</label>
                        <select name="action" class="form-control" required>
                            <option value="buy" {{ ($share->action == 'partial_buy' ? "selected":"") }} >Partial buy</option>
                            <option value="buy" {{ ($share->action == 'buy' ? "selected":"") }} >buy</option>
                            <option value="sell" {{ ($share->action == 'partial_sell' ? "selected":"") }} >Partial sell</option>
                            <option value="sell" {{ ($share->action == 'sell' ? "selected":"") }} >sell</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="share_price">Share Price ($):</label>
                        <input type="float" class="form-control" name="share_price" placeholder="Enter price" value="{{ $share->share_price }}" required required required pattern="[+-]?([0-9]*[.])?[0-9]+" minlength="1">
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" placeholder="Enter date" value="{{ $share->date }}" required>
                        <small class="form-text text-muted"> if no calander appears on your browser, type in Format: YYYY-MM-DD </small>
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