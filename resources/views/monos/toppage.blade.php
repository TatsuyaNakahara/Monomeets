@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Monomeets</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    </head>
        
<div class="monomeets">
    <h1>Monomeets</h1>
</div>
    <div class="highlights">
            <h3>～モノのセカンドキャリアを考えよう～</h3>
　          Monomeetsは使わないけれど捨てられないものを交換しあうサービスです。<br><br>
        　　<h2>How to use Monomeets?</h2><br>
        　　大切なモノを大切な人に使ってもらおう！<br>
        　　<div class="month">
    　　　　月額50円で登録したら使い放題！<br>
    　　　　</div>
    　　　<div class="steps">
    　      <h3 class="ribbon1">Step1</h3><br>
    　       <div class="content1">
    　　　　自分が交換に出したいモノを登録<br>
    　　　　</div>
    　      <h3 class="ribbon1">Step2</h3><br>
    　       <div class="content2">
    　　　　他のユーザーが登録している交換希望商品を検索<br>
    　　　　</div>
    　      <h3 class="ribbon1">Step3</h3><br>
    　       <div class="content3">
    　　　　自分が欲しいものがあれば、Wantボタンを押してからリクエストとしてそのモノのページの掲示板に書き込み<br>
    　　　　リクエストされたら、リクエストをしてくれたユーザーのページで自分の商品と交換したいモノを選んでみよう！<br>
    　　　　こまめにチェックしてみよう！<br>
    　　　　また、複数のユーザーからコメントが来ている場合は、一番欲しいモノを持っているユーザーと交換しましょう<br>
    　　　　</div>
    　      <h3 class="ribbon1">Step4</h3><br>
    　       <div class="content4">
      　　　　掲示板で交渉が成立したら交換場所を決めて交換！あなたのモノの再就職を見届けよう<br><br><br>
      　　　   </div>
      　　　 <h3 class="ribbon2">Attention!</h3>
      　　　 <div class="attention">
      　　　　交換が成立したら、お互いに交換したモノのページを削除して下さい。<br><br><br>
      　　　 </div>
        </div>
            <div class="start">
                今すぐ始める
            
            <div>
                ↓　　　↓　　　↓　　　↓　　　↓
            </div><br>
        
            <div class="button">
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-md btn-default' ]) !!}
            </div>
        </div>
            </div>
            
            <br><br>
        </div>
        
    
 @endsection         
<link href="{{ asset('css/toppage.css') }}" media="all" rel="stylesheet" type="text/css" />