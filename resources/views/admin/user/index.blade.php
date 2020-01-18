@extends('layout.admin')
@section('body')
    <button type="button" class="layui-btn add_btn">增加用户</button>
    <table class="layui-table">
        <colgroup>
            <col width="30%">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>用户昵称</th>
            <th>邮箱</th>
            <th>电话</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user_info as $v)
            <tr>
                <td>{{$v['username']}}</td>
                <td>{{$v['email']}}</td>
                <td>{{$v['tel']}}</td>
                <td>
                    @if($v['id'] != 1)
                    <a href="{{url('admin/up_user')}}?id={{$v['id']}}">修改</a> |
                    <a href="{{url('admin/del_user')}}?id={{$v['id']}}">删除</a> |
                    <a href="{{url('admin/role_user')}}?id={{$v['id']}}">分配角色</a>
                    @else
                        无
                    @endif
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
                window.location.href = "{{url('admin/add_user')}}";
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