<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Cat;
use App\Models\Order;
use App\Models\Product;
use App\Models\Obr;

use Illuminate\Http\Request;


class IndexController extends Controller
{
	public function faq(Request $request){
				return view('faq');

	}
	public function about_us(Request $request){
				return view('about_us');

	}
	public function dostavka(Request $request){
		return view('dostavka');

	}
	
	
	
		public function ajaxupdatecart(Request $request){
			 $prod_list_cart = [];
			$s = 0;
			if ($request->session()->has('carts.cart')) {
				$carts = $request->session()->get('carts.cart');
				$counts = array_count_values($carts);
				$i=0;
				foreach($counts as $key=>$value){
					$pr = Product::where('id', $key)->first();
					$s += ($pr->price * $value);
					$prod_list_cart[$i]['id'] = $key;
					$prod_list_cart[$i]['title'] = $pr->title;
					$prod_list_cart[$i]['description'] = $pr->description;
					$prod_list_cart[$i]['price'] = $pr->price;
					$prod_list_cart[$i]['img'] = $pr->img;
					$prod_list_cart[$i]['count'] = $value;
					$i++;
				}
			}
			if(count($prod_list_cart) > 0){
			$ss = '<ul class="list-unstyled"><li class="product-list">';
			foreach($prod_list_cart as $pc){
                            $ss .= '<div class="item d-flex">
									<div class="image">
										<a href="/product/'.$pc['id'].'">
											<img src="/storage/'.$pc['img'].'" alt="'.$pc['title'].'" title="'.$pc['title'].'" class="img-responsive radius-small">
										</a>
									</div>
                <div class="caption flex-1">
                  <div class="name">
                    <a href="/product/'.$pc['id'].'" class="semiBold">'.$pc['title'].'</a>
                                      </div>

                  <div class="price p20 kelson bold">'.$pc['price'].' '.setting('site.valuta').'</div>
                  <div class="d-flex justify-between align-center">
                    <div class="qty inc_dec_qty d-flex align-center justify-between">
                      <span class="input-group-btn" >
                        <button type="button" class="btn-default2 btn-number"  onclick="quantity_top_inc1('.$pc['id'].')">-</button>
                      </span>

                      <input readonly type="text" name="quantity['.$pc['id'].']" size="2" value="'.$pc['count'].'" id="qty_box1_'.$pc['id'].'" class="qty_box1">
                      <span class="input-group-btn">
                        <button type="button" class="btn-default2 btn-number"  onclick="quantity_top_inc('.$pc['id'].')">+</button>
                      </span>
                    </div>
                    <button type="button" onclick="customWushlistCompare_cart_delete('.$pc['id'].');" title="Удалить" class="btn-remove p20">
                      <i class="icon-trash"></i>
                    </button>
                  </div>

                  <input type="hidden" id="use_unitprice_2956" value="'.$pc['price'].'">
                  <div class="use price d-none" id="use_dynamic1_'.$pc['id'].'">'.$pc['price'].' '.setting('site.valuta').'</div>

                </div>
              </div>';
			}
			$ss .= '</li>
			<li>
              <div class="total">
                                                <div class="item d-flex align-center justify-between p16 kelson">
                                    <span>'.setting('site.itog').':</span>
                                    <span>'.$s.' '.setting('site.valuta').'</span>
                </div>
                                                                <div class="item d-flex align-center justify-between p16 kelson">
                                    <span>'.setting('site.itog').'</span>
                                    <span>'.$s.' '.setting('site.valuta').'</span>
                </div>
                                                <div class="button">
                  <a href="/simplecheckout/" class="w100 d-block text-center p12 uppercase semiBold letter">'.setting('site.cart_btn').'</a>
                </div>
              </div>
            </li>
			</ul>';
			}else{
				$ss = '<ul class="list-unstyled">
                        <li>'.setting('site.cart_1').'</li>
                      </ul>';
			}
			return $ss;
		}
		
		
	public function ajaxupdatewush(Request $request){
		$id = $request->id;
		
	}
	public function orderid(Request $request,$id){
		$order = Order::where('id', $id)->first();
		
		return view('orderid', [ 'order'=>$order]);
	}
	public function addcart(Request $request){
		$data = $request->all();
		$products = '[';
		foreach($data['product'] as $key=>$pr){
			if(count($data['product']) > 0){
				if($key == count($data['product']) - 1){
					$products .= '{"id_product":'.$pr.',"count":'.$data['product_count'][$key].'}';
				}
				else{
					$products .= '{"id_product":'.$pr.',"count":'.$data['product_count'][$key].'},';
				}
			}else{
				$products .= '{"id_product":'.$pr.',"count":'.$data['product_count'][$key].'}';
			}
		}
		$products .= ']';
		echo $products;
		$order = new Order();
		$order->id_products = $products;
		$order->summa = $data['summa'];
		$order->name = $data['name'];
		$order->phone = $data['phone'];
		$order->city = $data['city'];
		$order->address = $data['address'];
		$order->datetime = $data['date'].$data['time'];
		$order->save();
		$order_id = $order->id;
		
		$request->session()->flush();

		return redirect('/order/'.$order_id);
	}
	
	public function addobr(Request $request){
		$name = $request->name;
		$phone = $request->phone;
		$obr = new Obr();
		$obr->name = $name;
		$obr->phone = $phone;
		$obr->save();
		return 1;
		
	}
		
	public function simplecheckout(Request $request){
			$prod_list_cart = [];
			$s = 0;
			if ($request->session()->has('carts.cart')) {
				$carts = $request->session()->get('carts.cart');
				$counts = array_count_values($carts);
				$i=0;
				foreach($counts as $key=>$value){
					$pr = Product::where('id', $key)->first();
					$s += ($pr->price * $value);
					$prod_list_cart[$i]['id'] = $key;
					$prod_list_cart[$i]['title'] = $pr->title;
					$prod_list_cart[$i]['description'] = $pr->description;
					$prod_list_cart[$i]['price'] = $pr->price;
					$prod_list_cart[$i]['img'] = $pr->img;
					$prod_list_cart[$i]['count'] = $value;
					$i++;
				}
			}
			
	
		return view('simplecheckout', [ 'prod_list_cart'=>$prod_list_cart,'s'=>$s]);


	}		
	
    public function index(Request $request){
			$prod_list_cart = [];
			$s = 0;
			if ($request->session()->has('carts.cart')) {
				$carts = $request->session()->get('carts.cart');
				$counts = array_count_values($carts);
				$i=0;
				foreach($counts as $key=>$value){
					$pr = Product::where('id', $key)->first();
					$s += ($pr->price * $value);
					$prod_list_cart[$i]['id'] = $key;
					$prod_list_cart[$i]['title'] = $pr->title;
					$prod_list_cart[$i]['description'] = $pr->description;
					$prod_list_cart[$i]['price'] = $pr->price;
					$prod_list_cart[$i]['img'] = $pr->img;
					$prod_list_cart[$i]['count'] = $value;
					$i++;
				}
			}
        

        $sliders = Slider::all();
        $cats = Cat::all();

        return view('index', ['sliders'=>$sliders, 'cats'=>$cats, 'prod_list_cart'=>$prod_list_cart,'s'=>$s]);
    }
	
	public function deletecart(Request $request){
		$id_product = strval($request->id);
		$carts = $request->session()->get('carts.cart', []);
    
		$index = array_search($id_product, $carts);

		while ($index !== false) {
			unset($carts[$index]);
			$request->session()->put('carts.cart', $carts);
			$index = array_search($id_product, $carts);
		} 
		
	}
	public function addcartproductid(Request $request){
		$id_product = strval($request->id);
		$carts = $request->session()->get('carts.cart', []);
    
		$index = array_search($id_product, $carts);

		if ($index !== false) {
			unset($carts[$index]);
			$request->session()->put('carts.cart', $carts);
			$index = array_search($id_product, $carts);
		} 
		
	}
	
	public function countcart(Request $request){
        $index = 0;
        if ($request->session()->has('carts.cart')) {
            $carts = $request->session()->get('carts.cart');
            $counts = array_count_values($carts);
            $i=0;
			foreach($counts as $key=>$value){
				$index++;
			}
		}
		return $index;
	}
	
     public function infopotrebitel(Request $request){
         $cats = Cat::all();

        return view('infopotrebitel', ['cats'=>$cats]);
    }

    public function reckclear(Request $request){
         $cats = Cat::all();

        return view('reckclear', ['cats'=>$cats]);
    }

    public function politika(Request $request){
         $cats = Cat::all();

        return view('politika', ['cats'=>$cats]);
    }


    public function garantiya(Request $request){
         $cats = Cat::all();

        return view('garantiya', ['cats'=>$cats]);
    }



    public function addcartproduct(Request $request){
        $id = $request->id;
        if ($request->session()->has('carts.cart')) {
            $carts = $request->session()->get('carts.cart');      
            if(in_array($id, $carts)){
                 $request->session()->push('carts.cart', $id);

									
					
					return $carts = $request->session()->get('carts.cart');
					
					
					

				
            }else{

                $request->session()->push('carts.cart', $id);
                return 2;
            }
            
            
        }else{
            $request->session()->push('carts.cart', $id);
        }
        return 3;
        
    }

    
    
    public function cart(Request $request){
        $prod_list_cart = [];
        $s = 0;
        if ($request->session()->has('carts.cart')) {
            $carts = $request->session()->get('carts.cart');
            $counts = array_count_values($carts);
            $i=0;
            foreach($counts as $key=>$value){
                $pr = Product::where('id', $key)->first();
                $s += ($pr->price * $value);
                $prod_list_cart[$i]['id'] = $key;
                $prod_list_cart[$i]['title'] = $pr->title;
                $prod_list_cart[$i]['description'] = $pr->description;
                $prod_list_cart[$i]['price'] = $pr->price;
                $prod_list_cart[$i]['img'] = $pr->img;
                $prod_list_cart[$i]['count'] = $value;
                $i++;
            }
        }


        return view('cart', ['sliders'=>$sliders, 'cats'=>$cats, 'prod_list_cart'=> $prod_list_cart, 's'=>$s]);
    }

    public function getsumma(Request $request){
         $s = 0;
            if ($request->session()->has('carts.cart')) {
                $carts = $request->session()->get('carts.cart');
                $counts = array_count_values($carts);
                $i=0;
                foreach($counts as $key=>$value){
                    $pr = Product::where('id', $key)->first();
                    $s += ($pr->price * $value);
                    $prod_list_cart[$i]['id'] = $key;
                    $i++;
                }
            }
        return $s;
    }
    public function productid(Request $request, $id){
        $prod_list_cart = [];
        $s = 0;
        if ($request->session()->has('carts.cart')) {
            $carts = $request->session()->get('carts.cart');
            $counts = array_count_values($carts);
            $i=0;
            foreach($counts as $key=>$value){
                $pr = Product::where('id', $key)->first();
                $s += ($pr->price * $value);
                $prod_list_cart[$i]['id'] = $key;
                $prod_list_cart[$i]['title'] = $pr->title;
                $prod_list_cart[$i]['description'] = $pr->description;
                $prod_list_cart[$i]['price'] = $pr->price;
                $prod_list_cart[$i]['img'] = $pr->img;
                $prod_list_cart[$i]['count'] = $value;
                $i++;
            }
        }
        $count = 0;
         if ($request->session()->has('carts.cart')){
            foreach($request->session()->get('carts.cart') as $c){
                if($c==$id){
                    $count++;
                }
            }
         }
         
        
         
        $sliders = Slider::all();
        $cats = Cat::all();
        $product = Product::where('id', $id)->first();
        return view('productid', ['request'=>$request, 'sliders'=>$sliders, 'cats'=>$cats, 'product'=>$product, 'count'=>$count,'prod_list_cart'=> $prod_list_cart,'s'=>$s]);
    }
    public function ajaxcolor(Request $request){
        $id = $request->id;
        $idc = $request->idc;
        $produc = Product::select('images_color')->where('id', $id)->first();
        return json_decode($produc->images_color)[$idc];
    }

    public function catid(Request $request, $id){
		$prod_list_cart = [];
        $s = 0;
        if ($request->session()->has('carts.cart')) {
            $carts = $request->session()->get('carts.cart');
            $counts = array_count_values($carts);
            $i=0;
            foreach($counts as $key=>$value){
                $pr = Product::where('id', $key)->first();
                $s += ($pr->price * $value);
                $prod_list_cart[$i]['id'] = $key;
                $prod_list_cart[$i]['title'] = $pr->title;
                $prod_list_cart[$i]['description'] = $pr->description;
                $prod_list_cart[$i]['price'] = $pr->price;
                $prod_list_cart[$i]['img'] = $pr->img;
                $prod_list_cart[$i]['count'] = $value;
                $i++;
            }
        }
		
		$cat_one = Cat::where('id',$id)->first();
		if(isset($_GET['order'])){
			$order = $_GET['order'];
		}else{
			$order = 'ASC';
		}
		
		

		if($order == 'DESC'){
			$pr_cats = Product::where('cat', $id)->get()->sortByDesc('price');
		}else{
			$pr_cats = Product::where('cat', $id)->get()->sortBy('price');
		}
        
        return view('catid', ['pr_cats'=>$pr_cats,'cat_one'=>$cat_one,'prod_list_cart'=>$prod_list_cart,'s'=>$s]);
    }
    public function addcartproductminus(Request $request){
        $id = $request->id;
        if ($request->session()->has('carts.cart')) {
            $carts = $request->session()->get('carts.cart');
            $request->session()->forget('carts.cart');
 
            $m = false;   
           foreach($carts as $key=>$cart){
                if($cart==$id && $m==false){
                    unset($carts[$key]);
                    $m=true;
                }
           }
            $request->session()->put('carts.cart', $carts);
  
        }
    }
}