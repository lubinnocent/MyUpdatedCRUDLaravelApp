@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:50px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (empty($product->name))
        <h1>No product found with that ID</h1>
            @else
            <div class="panel panel-default">
                    <div class="panel-heading">Edit Product</div>
                    <div class="panel-body">
                         <form method="POST" action="edit_product" enctype ="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                        <label name="title">Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="{{$product->name}}"/>
                    </div>
                    <div class="form-group">
                            <label name="price">Price (UGX)</label>
                    <input type="number" name="product_price" class="form-control" min="1000" value="{{$product->price}}"/>
                    </div>
                    <div class="form-group">
                            <label name="image">Image</label>
                            <input type="file" name="cover_image" class="form-control"/>
                    </div>
                <input type="hidden" name="product_id" value="{{$product->id}}" />
                    <div class="form-group">
                        <input type="submit" value="Edit" class="btn btn-primary"/>
                    </div>  
                    
                         </form>
                    </div>
                </div>
            @endif
            
            
        </div>
    </div>
</div>  
@endsection