<div class="link-prize row">
  <div class="col-xs-12">
    <input type="hidden" name="data_id{{$key+1}}" value="{{$link['id']}}">
    {{-- 奖项{{$key+1}} --}}
    <div class="form-group">
      <div class="col-lg-1">
        <button class="btn btn-primary">&times;</button>
      </div>
      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
      <div class="col-lg-1">
        <select class="form-control" id="selectPrizePlaces{{$key+1}}" name="selectPrizePlaces{{$key+1}}" required>
          @if (($link['prize']) == '一等奖')
          <option selected>一等奖</option>
          <option>二等奖</option>
          <option>三等奖</option>
          @elseif (($link['prize']) == '二等奖')
          <option>一等奖</option>
          <option selected>二等奖</option>
          <option>三等奖</option>
          @elseif (($link['prize']) == '三等奖')
          <option>一等奖</option>
          <option>二等奖</option>
          <option selected>三等奖</option>
          @else
          <option>一等奖</option>
          <option>二等奖</option>
          <option>三等奖</option>
          @endif
        </select>
      </div>
    </div>

    {{-- 奖品名称 --}}
    <div class="form-group">
      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
      <div class="col-lg-2">
        <input type="text" class="form-control" id="inputPrizeName{{$key+1}}" name="inputPrizeName{{$key+1}}" placeholder="奖品名称" value="{{ $link['name'] }}" required>
      </div>
    </div>

    {{-- 兑奖链接 --}}
    <div class="form-group">
      {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
      <div class="col-lg-2">
        <input type="url" class="form-control" id="inputURL{{$key+1}}" name="inputURL{{$key+1}}" placeholder="兑奖链接" value="{{ $link['prize_url'] }}" required>
      </div>
    </div>

    {{-- 奖品图片 --}}
    <div class="form-group">
      @if (!empty($link['url']))
      <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label"><a href="{{substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], 0,-9)}}/uploads/img/{{ $link['url']}}" target="blank">查看已上传的图片</a></label>
      <div class="col-lg-3">
        <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="重新上传图片">
      </div>
      @else
      <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label">上传奖品图片</label>
      <div class="col-lg-3">
        <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="上传实物图片">
      </div>
      @endif
    </div>

    {{-- 权重 --}}
    <div class="form-group">
      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
      <div class="col-lg-2">
        <input type="number" class="form-control" id="inputNumber{{$key+1}}" name="inputNumber{{$key+1}}" placeholder="权重" value="{{$link['weight']}}" required>
      </div>
    </div>

  </div>
</div>{{-- row --}}
