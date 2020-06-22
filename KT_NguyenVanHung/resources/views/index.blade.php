@extends('master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
        <div class="banner" >
                <ul>
                    @foreach ($slide as $item)
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$item->image}}" data-src="source/image/slide/{{$item->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$item->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                </li>
                @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h4>New Products</h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($new_products)}} styles found</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @foreach ($new_products as $new_product)
               
                <div class="col-sm-3">
                    <div class="single-item">
                        @if ($new_product->promotion_price!=0)
                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                            <a href="{{route('chitiet',$new_product->id)}}"><img src="source/image/product/{{$new_product->image}}" style="height:270px; width:320px;"alt=""></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$new_product->name}}</p>
                            <p class="single-item-price">
                                @if ($new_product->promotion_price==0)
                                <span class="flash-sale">{{$new_product->unit_price}}d</span>
                                @else
                                <span class="flash-del">{{$new_product->unit_price}}d</span>
                                <span class="flash-sale">{{$new_product->promotion_price}}d</span>
                                @endif
                                
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$new_product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="beta-btn primary" href="{{route('chitiet',$new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div><div class="row">{{ $new_products->links("pagination::bootstrap-4")}}</div>
        </div> <!-- .beta-products-list -->
        <div class="space50">&nbsp;</div>

        <div class="beta-products-list">
            <h4>Top Products</h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($products)}} styles found</p>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @for($i=0; $i<count($products);$i++)
                <div class="col-sm-3">
                    <div class="single-item">
                        @if ($products[$i]->promotion_price!=0)
                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                            <a href="{{route('chitiet',$products[$i]->id)}}"><img src="source/image/product/{{$products[$i]->image}}" style="height:270px; width:320px;"alt=""></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$products[$i]->name}}</p>
                            <p class="single-item-price">
                                @if ($products[$i]->promotion_price==0)
                                <span class="flash-sale">{{$products[$i]->unit_price}}d</span>
                                @else
                                <span class="flash-del">{{$products[$i]->unit_price}}d</span>
                                <span class="flash-sale">{{$products[$i]->promotion_price}}d</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$products[$i]->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('chitiet',$products[$i]->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="row">{{ $products->links() }}</div>
        </div> <!-- .beta-products-list -->
    </div>
</div> <!-- end section with sidebar and main content -->
</div> <!-- .main-content -->
</div> <!-- #content -->
</div> 
@endsection