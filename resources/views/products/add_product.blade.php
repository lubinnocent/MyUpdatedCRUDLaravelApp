@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:50px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Product</div>
                <div class="panel-body">
                     <form method="POST" action="http://localhost/MyCRUDApplication/public/add" enctype ="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                    <label name="title">Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="E.g Samsung Galaxy S3"/>
                </div>
                <div class="form-group">
                        <label name="price">Price (UGX)</label>
                        <input type="number" name="product_price" class="form-control" min="1000" placeholder="E.g 900000"/>
                </div>
                <div class="form-group">
                        <label name="image">Image</label>
                        <input type="file" name="cover_image" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-primary"/>
                </div>  
                
                     </form>
                </div>
            </div>
            
        </div>
    </div>
</div>  
@endsection