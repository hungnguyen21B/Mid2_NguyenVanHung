<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Add Form</title>
    <style>
        .container{
            width: 600px;
            margin: 5% auto;
        }
    </style>
</head>
<body>
    @include ('blocks/error')
    <div class="container">
        <h2>Add tour</h2>
        <form role="form" action=""method="post"enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control"name="name" id="exampleInputEmail1"  placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="1">Price</label>
              <input type="text" class="form-control"name="price" id="1"  placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="2">Schodule</label>
                <input type="text" class="form-control"name="schedule" id="2"  placeholder="Enter schedule">
              </div>
              <div class="form-group">
                <label for="3">Type Tour</label>
                <input type="text" class="form-control"name="type_tour" id="3"  placeholder="Enter type tour">
              </div>
              <div class="form-group">
                <label for="4">Depart</label>
                <input type="date" class="form-control"name="depart" id="4"  placeholder="Enter depart">
              </div>
              <div class="form-group">
                <label for="5">Number people</label>
                <input type="text" class="form-control"name="number_people" id="5"  placeholder="Enter number people">
              </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image file</label>
                <input type="file" class="form-control-file"name="image" id="exampleFormControlFile1">
              </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>