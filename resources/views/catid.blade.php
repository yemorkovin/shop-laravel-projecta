@extends('main')
@section('title', "Каталог")
@section('content')
<div class="category-links">
  <div class="container d-flex">
  @foreach(\App\Models\Cat::all() as $ct)
     <a href='/cat/{{$ct->id}}' apple-ipad="" ipad-10="" "="" class="d-flex align-center direction-column justify-center">
      <img src="/storage/{{$ct->img}}" alt="{{$ct->title}}" class="img-responsive">
      <span class="p12 regular">{{$ct->title}}</span>
    </a>
@endforeach
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
                                                                      </div>
</div>
<div class="container">
  <div class="d-flex column-row">
  
  
  <div id="content">
    <ul class="breadcrumb">
              <li><a href='/'>Home</a></li>
              <li><a href='/cat/{{$cat_one->id}}'>{{$cat_one->title}}</a></li>
          </ul> 
    <h1>{{$cat_one->title}}</h1>
    
          <div class="filter-sort mar-bot d-flex align-center justify-between">
         <!--<div class="filter" data-toggle="offcanvas"><i class="icon-filter"></i><span>Фильтр</span></div>
       <div class="sort">
          <b class="hidden-xs">Сортировать:</b>
          <select id="input-sort" onchange="location = this.value;">
                                          <option value="/cat/{{$cat_one->id}}?order=ASC">по умолчанию</option>
                                                        <option value="/cat/{{$cat_one->id}}?order=ASC" @if(isset($_GET['order']) and ($_GET['order'] == 'ASC')) selected="selected" @endif>по возрастанию цены</option>
                                                        <option value="/cat/{{$cat_one->id}}?order=DESC" @if(isset($_GET['order']) and ($_GET['order'] == 'DESC')) selected="selected" @endif>по убыванию цены</option>
                                    </select>
        </div>
        <div class="limit hidden-md">
          <b class="hidden-xs">Показывать:</b>
          <select id="input-limit" onchange="location = this.value;">
                                          <option value="/cat/{{$cat_one->id}}/?limit=25" @if(isset($_GET['limit']) and ($_GET['limit'] == 25)) selected="selected" @endif>25</option>
                                                        <option value="/cat/{{$cat_one->id}}/?limit=30" @if(isset($_GET['limit']) and ($_GET['limit'] == 30)) selected="selected" @endif>30</option>
                                                        <option value="/cat/{{$cat_one->id}}/?limit=50" @if(isset($_GET['limit']) and ($_GET['limit'] == 50)) selected="selected" @endif>50</option>
                                                        <option value="/cat/{{$cat_one->id}}/?limit=75" @if(isset($_GET['limit']) and ($_GET['limit'] == 75)) selected="selected" @endif>75</option>
                                                        <option value="/cat/{{$cat_one->id}}/?limit=100"@if(isset($_GET['limit']) and ($_GET['limit'] == 100)) selected="selected" @endif>100</option>
                                    </select>
        </div>
      </div>-->
        

    
          <div class="product-row d-grid lg-col-3 md-col-3 sm-col-3 xs-col-2">
		  @foreach($pr_cats as $ff)
                  <div class="product-layout product-grid">
            
			<div class="product-thumb">

                              <div class="sticker">
							   @if($ff->novinki == 1)
                                   <div class="xd_sticker_0">Новинка</div>
							   @endif
							   @if($ff->other_country == 1)
                                  <div class="xd_sticker_5">Для разных стран</div>
							  @endif
                              </div>
           
           <div class="image relative">
           	<button type="button" class="btn-wishlist btn-default" data-product_id="{{$ff->id}}" title="В избранное" onclick="customWushlistCompare.wishlist.add('{{$ff->id}}');"><i class="icon-heart"></i></button>
           	<a href='/product/{{$ff->id}}' apple-ipad-9-2021-64gb-wi-fi-silver"="">
           		<img src="/storage/{{$ff->img}}" alt="{{$ff->title}}" title="{{$ff->title}}" class="lazy img-responsive entered loaded" data-ll-status="loaded">
           	</a>
           </div>

          <div class="caption">
          	<div class="block1 d-flex justify-between align-end">
          		          			<div class="price">
          				          					{{$ff->price}} {{setting('site.valuta')}}           				          			</div>
          		          	</div>
          	<div class="block2 d-flex justify-between align-center p13">
          		<span class="art">Артикул: {{$ff->id}}</span>
          		          			<span class="stock green">{{$ff->nalich}}</span>
          		          	</div>
          	<div class="name"><a apple-ipad-9-2021-64gb-wi-fi-silver"="">{{$ff->title}}</a></div>
<!--BOF Product Series-->
						<!--EOF Product Series-->
          	<div class="button-group d-flex justify-between">
          		          		<button type="button" class="btn-cart " data-product_id="{{$ff->id}}" onclick="cartindex('{{$ff->id}}');"><i class="icon-handbag"></i><span>{{setting('site.cart_txt')}}</span></button>
          		          	</div>
          </div>
        </div>
		
      </div>
@endforeach
</div>


</div>
</div>
</div>
<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>
</div>
@endsection