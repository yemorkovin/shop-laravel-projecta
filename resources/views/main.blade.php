
<!DOCTYPE html>

<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="description" content="{{setting('site.description')}}" />
  <meta property="og:title" content="@yield('title')" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <link rel="shortcut icon" href="/storage/{{setting('site.favicon')}}" type="image/x-icon">
  <meta property="og:site_name" content="{{setting('site.title')}}" />
  <link href="/css/main.min.css?v=1714318253" rel="stylesheet">
  <link href="/css/style.min.css?v=1714318253" rel="stylesheet">
  <script src="/js/jquery-2.1.1.min.js"></script>
  <script src="/js/buyoneclick.js" type="text/javascript"></script>
  <link href="/css/photobox.css" type="text/css" rel="stylesheet" media="screen" />
      <script src="/js/jquery.photobox.js"></script>
						<script>
							function clickAnalytics(){
								console.log('clickAnalytics');
																								return true;
							}
							function clickAnalyticsSend(){
								console.log('clickAnalyticsSend');
																								
								return true;
							}		
							function clickAnalyticsSuccess(){
								console.log('clickAnalyticsSuccess');
																									
								return true;
							}								
						</script>						
						<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = "{{ setting('site.SMARTUP_KEY') }}";
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
<style>
	@if(setting('site.font_main') !== null)
	
		@font-face {
		  font-family: "Temp";
		  src: url("/storage/{!!json_decode(setting('site.font_main'), true)[0]['download_link']!!}");
		}
		body{
			font-family: "Temp" !important;
		}
	@endif
</style>																	
				            
</head>
<body class="common-home">
 

    <div class="top">
      <div class="container d-flex justify-between align-center">
        
        <ul class="top-links list-inline">
                  <li><a href="/dostavka">{{setting('site.link_1')}}</a></li>
                  <li><a href="/about_us">{{setting('site.link_2')}}</a></li>
                  <li><a href="/faq">{{setting('site.link_3')}}</a></li>
                 
       </ul>
       <div class="phone">
         <a href="tel:{{setting('site.phone_header')}}" class="kelson bold">{{setting('site.phone_header')}}</a>
       </div>
     </div>
   </div>

   <!-- nav top -->
   <header>
    <div class="container d-flex justify-between align-center">
      <div class="mob-menu w100 d-flex align-center flex-1">
        <div class="burger p20"><i class="icon-menu"></i></div>
      </div>
      <div class="first d-flex align-center flex-1">
        <div id="logo">
                              <a href="/"><img src="/storage/{{setting('site.logo')}}" title="{{setting('site.title')}}" alt="{{setting('site.title')}}" class="img-responsive" /></a>
                            </div>
        <div class="menu">
            <ul class="menu-list list-inline">
                
				@foreach(\App\Models\Cat::all() as $c)
				<li class="menu-list_item">
					<div class="item d-flex align-center justify-between" onclick='window.location.href = "/cat/{{$c->id}}";'>
						<a href="/cat/{{$c->id}}">{{$c->title}}</a>
						
					</div>			
				</li>
				@endforeach
                    							
												<li class="menu-list_item" onclick='window.location.href = "/about_us";'>
                <div class="item">
                    <a href="/about_us" >{{setting('site.link_2')}}</a>
                </div>
            </li>
                        <li class="menu-list_item" onclick='window.location.href = "/dostavka";'>
                <div class="item">
                    <a href="/dostavka" >{{setting('site.link_1')}}</a>
                </div>
            </li>
			 <li class="menu-list_item" onclick='window.location.href = "/faq";'>
                <div class="item">
                    <a href="/faq" >{{setting('site.link_3')}}</a>
                </div>
            </li>
                        
                        
        </ul>
                <div class="visible-sm">
            <div class="menu-info d-flex direction-column">
                <!-- <div class="address semiBold mar-bot">Магазин в Москве</div> -->
                <div class="menu-info-links d-flex direction-column">
				@foreach(\App\Models\Menumobila ::all() as $c)
                    <a href="{{$c->link}}"><i class="{{$c->icon}}"></i> {{$c->txt}}</a>
					@endforeach
                   
					
                    @foreach(\App\Models\Top::all() as $c)
                    <a href="{{$c->link}}" target="_blank"><i class="{{$c->icon}}"></i> {{$c->txt}}</a>
					@endforeach
				</div>
            </div>
        </div>
</div>      </div>
      <div class="last d-flex justify-end align-center">
       
                <div id="cart" class="btn-group btn-block">
  <button type="button" onclick='ajaxloadcart()' data-loading-text="Загрузка..." data-toggle="modal" data-target="#cart-popup" class="pointer no-style relative p20 d-flex align-start justify-center" title="Корзина" id='clicl_cart'>
    <i class="icon-bag"></i>
      </button>
  <div class="modal fade" id="cart-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">{{setting('site.cart_title')}}</div>
          <button class="close" type="button" data-dismiss="modal"><i class="icon-close"></i></button>
        </div>
        <div class="modal-body" id='block_ff'>
					

        </div>
      </div>
    </div>
  </div>
</div>        <div class="search absolute"><div id="search" class="input-group d-flex justify-between align-center">	
	<input type="text" name="search" value="" placeholder="Поиск товаров" />
	<button type="button">
		<i class="icon-search"></i>
	</button>
</div></div> 
      </div>
    </div>
  </header> 

@yield('content')
<footer>
  <div class="footer-row-one">
    <div class="container d-flex justify-between align-center">
      <div class="col1">
        <div class="title p20 semiBold mar-bot">{{setting('site.txt_footer')}}</div>
        <div class="phones d-flex align-center">
          <a href="tel:{{setting('site.phone_footer')}}" class="p24 bold kelson">{{setting('site.phone_footer')}}</a>
          <!-- <a href="tel:74957730104" class="p24 bold kelson">+7 (495) 773-01-04</a> -->
        </div>
      </div>
      <div class="col2">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer-row-two d-grid lg-col-4 sm-col-2 xs-col-2">
      <div class="item one">
        <h5>{{setting('site.link_4')}}</h5>
                <ul class="list-unstyled">
					@foreach(\App\Models\Cat::all() as $ap)
                       <li>
							<a href="/cat/{{$ap->id}}">{{$ap->title}}</a>
					  </li>
					@endforeach
             
                            </ul>
              </div>
      <div class="item two">
        <h5>{{setting('site.link_5')}}</h5>
        <ul class="list-unstyled">
          <li><a href="/dostavka">{{setting('site.link_1')}}</a></li>
          <li><a href="/about_us">{{setting('site.link_2')}}</a></li>
       
        </ul>
      </div>
      <div class="item three">
        <h5>{{setting('site.link_6')}}</h5>
        <ul class="list-unstyled">
          <li><a href="faq">{{setting('site.link_7')}}</a></li>
        </ul>
      </div>
      <div class="item four">
        <h5>{{setting('site.link_8')}}</h5>
        <div class="open p12">{!!setting('site.time_work')!!}</div>
        <div class="messenger d-flex direction-column">
		@foreach(\App\Models\Top::all() as $c)
          <a href="{{$c->link}}" class="d-flex align-center"><i class="{{$c->icon}} p24"></i>{{$c->txt}}</a>
        @endforeach
		</div>
        <div class="email">
          <a href="mailto:{{setting('site.email_footer')}}">{{setting('site.email_footer')}}</a>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="container d-flex justify-between align-center">
      <span>{{setting('site.copyright')}}</span>
     
    </div>
  </div>

<span class="vcard">
<span class="fn org"><span class="value-title" title="DM Market"></span></span>
<span class="org"><span class="value-title" title="DM Market"></span></span>
<span class="url"><span class="value-title" title=""></span></span>
<span class="adr">
<span class="locality"><span class="value-title" title="Москва, Россия"></span></span>
<span class="street-address"><span class="value-title" title="ул. Барклая, д.8, БЦ «Рубин»"></span></span>
<span class="postal-code"><span class="value-title" title="012345"></span></span>
</span>
<span class="geo">
<span class="latitude"><span class="value-title" title="55.741640"></span></span>
<span class="longitude"><span class="value-title" title="37.501797"></span></span>
</span>
<span class="tel"><span class="value-title" title="+7-985-555-55-56"></span></span>
<span class="tel"><span class="value-title" title="+7-495-773-01-04"></span></span>
<span class="photo"><span class="value-title" title="https://dmmarket.ru/image/catalog/data/dm_logo_white_v2.svg"></span></span>
</span>
<!--microdatapro 7.8 company end [hCard ] -->
</footer>

            <!-- Added by Custom WishList & Compare modificator -->
           <script>
           customWushlistCompare_text = {
               'button_wishlist': 'В избранное',
               'button_compare': 'Добавить в сравнения',
               'button_remove_wishlist': 'Удалить из избранных',
               'button_remove_compare': 'Удалить из сравнения',
               'button_cart': 'В корзину',
               'button_cart_small': 'В корзину',
               'button_cart_plus': 'В корзине',
               'button_cart_small_plus': 'В корзине',
           }
           </script>
            <!-- end content added by Custom WishList & Compare modificator -->
            
<div class="modal fade" id="callback-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Заказать звонок</div>
                <button class="close" type="button" data-dismiss="modal"><i class="icon-close"></i></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data"  method="post" id="callback-form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name_1" placeholder="Имя*" name="nameCB" required="" x-autocompletetype="nameCB">
                    </div>
                    <div class="form-group mar-top">
                        <input type="text" class="form-control" id="phone_1" placeholder="Номер телефона*" name="phoneCB" required="" x-autocompletetype="phoneCB">
                    </div>
                    <div class="but">
                        <button class="btn-popup d-inline pointer" type="submit" id="submitFF">Отправить</button>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-form">
    <div class="container">
        <div class="max-width">
            <div class="image d-flex align-center justify-center"><i class="icon-check absolute"></i></div>
            <div class="caption">
                <div class="name">
                    <div class="semiBold">Спасибо за ваше обращение!</div>
                    <span>Мы перезвоним вам в ближайшее время.</span>
                </div>
                <div class="buttons hidden-xs">
                    <button type="button" data-dismiss="alert"><i class="icon-close"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.3/dist/lazyload.min.js"></script>
<script>
  var lazyLoadInstance = new LazyLoad({
  });
</script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/common.min.js?v=1714318253"></script>
<script src="/js/swiper.min.js"></script>
<script src="/js/custom_wishlist.min.js"></script>
<script src="/js/preorder.js?v=1714318253"></script>
<script src="/js/jquery.progroman.autocomplete.js"></script>
<script src="/js/jquery.progroman.citymanager.js"></script>
<script src="/js/jquery.inputmask.bundle.min.js"></script>

									<div id="boc_order" class="modal fade">
					</div>
					<div id="boc_success" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<div class="text-center"><h4>Спасибо за Ваш заказ!<br />Мы свяжемся с Вами в самое ближайшее время.</h4></div>
								</div>
							</div>
						</div>
					</div>
					<script>
					function customWushlistCompare(id){
						$.ajax({
							url: '/ajaxupdatewush',
							method: 'post',
							dataType: 'html',
							data: {'_token':'{{csrf_token()}}','id':id },
							success: function(data){
								//$('#block_ff').html(data);
							}
						});
					}
					function ajaxloadcart(){
						
						$.ajax({
							url: '/ajaxupdatecart',
							method: 'post',
							dataType: 'html',
							data: {'_token':'{{csrf_token()}}' },
							success: function(data){
								$('#block_ff').html(data);
							}
						});
					}
					function countCart(){
							$.ajax({
									url: '/countcart',
									method: 'post',
									dataType: 'html',
									data: {'_token':'{{csrf_token()}}'},
									success: function(data_3){
									if(data_3 > 0){
										$('#cart-total').remove();

										$('.icon-bag').after('<span id="cart-total"><span class="count_cart">'+data_3+'</span></span>');
									}else{
										$('#cart-total').remove();

									}
								}
								
							});
						}
					function cartindex(id){
							$.ajax({
								url: '/addcartproduct',
								method: 'post',
								dataType: 'html',
								data: {'_token':'{{csrf_token()}}',id:id},
								success: function(data_1){
									countCart();
									ajaxloadcart();
									$('#clicl_cart').click();
								}
							});
							
							
						}
						function cartindex1(id){
							$.ajax({
								url: '/addcartproduct',
								method: 'post',
								dataType: 'html',
								data: {'_token':'{{csrf_token()}}',id:id},
								success: function(data_1){
									countCart();
									ajaxloadcart();
									//$('#clicl_cart').click();
								}
							});
							
							
						}
						
						function customWushlistCompare_cart_delete(id){
							$.ajax({
								url: '/deletecart',
								method: 'post',
								dataType: 'html',
								data: {'_token':'{{csrf_token()}}',id:id },
								success: function(data_1){
									
									ajaxloadcart();
									countCart();
								}
							});
						}
						countCart();
						ajaxloadcart();
						function quantity_top_inc(id){
							$.ajax({
								url: '/addcartproduct',
								method: 'post',
								dataType: 'html',
								data: {'_token':'{{csrf_token()}}',id:id},
								success: function(data_1){
									
								}
							});
							ajaxloadcart();
						}
						
						
						$('#submitFF').on('click', function(e){
							e.preventDefault();
							let name = $('#name_1').val();
							let phone = $('#phone_1').val();
							$.ajax({
								url: '/addobr',
								method: 'post',
								dataType: 'html',
								data: {'_token':'{{csrf_token()}}',name:name, phone:phone},
								success: function(data_10){
									if(data_10 == 1)
									$('#callback-form').html('Заявка отправлена!');
								}
							});
						});
						
						
						
						function quantity_top_inc1(id){
							$.ajax({
								url: '/addcartproductid',
								method: 'post',
								dataType: 'html',
								data: {'_token':'{{csrf_token()}}',id:id},
								success: function(data_1){
									
								}
							});
							ajaxloadcart();
						}
						
						</script>
						<script src="/js/jquery.mask.min.js" type="text/javascript"></script>
						<script>
							$('#phone_1').mask('+7(000)000-00-00');
							$('#phoneCB').mask('+7(000)000-00-00');
							$('#phoneCBFF').mask('+7(000)000-00-00');
						</script>

			<link href="/css/getcity.css" rel="stylesheet">
			<script src="/js/getcity.js" type="text/javascript"></script>
			<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>
<script>
$('.semiBold').next().hide();
let d1 = false;
$('.semiBold').on('click', function(){
	if(d1 == false){
		$(this).next().show();
		d1=true;
	}else{
		$(this).next().hide();
		d1=false;
	}
});
</script>
</body>
</html>