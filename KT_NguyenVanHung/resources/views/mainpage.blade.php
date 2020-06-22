<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        .img {
            position: relative;
            text-align: center;
            color: white;
            }

        .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
            background-color: rgb(160, 150, 150);
        }
        span{
            color: darkmagenta;
        }
        .flex-row{
            display: flex;
            flex-direction: row;
            justify-content: space-between
        }
        button{
            overflow: hidden;
        }
        .col-md-4 div {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-4">
               <img src="{{ asset('img/logo.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-lg-8">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Du lich <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Book may bay</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Book khach san</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Dich vi visa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Thue xe</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Tin tuc</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Gioi thieu</a>
                          </li>
                      </ul>
                    </div>
                    <a href="http://localhost:8080/KT_NguyenVanHung/public/add"><button class="btn-primary">
                        Add</button></a>
                  </nav>
            </div>
        </div>
        <div class="row">
            @foreach($tours as $tour)
          <tr>
            <div class="col-md-4">
       
                    <div class="img">
                        <div class="bottom-left">
                            {{$tour->type_tour}}
                        </div>
                        <img src="{{ asset('img/'.$tour->image) }}" alt="" style="width: 100% margin: 10px auto">
                    </div>
                    <div style="background-color: rgb(160, 150, 150);">
                        {{$tour->name}}
                    </div>
                    <div>
                        Lich trinh:  {{$tour->schedule}}
                    </div>
                    <div>
                        Khoi hanh:  {{$tour->depart}}
                    </div>
                    <div class="flex-row">
                        <div>
                            So cho con nhan: {{$tour->number_people}}
                        </div>
                        <div>
                          <span>{{$tour->price}}đ</span>
                        </div>
                    </div>

            </div>
          @endforeach
        </div>
      </div>
</body>
</html>