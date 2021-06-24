<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div >
   <!-- <example-component></example-component> -->
   <table class="b">
   
   <form action="{{ url('/item') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <tr>
   <td><input type="text" name="name" value="name"></td>
   <td><input type="number" name="quantity" value="quantity"></td>
   <td><input type="number" name="price" value="product"></td>
   <td><input type="submit" value="sumbit"></td>
   </form>
   </tr>
    <tr>
    <td>Product Name</td>
    <td>Quantity</td>
    <td>Price</td>
    <td>Dated</td>
    <td>Total</td>
    </tr>
    @foreach($items as $item)
    <tr>
    <td>{{$item->Name}}</td>
    <td>{{$item->Quantity}}</td>
    <td>{{$item->Price}}</td>
    <td>{{$item->Dated}}</td>
    <td>{{$item->Total}}</td>
    </tr>
    @endforeach
    <tr>
    <td colspan="4">Total</td>
    <td>{{$total}}</td>
    </tr>
    </table>
</div>
</body>
</html>