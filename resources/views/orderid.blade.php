@extends('main')
@section('title', 'ID '.setting('site.Order_fna').$order->id+10000)
@section('content')
<h2 align='center'>ID {{setting('site.Order_fna')}} {{$order->id+10000}}</h2>
<style>
.asasc{
	width: 500px;
	margin: 40px auto;
}
@media (max-width:500px){
	.asasc{
		width: 90% !important
	}
	.img_d,.price{
		display: none
	}
}
</style>
<div class='asasc'>
					<div class="form-group mar-top">
						<table>
							<tr>
								<th>{{setting('site.Order_id')}}</th>
								<td>{{$order->id+10000}}</td>
							</tr>
							
							<tr>
								<th>{{setting('site.order_name')}}</th>
								<td>{{$order->name}}</td>
							</tr>
							<tr>
								<th>{{setting('site.order_phone')}}</th>
								<td>{{$order->phone}}</td>
							</tr>
							<tr>
								<th>{{setting('site.order_city')}}</th>
								<td>{{$order->city}}</td>
							</tr>
							<tr>
								<th>{{setting('site.order_address')}}</th>
								<td>{{$order->address}}</td>
							</tr>
							<tr>
								<th>{{setting('site.order_datetime')}}</th>
								<td>{{$order->datetime}}</td>
							</tr>
							<tr>
								<th>{{setting('site.order_date')}}</th>
								<td>{{$order->created_at}}</td>
							</tr>
							<tr align='center'>
								<td colspan='5' align='center'>{{setting('site.order_product')}}</td>
							</tr>
							<tr>
								<th>{{setting('site.order_name_product')}}</th>
								<th class='img_d'>{{setting('site.order_photo')}}</th>
								<th class='price'>{{setting('site.order_price')}}</th>
								<th>{{setting('site.order_count')}}</th>
								<th>{{setting('site.order_summa')}}</th>
							</tr>
							
							@foreach(json_decode($order->id_products, true) as $pr)
							<tr>
								<td>{{\App\Models\Product::where('id', $pr['id_product'])->first()->title}}</td>
								<td class='img_d'><img src="/storage/{{\App\Models\Product::where('id', $pr['id_product'])->first()->img}}" width='50px'></td>
								<td class='price'>{{\App\Models\Product::where('id', $pr['id_product'])->first()->price}}</td>
								<td>{{$pr['count']}}</td>
								<td>{{($pr['count']*\App\Models\Product::where('id', $pr['id_product'])->first()->price)}}</td>
							</tr>
							@endforeach
							<tr>
								<th>{{setting('site.order_summa')}}</th>
								<td>{{$order->summa}}</td>
							</tr>
							<tr>
								<td colspan='5' align='center' style='padding: 50px 0px; text-align: center'>
									<button class="btn-popup d-inline pointer" type="submit">{{setting('site.order_btn')}}</button>
								</td>
							</tr>
						</table>
					</div>
</div>
<div class="btn-up hide fixed d-flex align-center justify-center p20 pointer animation"><i class="icon-arrow-up"></i></div>

@endsection