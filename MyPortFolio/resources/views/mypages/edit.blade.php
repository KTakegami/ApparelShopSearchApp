@extends('layouts.parent')

@section('title','ユーザ情報編集')

@include('layouts.header')

@section('content')

<div class="container mt-5" style="padding-bottom:500px;">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form method="post" action="{{ route('mypage.update',$user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group row">
      <div class="col-md-12">
        <div class="form-group row">
          <div class="col-12">
            <label for="name">ニックネーム</label>
            <input class="form-control" value="{{$user->name}}" id="name" name="name" type="text">
          </div>
          <div class="col-12 mt-3">
            <label for="image">ユーザ画像</label>
            <input class="form-control" id="image" name="profImage" type="file" accept="image/*">
          </div>
        </div>
      </div>
    </div>
    <div class="submit d-flex justify-content-center">
      <button class="btn btn-primary p-2" type="submit">
        <i class="fas fa-user"></i>
        更新する
      </button>
    </div>
  </form>
</div>

@endsection