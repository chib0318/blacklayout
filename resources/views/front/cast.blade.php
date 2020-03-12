
@extends('layout/nav')
@section('css')
<style>
    li{
        list-style: none;
    }
    .product-card .color{
        padding: 10px 20px;
        width: 160px;
        min-height: 58px;
        height: 100%;
        font-size: 16px;
        line-height: 20px;
        color: #757575;
        text-align: center;
        border: 1px solid #eee;
        background-color: #fff;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: opacity,border .2s linear;
        cursor: pointer;
    }
    .product-ram .color{
        padding: 10px 20px;
        width: 160px;
        min-height: 58px;
        height: 100%;
        font-size: 16px;
        line-height: 20px;
        color: #757575;
        text-align: center;
        border: 1px solid #eee;
        background-color: #fff;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: opacity,border .2s linear;
        cursor: pointer;
    }
    .product-ram .color.active{
        color: #424242;
        border-color: #ff6700;
        transition: opacity,border .2s linear;
    }
    .product-card .color.active{
        color: #424242;
        border-color: #ff6700;
        transition: opacity,border .2s linear;
    }
    ul{
        padding-left: 0;
    }
    .col-4{
        margin-top: 20px;
    }
    .a{
        font-size: 40px;
    }
</style>

@endsection
@section('content')

<section class="engine"><a href="https://mobirise.info/x">css templates</a></section><section class="features3 cid-rRF3umTBWU m100" id="features3-7">




    <div class="container">
        <div class="row">
            <div class="l col-6">
                <img width="500" src="https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1569413422.26995787.png" alt="">
            </div>
            <div class="r col-6">
                <div class="product">

                    <div class="product-title">

                        <span class="a">Redmi Note 8 Pro</span>
                        <div class="product-title-2">
                            <span>6GB+64GB, 冰翡翠</span><br>
                            <span>NT$6,599</span><hr>
                        </div>
                    </div>
                    <div class="product-ram">
                        容量
                        <ul class="row aa">
                            <div class="col-4">
                                <li class="color" data-ram="6GB+64GB">6GB+64GB</li>
                            </div>
                            <div class="col-4">
                                <li class="color" data-ram="6GB+128GB">6GB+128GB</li>
                            </div>
                        </ul>
                    </div>
                    <div class="product-card">
                        顏色
                        <div class="row">
                            <div class="col-4">
                                <div class="color" data-color="藍">藍</div>
                            </div>
                            <div class="col-4">
                                <div class="color" data-color="黃">黃</div>
                            </div>
                            <div class="col-4">
                                <div class="color" data-color="綠">綠</div>
                            </div>
                            <div class="col-4">
                                <div class="color" data-color="紫">紫</div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="product-qty">
                            數量
                            <div id="field1">
                                <button type="button" id="sub" class="sub">-</button>
                                <input type="number" id="1" value="1" min="1" max="3" />
                                <button type="button" id="add" class="add">+</button>
                            </div>
                        </div>
                        <div class="product-total">
                            <div>
                                <span>Redmi Note 8 Pro</span>
                                <span>冰翡翠</span>
                                <span>6GB+64GB</span> * <span>1</span>
                                NT$7,599
                            </div>
                        </div>
                        <input type="text" name="capacity" id="capacity">
                        <input type="text" name="color" id="color"><br>
                        <button>立即購買</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script>
    // $('.product .color').click(function(){
    //     $('.product .color').removeClass("active");
    //     $(this).addClass("active");
    // var color = $(this).attr("data-color");
    //     $('#color').val(color);
    // });
    $('.product-card .color').click(function(){
        $('.product-card .color').removeClass("active");
        $(this).addClass("active");
        var color = $(this).attr("data-color");
        $('#color').val(color);
    });
    $('.product-ram .color').click(function(){
        $('.product-ram .color').removeClass("active");
        $(this).addClass("active");
        var ram = $(this).attr("data-ram");
        $('#capacity').val(ram);
    });

    $('.add').click(function () {
		if ($(this).prev().val() < 99) {
    	$(this).prev().val(+$(this).prev().val() + 1);
		}
});
$('.sub').click(function () {
		if ($(this).next().val() > 1) {
    	if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
});
</script>
@endsection
