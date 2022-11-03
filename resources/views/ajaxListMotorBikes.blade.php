<div class="row row-cols-4">
    <input type="hidden" class="currentPage" value="{{$motorBikes->currentPage()}}">
    @forelse($motorBikes as $bike)
    <div class="col">
        <div class="row">
            <div class="col-4">
                <img src="{{$bike->model_image_url}}" loading="lazy" alt="Image Bike">
            </div>
            <div class="col-8">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="name" id="name">
                    <a class="text-decoration-none text-wrap" href="Javascript:void(0)">
                        <h6>&ensp;{{$bike->model_name." (".$bike->model_count.")"}}</h6>
                    </a>
                </div>
                <p>{{($bike->model_kakaku_min/10000)." 万円 - ".($bike->model_kakaku_max/10000)." 万円"}}</p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="row">
            <div class="col text-center"><strong>Empty</strong></div>
        </div>
    </div>
    @endforelse
</div><br>
<div class="d-flex justify-content-center">
    <button type="button" class="btnFindByModel btn btn-info"><i class="fa fa-search"></i>チェックした車両で検索 (最大10台)</button>
</div>
<br>