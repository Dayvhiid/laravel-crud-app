<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://classless.de/classless.css">
</head>
<body>
    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <h1>Create a Product</h1>
    <form method="post" action="{{route('products.update', ['products' => $product])}}">
        @csrf
        @method('PUT')
       <div>
          <label>Name: </label>
          <input type="text" name="name" placeholder="Enter your name" value="{{$product->name}}">
       </div>
       <div>
          <label>Qty: </label>
          <input type="text" name="qty" placeholder="Enter the quantity" value="{{$product->qty}}">
       </div>
       <div>
        <label>Price: </label>
        <input type="text" name="price" placeholder="Enter the price" value="{{$product->price}}">
     </div>
     <div>
        <label>Description: </label>
        <input type="text" name="description" placeholder="Enter the description" value="{{$product->description}}">
     </div>
     <div>
        <input type="submit" value="SUBMIT">
     </div>
    </form>
</body>
</html>