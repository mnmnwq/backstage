@extends('layout.admin')
@section('body')
    <button type="button" class="layui-btn back_btn">返回</button>
    <form class="layui-form" action="{{url('admin/do_role_user')}}" method="post">
        @csrf
        <input type="hidden" name="uid" value="{{$user_info['id']}}">
        <div class="layui-form-item">
            <label class="layui-form-label">用户昵称</label>
            <div class="layui-input-block">
                <input type="text" name="username"  autocomplete="off" placeholder="用户昵称" value="{{$user_info['username']}}" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">角色</label>
            <div class="layui-input-block">
                <select name="role_id" >
                    <option value="0">--选择--</option>
                    @foreach($role_info as $v)
                    <option value="{{$v['id']}}" @if($v['id'] == $user_role['role_id']) selected @endif>{{$v['role_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" >立即提交</button>
{{--                <button type="reset" class="layui-btn layui-btn-primary">重置</button>--}}
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>

        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.back_btn').click(function(){
                window.location.href = "{{url('admin/user')}}";
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