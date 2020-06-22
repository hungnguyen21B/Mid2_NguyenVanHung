<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Chao anh {{$cus_name}}</h2>
    <h3>Don hang cua anh la:</h3>
    @foreach ($products as $item)
    <div class="media">
        <img width="250px" src="source/image/product/{{$item['item']['image']}}" alt="" class="pull-left">
            <div class="media-body">
            <p class="font-large">{{$item['item']['name']}} Quantity: {{$item['qty']}}</p>
                <span class="color-gray your-order-info">Color: Red</span>
                <span class="color-gray your-order-info">Size: M</span>
                <span class="color-gray your-order-info">Qty: 1</span>
            </div>
        </div>
    @endforeach
    <div class="media-body">
        Tong so tien la: {{$total}} dongs
    </div>
</body>
</html>