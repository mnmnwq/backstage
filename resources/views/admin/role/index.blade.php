@extends('layout.admin')
@section('body')
<button type="button" class="layui-btn add_btn">增加角色</button>
<table class="layui-table">
    <colgroup>
        <col width="30%">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>角色名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($role_info as $v)
        <tr>
            <td>{{$v['role_name']}}</td>
            <td>
                <a href="{{url('admin/role_permission')}}?id={{$v['id']}}">分配权限</a>
                <a href="{{url('admin/del_role')}}?id={{$v['id']}}">删除</a>
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
                window.location.href = "{{url('admin/add_role')}}";
            });
            layui.use(['form', 'layedit', 'laydate'], function(){
                var form = layui.form
                    ,layer = layui.layer
                    ,layedit = layui.layedit
                    ,laydate = layui.laydate;


            });

        });
    </script>
@endsection