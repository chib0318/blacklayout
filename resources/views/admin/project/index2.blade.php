@extends('layouts/app')


@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection









@section('content')





<div class="container">
    <a href="/home/project/create2" class="btn btn-success">新增最新消息</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>類別</th>
                <th>圖片</th>
                <th>權重</th>
                <th>標題</th>
                <th>內容</th>
                <th width="100px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)

            <tr>
                <td>{{$item->projects_types->types}}</td>
                <td><img src="{{asset($item->img)}}" alt="" width="120"></td>
                <td>{{$item->sort}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->content}}</td>
                <td><a href="/admin/project/edit2/{{$item->id}}" class="btn btn-success btn-sm">修改</a>
                    <button class="btn btn-danger btn-sm" onclick="show_confirm({{$item->id}})">刪除</button>
                    <form id="delete-form-{{$item->id}}" action="/home/project/delete2/{{$item->id}}" method="POST"
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
    "order": [[ 0, 'desc' ]]
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
