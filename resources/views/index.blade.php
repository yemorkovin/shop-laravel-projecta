@extends('main')
@section('title', setting('site.title'))
@section('content')
<style>
.advantage-item{
	width: 42%;
	margin: 10px 0px
}
.advantage{
	flex-wrap: wrap;
	align-items: center;
    justify-content: center;
}
</style>
<div class="container">
  <div class="slide-home radius-medium overflow">
    <div id="slideshow0" class="swiper">
        <div class="swiper-wrapper">
						@foreach(\App\Models\Slider::all() as $sl)
                        <div class="swiper-slide">
                                <a href="{{$sl->link}}">
									<picture>
										<source media="(min-width: 501px)" srcset="/storage/{{$sl->img}}">
										<img src="/storage/{{$sl->img}}" width="500" height="500"
											 alt="iPhone 15 Pro Max" class="img-responsive w100">
									</picture>
								</a>
                        </div>
						@endforeach
                        
					</div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var swiper = new Swiper("#slideshow0", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
        });
    });
</script>

<div class="advantage d-grid lg-col-4 xs-col-2">
	@foreach(\App\Models\Advantage::orderBy('sort')->get() as $f)

	<a href="{{$f->link}}" class="advantage-item d-flex align-center">
		<i class="{{$f->icon}} p24"></i>
		<div class="text p12 uppercase letter semiBold">{{$f->txt}}</div>
	</a>
	@endforeach
	
</div>
</div>
<div class="catalog d-grid lg-col-4 xs-col-2">

	@foreach(\App\Models\Cat::all() as $ct)
    <div class="catalog-item">
        <a href="/cat/{{$ct->id}}" class="d-flex direction-column justify-center align-center relative">
      <img src="/storage/{{$ct->img}}" alt="iPhone" class="img-responsive" />
      <div class="caption text-center">
        <div class="title p14 semiBold">{{$ct->title}}</div>
              </div>
    </a>
      </div>
    @endforeach
  </div>
<div class="container">
<div class="banner d-grid lg-col-2 xs-col-1 mar-top-medium">
@foreach(\App\Models\Product::where('pop', 1)->get() as $ff)
    <div class="banner-item d-flex direction-column justify-center align-center">
    
	<div class="caption text-center">
      <div class="title p18 semiBold">{{$ff->title}}</div>
            <a href="/product/{{$ff->id}}" class="btn p12 bold letter uppercase d-inline">{{$ff->txt_hit}}</a>    
          </div>
    <img src="/storage/{{$ff->img}}" alt="{{$ff->title}}" class="img-responsive" />
  </div>
  @endforeach
  @foreach(\App\Models\Product::where('new', 1)->get() as $ff)

    <div class="banner-item d-flex direction-column justify-center align-center">
    <div class="caption text-center">
      <div class="title p18 semiBold">{{$ff->title}}</div>
            <a href="/product/{{$ff->id}}" class="btn p12 bold letter uppercase d-inline">{{$ff->txt_nal}}</a>    
          </div>
    <img src="/storage/{{$ff->img}}" alt="{{$ff->title}}" class="img-responsive" />
  </div>
  @endforeach
  </div><div class="product-tabs mar-top-medium">
<div class="box-heading">{{setting('site.txt_index')}}</div>

<div class="tab-content mar-top">
  <div class="tab-pane active" id="tab-1">
    <div class="product-row d-grid lg-col-4 md-col-4 sm-col-2 xs-col-2 module">
  @foreach(\App\Models\Product::where('main', 1) ->orderBy('created_at', 'desc') ->take(4) ->get(); as $ff)
            <div class="product-layout product-grid">
            <div class="product-thumb">
                              <div class="sticker">
							  @if($ff->novinki == 1)
                                   <div class="xd_sticker_0">{{setting('site.new')}}</div>
							   @endif
							   @if($ff->other_country == 1)
                                  <div class="xd_sticker_5">{{setting('site.other_country')}}</div>
							  @endif
                              </div>
                      <div class="image relative">
     <button type="button" class="btn-wishlist btn-default" data-product_id="2685" title="В избранное" onclick="customWushlistCompare({{$ff->id}});"><i class="icon-heart"></i></button>
            <a href="/product/{{$ff->id}}">
              <img src="/storage/{{$ff->img}}" alt="{{$ff->title}}" title="{{$ff->title}}" class="lazy img-responsive" />
            </a>
           </div>

          <div class="caption">
            <div class="block1 d-flex justify-between align-end">
                              <div class="price">
							  {{$ff->price}} {{setting('site.valuta')}}                                  </div>
                          </div>
            <div class="block2 d-flex justify-between align-center p13">
              <span class="art">{{setting('site.artikul')}}: {{$ff->article}}</span>
                              <span class="stock green">{{$ff->nalich}}</span>
                          </div>
            <div class="name"><a href="/product/{{$ff->id}}">{{$ff->description}}</a></div>
            <div class="button-group d-flex justify-between">
                            <button type="button" onclick='cartindex({{$ff->id}})' id='button-cart_index' class="btn-cart " ><i class="icon-handbag"></i>
							<span>{{setting('site.cart_txt')}}</span></button>
                          </div>
          </div>
        </div>
      </div>
	  @endforeach
        
		  
		  </div>
  </div>

</div>
</div>
<div id="faq" class="faq mar-top-large" itemscope itemtype="https://schema.org/FAQPage">
  <div class="box-heading">{{setting('site.vopsos')}}</div>
  @foreach(\App\Models\Faq::all() as $sl)
    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <div class="title d-flex align-center p16 pointer semiBold" itemprop="name">{{$sl->title}} <i class="icon-down animation p12"></i></div>
    <div class="text" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">{{$sl->txt}}</div>
    </div>
  </div>
  @endforeach
   
  </div></div>
<div class="about mar-top-large">
	<div class="container">
	{!!setting('site.txt_main')!!}
	
	</div>
</div>
<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>


    @endsection