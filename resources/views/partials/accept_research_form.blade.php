<div class="modal fade" id="accept_research{{$request->id}}_form" tabindex="-1" role="dialog" aria-labelledby="accept_research{{$request->id}}_form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Accept Research</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="/accept_request/{{$request->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="price">Research Price:</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="float" class="form-control" name="price" placeholder="Enter price" required pattern="[+-]?([0-9]*[.])?[0-9]+" minlength="1">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="float" class="form-control" name="share_price" placeholder="Enter price"> -->
                    </div>
                    <button type="submit" class="btn btn-primary"> Accept </button>
                </form>

            </div>

        </div>

    </div>
</div>