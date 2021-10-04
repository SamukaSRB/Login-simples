@extends('produto.layouts.app')

{{-- Nav Topbar --}}
@include('produto.includes.nav')
{{-- End of Topbar --}}


@section('content')
<br><br><br>
<div class = 'containner'>
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Cadastrar novo produto</h2>
</div>
<div class="pull-right">
<a class="btn btn-success" href="">Back</a>
</div>
</div>

<form action="/store" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
            <strong>Product Name:</strong>
            <input type="text" name="product_name" class="form-control" placeholder="Product Name">
    </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
            <strong>Product Code:</strong>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code">
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
            <strong>Product Details:</strong>
            <textarea class="form-control" name="details" style="height:150px" placeholder="Details"></textarea>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
            <strong>Product Image:</strong>
            <input type="file" name="logo">
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>


</div>



</div>


</form>


@endsection