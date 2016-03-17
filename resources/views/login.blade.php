@extends('layout')

@section('title')用户登录@stop

@section('body')

  @parent

  <main class="container-fluid">
    <div class="row">
      <div id="login" class="parent well col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="middle">
          <form class="form-horizontal">
            <fieldset>
              <legend>用户登录</legend>
              <div class="form-group">
                <label for="inputUsername" class="col-lg-2 control-label">用户名</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="inputUsername" placeholder="请输入用户名" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">密码</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="请输入密码" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">登录</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </main>
@stop
