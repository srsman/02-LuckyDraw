@extends('layout')

@section('title')修改密码@stop

@section('body')
  @parent

  <main class="container-fluid">
    <div class="row">
      <div id="changePasswd" class="parent well col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="middle">
          <form class="form-horizontal">
            <fieldset>
              <legend>修改密码</legend>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">原密码</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="请输入原密码" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputNewPassword" class="col-lg-2 control-label">新密码</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputNewPassword" placeholder="请输入新密码" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputNewPasswordAgain" class="col-lg-2 control-label">新密码</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputNewPasswordAgain" placeholder="请再次输入新密码" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">修改</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </main>
@stop
