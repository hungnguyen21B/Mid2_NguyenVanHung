<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="{{route('signup')}}">Đăng kí</a></li>
                    @if(Session::has('checkLogin')&&(Session::get('checkLogin')=='true'))
                    <li><a href="{{route('logout')}}">Đăng xuat</a></li>
                    @else
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                <form role="search" method="get" id="searchform" action="{{route('search')}}">
                    @csrf
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart')&&(Session::get('cart')->totalQuantity>0))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQuantity}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            @foreach(Session('cart')->items as $product)
                            <div class="cart-item">
                                <div class="media">   
                                <a class="pull-left" href="{{route('chitiet',$product['item']['id'])}}"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                    <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                        <span class="cart-item-amount">{{$product['qty']}}*<span>{{$product['item']['price']}}</span></span>
                                    </div>
                                </div>
                                <a href="{{route('xoasanphamtronggiohang',$product['item']['id'])}}"><button class="btn btn-danger">-</button></a>
                                <a href="{{route('xoa1sanphamtronggiohang',$product['item']['id'])}}"><button class="btn btn-danger">X</button></a>
                            </div>
                            @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right"><a href="{{route('xoagiohang')}}"><button class="btn btn-danger">Clear</button></a>
                                    &nbsp;&nbsp; Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    @if(Session::has('checkLogin'))
                                    @if(Session::get('checkLogin')=='true')
                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    @else
                                    <a href="{{route('login')}}" class="beta-btn primary text-center">Login <i class="fa fa-chevron-right"></i></a>
s
                                    @endif
                                    @else
                                    <a href="{{route('login')}}" class="beta-btn primary text-center">Login <i class="fa fa-chevron-right"></i></a>
                                   @endif
                              
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->  
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                    <li><a>Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach ($loai_sp as $item)
                        <li><a href="{{route('loaisanpham',$item->id)}}">{{$item->name}}</a></li>
                            @endforeach                            
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div>