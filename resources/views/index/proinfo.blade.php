@extends('layouts.show')
@section('title', '')
@section('content') @parent

     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     浏览量：{{$count}};
     <div id="sliderA" class="slider">
      <img src="images/image1.jpg" />
      <img src="images/image2.jpg" />
      <img src="images/image3.jpg" />
      <img src="images/image4.jpg" />
      <img src="images/image5.jpg" />
     </div><!--sliderA/-->
     @foreach($goods as $k=>$v)
     <table class="jia-len">
      <tr>
       <th><strong class="orange">14.25</strong></th>
       <td>
        <input type="text" class="spinnerExample" />
       </td>
      </tr>
      <tr>
       <td>
        <strong>三级分销农庄有机毛豆500g{{$v->good_name}}</strong>
        <p class="hui">富含纤维素，平衡每日膳食</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
      @endforeach
     <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;">100ML</a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>
      <div class="clearfix"></div>
     </ul><!--guige/-->
     <input type="text" />
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="images/image4.jpg" width="636" height="822" />
     </div><!--proinfoList/-->
    <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="car.html">加入购物车</a></td>
      </tr>
     </table>


@endsection