@extends('layouts.app')

@section('content')

    <h2 class="mb-4">{{ $ad->title }}</h2>
<div class="row">
    <div class="col-lg-4 col-md-6 col-xs-11">
        <button id="favbtn" data-id="{{$ad->id}}" class="btn btn-sm btn-outline-primary was-validated {{ $is_favorite ? 'unfav' : 'fav' }}">{{ $is_favorite ? 'إزالة من المفضلة' : 'إضافة للمفضلة' }}</button>
        @include('partials.share_buttons')
        <div id="carouselIndicators" class="carousel slide">
            <!-- Inner -->
            <div class="carousel-inner">
                @foreach($ad->images as $image)
                    <div class="carousel-item @if($loop->first){{ 'active' }}@endif">
                        <img src="{{ asset('/storage/images/' . $image->image) }}">
                    </div>
                @endforeach
            </div>

            <!-- Indicator -->
            <div class="carousel-indicators">
                @foreach($ad->images as $image)
                    <img alt="thumbnail" class="img-thumbnail" src="{{ asset('/storage/images/thumbs/' . $image->image) }}" data-target="#carouselIndicators" data-slide-to="{{ $loop->index }}">
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-6 col-xs-11">
        <div class="card">
            <div class="card-body">
                <h4>تفاصيل الإعلان</h4>
                <p class="card-text">اسم المعلن: {{ $ad->user->name }}</p>
                <p class="card-text">الدولة: {{ $ad->country->name }}</p>
                <p class="card-text">السعر: {{ $ad->price }}</p>
                <h4>وصف الإعلان</h4>
                <p class="card-text">{{ $ad->details }}</p>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#favbtn').on('click', function () {
                var ad_id = $(this).data('id');
                // ad = $(this);
                var url='/ad/'+ad_id+'/favorite';

                if ($(this).hasClass('fav')){
                    url='/ad/'+ad_id+'/favorite';
                    btnclass = 'unfav';
                    text = 'إزالة من المفضلة';
                }
                else {
                    url='/ad/'+ad_id+'/unfavorite';
                    btnclass = 'fav';
                    text = 'إضافة للمفضلة';
                }

                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    url:url,
                    type:'post',
                    data:{
                        'ad_id':ad_id
                    },
                    success: function (response) {
                        $('#favbtn')
                            .removeClass('fav')
                            .removeClass('unfav')
                            .addClass(btnclass)
                            .html(text)

                    }
                });
            });
        });
    </script>


@endsection
