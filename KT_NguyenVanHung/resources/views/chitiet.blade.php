@extends('master')
@section('content')

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                    <img src="source/image/product/{{$product->image}}" style="height:270px; width:320px;"alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$product->name}}</p>
                            <p class="single-item-price">
                                @if ($product->promotion_price==0)
                                <span class="flash-sale">{{$product->unit_price}}d</span>
                                @else
                                <span class="flash-del">{{$product->unit_price}}d</span>
                                <span class="flash-sale">{{$product->promotion_price}}d</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$product->description}}.</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Options:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option>Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Color</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Qty</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        <a class="add-to-cart" href="{{route('themgiohang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                        <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>

                    <div class="row">
                        @foreach ($productRelative as $item)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if ($item->promotion_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{route('chitiet',$item->id)}}"><img src="source/image/product/{{$item->image}}" style="height:270px; width:320px;alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$item->name}}</p>
                                    <p class="single-item-price">
                                        @if ($item->promotion_price==0)
                                        <span class="flash-sale">{{$item->unit_price}}d</span>
                                        @else
                                        <span class="flash-del">{{$item->unit_price}}d</span>
                                        <span class="flash-sale">{{$item->promotion_price}}d</span>
                                        @endif
                                        
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                <a class="beta-btn primary" href="{{route('chitiet',$item->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($new_products as $item)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitiet',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$item->name}}
                                    @if ($item->promotion_price==0)
                                    <span class="flash-sale">{{$item->unit_price}}d</span>
                                    @else
                                    <span class="flash-del">{{$item->unit_price}}d</span>
                                    <span class="flash-sale">{{$item->promotion_price}}d</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($new_products as $item)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitiet',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$item->name}}
                                    @if ($item->promotion_price==0)
                                    <span class="flash-sale">{{$item->unit_price}}d</span>
                                    @else
                                    <span class="flash-del">{{$item->unit_price}}d</span>
                                    <span class="flash-sale">{{$item->promotion_price}}d</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection