@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .btn {
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: RoyalBlue;
    }
    </style>
<div class="container" style="padding-top:50px;">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">My Products</div>
                        <div class="panel-body">
@if (count($products)> 0)
  @foreach ($products as $product)
  <div class="well">
  <div class="row">
    <div class="col-sm-2">
    <img src="storage/cover_images/{{$product->image}}" style="width:100%"/>
    </div>
    <div class="col-sm-8">  
{{$product->name}}<br>
<small>Price (UGX): {{number_format($product->price)}}</small><br/>
<small>Added on: {{$product->created_at}}</small><br/>
</div>
  </div>
<hr>
<table style="width:100%">
  <tr>
    <th>
<small><a href="edit/{{$product->id}}/edit" style="padding:9px; padding-right:10px; padding-left:10px; text-decoration:none;" class="btn-success fa fa-edit"> Edit</a></small>
    </th>
    <th class="pull-right">
<form method="POST" action="http://localhost/MyCRUDApplication/public/delete_product">
{{ csrf_field() }}
  <input type="hidden" name="product_id" value="{{$product->id}}" />
  <small><button type="submit" style="padding:3px;" class="btn-danger"><span class="fa fa-trash"> Delete</span></button></small>
</form>
    </th>
  </tr></table>
</div>
  @endforeach  
  @else
      <h1>No Products added yet !!</h1>
  @endif
  {{$products->links()}}
                </div>
        </div>
</div>
        </div>
</div>
@endsection