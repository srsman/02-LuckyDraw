@extends('layout')

@section('title')修改密码@stop

@section('body')
  @parent

  <main class="container-fluid">
    <div class="row">
      <div id="changePasswd" class="parent well col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="middle">
          <form class="form-horizontal" action="changePasswd" method="post">
            <fieldset>
              <legend>修改密码</legend>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">原密码</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="请输入原密码" name="password" required>
                   @if($errors->has('password'))
                  <label class="text-danger control-label" >
                  (*请输入正确的原密码)
                  </label>  
                  @endif 
                </div>
              </div>

              <div class="form-group">
                <label for="inputNewPassword" class="col-lg-2 control-label">新密码</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputNewPassword" placeholder="请输入新密码" name="new_password" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputNewPasswordAgain" class="col-lg-2 control-label">新密码</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputNewPasswordAgain" placeholder="请再次输入新密码" name="again_password" required>
                    @if($errors->has('again_password'))
                  <label class="text-danger control-label" >
                  (*两次输入密码必须一致)
                  </label>  
                    @endif 
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
