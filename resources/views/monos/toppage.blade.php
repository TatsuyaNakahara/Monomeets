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
    　　　　月額50円で登録したら使い放題！<br>
    　      <h3 class="ribbon1">Step1</h3><br>
    　　　　自分が交換に出したいMonoを登録<br>
    　      <h3 class="ribbon1">Step2</h3><br>
    　　　　他のユーザーが登録している交換希望商品を検索<br>
    　      <h3 class="ribbon1">Step3</h3><br>
    　　　　自分が欲しいものがあれば、リクエストとして掲示板に書き込み<br>
    　　　　リクエストされたら、リクエストをしてくれたユーザーのページで自分の商品と交換したいモノを選んでみよう！<br>
    　      <h3 class="ribbon1">Step4</h3><br>
      　　　　掲示板で交渉が成立したら交換場所を決めて物の再就職を見届けよう<br><br><br>
      　　　　
      　　　　
        </div>
            <div>
                今すぐ始める
            </div>
            
            <div>
                ↓　　　↓　　　↓　　　↓　　　↓
            </div><br>
        
            <div class="button">
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-md btn-default' ]) !!}
            </div>
            
            <br><br>
        </div>
        
    
 @endsection         
<link href="{{ asset('css/toppage.css') }}" media="all" rel="stylesheet" type="text/css" />