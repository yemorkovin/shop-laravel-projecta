@extends('main')
@section('title', $product->title)
@section('content')

<div class="product-info">
  <div class="container d-flex align-center">
    <button type="button" class="btn btn-wishlist btn-default" data-product_id="{{$product->id}}" title="В избранное" onclick="customWushlistCompare.wishlist.add('{{$product->id}}');">
      <i class="icon-heart"></i>
      <span>{{setting('site.izb')}}</span>
    </button>
        <span class="stock green">{{$product->txt_nal}}</span>
      </div>
</div>
<div class="container product-page">
  
<div id="content" class="d-flex flex-wrap">
  <div class="left flex-1">
          <div class="thumbnails d-flex">
                  <div class="photo-small">
				  @if(!is_null(json_decode($product->images_color)))
					@foreach(json_decode($product->images_color) as $key=>$imagePath)

							<a class="thumbnail" href="/storage/{{$imagePath}}" title="">
							<img src="/storage/{{$imagePath}}" width='80px' height='80px' title="" alt="" class="img-responsive"/>
						  </a>
					@endforeach
					@endif
                          
                      </div>
                          <div class="photo-big">
                          <div class="sticker">
						   @if($product->novinki == 1)
                                   <div class="xd_sticker_0">Новинка</div>
							   @endif
							   @if($product->other_country == 1)
                                  <div class="xd_sticker_5">Для разных стран</div>
							  @endif
						                               </div>
                        <a class="thumbnail" href="/storage/{{$product->img}}" title="{{$product->title}}">
              <img src="/storage/{{$product->img}}" itemprop="image" class="gallery-large_image img-responsive" title="{{$product->title}}" alt="{{$product->title}}" />
            </a>
          </div>
              </div>
     
  </div>
  <div class="right w100">
    <div id="product">
      <div class="block1 d-flex justify-between align-center">
        <div class="block-price">
                      <div class="price kelson p30">
                              <span class="price-new"><span class='autocalc-product-price'>{{$product->price}} {{setting('site.valuta')}}</span></span>
                          </div>
                    <!-- <span class="reward d-flex align-center"><i class="icon-bonus p20"></i>+100 баллов</span> -->
        </div>
       
      </div>
      
                      <div class="block-cart d-flex align-center justify-between">
            <div class="qty d-flex align-center justify-between kelson">
              <button type="button" id="minuse"><i class="icon-minus"></i></button>
              <input type="text" name="quantity" id="product_qty" value="1" readonly/>
              <button type="button" id="pluse" onclick='cartindex1({{$product->id}})'><i class="icon-plus"></i></button>
              <input type="hidden" name="product_id" value="2555" />
            </div>
            <script>  
              $(document).ready( function() {
                var pro_qty = $('#product_qty');
                function update_qty( data_qty ) {
                  pro_qty.val( parseInt( pro_qty.val(), 10 ) + data_qty );
                }
                $('#pluse').click( function() { update_qty( 1 );  } );
                $('#minuse').click( function() { if (pro_qty.val () > 0 ){update_qty( -1 ); } });
              });   
            </script>
            <button type="button" onclick="cartindex1({{$product->id}})" id="button-cart" data-loading-text="Загрузка..." class="p12 semiBold uppercase letter flex-1 text-center">{{setting('site.cart_txt')}}</button>
        </div>
                          <div class="attr d-grid">
            <div class="attr_title semiBold p15">Общие характеристики</div>
                
				{!!$product->full_text!!}
          </div>
		  <style>
		  .attr p{
			  display: block!important;
		  }
		  </style>
        

      </div>
    </div>
</div>

</div>


<div class="tab mar-top-large">
 
<div class="container">
  <div class="tab-content">
    <div class="tab-pane active" id="tab-description" itemprop="description"></div>
          <div class="tab-pane" id="tab-specification">
        <div class="attr d-grid">
                      <div class="attr_title semiBold p15">Общие характеристики</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Серия:</span>
                  <span class="flex-1"></span>
                  <span>iPad 9 (10.2&quot;) 2021</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Тип корпуса:</span>
                  <span class="flex-1"></span>
                  <span>Классический</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Наличие SIM:</span>
                  <span class="flex-1"></span>
                  <span>Нет</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Цвет:</span>
                  <span class="flex-1"></span>
                  <span>Серебристый</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Сертификация:</span>
                  <span class="flex-1"></span>
                  <span>Для разных стран</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Вес устройства:</span>
                  <span class="flex-1"></span>
                  <span>487 грамм</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Размеры:</span>
                  <span class="flex-1"></span>
                  <span>250.6x174.1x7.5 мм</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Память и процессор</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Процессор:</span>
                  <span class="flex-1"></span>
                  <span>A13 Bionic</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Объем встроенной памяти:</span>
                  <span class="flex-1"></span>
                  <span>64 Гб</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Экран</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Диагональ:</span>
                  <span class="flex-1"></span>
                  <span>10.2&quot;</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Автоматический поворот экрана:</span>
                  <span class="flex-1"></span>
                  <span>Есть</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Сила нажатия на экран:</span>
                  <span class="flex-1"></span>
                  <span>Есть</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Тип сенсорного экрана:</span>
                  <span class="flex-1"></span>
                  <span>Multitouch</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Мультимедийные возможности</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Geo Tagging:</span>
                  <span class="flex-1"></span>
                  <span>Есть</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Аудио:</span>
                  <span class="flex-1"></span>
                  <span>MP3, AAC, WAV, стереодинамики</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Фотовспышка:</span>
                  <span class="flex-1"></span>
                  <span>Есть, тыльная светодиодная</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Фотокамера:</span>
                  <span class="flex-1"></span>
                  <span>8 МП</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Фронтальная камера:</span>
                  <span class="flex-1"></span>
                  <span>12 МП</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Функции камеры:</span>
                  <span class="flex-1"></span>
                  <span>Автоматическая стабилизация изображения;фотосъёмка в режиме HDR;панорамная съемка;серийная съемка;режим таймера;привязка фотографий к месту съемки</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Максимальная частота кадров в видео:</span>
                  <span class="flex-1"></span>
                  <span>HD-видео 720p с частотой 120 кадров/﻿с;HD-видео 1080p с частотой 25 или 30 кадров/﻿с</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Питание</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Аккумулятор:</span>
                  <span class="flex-1"></span>
                  <span>Несъемный</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Тип аккумулятора:</span>
                  <span class="flex-1"></span>
                  <span>Li-Ion</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Тип разъема для зарядки:</span>
                  <span class="flex-1"></span>
                  <span>Lightning</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Корпус </div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Материал:</span>
                  <span class="flex-1"></span>
                  <span>Алюминий</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Дисплей</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Тип дисплея:</span>
                  <span class="flex-1"></span>
                  <span>IPS</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Разрешение:</span>
                  <span class="flex-1"></span>
                  <span>2160x1620</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Другие функции</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Датчики:</span>
                  <span class="flex-1"></span>
                  <span>Touch ID;трёхосевой гироскоп;акселерометр;барометр;датчик внешней освещённости</span>
                </div>
                          </div>
                      <div class="attr_title semiBold p15">Дополнительная информация</div>
            <div class="attr_list d-grid">
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Комплектация:</span>
                  <span class="flex-1"></span>
                  <span>Кабель Lightning/USB‑Cадаптер питания USB‑C мощностью 20 Вт</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Особенности:</span>
                  <span class="flex-1"></span>
                  <span>Идентификация по отпечатку пальца (Touch ID)</span>
                </div>
                              <div class="attr_item d-flex justify-between">
                  <span class="nowrap">Дата анонса:</span>
                  <span class="flex-1"></span>
                  <span>2021 год</span>
                </div>
                          </div>
                  </div>
      </div>
            <div class="tab-pane" id="tab-shipping"></div>
    <div class="tab-pane" id="tab-faq"><div id="faq" class="faq mar-top-large" itemscope itemtype="https://schema.org/FAQPage">
  <div class="box-heading">Часто задаваемые вопросы</div>
    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <div class="title d-flex align-center p16 pointer semiBold" itemprop="name">Какой режим работы у магазина? <i class="icon-down animation p12"></i></div>
    <div class="text" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">Время работы нашего магазина с 10:00 до 20:00 ежедневно без выходных</div>
    </div>
  </div>
    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <div class="title d-flex align-center p16 pointer semiBold" itemprop="name">Почему у вас дешевле, чем в других местах? <i class="icon-down animation p12"></i></div>
    <div class="text" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">На это несколько причин: работа напрямую с производителем без лишних посредников; большой товарооборот позволяет получать дополнительные привилегии от производителя; отсутствие арендных торговых площадей и шоу-румов в крупных ТЦ и на главных улицах; отсутствие рекламы на дорогих рекламных площадках; оптимизированный штат сотрудников; выполнение большинства рабочих задач своими силами без привлечения сторонних компаний; наличие собственных складов; гибкое ценообразование.</div>
    </div>
  </div>
    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <div class="title d-flex align-center p16 pointer semiBold" itemprop="name">Как и где можно получить консультацию по товарам, представленным на сайте? <i class="icon-down animation p12"></i></div>
    <div class="text" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">Консультацию можно получить в форме обратной связи на сайте, по телефону: +7-495-773-01-04, +7-900-999-00-00, а также в WhatsApp и Telegram +7-900-999-00-00.</div>
    </div>
  </div>
    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <div class="title d-flex align-center p16 pointer semiBold" itemprop="name">Какая гарантия на устройства? <i class="icon-down animation p12"></i></div>
    <div class="text" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">Гарантия по заводскому браку на все устройства, представленные на сайте - 7 дней с момента покупки, обращение по гарантийному обмену устройств с механическими повреждениями (сколы, царапины, потертости), обсуждаются ТОЛЬКО до активации устройства.</div>
    </div>
  </div>
  </div></div>
    <div class="tab-pane" id="tab-adv"></div>
    <div class="tab-pane" id="tab-deshevle"></div>
          <div class="tab-pane" id="tab-review">
                  <div class="productpage-review padding">
            <div class="container">
              <div class="review-head d-flex justify-between align-center">
                <div class="title p24 semiBold">Отзывы</div>
                <div class="rev-block d-flex align-center">
                  <div class="rev-btn p12 letter uppercase bold pointer" data-toggle="modal" data-target="#review-popup">Оставить отзыв</div>
                                  </div>
              </div>
              <div class="text">
                <div id="review"></div>
              </div>
            </div>
          </div>
              </div>
      </div>
<!--microdatapro 7.8 breadcrumb start [json-ld] -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [{
"@type": "ListItem",
"position": 1,
"item": {
"@id": "https://dmmarket.ru/",
"name": "Главная"
}
},{
"@type": "ListItem",
"position": 2,
"item": {
"@id": "https://dmmarket.ru/apple-ipad/",
"name": "iPad"
}
},{
"@type": "ListItem",
"position": 3,
"item": {
"@id": "https://dmmarket.ru/apple-ipad/ipad-9/",
"name": "iPad 9 (10.2 ) 2021"
}
},{
"@type": "ListItem",
"position": 4,
"item": {
"@id": "https://dmmarket.ru/apple-ipad-9-2021-64gb-wi-fi-silver",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)"
}
}]
}
</script>
<!--microdatapro 7.8 breadcrumb end [json-ld] -->
<!--microdatapro 7.8 product start [json-ld] -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "Product",
"url": "https://dmmarket.ru/apple-ipad-9-2021-64gb-wi-fi-silver",
"category": "iPad 9 (10.2 ) 2021",
"image": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_1-700x700.png",
"model": "02345",
"mpn": "02345",
"sku": "02345",
"description": "",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)",
"offers": {
"@type": "Offer",
"availability": "https://schema.org/InStock",
"price": "29990",
"priceValidUntil": "2025-05-01",
"url": "https://dmmarket.ru/apple-ipad-9-2021-64gb-wi-fi-silver",
"priceCurrency": "RUB",
"itemCondition": "https://schema.org/NewCondition"
},"additionalProperty":[
{
"@type": "PropertyValue",
"name": "Серия",
"value": "iPad 9 (10.2 ) 2021"
},{
"@type": "PropertyValue",
"name": "Тип корпуса",
"value": "Классический"
},{
"@type": "PropertyValue",
"name": "Наличие SIM",
"value": "Нет"
},{
"@type": "PropertyValue",
"name": "Цвет",
"value": "Серебристый"
},{
"@type": "PropertyValue",
"name": "Сертификация",
"value": "Для разных стран"
},{
"@type": "PropertyValue",
"name": "Вес устройства",
"value": "487 грамм"
},{
"@type": "PropertyValue",
"name": "Размеры",
"value": "250.6x174.1x7.5 мм"
},{
"@type": "PropertyValue",
"name": "Процессор",
"value": "A13 Bionic"
},{
"@type": "PropertyValue",
"name": "Объем встроенной памяти",
"value": "64 Гб"
},{
"@type": "PropertyValue",
"name": "Диагональ",
"value": "10.2 "
},{
"@type": "PropertyValue",
"name": "Автоматический поворот экрана",
"value": "Есть"
},{
"@type": "PropertyValue",
"name": "Сила нажатия на экран",
"value": "Есть"
},{
"@type": "PropertyValue",
"name": "Тип сенсорного экрана",
"value": "Multitouch"
},{
"@type": "PropertyValue",
"name": "Geo Tagging",
"value": "Есть"
},{
"@type": "PropertyValue",
"name": "Аудио",
"value": "MP3, AAC, WAV, стереодинамики"
},{
"@type": "PropertyValue",
"name": "Фотовспышка",
"value": "Есть, тыльная светодиодная"
},{
"@type": "PropertyValue",
"name": "Фотокамера",
"value": "8 МП"
},{
"@type": "PropertyValue",
"name": "Фронтальная камера",
"value": "12 МП"
},{
"@type": "PropertyValue",
"name": "Функции камеры",
"value": "Автоматическая стабилизация изображения;фотосъёмка в режиме HDR;панорамная съемка;серийная съемка;режим таймера;привязка фотографий к месту съемки"
},{
"@type": "PropertyValue",
"name": "Максимальная частота кадров в видео",
"value": "HD-видео 720p с частотой 120 кадров/﻿с;HD-видео 1080p с частотой 25 или 30 кадров/﻿с"
},{
"@type": "PropertyValue",
"name": "Аккумулятор",
"value": "Несъемный"
},{
"@type": "PropertyValue",
"name": "Тип аккумулятора",
"value": "Li-Ion"
},{
"@type": "PropertyValue",
"name": "Тип разъема для зарядки",
"value": "Lightning"
},{
"@type": "PropertyValue",
"name": "Материал",
"value": "Алюминий"
},{
"@type": "PropertyValue",
"name": "Тип дисплея",
"value": "IPS"
},{
"@type": "PropertyValue",
"name": "Разрешение",
"value": "2160x1620"
},{
"@type": "PropertyValue",
"name": "Датчики",
"value": "Touch ID;трёхосевой гироскоп;акселерометр;барометр;датчик внешней освещённости"
},{
"@type": "PropertyValue",
"name": "Комплектация",
"value": "Кабель Lightning/USB‑Cадаптер питания USB‑C мощностью 20 Вт"
},{
"@type": "PropertyValue",
"name": "Особенности",
"value": "Идентификация по отпечатку пальца (Touch ID)"
},{
"@type": "PropertyValue",
"name": "Дата анонса",
"value": "2021 год"
}]
}
</script>
<!--microdatapro 7.8 product end [json-ld] -->
<!--microdatapro 7.8 image start [json-ld] -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "ImageObject",
"author": "DM Market",
"thumbnailUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_1-550x550.png",
"contentUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_1-700x700.png",
"datePublished": "2022-01-03",
"description": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)"
}
</script>
<!--microdatapro 7.8 image end [json-ld] -->
<!--microdatapro 7.8 gallery start [json-ld] -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "ImageGallery",
"associatedMedia":[
{
"@type": "ImageObject",
"author": "DM Market",
"thumbnailUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_2-80x80.png",
"contentUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_2-700x700.png",
"datePublished": "2022-01-03",
"description": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)"
},{
"@type": "ImageObject",
"author": "DM Market",
"thumbnailUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_3-80x80.png",
"contentUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_3-700x700.png",
"datePublished": "2022-01-03",
"description": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)"
},{
"@type": "ImageObject",
"author": "DM Market",
"thumbnailUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_4-80x80.png",
"contentUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_4-700x700.png",
"datePublished": "2022-01-03",
"description": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)"
},{
"@type": "ImageObject",
"author": "DM Market",
"thumbnailUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_5-80x80.png",
"contentUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_5-700x700.png",
"datePublished": "2022-01-03",
"description": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)"
},{
"@type": "ImageObject",
"author": "DM Market",
"thumbnailUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_6-80x80.png",
"contentUrl": "https://dmmarket.ru/image/cache/catalog/data/ipad/ipad9_2021/silver/ipad_2021_silver_6-700x700.png",
"datePublished": "2022-01-03",
"description": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)",
"name": "Apple iPad 9 (10.2 ) 2021 64gb Wi-Fi Silver (серебристый)"
}]
}
</script>

</div>
</div>
<div class="modal fade" id="review-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Написать отзыв</div>
                <button class="close" type="button" data-dismiss="modal"><i class="icon-close"></i></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-review">
                                        <div class="form-group required">
                        <input type="text" name="name" placeholder="Ваше имя:" value="" id="input-name" class="form-control" />
                    </div>
                    <div class="form-group required">
                        <textarea name="text" rows="5" id="input-review" placeholder="Ваш отзыв" class="form-control"></textarea>
                    </div>
                    <div class="form-group required">
                        <div class="stars-rating">
                            <input name="rating" id="s_rating" value="0" type="hidden">
                            <div class="wrap" data-rate="0">
                                <span title="Ужасно" data-rate="1"></span>
                                <span title="Плохо" data-rate="2"></span>
                                <span title="Нормально" data-rate="3"></span>
                                <span title="Хорошо" data-rate="4"></span>
                                <span title="Отлично" data-rate="5"></span>
                            </div>
                        </div>
                    </div>
                                        <div class="but">
                        <button type="button" id="button-review" data-loading-text="Загрузка..." class="btn-popup">Продолжить</button>
                    </div>
                                    </form>
            </div>
        </div>
    </div>
</div>
<script>
	$('#review').delegate('.pagination a', 'click', function(e) {
        e.preventDefault();

        $('#review').fadeOut('slow');

        $('#review').load(this.href);

        $('#review').fadeIn('slow');
    });

    $('#review').load('index.php?route=product/product/review&product_id=2555');

    $('#button-review').on('click', function() {
        $.ajax({
            url: 'index.php?route=product/product/write&product_id=2555',
            type: 'post',
            dataType: 'json',
            data: $("#form-review").serialize(),
            beforeSend: function() {
                $('#button-review').button('loading');
            },
            complete: function() {
                $('#button-review').button('reset');
            },
            success: function(json) {
                $('.alert-success, .alert-danger').remove();

                if (json['error']) {
                    $('#form-review').after('<div class="alert-danger mar-top">' + json['error'] + '</div>');

                    setTimeout(function () {
                        $('#review-popup .alert-danger').remove();
                    }, 2000);
                }

                if (json['success']) {
                    $('#form-review').after('<div class="alert-success mar-top">' + json['success'] + '</div>');

                    setTimeout(function () {
                        $('#review-popup .alert-success').remove();
                        $('#review-popup').modal('hide');
                    }, 3000);

                    $('input[name=\'name\']').val('');
                    $('textarea[name=\'text\']').val('');
                    $('input[name=\'rating\']:checked').prop('checked', false);
                }
            }
        });
        // grecaptcha.reset();
    });

    $(document).ready(function(){
        $('.stars-rating span').click(function(e){
            var rate = $(this).attr('data-rate');
            $('.stars-rating .wrap').attr('data-rate', rate);
            $('#s_rating').val(rate);
        });
        $('.attr__preview__scroll a').on('click', function() {

            let href = $(this).attr('href');

            $('html, body').animate({
                scrollTop: $(href).offset().top - 100
            }, {
                duration: 370,   // по умолчанию «400»
                easing: "linear" // по умолчанию «swing»
            });

            return false;
        });
    });
</script>



<script>
	$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
		$.ajax({
			url: 'index.php?route=product/product/getRecurringDescription',
			type: 'post',
			data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
			dataType: 'json',
			beforeSend: function() {
				$('#recurring-description').html('');
			},
			success: function(json) {
				$('.alert, .text-danger').remove();

				if (json['success']) {
					$('#recurring-description').html(json['success']);
				}
			}
		});
	});
	</script>
	<script>
    /*$('#button-cart').on('click', function() {
		let dd = '{{$product->id}}';
		let count = $('#product_qty').val();
    
		console.log(dd);
        $.ajax({
					url: '/addcartproduct',
					method: 'post',
					dataType: 'html',
					data: {'_token':'{{csrf_token()}}',id:dd,count:count },
					success: function(data){
					console.log(data);
				}
				});
    });*/
</script>
		<script>
			$(document).ready(function() {

				$('.thumbnails').photobox('a');
				$('.thumbnails').photobox('a:first',{
					thumbs: false
				});	


				var hash = window.location.hash;
				if (hash) {
					var hashpart = hash.split('#');
					var  vals = hashpart[1].split('-');
					for (i=0; i<vals.length; i++) {
						$('#product').find('select option[value="'+vals[i]+'"]').attr('selected', true).trigger('select');
						$('#product').find('input[type="radio"][value="'+vals[i]+'"]').attr('checked', true).trigger('click');
						$('#product').find('input[type="checkbox"][value="'+vals[i]+'"]').attr('checked', true).trigger('click');
					}
				}
			})
		</script>
	<script src="/js/imagepreview.js"></script>

<div class="alert alert-form alert-form-deshevle">
    <div class="container">
        <div class="max-width">
            <div class="image d-flex align-center justify-center"><i class="icon-check absolute"></i></div>
            <div class="caption">
                <div class="name">
                    <div class="semiBold">Спасибо за ваше обращение!</div>
                    <span>Мы перезвоним вам в ближайшее время.</span>
                </div>
                <div class="buttons hidden-xs">
                    <button type="button" data-dismiss="alert"><i class="icon-close-x"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script><!--
function price_format(price)
{ 
    c = 0;
    d = '.'; // decimal separator
    t = ' '; // thousands separator
    s_left = '';
    s_right = ' {{setting('site.valuta')}}';
    n = price * 1.00000000;
    i = parseInt(n = Math.abs(n).toFixed(c)) + ''; 
    j = ((j = i.length) > 3) ? j % 3 : 0; 
    price_text = s_left + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : '') + s_right; 
    
        
    return price_text;
}

function calculate_tax(price)
{
        return price;
}

function process_discounts(price, quantity)
{
        return price;
}


animate_delay = 20;

main_price_final = calculate_tax({{$product->price}});
main_price_start = calculate_tax({{$product->price}});
main_step = 0;
main_timeout_id = 0;

function animateMainPrice_callback() {
    main_price_start += main_step;
    
    if ((main_step > 0) && (main_price_start > main_price_final)){
        main_price_start = main_price_final;
    } else if ((main_step < 0) && (main_price_start < main_price_final)) {
        main_price_start = main_price_final;
    } else if (main_step == 0) {
        main_price_start = main_price_final;
    }
    
    $('.autocalc-product-price').html( price_format(main_price_start) );
    
    if (main_price_start != main_price_final) {
        main_timeout_id = setTimeout(animateMainPrice_callback, animate_delay);
    }
}

function animateMainPrice(price) {
    main_price_start = main_price_final;
    main_price_final = price;
    main_step = (main_price_final - main_price_start) / 10;
    
    clearTimeout(main_timeout_id);
    main_timeout_id = setTimeout(animateMainPrice_callback, animate_delay);
}




function recalculateprice()
{
    var main_price = {{$product->price}};
    var input_quantity = Number($('input[name="quantity"]').val());
    var special = 0;
    var tax = 0;
    discount_coefficient = 1;
    
    if (isNaN(input_quantity)) input_quantity = 0;
    
                        main_price = process_discounts(main_price, input_quantity);
            tax = process_discounts(tax, input_quantity);
                
    
    var option_price = 0;
    
        
    $('input:checked,option:selected').each(function() {
      if ($(this).data('prefix') == '=') {
        option_price += Number($(this).data('price'));
        main_price = 0;
        special = 0;
      }
    });
    
    $('input:checked,option:selected').each(function() {
      if ($(this).data('prefix') == '+') {
        option_price += Number($(this).data('price'));
      }
      if ($(this).data('prefix') == '-') {
        option_price -= Number($(this).data('price'));
      }
      if ($(this).data('prefix') == 'u') {
        pcnt = 1.0 + (Number($(this).data('price')) / 100.0);
        option_price *= pcnt;
        main_price *= pcnt;
        special *= pcnt;
      }
      if ($(this).data('prefix') == 'd') {
        pcnt = 1.0 - (Number($(this).data('price')) / 100.0);
        option_price *= pcnt;
        main_price *= pcnt;
        special *= pcnt;
      }
      if ($(this).data('prefix') == '*') {
        option_price *= Number($(this).data('price'));
        main_price *= Number($(this).data('price'));
        special *= Number($(this).data('price'));
      }
      if ($(this).data('prefix') == '/') {
        option_price /= Number($(this).data('price'));
        main_price /= Number($(this).data('price'));
        special /= Number($(this).data('price'));
      }
    });
    
    special += option_price;
    main_price += option_price;

                tax = main_price;
        
    // Process TAX.
    main_price = calculate_tax(main_price);
    special = calculate_tax(special);
    
        if (input_quantity > 0) {
      main_price *= input_quantity;
      special *= input_quantity;
      tax *= input_quantity;
    }
    
    // Display Main Price
    animateMainPrice(main_price);
      
    }

$(document).ready(function() {
    $('input[type="checkbox"]').bind('change', function() { recalculateprice(); });
    $('input[type="radio"]').bind('change', function() { recalculateprice(); });
    $('select').bind('change', function() { recalculateprice(); });
    
    $quantity = $('input[name="quantity"]');
    $quantity.data('val', $quantity.val());
    (function() {
        if ($quantity.val() != $quantity.data('val')){
            $quantity.data('val',$quantity.val());
            recalculateprice();
        }
        setTimeout(arguments.callee, 250);
    })();

        
    recalculateprice();
});

//--></script>
      
<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>
@endsection