@extends('produto.layouts.app')

 {{-- Nav Topbar --}}
 @include('produto.includes.nav')
 {{-- End of Topbar --}}


    <div class="float-right p-2">
    <a class="btn btn-success" href="/create">Create new produto</a>
    </div>

    <table class= "table table-bordered">
        <tr>
            <th width="180px">Name</th>
            <th width="50px">Code</th>
            <th width="100px">Details</th>
            <th width="100px">Image</th>
            <th width="100px">Action</th>
        </tr>
        @foreach($product as $pro)
        <tr>

            <td>{{$pro->product_name}}</td>
            <td>{{$pro->product_code}}</td>
            <td>{{$pro->details}}</td>
        <td><img src="{{URL::to($pro->logo)}}" heidth="70px;" width="80px;"></td>

        <td>
            <!--<a class="btn btn-info" href="">Show</a>-->
            <a class="btn btn-primary" href="{{URL::to('/edit/product/'.$pro->id)}}">Edit</a>
            <a class="btn btn-danger" href="{{URL::to('/delete/product/'.$pro->id)}}" onclick="return confirm('Deseja apagar o registro?')">Delete</a>
        </td>

        </tr>
        @endforeach
        </tr>


    </table>

