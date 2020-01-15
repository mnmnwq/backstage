@extends('layout.admin')
@section('body')
    <button type="button" class="layui-btn add_btn">增加菜单</button>
    <table class="layui-table">
        <colgroup>
            <col width="10%">
            <col width="10%">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>层级</th>
            <th>菜单名称</th>
            <th>菜单路由</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menu as $v)
        <tr>
            <td>{!! str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']).'|-' !!}</td>
            <td>{{$v['menu_name']}}</td>
            <td>{{$v['menu_route']}}</td>
            <td><input type="text" class="sort" value="{{$v['sort']}}" data-id="{{$v['id']}}" style="width: 45px;"></td>
            <td>
                <a href="{{url('admin/up_menu')}}?id={{$v['id']}}">修改</a> |
                <a href="{{url('admin/del_menu')}}?id={{$v['id']}}">删除</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>

        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.add_btn').click(function(){
                window.location.href = "{{url('admin/add_menu')}}";
            });
            layui.use(['form', 'layedit', 'laydate'], function(){
                var form = layui.form
                    ,layer = layui.layer
                    ,layedit = layui.layedit
                    ,laydate = layui.laydate;
                $('.sort').blur(function(){
                    var sort = $(this).val();
                    var id = $(this).attr('data-id');
                    $.ajax({
                        'type':'post',
                        'url':"{{url('admin/menu_sort')}}",
                        'data':{id:id,sort:sort},
                        'dataType':'json',
                        success:function(result){
                            if(result.errno == 0){
                                window.location.reload();
                            }else{
                                layer.msg(result.msg);
                            }
                        }
                    });
                });

            });

        });
    </script>
@endsection