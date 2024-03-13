<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://classless.de/classless.css">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    @if(session()->has('success'))
      <div>
        {{ session('success')}}
      </div>
    @endif
    <div>
      <div>
        <a href="{{route('products.create')}}">CREATE</a>
      </div>
      <table border="1">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Update</th>
        </tr>
        @foreach($products as $product)
           <tr>
              <td> {{ $product->id }}</td>
              <td> {{ $product->name }}</td>
              <td> {{ $product->qty }}</td>
              <td> {{ $product->price }}</td>
              <td> {{ $product->description }}</td>
              <td>
                <a href="{{route('products.edit', ['products' => $product])}}">Edit</a>
              </td>
              <td>
                <form method="post" action="{{route('products.destroy', ['products' => $product])}}">
                  @csrf
                  @method('delete')
                    <input type="submit" value="Delete"/> 
                </form>
              </td>
           </tr>
        @endforeach
      </table>
    </div>
</body>
</html>