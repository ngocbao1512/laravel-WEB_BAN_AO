
<style>
    body { background-color: #021A4B; font-family: 'Concert One', cursive; margin: 0; overflow: hidden; padding: 0; }

    /*/////////////////// rules */
    $color-black:     #13242C;
    $color-dark:      #283B49;
    $color-yellow:    #EBA849;
    $color-white:     #dbdbdb;
    $color-green:     #41A88B;
    $color-light:     #7987AB;
    $color-skin:      #CA906F;
    // $color-red:       #A00A11;
    $color-blue:      #73bcc6;

    @mixin bg ($color, $opacity) {
    background-color: rgba($color, $opacity);
    }
    @mixin position {
    position: absolute;
    }
    @mixin top50 {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    }
    @mixin left50 {
    left: 50%;
    position: absolute;
    transform: translateX(-50%);
    }
    @mixin centered {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    }
    /*___________________________________________________*/
    /*//////////////////////////////////////////// scene */
    .text {
    @include left50;
    color: $color-white;
    font-size: 3em;
    margin: 0;
    opacity: 0.3;
    text-align: center;
    top: 50px;
    width: 80%;
    }
    .container {
    @include centered;
    // @include bg($color-white, 0.3);
    height: 350px;
    width: 400px;
    .bg {
        @include centered;
        @include bg($color-white, 0.05);
        border-radius: 50%;
        box-shadow: 0px 0px 100px 50px rgba($color-white, 0.1);
        height: 400px;
        overflow: hidden;
        width: 400px;
        .light {
        @include centered;
        border-color: transparent transparent $color-white transparent;
        border-style: solid;
        border-width: 0 160px 400px 160px;
        height: 0;
        opacity: 0;
        width: 0;
        }
    }
    }
    .ufo {
    @include position;
    // @include bg($color-white, 0.3); 
    height: 100px;
    left: calc(50% - 50px);
    top: 0;
    width: 100px;
    .ufo-bottom {
        @include left50;
        @include bg($color-yellow, 1);
        border-radius: 50%;
        height: 20px;
        top: 55px;
        width: 20px;
        &:after, &:before {
        @include position;
        @include bg($color-yellow, 1);
        border-radius: 50%;
        content:"";
        height: 20px;
        top: -6px;
        width: 20px;
        } 
        &:after   { left: -25px; }
        &:before  { left: 25px; }
    }
    .ufo-top {
        @include left50;
        @include bg($color-yellow, 1);
        border-radius: 50%;
        height: 70px;
        width: 90px;
        &:before {
        @include left50;
        @include bg($color-dark, 1);
        border-radius: 50%;
        content:"";
        height: 70px;
        top: -10px;
        width: 100px;
        }
    }
    .ufo-glass {
        @include left50;
        @include bg($color-white, 1);
        border-radius: 90px 90px 80px 80px;
        height: 80px;
        overflow: hidden;
        top: -40px;
        width: 80px;
        .alien {
        @include left50;
        @include bg($color-green, 1);
        border-radius: 50px 50px 0 0;
        height: 70px;
        overflow: hidden;
        top: 25px;
        width: 50px;
        .alien-eye {
            @include left50;
            @include bg($color-white, 1);
            border-radius: 50%;
            height: 30px;
            top: 10px;
            width: 30px;
            &:after {
            @include left50;
            @include bg($color-green, 1);
            border-radius: 50%;
            content:"";
            height: 40px;
            bottom: 30px;
            width: 40px;
            }        
            &:before {
            @include left50;
            @include bg($color-black, 1);
            border-radius: 50%;
            content:"";
            height: 10px;
            bottom: 5px;
            width: 10px;
            }
        }
        }
    }
    }
    .bed {
    @include left50;
    @include bg($color-black, 1);
    border-radius: 25px;
    bottom: -25px;
    height: 10px;
    width: 230px;
    .mattress {
        @include left50;
        @include bg($color-white, 0.4);    
        border-radius: 10px;
        bottom: 10px;
        height: 30px;
        width: 220px;
    }
    }
    .man {  
    @include left50;  
    border-radius: 50%;
    bottom: 13px;
    height: 150px;
    width: 150px;
    .foot {
        @include position;
        @include bg($color-blue, 0.5); 
        border-radius: 50%;
        box-shadow: 0px -15px 0 rgba($color-blue, 0.2);
        height: 35px;
        left: 0px;
        top: 113px;
        width: 35px;
    }
    .man-body {
        @include left50;
        @include bg($color-skin, 1);    
        border-radius: 50%;
        box-shadow: -30px -70px 0 -71px $color-skin;
        height: 150px;
        overflow: hidden;
        width: 150px;
        &:after {
        @include top50;
        @include bg($color-blue, 1);
        content:"";
        height: 100%;
        left: calc(50% - 20px);
        width: 100px;
        }
    }
    .head {
        @include position;
        height: 80px;
        right: -78px;
        top: 35px;
        width: 80px;
        .face {
        @include top50;
        @include bg($color-skin, 1);
        border-radius: 50%;
        height: 70px;
        left: 0;
        overflow: hidden;
        width: 70px;
        &:after {
            @include position;
            @include bg($color-black, 1);
            border-radius: 50%;
            content:"";
            height: 70px;
            left: 0;
            top: 50px;
            width: 70px;
        }
        }
        .hair {
        @include position;
        @include bg($color-black, 1);
        border-radius: 30px 0;
        height: 50px;
        right: 0px;
        top: 20px;
        width: 30px;
        }
    }
    .arm {
        @include position;
        @include bg($color-skin, 1);
        border-radius: 50px;
        height: 140px;
        right: 15px;
        top: 60px;
        width: 60px;
    }
    }
    /*___________________________________________________*/
    /*//////////////////////////////////////// animation */
    .ufo {
    animation: top-anima 1.5s infinite linear;
    @keyframes top-anima {
        0%      {top: 0}
        50%     {top: -5px}
    }
    }
    .bg .light {
    animation: light-anima 3s infinite linear;
    @keyframes light-anima {
        0%      {opacity: 0}
        45%     {opacity: 0.2}
        52%     {opacity: 0.2}
        55%     {opacity: 0}
        60%     {opcaity: 0}
        100%    {opcaity: 0}
    }
    }
    .ufo .alien .alien-eye:after{
    animation: alien01-anima 3s infinite linear;
    @keyframes alien01-anima {
        0%      {bottom: 30px}
        52%     {bottom: 30px}
        55%     {bottom: 20px}
        60%     {bottom: 20px}
        100%    {bottom: 20px}
    }
    }
    .bed .mattress {
    animation: mattress-anima 3s infinite linear;
    @keyframes mattress-anima {
        0%      {bottom: 10px}
        52%     {bottom: 10px}
        55%     {bottom: 15px}
        60%     {bottom: 10px}
        100%    {bottom: 10px}
    }
    }
    .man {
    animation: man-anima 3s infinite linear;
    @keyframes man-anima {
        0%      {bottom: 13px}
        50%     {bottom: 80px}
        52%     {bottom: 10px}
        55%     {bottom: 30px}
        60%     {bottom: 13px}
        100%    {bottom: 13px}
    }
    .head {    
        transform: rotate(20deg);
        transform-origin: -75px 40px;
        animation: head-anima 3s infinite linear;
        @keyframes head-anima {
        0%      {transform: rotate(20deg);}
        50%     {transform: rotate(40deg);}
        52%     {transform: rotate(20deg);}
        55%     {transform: rotate(10deg);}
        60%     {transform: rotate(20deg);}
        100%    {transform: rotate(20deg);}
        }
    }
    .arm {
        transform: rotate(30deg);
        transform-origin: 30px 30px;
        animation: arm-anima 3s infinite linear;
        @keyframes arm-anima {
        0%      {transform: rotate(30deg);}
        15%     {transform: rotate(-5deg);}
        20%     {transform: rotate(5deg);}
        25%     {transform: rotate(-2.5deg);}
        30%     {transform: rotate(2.5deg);}
        50%     {transform: rotate(0deg);}
        52%     {transform: rotate(30deg);}
        100%    {transform: rotate(30deg);}
        }
    }
    }
    /*/////////////////////// credit ////*/
    #link {
    bottom: 20px;
    color: #fff;
    opacity: 0.5;
    display: flex;
    align-items: center;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    }
    #link p {margin: 0; margin-left: 5px;}
    #link:hover {opacity: 1;}
</style>
@endsection
</x-male-shop>