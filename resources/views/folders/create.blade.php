@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">フォルダを追加する</div>
        <div class="panel-body">
          <!-- ルール違反の内容が詰められた$errors変数を使ってルール違反があったかを確認する -->
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              <!-- ルール違反があった場合、エラーメッセージを列挙する -->
              @foreach($errors->all() as $message)
              <li>{{ $message }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          　
          <!-- formアクションでurlを呼び出し、フォームを使ってデータを送る -->
          <form action="{{ route('folders.create') }}" method="post">
            　
            <!-- 他サイトからの悪意あるPOSTリクエストを受け付けないよう、自分のサイトからのPOSTリクエストだけ受け付けるため、CSRFトークンを用いる -->
            @csrf
            <div class="form-group">
              <label for="title">フォルダ名</label>
              <!-- 入力エラーでフォーム画面に戻ったとき、old関数からセッション値を取得し、入力欄の値を復元させる -->
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">送信</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection