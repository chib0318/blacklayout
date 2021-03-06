@extends('layouts/app')


@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection









@section('content')





<div class="container">
    <a href="/home/news/create" class="btn btn-success">新增最新消息</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>img</th>
                <th>title</th>
                <th>content</th>
                <th>sort</th>
                <th width="100px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_news as $item)

            <tr>
                <td><img src="{{asset($item->connection)}}" alt="" width="120"></td>
                <td>{{$item->queue}}</td>
                <td>{{$item->payload}}</td>
                <td>{{$item->sort}}</td>
                <td><a href="/admin/news/edit/{{$item->id}}" class="btn btn-success btn-sm">修改</a>
                    <button class="btn btn-danger btn-sm" onclick="show_confirm({{$item->id}})">刪除</button>
                    <form id="delete-form-{{$item->id}}" action="/home/news/delete/{{$item->id}}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection


@section('js')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">


</script>


<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">


</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
    "order": [[ 3, 'desc' ]]
} );
} );


function show_confirm(id)
  {
    console.log(id)
    var r=confirm("你確定要刪除")
    if (r==true)
        {
            document.getElementById(`delete-form-${id}`).submit();
        }

    }
</script>
@endsection
