@extends('masterview')
@section('filter')
<div class="container table table-bordered shadow rounded">
    <div class="row">
        <div class="col">

            <a class="text-decoration-none" href="Javascript:void(0)">
                <h6>
                    <p id="title-displayment">
                        [ 新車・中古バイク検索サイト モトサーチ ]> カテゴリ:

                        @if($categoryEnum) @if(empty($categoryEnum['title']))

                        {{$categoryEnum['name']}} @else {{$categoryEnum['title']}} @endif

                        @endif
                    </p>
                </h6>
            </a>
            <div class="row bg-light table table-bordered shadow-sm rounded ">
                <div class="col">
                    <strong>
                        <h4>
                            @if($categoryEnum && $totalModelBike) @if(empty($categoryEnum['title']))

                            {{$categoryEnum['name']}} {{$totalModelBike['total_model']}}車種({{$totalModelBike['total_bike']}}台)

                            @else {{$categoryEnum['title']}} {{$totalModelBike['total_model']}}車種({{$totalModelBike['total_bike']}}台) @endif

                            @else 0車種(0台) @endif
                        </h4>
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container table table-bordered shadow-sm rounded">
    検索したい車種の頭文字、排気量、メーカーより車種を絞り込めます。
    <input type="hidden" id="requestParams" data-init="{{$params}}">
    <div class="row">
        <div class="col-1 bg-light">
            <strong>頭文字:</strong>
        </div>
        <div class="col pagination flex-wrap">
            @foreach($motoKana as $mt_kana)
            <div class="page-item enabled" id="mt_kana_{{$mt_kana->no.'_'.$mt_kana->type}}">
                <a class="text-decoration-none page-link" href="{{route('search-page',['no' => $mt_kana->no, 'type' => $mt_kana->type])}}">{{$mt_kana->name}}</a>&ensp;
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-1 bg-light">
            <strong>英数字:</strong>
        </div>
        <div class="col pagination flex-wrap">
            @foreach($motoName as $mt_name)
            <div class="page-item enabled" id="mt_name_{{$mt_name->no.'_'.$mt_name->type}}">
                <a class="text-decoration-none page-link" href="{{route('search-page',['no' => $mt_name->no, 'type' => $mt_name->type])}}">{{$mt_name->name}}</a>&ensp;
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-1 bg-light">
            <strong>排気:</strong>
        </div>
        <div class="col pagination flex-wrap">
            @foreach($motoDisplacement as $mt_display)
            <div class=" page-item enabled" id="mt_display_{{$mt_display->key}}">
                <a class="text-decoration-none page-link" href="{{route('search-page',['key' => $mt_display->key])}}">{{$mt_display->name}}</a>&ensp;
            </div>
            @endforeach
        </div>

    </div>

    <div class="row">
        <div class="col-1 bg-light">
            <strong>メーカー:</strong>
        </div>
        @if($makerName)
        <div class="col pagination flex-wrap">
            @foreach($makerName as $mt_maker)
            <div class="makerSearch page-item enabled" id="mt_maker_{{$mt_maker->model_maker_code}}" data-init="{{$mt_maker}}">
                <a class="text-decoration-none page-link" href="{{route('search-page',['maker' => $mt_maker->model_maker_code])}}">{{$mt_maker->model_maker_hyouji}}</a>&ensp;
            </div>
            @endforeach
        </div>
        @else
        <div class="col"></div>
        @endif
    </div>
    
    <div class="d-flex justify-content-center">
        <a href="{{route('search-page')}}"><button type="button" class="btn btn-secondary">選択を解除する</button></a>
    </div>
    <br>
</div>
<div class="motorBikesList container table table-bordered shadow-sm rounded">

    <div class="row">
        <div class="col align-center">
            <div class="row bg-light table table-bordered shadow-sm rounded">
                <div class="col">
                    <strong>
                        <h4><span class="text-danger"><b>|</b></span>カテゴリ車種一覧</h4>
                    </strong>
                </div>
            </div>
        </div>
    </div>

    <p>※本ページの車両画像はイメージです。 年式や仕様により実際の車両と画像が異なる場合がありますので、詳細は販売店にご確認下さい。</p>

    <div class="modal fade" id="errorModalCenter" tabindex="-1" role="dialog" aria-labelledby="errorModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong class="text-danger align-center"></strong>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="totalPage" value="{{$motorBikes->lastPage()}}">

    @include('ajaxListMotorBikes')

</div>
@endsection
@section('script')
<script src="{{asset('js/filter.js')}}"></script>
@endsection