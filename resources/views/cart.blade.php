@extends('main')
@section('title', 'Корзина')
@section('content')
<div class="content">
		<div class="naz">
			<a href="/">
				<img src="images/left.png" width="9px">&nbsp;&nbsp;Вернуться к покупкам
			</a>
		</div>
		<div class="cont_cart">
			<div class="cont_cart_left">
				<h2>Корзина</h2>
				@if (count($prod_list_cart) == 0)
				<div>
					Корзина пуста
				</div>
				@else
				<table class="tb_cart" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<th>№</th>
						<th>Фото</th>
						<th>Название</th>
						<th>Описание</th>
						<th>Кол-во</th>
						<th>Стоимость</th>
						<th></th>
					</tr>
					@foreach($prod_list_cart as $key=>$prod_list_car)
						<tr class="tr_{{$prod_list_car['id']}}">
							<td>{{$key+1}}</td>
							<td><img src="/storage/{{$prod_list_car['img']}}" width="50px"></td>
							<td>{{$prod_list_car['title']}}</td>
							<td>{{$prod_list_car['description']}}</td>
							<td class="count_{{$prod_list_car['id']}}">{{$prod_list_car['count']}}</td>
							<td>{{$prod_list_car['price']*$prod_list_car['count']}} руб.</td>
							<td><a class="close_plus" onclick="plusclick({{$prod_list_car['id']}})">+</a><br /> <a  class="close" onclick="minusclick({{$prod_list_car['id']}})">-</a></td>
						</tr>
					@endforeach
				</table>

				@endif
			</div>
			<div class="cont_cart_right">
				<div class="skidka">
					<h3>Скидка от объема</h3>
					<ul>
						<li class="@if ($s<129999) act @endif">
							<div>0%</div>
							<div></div>
						</li>
						<li class="@if ($s>129999 and $s<279999) act @endif">
							<div>3%</div>
							<div>130 000₽</div>
						</li>
						<li class="@if ($s>279999 and $s<799999) act @endif">
							<div>5%</div>
							<div>280 000₽</div>
						</li>
						<li class="@if ($s>799999 and $s<999999) act @endif">
							<div>7%</div>
							<div>800 000₽</div>
						</li>
						<li class="@if ($s>999999) act @endif">
							<div>10%</div>
							<div>1 000 000₽</div>
						</li>
						
					</ul>
				</div>
				<div class="f1">
					<h3>Ваша корзина</h3>
					<div>
						<span>Товары ({{count($prod_list_cart)}})</span>
						<span ><span class="summa_ajax">{{$s}}</span><span> ₽</span></span>
					</div>
				</div>
				<div class="f2">
					<h3>Общая стоимость</h3>
					<div>
						<span>Без учета стоимости доставки</span>
						<span><span class="summa_ajax">{{$s}}</span><span> ₽</span></span>
					</div>
				</div>
				<a href="#" class="f3">
					Перейти к оформлению
				</a>
				<div class="speed_order">
					<button>Быстрый заказ</button>
				</div>
				<p class="des">Доступные способы и время доставки можно выбрать при оформлении заказа</p>
			</div>
		</div>

	</div>
	<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>

@endsection