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
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menu as $v)
        <tr>
            <td>{!! str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']).'|-' !!}</td>
            <td>{{$v['menu_name']}}</td>
            <td>{{$v['menu_route']}}</td>
            <td>
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
            $('.add_btn').click(function(){
                window.location.href = "{{url('admin/add_menu')}}";
            });
        });
    </script>
@endsection