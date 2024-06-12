@extends('main')
@section('title', 'Подтверждение заказа')
@section('content')
<h2 align='center'>{{setting('site.ourdata')}}</h2>
<style>
.asasc{
	width: 500px;
	margin: 40px auto;
}
@media (max-width:500px){
	.asasc{
		width: 90% !important
	}
}
</style>
<form enctype="multipart/form-data" action='/addcart' method="post" class='asasc'>
@csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameCB" placeholder="{{setting('site.order_name')}}*" name="name" required="" x-autocompletetype="nameCB">
                    </div>
                    <div class="form-group mar-top">
                        <input type="text" class="form-control"  placeholder="{{setting('site.order_phone')}}*" name="phone" required="" x-autocompletetype="phoneCB">
                    </div>
					 <div class="form-group mar-top">
                        <input type="text" class="form-control"  placeholder="{{setting('site.order_city')}}*" name="city" required="" x-autocompletetype="cityCB">
                    </div>
					 <div class="form-group mar-top">
                        <input type="text" class="form-control"  placeholder="{{setting('site.order_address')}}*" name="address" required="" x-autocompletetype="addressCB">
                    </div>
					<div class="form-group mar-top">
						<p>{{setting('site.order_datetime')}}</p>
                        <input type="date" class="form-control"  placeholder="{{setting('site.order_datetime')}}*" name="date" required="" x-autocompletetype="datetimeCB">
                    </div>
					<div class="form-group mar-top">
						<p>{{setting('site.order_datetimetime')}}</p>
                        <input type="time" class="form-control"  placeholder="{{setting('site.order_datetimetime')}}*" name="time" required="" x-autocompletetype="datetimeCB">
                    </div>
					
                        <input type="hidden" class="form-control" value='{{$s}} руб.' readonly  name="summa">
					<div class="form-group mar-top">
						<table>
							<tr>
								<th>{{setting('site.order_name_product')}}</th>
								<th>{{setting('site.order_photo')}}</th>
								<th>{{setting('site.order_price')}}</th>
								<th>{{setting('site.order_count')}}</th>
							</tr>
							@foreach($prod_list_cart as $pr)
							<tr>
								<input type='hidden' name='product[]' value='{{$pr["id"]}}'>
								<input type='hidden' name='product_count[]' value='{{$pr["count"]}}'>
								<td>{{$pr['title']}}</td>
								<td><img src='/storage/{{$pr["img"]}}' width='50px'></td>
								<td>{{$pr['price']}}</td>
								<td>{{$pr['count']}}</td>
							</tr>
							@endforeach
							<tr>
								
								<th colspan='4'>{{setting('site.order_all_summa')}} {{$s}} {{setting('site.valuta')}}.</th>
							</tr>
						</table>
					</div>
                    <div class="but">
                        <button class="btn-popup d-inline pointer" type="submit" >{{setting('site.order_order_btn')}}</button>
                        
                    </div>
                </form>
				<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>

@endsection