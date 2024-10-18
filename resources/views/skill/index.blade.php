<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tru Tien Hon The Skill</title>
    <link rel="shortcut icon" href="/fe/img/logo.png" type="image/x-icon">


    <meta http-equiv="content-language" content="en">
    <meta http-equiv="description" content="Database Jade Dynasty">
    <meta http-equiv="keywords"
        content="MMO, JD, Jade Dynasty, ZhuXian, Zhu Xian, Jade Dynasty Online, Online, Multiplayer Massive Online, RPG, Database, item, items, mob, monsters, NPC, maps, quest">
    <link rel="stylesheet" type="text/css" media="all" href="/skill/style.css">
    <script type="text/javascript" src="/skill/main.js"></script>
    <script type="text/javascript" src="/skill/scripts.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="/skill/calc.css">
    <script type="text/javascript" src="/skill/calcmin.js"></script>
</head>
@php
    $faction = request()->get('c') ? request()->get('c') : 'jadeon';
@endphp

<body cz-shortcut-listen="true">
    <div id="logo">
        <h1><a href="/">Age of Chaos</a></h1>
    </div>
    <div id="ddmxgb">
        <table id="menu1" class="ddmx" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td><a class="item1" href="#" id="menu1-1">Nhân Tộc</a>
                        <div class="section" id="menu1-1-section"
                            style="top: 88px; left: 100px; visibility: hidden; z-index: -1;">
                            <a class="item2" href="?c=jadeon" id="menu1-1-2">Thanh Vân Môn</a>
                            <a class="item2" href="?c=vim" id="menu1-1-0">Quỷ Vương Tông</a>
                            <a class="item2" href="?c=lupin" id="menu1-1-1">Hợp Hoan Phái</a>
                            <a class="item2" href="?c=skysong" id="menu1-1-3">Thiên Âm Tự</a>
                            <a class="item2" href="?c=modo" id="menu1-1-4">Quỷ Đạo</a>
                            <a class="item2" href="?c=incense" id="menu1-1-5">Phần Hương Cốc</a>
                        </div>
                    </td>
                    <td><a class="item1" href="#" id="menu1-1">Thần Duệ</a>
                        <div class="section" id="menu1-1-section"
                            style="top: 88px; left: 100px; visibility: hidden; z-index: -1;">
                            <a class="item2" href="?c=arden" id="menu1-1-6">Liệt Sơn</a>
                            <a class="item2" href="?c=balo" id="menu1-1-7">Cửu Lê</a>
                            <a class="item2" href="?c=rayan" id="menu1-1-8">Hoài Quang</a>
                            <a class="item2" href="?c=celan" id="menu1-1-9">Thiên Hoa</a>
                            <a class="item2" href="?c=forta" id="menu1-1-10">Thái Hạo</a>
                            <a class="item2" href="?c=barbe" id="menu1-1-11">Thần Hoàng</a>
                        </div>
                    </td>
                    <td><a class="item1" href="/skill/skills/?" id="menu1-1">Thiên Mạch</a>
                        <div class="section" id="menu1-1-section"
                            style="top: 88px; left: 100px; visibility: hidden; z-index: -1;">
                            <a class="item2" href="?c=psychea" id="menu1-1-12">Khiên Cơ</a>
                            <a class="item2" href="?c=kytos" id="menu1-1-13">Anh Chiêu</a>
                            <a class="item2" href="?c=hydran" id="menu1-1-14">Phá Quân</a>
                            <a class="item2" href="?c=seira" id="menu1-1-15">Thanh La</a>
                            <a class="item2" href="?c=gevrin" id="menu1-1-16">Quy Vân</a>
                            <a class="item2" href="?c=sylia" id="menu1-1-17">Hoạ Ảnh</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        var ddmx = new DropDownMenuX('menu1');
        ddmx.init();
    </script>
    <div id="content">
        <script type="text/javascript" src="/skill/data_pwi.js"></script>
        <script type="text/javascript" src="/skill/t{{ $faction }}_pwi.js"></script>
        <script type="text/javascript" src="/skill/lang_pwi.js"></script>
        <div class="tableHeader tup">KỸ NĂNG MÔN PHÁI: <span id="class">{{ $classes[$faction]}}</span></div>
        <table class="calc">
            <tbody>
                <tr>
                    <td id="cmenu">
                        <div id="rebornskill"><a href="/skills?" onclick="return C.th(&#39;d&#39;)"
                                class="strong">Mặc định</a> - <a href="/skills?"
                                onclick="return C.th(&#39;r&#39;)">Sau chuyển sinh</a></div>
                        <div id="chroma" class="menuitem" style="display: none;"><strong>Nguyên thần</strong>:
                            <input type="text" id="chroma_s" oninput="C.gm();" style="width:50px;"></div>
                        <div id="chroma_text" class="menuitem" style="display: none;"><strong>Additional
                                skillpoints</strong>: 0
                        </div>
                        <div class="menuitem"><strong>Kỹ năng</strong>: <span id="skilltext">0 / 150</span></div>
                        <div class="menuitem"><strong>Thiên thư</strong>: <span id="booktext">0 / 48</span></div>
                        <div class="menuitem"><strong>Level &gt;=</strong>: <span id="player_level">0</span></div>
                        <div class="menuitem" id="link"><strong>Link to this build:</strong><br><a
                                href="/skills?c=jadeon#d">d</a></div>
                    </td>
                    <td id="skill">
                        <div class="cont">
                            <h3>Tân thủ</h3>
                            <div class="abs sjadeon10">
                                <div class="sjadeon" id="img218"
                                    style="background-position:0px 0px;top:28px;left:107px"></div>
                                <div class="trans" id="tr218" style="top:28px;left:107px"></div>
                                <div class="border" id="b218" style="top:25px;left:104px"></div>
                                <div class="t" id="t218" style="top:46px;left:107px;">0</div>
                                <div class="pop" id="pop218" style="top:28px;left:107px;"
                                    onmouseover="C.td(218,event);" onmouseout="C.tf();" onclick="C.ts(218);"></div>
                                <div class="m" id="m218" style="top:58px;left:102px;display:none;"
                                    onclick="C.tg(218,-1,10,event);" onmouseover="C.td(218,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p218" style="top: 58px; left: 136px; display: block;"
                                    onclick="C.tg(218,1,10,event);" onmouseover="C.td(218,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img219"
                                    style="background-position:-36px 0px;top:99px;left:172px"></div>
                                <div class="trans" id="tr219" style="top:99px;left:172px"></div>
                                <div class="border" id="b219" style="top:96px;left:169px"></div>
                                <div class="t" id="t219" style="top:117px;left:172px;">0</div>
                                <div class="pop" id="pop219" style="top:99px;left:172px;"
                                    onmouseover="C.td(219,event);" onmouseout="C.tf();" onclick="C.ts(219);"></div>
                                <div class="m" id="m219" style="top:129px;left:167px;display:none;"
                                    onclick="C.tg(219,-1,10,event);" onmouseover="C.td(219,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p219" style="top:129px;left:201px;display:none;"
                                    onclick="C.tg(219,1,10,event);" onmouseover="C.td(219,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img220"
                                    style="background-position:-72px 0px;top:111px;left:65px"></div>
                                <div class="trans" id="tr220" style="top:111px;left:65px"></div>
                                <div class="border" id="b220" style="top:108px;left:62px"></div>
                                <div class="t" id="t220" style="top:129px;left:65px;">0</div>
                                <div class="pop" id="pop220" style="top:111px;left:65px;"
                                    onmouseover="C.td(220,event);" onmouseout="C.tf();" onclick="C.ts(220);"></div>
                                <div class="m" id="m220" style="top:141px;left:60px;display:none;"
                                    onclick="C.tg(220,-1,10,event);" onmouseover="C.td(220,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p220" style="top:141px;left:94px;display:none;"
                                    onclick="C.tg(220,1,10,event);" onmouseover="C.td(220,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img221"
                                    style="background-position:-108px 0px;top:181px;left:172px"></div>
                                <div class="trans" id="tr221" style="top:181px;left:172px"></div>
                                <div class="border" id="b221" style="top:178px;left:169px"></div>
                                <div class="t" id="t221" style="top:199px;left:172px;">0</div>
                                <div class="pop" id="pop221" style="top:181px;left:172px;"
                                    onmouseover="C.td(221,event);" onmouseout="C.tf();" onclick="C.ts(221);"></div>
                                <div class="m" id="m221" style="top:211px;left:167px;display:none;"
                                    onclick="C.tg(221,-1,10,event);" onmouseover="C.td(221,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p221" style="top:211px;left:201px;display:none;"
                                    onclick="C.tg(221,1,10,event);" onmouseover="C.td(221,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier10">0</div>
                            </div>
                        </div>
                        <div class="cont">
                            <h3>Tầng 1</h3>
                            <div class="abs sjadeon1">
                                <div class="sjadeon" id="img223"
                                    style="background-position:-180px 0px;top:24px;left:111px"></div>
                                <div class="trans" id="tr223" style="top:24px;left:111px"></div>
                                <div class="border" id="b223" style="top:21px;left:108px"></div>
                                <div class="t" id="t223" style="top:42px;left:111px;">0</div>
                                <div class="pop" id="pop223" style="top:24px;left:111px;"
                                    onmouseover="C.td(223,event);" onmouseout="C.tf();" onclick="C.ts(223);"></div>
                                <div class="m" id="m223" style="top:54px;left:106px;display:none;"
                                    onclick="C.tg(223,-1,1,event);" onmouseover="C.td(223,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p223" style="top:54px;left:140px;display:none;"
                                    onclick="C.tg(223,1,1,event);" onmouseover="C.td(223,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img226"
                                    style="background-position:-36px -36px;top:99px;left:111px"></div>
                                <div class="trans" id="tr226" style="top:99px;left:111px"></div>
                                <div class="border" id="b226" style="top:96px;left:108px"></div>
                                <div class="t" id="t226" style="top:117px;left:111px;">0</div>
                                <div class="pop" id="pop226" style="top:99px;left:111px;"
                                    onmouseover="C.td(226,event);" onmouseout="C.tf();" onclick="C.ts(226);"></div>
                                <div class="m" id="m226" style="top:129px;left:106px;display:none;"
                                    onclick="C.tg(226,-1,1,event);" onmouseover="C.td(226,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p226" style="top:129px;left:140px;display:none;"
                                    onclick="C.tg(226,1,1,event);" onmouseover="C.td(226,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img225"
                                    style="background-position:0px -36px;top:194px;left:111px"></div>
                                <div class="trans" id="tr225" style="top:194px;left:111px"></div>
                                <div class="border" id="b225" style="top:191px;left:108px"></div>
                                <div class="t" id="t225" style="top:212px;left:111px;">0</div>
                                <div class="pop" id="pop225" style="top:194px;left:111px;"
                                    onmouseover="C.td(225,event);" onmouseout="C.tf();" onclick="C.ts(225);"></div>
                                <div class="m" id="m225" style="top:224px;left:106px;display:none;"
                                    onclick="C.tg(225,-1,1,event);" onmouseover="C.td(225,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p225" style="top:224px;left:140px;display:none;"
                                    onclick="C.tg(225,1,1,event);" onmouseover="C.td(225,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img460"
                                    style="background-position:-36px -144px;top:67px;left:35px"></div>
                                <div class="trans" id="tr460" style="top:67px;left:35px"></div>
                                <div class="border" id="b460" style="top:64px;left:32px"></div>
                                <div class="t" id="t460" style="top:85px;left:35px;">0</div>
                                <div class="pop" id="pop460" style="top:67px;left:35px;"
                                    onmouseover="C.td(460,event);" onmouseout="C.tf();" onclick="C.ts(460);"></div>
                                <div class="m" id="m460" style="top:97px;left:30px;display:none;"
                                    onclick="C.tg(460,-1,1,event);" onmouseover="C.td(460,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p460" style="top:97px;left:64px;display:none;"
                                    onclick="C.tg(460,1,1,event);" onmouseover="C.td(460,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img222"
                                    style="background-position:-144px 0px;top:148px;left:35px"></div>
                                <div class="trans" id="tr222" style="top:148px;left:35px"></div>
                                <div class="border" id="b222" style="top:145px;left:32px"></div>
                                <div class="t" id="t222" style="top:166px;left:35px;">0</div>
                                <div class="pop" id="pop222" style="top:148px;left:35px;"
                                    onmouseover="C.td(222,event);" onmouseout="C.tf();" onclick="C.ts(222);"></div>
                                <div class="m" id="m222" style="top:178px;left:30px;display:none;"
                                    onclick="C.tg(222,-1,1,event);" onmouseover="C.td(222,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p222" style="top:178px;left:64px;display:none;"
                                    onclick="C.tg(222,1,1,event);" onmouseover="C.td(222,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img232"
                                    style="background-position:-216px -36px;top:261px;left:35px"></div>
                                <div class="trans" id="tr232" style="top:261px;left:35px"></div>
                                <div class="border" id="b232" style="top:258px;left:32px"></div>
                                <div class="t" id="t232" style="top:279px;left:35px;">0</div>
                                <div class="pop" id="pop232" style="top:261px;left:35px;"
                                    onmouseover="C.td(232,event);" onmouseout="C.tf();" onclick="C.ts(232);"></div>
                                <div class="m" id="m232" style="top:291px;left:30px;display:none;"
                                    onclick="C.tg(232,-1,1,event);" onmouseover="C.td(232,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p232" style="top:291px;left:64px;display:none;"
                                    onclick="C.tg(232,1,1,event);" onmouseover="C.td(232,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img233"
                                    style="background-position:0px -72px;top:67px;left:186px"></div>
                                <div class="trans" id="tr233" style="top:67px;left:186px"></div>
                                <div class="border" id="b233" style="top:64px;left:183px"></div>
                                <div class="t" id="t233" style="top:85px;left:186px;">0</div>
                                <div class="pop" id="pop233" style="top:67px;left:186px;"
                                    onmouseover="C.td(233,event);" onmouseout="C.tf();" onclick="C.ts(233);"></div>
                                <div class="m" id="m233" style="top:97px;left:181px;display:none;"
                                    onclick="C.tg(233,-1,1,event);" onmouseover="C.td(233,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p233" style="top:97px;left:215px;display:none;"
                                    onclick="C.tg(233,1,1,event);" onmouseover="C.td(233,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img231"
                                    style="background-position:-180px -36px;top:148px;left:186px"></div>
                                <div class="trans" id="tr231" style="top:148px;left:186px"></div>
                                <div class="border" id="b231" style="top:145px;left:183px"></div>
                                <div class="t" id="t231" style="top:166px;left:186px;">0</div>
                                <div class="pop" id="pop231" style="top:148px;left:186px;"
                                    onmouseover="C.td(231,event);" onmouseout="C.tf();" onclick="C.ts(231);"></div>
                                <div class="m" id="m231" style="top:178px;left:181px;display:none;"
                                    onclick="C.tg(231,-1,1,event);" onmouseover="C.td(231,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p231" style="top:178px;left:215px;display:none;"
                                    onclick="C.tg(231,1,1,event);" onmouseover="C.td(231,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img380"
                                    style="background-position:-180px -108px;top:237px;left:186px"></div>
                                <div class="trans" id="tr380" style="top:237px;left:186px"></div>
                                <div class="border" id="b380" style="top:234px;left:183px"></div>
                                <div class="t" id="t380" style="top:255px;left:186px;">0</div>
                                <div class="pop" id="pop380" style="top:237px;left:186px;"
                                    onmouseover="C.td(380,event);" onmouseout="C.tf();" onclick="C.ts(380);"></div>
                                <div class="m" id="m380" style="top:267px;left:181px;display:none;"
                                    onclick="C.tg(380,-1,1,event);" onmouseover="C.td(380,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p380" style="top:267px;left:215px;display:none;"
                                    onclick="C.tg(380,1,1,event);" onmouseover="C.td(380,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier1">0</div>
                            </div>
                        </div>
                        <div class="cont">
                            <h3>Tier 2</h3>
                            <div class="abs sjadeon2">
                                <div class="sjadeon" id="img230"
                                    style="background-position:-144px -36px;top:24px;left:111px"></div>
                                <div class="trans" id="tr230" style="top:24px;left:111px"></div>
                                <div class="border" id="b230" style="top:21px;left:108px"></div>
                                <div class="t" id="t230" style="top:42px;left:111px;">0</div>
                                <div class="pop" id="pop230" style="top:24px;left:111px;"
                                    onmouseover="C.td(230,event);" onmouseout="C.tf();" onclick="C.ts(230);"></div>
                                <div class="m" id="m230" style="top:54px;left:106px;display:none;"
                                    onclick="C.tg(230,-1,2,event);" onmouseover="C.td(230,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p230" style="top:54px;left:140px;display:none;"
                                    onclick="C.tg(230,1,2,event);" onmouseover="C.td(230,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img239"
                                    style="background-position:-216px -72px;top:99px;left:111px"></div>
                                <div class="trans" id="tr239" style="top:99px;left:111px"></div>
                                <div class="border" id="b239" style="top:96px;left:108px"></div>
                                <div class="t" id="t239" style="top:117px;left:111px;">0</div>
                                <div class="pop" id="pop239" style="top:99px;left:111px;"
                                    onmouseover="C.td(239,event);" onmouseout="C.tf();" onclick="C.ts(239);"></div>
                                <div class="m" id="m239" style="top:129px;left:106px;display:none;"
                                    onclick="C.tg(239,-1,2,event);" onmouseover="C.td(239,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p239" style="top:129px;left:140px;display:none;"
                                    onclick="C.tg(239,1,2,event);" onmouseover="C.td(239,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img234"
                                    style="background-position:-36px -72px;top:194px;left:111px"></div>
                                <div class="trans" id="tr234" style="top:194px;left:111px"></div>
                                <div class="border" id="b234" style="top:191px;left:108px"></div>
                                <div class="t" id="t234" style="top:212px;left:111px;">0</div>
                                <div class="pop" id="pop234" style="top:194px;left:111px;"
                                    onmouseover="C.td(234,event);" onmouseout="C.tf();" onclick="C.ts(234);"></div>
                                <div class="m" id="m234" style="top:224px;left:106px;display:none;"
                                    onclick="C.tg(234,-1,2,event);" onmouseover="C.td(234,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p234" style="top:224px;left:140px;display:none;"
                                    onclick="C.tg(234,1,2,event);" onmouseover="C.td(234,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img395"
                                    style="background-position:0px -144px;top:67px;left:35px"></div>
                                <div class="trans" id="tr395" style="top:67px;left:35px"></div>
                                <div class="border" id="b395" style="top:64px;left:32px"></div>
                                <div class="t" id="t395" style="top:85px;left:35px;">0</div>
                                <div class="pop" id="pop395" style="top:67px;left:35px;"
                                    onmouseover="C.td(395,event);" onmouseout="C.tf();" onclick="C.ts(395);"></div>
                                <div class="m" id="m395" style="top:97px;left:30px;display:none;"
                                    onclick="C.tg(395,-1,2,event);" onmouseover="C.td(395,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p395" style="top:97px;left:64px;display:none;"
                                    onclick="C.tg(395,1,2,event);" onmouseover="C.td(395,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img312"
                                    style="background-position:-108px -108px;top:148px;left:35px"></div>
                                <div class="trans" id="tr312" style="top:148px;left:35px"></div>
                                <div class="border" id="b312" style="top:145px;left:32px"></div>
                                <div class="t" id="t312" style="top:166px;left:35px;">0</div>
                                <div class="pop" id="pop312" style="top:148px;left:35px;"
                                    onmouseover="C.td(312,event);" onmouseout="C.tf();" onclick="C.ts(312);"></div>
                                <div class="m" id="m312" style="top:178px;left:30px;display:none;"
                                    onclick="C.tg(312,-1,2,event);" onmouseover="C.td(312,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p312" style="top:178px;left:64px;display:none;"
                                    onclick="C.tg(312,1,2,event);" onmouseover="C.td(312,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img228"
                                    style="background-position:-72px -36px;top:261px;left:35px"></div>
                                <div class="trans" id="tr228" style="top:261px;left:35px"></div>
                                <div class="border" id="b228" style="top:258px;left:32px"></div>
                                <div class="t" id="t228" style="top:279px;left:35px;">0</div>
                                <div class="pop" id="pop228" style="top:261px;left:35px;"
                                    onmouseover="C.td(228,event);" onmouseout="C.tf();" onclick="C.ts(228);"></div>
                                <div class="m" id="m228" style="top:291px;left:30px;display:none;"
                                    onclick="C.tg(228,-1,2,event);" onmouseover="C.td(228,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p228" style="top:291px;left:64px;display:none;"
                                    onclick="C.tg(228,1,2,event);" onmouseover="C.td(228,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img235"
                                    style="background-position:-72px -72px;top:67px;left:186px"></div>
                                <div class="trans" id="tr235" style="top:67px;left:186px"></div>
                                <div class="border" id="b235" style="top:64px;left:183px"></div>
                                <div class="t" id="t235" style="top:85px;left:186px;">0</div>
                                <div class="pop" id="pop235" style="top:67px;left:186px;"
                                    onmouseover="C.td(235,event);" onmouseout="C.tf();" onclick="C.ts(235);"></div>
                                <div class="m" id="m235" style="top:97px;left:181px;display:none;"
                                    onclick="C.tg(235,-1,2,event);" onmouseover="C.td(235,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p235" style="top:97px;left:215px;display:none;"
                                    onclick="C.tg(235,1,2,event);" onmouseover="C.td(235,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img224"
                                    style="background-position:-216px 0px;top:148px;left:186px"></div>
                                <div class="trans" id="tr224" style="top:148px;left:186px"></div>
                                <div class="border" id="b224" style="top:145px;left:183px"></div>
                                <div class="t" id="t224" style="top:166px;left:186px;">0</div>
                                <div class="pop" id="pop224" style="top:148px;left:186px;"
                                    onmouseover="C.td(224,event);" onmouseout="C.tf();" onclick="C.ts(224);"></div>
                                <div class="m" id="m224" style="top:178px;left:181px;display:none;"
                                    onclick="C.tg(224,-1,2,event);" onmouseover="C.td(224,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p224" style="top:178px;left:215px;display:none;"
                                    onclick="C.tg(224,1,2,event);" onmouseover="C.td(224,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img229"
                                    style="background-position:-108px -36px;top:237px;left:186px"></div>
                                <div class="trans" id="tr229" style="top:237px;left:186px"></div>
                                <div class="border" id="b229" style="top:234px;left:183px"></div>
                                <div class="t" id="t229" style="top:255px;left:186px;">0</div>
                                <div class="pop" id="pop229" style="top:237px;left:186px;"
                                    onmouseover="C.td(229,event);" onmouseout="C.tf();" onclick="C.ts(229);"></div>
                                <div class="m" id="m229" style="top:267px;left:181px;display:none;"
                                    onclick="C.tg(229,-1,2,event);" onmouseover="C.td(229,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p229" style="top:267px;left:215px;display:none;"
                                    onclick="C.tg(229,1,2,event);" onmouseover="C.td(229,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier2">0</div>
                            </div>
                        </div>
                        <div class="cont">
                            <h3>Tier 3</h3>
                            <div class="abs sjadeon3">
                                <div class="sjadeon" id="img238"
                                    style="background-position:-180px -72px;top:24px;left:111px"></div>
                                <div class="trans" id="tr238" style="top:24px;left:111px"></div>
                                <div class="border" id="b238" style="top:21px;left:108px"></div>
                                <div class="t" id="t238" style="top:42px;left:111px;">0</div>
                                <div class="pop" id="pop238" style="top:24px;left:111px;"
                                    onmouseover="C.td(238,event);" onmouseout="C.tf();" onclick="C.ts(238);"></div>
                                <div class="m" id="m238" style="top:54px;left:106px;display:none;"
                                    onclick="C.tg(238,-1,3,event);" onmouseover="C.td(238,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p238" style="top:54px;left:140px;display:none;"
                                    onclick="C.tg(238,1,3,event);" onmouseover="C.td(238,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img236"
                                    style="background-position:-108px -72px;top:99px;left:111px"></div>
                                <div class="trans" id="tr236" style="top:99px;left:111px"></div>
                                <div class="border" id="b236" style="top:96px;left:108px"></div>
                                <div class="t" id="t236" style="top:117px;left:111px;">0</div>
                                <div class="pop" id="pop236" style="top:99px;left:111px;"
                                    onmouseover="C.td(236,event);" onmouseout="C.tf();" onclick="C.ts(236);"></div>
                                <div class="m" id="m236" style="top:129px;left:106px;display:none;"
                                    onclick="C.tg(236,-1,3,event);" onmouseover="C.td(236,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p236" style="top:129px;left:140px;display:none;"
                                    onclick="C.tg(236,1,3,event);" onmouseover="C.td(236,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img242"
                                    style="background-position:-72px -108px;top:194px;left:111px"></div>
                                <div class="trans" id="tr242" style="top:194px;left:111px"></div>
                                <div class="border" id="b242" style="top:191px;left:108px"></div>
                                <div class="t" id="t242" style="top:212px;left:111px;">0</div>
                                <div class="pop" id="pop242" style="top:194px;left:111px;"
                                    onmouseover="C.td(242,event);" onmouseout="C.tf();" onclick="C.ts(242);"></div>
                                <div class="m" id="m242" style="top:224px;left:106px;display:none;"
                                    onclick="C.tg(242,-1,3,event);" onmouseover="C.td(242,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p242" style="top:224px;left:140px;display:none;"
                                    onclick="C.tg(242,1,3,event);" onmouseover="C.td(242,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img461"
                                    style="background-position:-72px -144px;top:67px;left:35px"></div>
                                <div class="trans" id="tr461" style="top:67px;left:35px"></div>
                                <div class="border" id="b461" style="top:64px;left:32px"></div>
                                <div class="t" id="t461" style="top:85px;left:35px;">0</div>
                                <div class="pop" id="pop461" style="top:67px;left:35px;"
                                    onmouseover="C.td(461,event);" onmouseout="C.tf();" onclick="C.ts(461);"></div>
                                <div class="m" id="m461" style="top:97px;left:30px;display:none;"
                                    onclick="C.tg(461,-1,3,event);" onmouseover="C.td(461,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p461" style="top:97px;left:64px;display:none;"
                                    onclick="C.tg(461,1,3,event);" onmouseover="C.td(461,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img237"
                                    style="background-position:-144px -72px;top:148px;left:35px"></div>
                                <div class="trans" id="tr237" style="top:148px;left:35px"></div>
                                <div class="border" id="b237" style="top:145px;left:32px"></div>
                                <div class="t" id="t237" style="top:166px;left:35px;">0</div>
                                <div class="pop" id="pop237" style="top:148px;left:35px;"
                                    onmouseover="C.td(237,event);" onmouseout="C.tf();" onclick="C.ts(237);"></div>
                                <div class="m" id="m237" style="top:178px;left:30px;display:none;"
                                    onclick="C.tg(237,-1,3,event);" onmouseover="C.td(237,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p237" style="top:178px;left:64px;display:none;"
                                    onclick="C.tg(237,1,3,event);" onmouseover="C.td(237,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img240"
                                    style="background-position:0px -108px;top:261px;left:35px"></div>
                                <div class="trans" id="tr240" style="top:261px;left:35px"></div>
                                <div class="border" id="b240" style="top:258px;left:32px"></div>
                                <div class="t" id="t240" style="top:279px;left:35px;">0</div>
                                <div class="pop" id="pop240" style="top:261px;left:35px;"
                                    onmouseover="C.td(240,event);" onmouseout="C.tf();" onclick="C.ts(240);"></div>
                                <div class="m" id="m240" style="top:291px;left:30px;display:none;"
                                    onclick="C.tg(240,-1,3,event);" onmouseover="C.td(240,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p240" style="top:291px;left:64px;display:none;"
                                    onclick="C.tg(240,1,3,event);" onmouseover="C.td(240,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img313"
                                    style="background-position:-144px -108px;top:67px;left:186px"></div>
                                <div class="trans" id="tr313" style="top:67px;left:186px"></div>
                                <div class="border" id="b313" style="top:64px;left:183px"></div>
                                <div class="t" id="t313" style="top:85px;left:186px;">0</div>
                                <div class="pop" id="pop313" style="top:67px;left:186px;"
                                    onmouseover="C.td(313,event);" onmouseout="C.tf();" onclick="C.ts(313);">
                                </div>
                                <div class="m" id="m313" style="top:97px;left:181px;display:none;"
                                    onclick="C.tg(313,-1,3,event);" onmouseover="C.td(313,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p313" style="top:97px;left:215px;display:none;"
                                    onclick="C.tg(313,1,3,event);" onmouseover="C.td(313,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img241"
                                    style="background-position:-36px -108px;top:148px;left:186px"></div>
                                <div class="trans" id="tr241" style="top:148px;left:186px"></div>
                                <div class="border" id="b241" style="top:145px;left:183px"></div>
                                <div class="t" id="t241" style="top:166px;left:186px;">0</div>
                                <div class="pop" id="pop241" style="top:148px;left:186px;"
                                    onmouseover="C.td(241,event);" onmouseout="C.tf();" onclick="C.ts(241);">
                                </div>
                                <div class="m" id="m241" style="top:178px;left:181px;display:none;"
                                    onclick="C.tg(241,-1,3,event);" onmouseover="C.td(241,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p241" style="top:178px;left:215px;display:none;"
                                    onclick="C.tg(241,1,3,event);" onmouseover="C.td(241,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img381"
                                    style="background-position:-216px -108px;top:237px;left:186px"></div>
                                <div class="trans" id="tr381" style="top:237px;left:186px"></div>
                                <div class="border" id="b381" style="top:234px;left:183px"></div>
                                <div class="t" id="t381" style="top:255px;left:186px;">0</div>
                                <div class="pop" id="pop381" style="top:237px;left:186px;"
                                    onmouseover="C.td(381,event);" onmouseout="C.tf();" onclick="C.ts(381);">
                                </div>
                                <div class="m" id="m381" style="top:267px;left:181px;display:none;"
                                    onclick="C.tg(381,-1,3,event);" onmouseover="C.td(381,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p381" style="top:267px;left:215px;display:none;"
                                    onclick="C.tg(381,1,3,event);" onmouseover="C.td(381,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier3">0</div>
                            </div>
                        </div>
                        <div class="cont">
                            <h3>Tier 4</h3>
                            <div class="abs sjadeon4">
                                <div class="sjadeon" id="img537"
                                    style="background-position:-108px -144px;top:24px;left:111px"></div>
                                <div class="trans" id="tr537" style="top:24px;left:111px"></div>
                                <div class="border" id="b537" style="top:21px;left:108px"></div>
                                <div class="t" id="t537" style="top:42px;left:111px;">0</div>
                                <div class="pop" id="pop537" style="top:24px;left:111px;"
                                    onmouseover="C.td(537,event);" onmouseout="C.tf();" onclick="C.ts(537);">
                                </div>
                                <div class="m" id="m537" style="top:54px;left:106px;display:none;"
                                    onclick="C.tg(537,-1,4,event);" onmouseover="C.td(537,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p537" style="top:54px;left:140px;display:none;"
                                    onclick="C.tg(537,1,4,event);" onmouseover="C.td(537,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img540"
                                    style="background-position:-216px -144px;top:99px;left:111px"></div>
                                <div class="trans" id="tr540" style="top:99px;left:111px"></div>
                                <div class="border" id="b540" style="top:96px;left:108px"></div>
                                <div class="t" id="t540" style="top:117px;left:111px;">0</div>
                                <div class="pop" id="pop540" style="top:99px;left:111px;"
                                    onmouseover="C.td(540,event);" onmouseout="C.tf();" onclick="C.ts(540);">
                                </div>
                                <div class="m" id="m540" style="top:129px;left:106px;display:none;"
                                    onclick="C.tg(540,-1,4,event);" onmouseover="C.td(540,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p540" style="top:129px;left:140px;display:none;"
                                    onclick="C.tg(540,1,4,event);" onmouseover="C.td(540,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img543"
                                    style="background-position:-72px -180px;top:194px;left:111px"></div>
                                <div class="trans" id="tr543" style="top:194px;left:111px"></div>
                                <div class="border" id="b543" style="top:191px;left:108px"></div>
                                <div class="t" id="t543" style="top:212px;left:111px;">0</div>
                                <div class="pop" id="pop543" style="top:194px;left:111px;"
                                    onmouseover="C.td(543,event);" onmouseout="C.tf();" onclick="C.ts(543);">
                                </div>
                                <div class="m" id="m543" style="top:224px;left:106px;display:none;"
                                    onclick="C.tg(543,-1,4,event);" onmouseover="C.td(543,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p543" style="top:224px;left:140px;display:none;"
                                    onclick="C.tg(543,1,4,event);" onmouseover="C.td(543,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img538"
                                    style="background-position:-144px -144px;top:67px;left:35px"></div>
                                <div class="trans" id="tr538" style="top:67px;left:35px"></div>
                                <div class="border" id="b538" style="top:64px;left:32px"></div>
                                <div class="t" id="t538" style="top:85px;left:35px;">0</div>
                                <div class="pop" id="pop538" style="top:67px;left:35px;"
                                    onmouseover="C.td(538,event);" onmouseout="C.tf();" onclick="C.ts(538);">
                                </div>
                                <div class="m" id="m538" style="top:97px;left:30px;display:none;"
                                    onclick="C.tg(538,-1,4,event);" onmouseover="C.td(538,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p538" style="top:97px;left:64px;display:none;"
                                    onclick="C.tg(538,1,4,event);" onmouseover="C.td(538,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img541"
                                    style="background-position:0px -180px;top:148px;left:35px"></div>
                                <div class="trans" id="tr541" style="top:148px;left:35px"></div>
                                <div class="border" id="b541" style="top:145px;left:32px"></div>
                                <div class="t" id="t541" style="top:166px;left:35px;">0</div>
                                <div class="pop" id="pop541" style="top:148px;left:35px;"
                                    onmouseover="C.td(541,event);" onmouseout="C.tf();" onclick="C.ts(541);">
                                </div>
                                <div class="m" id="m541" style="top:178px;left:30px;display:none;"
                                    onclick="C.tg(541,-1,4,event);" onmouseover="C.td(541,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p541" style="top:178px;left:64px;display:none;"
                                    onclick="C.tg(541,1,4,event);" onmouseover="C.td(541,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img545"
                                    style="background-position:-144px -180px;top:261px;left:35px"></div>
                                <div class="trans" id="tr545" style="top:261px;left:35px"></div>
                                <div class="border" id="b545" style="top:258px;left:32px"></div>
                                <div class="t" id="t545" style="top:279px;left:35px;">0</div>
                                <div class="pop" id="pop545" style="top:261px;left:35px;"
                                    onmouseover="C.td(545,event);" onmouseout="C.tf();" onclick="C.ts(545);">
                                </div>
                                <div class="m" id="m545" style="top:291px;left:30px;display:none;"
                                    onclick="C.tg(545,-1,4,event);" onmouseover="C.td(545,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p545" style="top:291px;left:64px;display:none;"
                                    onclick="C.tg(545,1,4,event);" onmouseover="C.td(545,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img539"
                                    style="background-position:-180px -144px;top:67px;left:186px"></div>
                                <div class="trans" id="tr539" style="top:67px;left:186px"></div>
                                <div class="border" id="b539" style="top:64px;left:183px"></div>
                                <div class="t" id="t539" style="top:85px;left:186px;">0</div>
                                <div class="pop" id="pop539" style="top:67px;left:186px;"
                                    onmouseover="C.td(539,event);" onmouseout="C.tf();" onclick="C.ts(539);">
                                </div>
                                <div class="m" id="m539" style="top:97px;left:181px;display:none;"
                                    onclick="C.tg(539,-1,4,event);" onmouseover="C.td(539,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p539" style="top:97px;left:215px;display:none;"
                                    onclick="C.tg(539,1,4,event);" onmouseover="C.td(539,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img542"
                                    style="background-position:-36px -180px;top:148px;left:186px"></div>
                                <div class="trans" id="tr542" style="top:148px;left:186px"></div>
                                <div class="border" id="b542" style="top:145px;left:183px"></div>
                                <div class="t" id="t542" style="top:166px;left:186px;">0</div>
                                <div class="pop" id="pop542" style="top:148px;left:186px;"
                                    onmouseover="C.td(542,event);" onmouseout="C.tf();" onclick="C.ts(542);">
                                </div>
                                <div class="m" id="m542" style="top:178px;left:181px;display:none;"
                                    onclick="C.tg(542,-1,4,event);" onmouseover="C.td(542,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p542" style="top:178px;left:215px;display:none;"
                                    onclick="C.tg(542,1,4,event);" onmouseover="C.td(542,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img544"
                                    style="background-position:-108px -180px;top:237px;left:186px"></div>
                                <div class="trans" id="tr544" style="top:237px;left:186px"></div>
                                <div class="border" id="b544" style="top:234px;left:183px"></div>
                                <div class="t" id="t544" style="top:255px;left:186px;">0</div>
                                <div class="pop" id="pop544" style="top:237px;left:186px;"
                                    onmouseover="C.td(544,event);" onmouseout="C.tf();" onclick="C.ts(544);">
                                </div>
                                <div class="m" id="m544" style="top:267px;left:181px;display:none;"
                                    onclick="C.tg(544,-1,4,event);" onmouseover="C.td(544,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p544" style="top:267px;left:215px;display:none;"
                                    onclick="C.tg(544,1,4,event);" onmouseover="C.td(544,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier4">0</div>
                            </div>
                        </div>
                        <div class="cont">
                            <h3>Tier 5</h3>
                            <div class="abs sjadeon5">
                                <div class="sjadeon" id="img783"
                                    style="background-position:-180px -180px;top:20px;left:110px"></div>
                                <div class="trans" id="tr783" style="top:20px;left:110px"></div>
                                <div class="border" id="b783" style="top:17px;left:107px"></div>
                                <div class="t" id="t783" style="top:38px;left:110px;">0</div>
                                <div class="pop" id="pop783" style="top:20px;left:110px;"
                                    onmouseover="C.td(783,event);" onmouseout="C.tf();" onclick="C.ts(783);">
                                </div>
                                <div class="m" id="m783" style="top:50px;left:105px;display:none;"
                                    onclick="C.tg(783,-1,5,event);" onmouseover="C.td(783,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p783" style="top:50px;left:139px;display:none;"
                                    onclick="C.tg(783,1,5,event);" onmouseover="C.td(783,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img786"
                                    style="background-position:-36px -216px;top:234px;left:49px"></div>
                                <div class="trans" id="tr786" style="top:234px;left:49px"></div>
                                <div class="border" id="b786" style="top:231px;left:46px"></div>
                                <div class="t" id="t786" style="top:252px;left:49px;">0</div>
                                <div class="pop" id="pop786" style="top:234px;left:49px;"
                                    onmouseover="C.td(786,event);" onmouseout="C.tf();" onclick="C.ts(786);">
                                </div>
                                <div class="m" id="m786" style="top:264px;left:44px;display:none;"
                                    onclick="C.tg(786,-1,5,event);" onmouseover="C.td(786,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p786" style="top:264px;left:78px;display:none;"
                                    onclick="C.tg(786,1,5,event);" onmouseover="C.td(786,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img784"
                                    style="background-position:-216px -180px;top:90px;left:173px"></div>
                                <div class="trans" id="tr784" style="top:90px;left:173px"></div>
                                <div class="border" id="b784" style="top:87px;left:170px"></div>
                                <div class="t" id="t784" style="top:108px;left:173px;">0</div>
                                <div class="pop" id="pop784" style="top:90px;left:173px;"
                                    onmouseover="C.td(784,event);" onmouseout="C.tf();" onclick="C.ts(784);">
                                </div>
                                <div class="m" id="m784" style="top:120px;left:168px;display:none;"
                                    onclick="C.tg(784,-1,5,event);" onmouseover="C.td(784,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p784" style="top:120px;left:202px;display:none;"
                                    onclick="C.tg(784,1,5,event);" onmouseover="C.td(784,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="sjadeon" id="img785"
                                    style="background-position:0px -216px;top:162px;left:173px"></div>
                                <div class="trans" id="tr785" style="top:162px;left:173px"></div>
                                <div class="border" id="b785" style="top:159px;left:170px"></div>
                                <div class="t" id="t785" style="top:180px;left:173px;">0</div>
                                <div class="pop" id="pop785" style="top:162px;left:173px;"
                                    onmouseover="C.td(785,event);" onmouseout="C.tf();" onclick="C.ts(785);">
                                </div>
                                <div class="m" id="m785" style="top:192px;left:168px;display:none;"
                                    onclick="C.tg(785,-1,5,event);" onmouseover="C.td(785,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p785" style="top:192px;left:202px;display:none;"
                                    onclick="C.tg(785,1,5,event);" onmouseover="C.td(785,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier5">0</div>
                            </div>
                        </div>
                        <div class="cont spacer2"></div>
                        <div class="cont">
                            <h3>Blade</h3>
                            <div class="abs tjadeon7">
                                <div class="tjadeon" id="img567"
                                    style="background-position:0px 0px;top:17px;left:18px"></div>
                                <div class="trans" id="tr567" style="top:17px;left:18px"></div>
                                <div class="border" id="b567" style="top:14px;left:15px"></div>
                                <div class="t" id="t567" style="top:35px;left:18px;">0</div>
                                <div class="pop" id="pop567" style="top:17px;left:18px;"
                                    onmouseover="C.td(567,event);" onmouseout="C.tf();" onclick="C.ts(567);">
                                </div>
                                <div class="m" id="m567" style="top:47px;left:13px;display:none;"
                                    onclick="C.tg(567,-1,7,event);" onmouseover="C.td(567,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p567" style="top: 47px; left: 47px; display: block;"
                                    onclick="C.tg(567,1,7,event);" onmouseover="C.td(567,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img568"
                                    style="background-position:-36px 0px;top:17px;left:124px"></div>
                                <div class="trans" id="tr568" style="top:17px;left:124px"></div>
                                <div class="border" id="b568" style="top:14px;left:121px"></div>
                                <div class="t" id="t568" style="top:35px;left:124px;">0</div>
                                <div class="pop" id="pop568" style="top:17px;left:124px;"
                                    onmouseover="C.td(568,event);" onmouseout="C.tf();" onclick="C.ts(568);">
                                </div>
                                <div class="m" id="m568" style="top:47px;left:119px;display:none;"
                                    onclick="C.tg(568,-1,7,event);" onmouseover="C.td(568,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p568" style="top: 47px; left: 153px; display: block;"
                                    onclick="C.tg(568,1,7,event);" onmouseover="C.td(568,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img569"
                                    style="background-position:-72px 0px;top:69px;left:18px"></div>
                                <div class="trans" id="tr569" style="top:69px;left:18px"></div>
                                <div class="border" id="b569" style="top:66px;left:15px"></div>
                                <div class="t" id="t569" style="top:87px;left:18px;">0</div>
                                <div class="pop" id="pop569" style="top:69px;left:18px;"
                                    onmouseover="C.td(569,event);" onmouseout="C.tf();" onclick="C.ts(569);">
                                </div>
                                <div class="m" id="m569" style="top:99px;left:13px;display:none;"
                                    onclick="C.tg(569,-1,7,event);" onmouseover="C.td(569,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p569" style="top:99px;left:47px;display:none;"
                                    onclick="C.tg(569,1,7,event);" onmouseover="C.td(569,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img570"
                                    style="background-position:-108px 0px;top:69px;left:70px"></div>
                                <div class="trans" id="tr570" style="top:69px;left:70px"></div>
                                <div class="border" id="b570" style="top:66px;left:67px"></div>
                                <div class="t" id="t570" style="top:87px;left:70px;">0</div>
                                <div class="pop" id="pop570" style="top:69px;left:70px;"
                                    onmouseover="C.td(570,event);" onmouseout="C.tf();" onclick="C.ts(570);">
                                </div>
                                <div class="m" id="m570" style="top:99px;left:65px;display:none;"
                                    onclick="C.tg(570,-1,7,event);" onmouseover="C.td(570,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p570" style="top:99px;left:99px;display:none;"
                                    onclick="C.tg(570,1,7,event);" onmouseover="C.td(570,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img571"
                                    style="background-position:-144px 0px;top:69px;left:175px"></div>
                                <div class="trans" id="tr571" style="top:69px;left:175px"></div>
                                <div class="border" id="b571" style="top:66px;left:172px"></div>
                                <div class="t" id="t571" style="top:87px;left:175px;">0</div>
                                <div class="pop" id="pop571" style="top:69px;left:175px;"
                                    onmouseover="C.td(571,event);" onmouseout="C.tf();" onclick="C.ts(571);">
                                </div>
                                <div class="m" id="m571" style="top:99px;left:170px;display:none;"
                                    onclick="C.tg(571,-1,7,event);" onmouseover="C.td(571,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p571" style="top:99px;left:204px;display:none;"
                                    onclick="C.tg(571,1,7,event);" onmouseover="C.td(571,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img572"
                                    style="background-position:-180px 0px;top:121px;left:18px"></div>
                                <div class="trans" id="tr572" style="top:121px;left:18px"></div>
                                <div class="border" id="b572" style="top:118px;left:15px"></div>
                                <div class="t" id="t572" style="top:139px;left:18px;">0</div>
                                <div class="pop" id="pop572" style="top:121px;left:18px;"
                                    onmouseover="C.td(572,event);" onmouseout="C.tf();" onclick="C.ts(572);">
                                </div>
                                <div class="m" id="m572" style="top:151px;left:13px;display:none;"
                                    onclick="C.tg(572,-1,7,event);" onmouseover="C.td(572,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p572" style="top:151px;left:47px;display:none;"
                                    onclick="C.tg(572,1,7,event);" onmouseover="C.td(572,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img573"
                                    style="background-position:-216px 0px;top:121px;left:70px"></div>
                                <div class="trans" id="tr573" style="top:121px;left:70px"></div>
                                <div class="border" id="b573" style="top:118px;left:67px"></div>
                                <div class="t" id="t573" style="top:139px;left:70px;">0</div>
                                <div class="pop" id="pop573" style="top:121px;left:70px;"
                                    onmouseover="C.td(573,event);" onmouseout="C.tf();" onclick="C.ts(573);">
                                </div>
                                <div class="m" id="m573" style="top:151px;left:65px;display:none;"
                                    onclick="C.tg(573,-1,7,event);" onmouseover="C.td(573,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p573" style="top:151px;left:99px;display:none;"
                                    onclick="C.tg(573,1,7,event);" onmouseover="C.td(573,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img574"
                                    style="background-position:-252px 0px;top:121px;left:122px"></div>
                                <div class="trans" id="tr574" style="top:121px;left:122px"></div>
                                <div class="border" id="b574" style="top:118px;left:119px"></div>
                                <div class="t" id="t574" style="top:139px;left:122px;">0</div>
                                <div class="pop" id="pop574" style="top:121px;left:122px;"
                                    onmouseover="C.td(574,event);" onmouseout="C.tf();" onclick="C.ts(574);">
                                </div>
                                <div class="m" id="m574" style="top:151px;left:117px;display:none;"
                                    onclick="C.tg(574,-1,7,event);" onmouseover="C.td(574,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p574" style="top:151px;left:151px;display:none;"
                                    onclick="C.tg(574,1,7,event);" onmouseover="C.td(574,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img575"
                                    style="background-position:0px -36px;top:121px;left:175px"></div>
                                <div class="trans" id="tr575" style="top:121px;left:175px"></div>
                                <div class="border" id="b575" style="top:118px;left:172px"></div>
                                <div class="t" id="t575" style="top:139px;left:175px;">0</div>
                                <div class="pop" id="pop575" style="top:121px;left:175px;"
                                    onmouseover="C.td(575,event);" onmouseout="C.tf();" onclick="C.ts(575);">
                                </div>
                                <div class="m" id="m575" style="top:151px;left:170px;display:none;"
                                    onclick="C.tg(575,-1,7,event);" onmouseover="C.td(575,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p575" style="top:151px;left:204px;display:none;"
                                    onclick="C.tg(575,1,7,event);" onmouseover="C.td(575,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img576"
                                    style="background-position:-36px -36px;top:174px;left:18px"></div>
                                <div class="trans" id="tr576" style="top:174px;left:18px"></div>
                                <div class="border" id="b576" style="top:171px;left:15px"></div>
                                <div class="t" id="t576" style="top:192px;left:18px;">0</div>
                                <div class="pop" id="pop576" style="top:174px;left:18px;"
                                    onmouseover="C.td(576,event);" onmouseout="C.tf();" onclick="C.ts(576);">
                                </div>
                                <div class="m" id="m576" style="top:204px;left:13px;display:none;"
                                    onclick="C.tg(576,-1,7,event);" onmouseover="C.td(576,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p576" style="top:204px;left:47px;display:none;"
                                    onclick="C.tg(576,1,7,event);" onmouseover="C.td(576,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img577"
                                    style="background-position:-72px -36px;top:174px;left:70px"></div>
                                <div class="trans" id="tr577" style="top:174px;left:70px"></div>
                                <div class="border" id="b577" style="top:171px;left:67px"></div>
                                <div class="t" id="t577" style="top:192px;left:70px;">0</div>
                                <div class="pop" id="pop577" style="top:174px;left:70px;"
                                    onmouseover="C.td(577,event);" onmouseout="C.tf();" onclick="C.ts(577);">
                                </div>
                                <div class="m" id="m577" style="top:204px;left:65px;display:none;"
                                    onclick="C.tg(577,-1,7,event);" onmouseover="C.td(577,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p577" style="top:204px;left:99px;display:none;"
                                    onclick="C.tg(577,1,7,event);" onmouseover="C.td(577,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img578"
                                    style="background-position:-108px -36px;top:174px;left:122px"></div>
                                <div class="trans" id="tr578" style="top:174px;left:122px"></div>
                                <div class="border" id="b578" style="top:171px;left:119px"></div>
                                <div class="t" id="t578" style="top:192px;left:122px;">0</div>
                                <div class="pop" id="pop578" style="top:174px;left:122px;"
                                    onmouseover="C.td(578,event);" onmouseout="C.tf();" onclick="C.ts(578);">
                                </div>
                                <div class="m" id="m578" style="top:204px;left:117px;display:none;"
                                    onclick="C.tg(578,-1,7,event);" onmouseover="C.td(578,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p578" style="top:204px;left:151px;display:none;"
                                    onclick="C.tg(578,1,7,event);" onmouseover="C.td(578,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img579"
                                    style="background-position:-144px -36px;top:174px;left:175px"></div>
                                <div class="trans" id="tr579" style="top:174px;left:175px"></div>
                                <div class="border" id="b579" style="top:171px;left:172px"></div>
                                <div class="t" id="t579" style="top:192px;left:175px;">0</div>
                                <div class="pop" id="pop579" style="top:174px;left:175px;"
                                    onmouseover="C.td(579,event);" onmouseout="C.tf();" onclick="C.ts(579);">
                                </div>
                                <div class="m" id="m579" style="top:204px;left:170px;display:none;"
                                    onclick="C.tg(579,-1,7,event);" onmouseover="C.td(579,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p579" style="top:204px;left:204px;display:none;"
                                    onclick="C.tg(579,1,7,event);" onmouseover="C.td(579,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img580"
                                    style="background-position:-180px -36px;top:226px;left:18px"></div>
                                <div class="trans" id="tr580" style="top:226px;left:18px"></div>
                                <div class="border" id="b580" style="top:223px;left:15px"></div>
                                <div class="t" id="t580" style="top:244px;left:18px;">0</div>
                                <div class="pop" id="pop580" style="top:226px;left:18px;"
                                    onmouseover="C.td(580,event);" onmouseout="C.tf();" onclick="C.ts(580);">
                                </div>
                                <div class="m" id="m580" style="top:256px;left:13px;display:none;"
                                    onclick="C.tg(580,-1,7,event);" onmouseover="C.td(580,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p580" style="top:256px;left:47px;display:none;"
                                    onclick="C.tg(580,1,7,event);" onmouseover="C.td(580,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img581"
                                    style="background-position:-216px -36px;top:226px;left:70px"></div>
                                <div class="trans" id="tr581" style="top:226px;left:70px"></div>
                                <div class="border" id="b581" style="top:223px;left:67px"></div>
                                <div class="t" id="t581" style="top:244px;left:70px;">0</div>
                                <div class="pop" id="pop581" style="top:226px;left:70px;"
                                    onmouseover="C.td(581,event);" onmouseout="C.tf();" onclick="C.ts(581);">
                                </div>
                                <div class="m" id="m581" style="top:256px;left:65px;display:none;"
                                    onclick="C.tg(581,-1,7,event);" onmouseover="C.td(581,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p581" style="top:256px;left:99px;display:none;"
                                    onclick="C.tg(581,1,7,event);" onmouseover="C.td(581,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img582"
                                    style="background-position:-252px -36px;top:226px;left:122px"></div>
                                <div class="trans" id="tr582" style="top:226px;left:122px"></div>
                                <div class="border" id="b582" style="top:223px;left:119px"></div>
                                <div class="t" id="t582" style="top:244px;left:122px;">0</div>
                                <div class="pop" id="pop582" style="top:226px;left:122px;"
                                    onmouseover="C.td(582,event);" onmouseout="C.tf();" onclick="C.ts(582);">
                                </div>
                                <div class="m" id="m582" style="top:256px;left:117px;display:none;"
                                    onclick="C.tg(582,-1,7,event);" onmouseover="C.td(582,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p582" style="top:256px;left:151px;display:none;"
                                    onclick="C.tg(582,1,7,event);" onmouseover="C.td(582,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img583"
                                    style="background-position:0px -72px;top:278px;left:124px"></div>
                                <div class="trans" id="tr583" style="top:278px;left:124px"></div>
                                <div class="border" id="b583" style="top:275px;left:121px"></div>
                                <div class="t" id="t583" style="top:296px;left:124px;">0</div>
                                <div class="pop" id="pop583" style="top:278px;left:124px;"
                                    onmouseover="C.td(583,event);" onmouseout="C.tf();" onclick="C.ts(583);">
                                </div>
                                <div class="m" id="m583" style="top:308px;left:119px;display:none;"
                                    onclick="C.tg(583,-1,7,event);" onmouseover="C.td(583,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p583" style="top:308px;left:153px;display:none;"
                                    onclick="C.tg(583,1,7,event);" onmouseover="C.td(583,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier7">0</div>
                            </div>
                        </div>
                        <div class="cont">
                            <h3>Virtue</h3>
                            <div class="abs tjadeon8">
                                <div class="tjadeon" id="img586"
                                    style="background-position:-108px -72px;top:69px;left:18px"></div>
                                <div class="trans" id="tr586" style="top:69px;left:18px"></div>
                                <div class="border" id="b586" style="top:66px;left:15px"></div>
                                <div class="t" id="t586" style="top:87px;left:18px;">0</div>
                                <div class="pop" id="pop586" style="top:69px;left:18px;"
                                    onmouseover="C.td(586,event);" onmouseout="C.tf();" onclick="C.ts(586);">
                                </div>
                                <div class="m" id="m586" style="top:99px;left:13px;display:none;"
                                    onclick="C.tg(586,-1,8,event);" onmouseover="C.td(586,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p586" style="top: 99px; left: 47px; display: block;"
                                    onclick="C.tg(586,1,8,event);" onmouseover="C.td(586,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img589"
                                    style="background-position:-216px -72px;top:121px;left:18px"></div>
                                <div class="trans" id="tr589" style="top:121px;left:18px"></div>
                                <div class="border" id="b589" style="top:118px;left:15px"></div>
                                <div class="t" id="t589" style="top:139px;left:18px;">0</div>
                                <div class="pop" id="pop589" style="top:121px;left:18px;"
                                    onmouseover="C.td(589,event);" onmouseout="C.tf();" onclick="C.ts(589);">
                                </div>
                                <div class="m" id="m589" style="top:151px;left:13px;display:none;"
                                    onclick="C.tg(589,-1,8,event);" onmouseover="C.td(589,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p589" style="top:151px;left:47px;display:none;"
                                    onclick="C.tg(589,1,8,event);" onmouseover="C.td(589,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img593"
                                    style="background-position:-72px -108px;top:173px;left:18px"></div>
                                <div class="trans" id="tr593" style="top:173px;left:18px"></div>
                                <div class="border" id="b593" style="top:170px;left:15px"></div>
                                <div class="t" id="t593" style="top:191px;left:18px;">0</div>
                                <div class="pop" id="pop593" style="top:173px;left:18px;"
                                    onmouseover="C.td(593,event);" onmouseout="C.tf();" onclick="C.ts(593);">
                                </div>
                                <div class="m" id="m593" style="top:203px;left:13px;display:none;"
                                    onclick="C.tg(593,-1,8,event);" onmouseover="C.td(593,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p593" style="top:203px;left:47px;display:none;"
                                    onclick="C.tg(593,1,8,event);" onmouseover="C.td(593,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img597"
                                    style="background-position:-216px -108px;top:225px;left:18px"></div>
                                <div class="trans" id="tr597" style="top:225px;left:18px"></div>
                                <div class="border" id="b597" style="top:222px;left:15px"></div>
                                <div class="t" id="t597" style="top:243px;left:18px;">0</div>
                                <div class="pop" id="pop597" style="top:225px;left:18px;"
                                    onmouseover="C.td(597,event);" onmouseout="C.tf();" onclick="C.ts(597);">
                                </div>
                                <div class="m" id="m597" style="top:255px;left:13px;display:none;"
                                    onclick="C.tg(597,-1,8,event);" onmouseover="C.td(597,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p597" style="top:255px;left:47px;display:none;"
                                    onclick="C.tg(597,1,8,event);" onmouseover="C.td(597,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img600"
                                    style="background-position:-36px -144px;top:277px;left:18px"></div>
                                <div class="trans" id="tr600" style="top:277px;left:18px"></div>
                                <div class="border" id="b600" style="top:274px;left:15px"></div>
                                <div class="t" id="t600" style="top:295px;left:18px;">0</div>
                                <div class="pop" id="pop600" style="top:277px;left:18px;"
                                    onmouseover="C.td(600,event);" onmouseout="C.tf();" onclick="C.ts(600);">
                                </div>
                                <div class="m" id="m600" style="top:307px;left:13px;display:none;"
                                    onclick="C.tg(600,-1,8,event);" onmouseover="C.td(600,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p600" style="top:307px;left:47px;display:none;"
                                    onclick="C.tg(600,1,8,event);" onmouseover="C.td(600,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img584"
                                    style="background-position:-36px -72px;top:17px;left:70px"></div>
                                <div class="trans" id="tr584" style="top:17px;left:70px"></div>
                                <div class="border" id="b584" style="top:14px;left:67px"></div>
                                <div class="t" id="t584" style="top:35px;left:70px;">0</div>
                                <div class="pop" id="pop584" style="top:17px;left:70px;"
                                    onmouseover="C.td(584,event);" onmouseout="C.tf();" onclick="C.ts(584);">
                                </div>
                                <div class="m" id="m584" style="top:47px;left:65px;display:none;"
                                    onclick="C.tg(584,-1,8,event);" onmouseover="C.td(584,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p584" style="top: 47px; left: 99px; display: block;"
                                    onclick="C.tg(584,1,8,event);" onmouseover="C.td(584,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img590"
                                    style="background-position:-252px -72px;top:121px;left:70px"></div>
                                <div class="trans" id="tr590" style="top:121px;left:70px"></div>
                                <div class="border" id="b590" style="top:118px;left:67px"></div>
                                <div class="t" id="t590" style="top:139px;left:70px;">0</div>
                                <div class="pop" id="pop590" style="top:121px;left:70px;"
                                    onmouseover="C.td(590,event);" onmouseout="C.tf();" onclick="C.ts(590);">
                                </div>
                                <div class="m" id="m590" style="top:151px;left:65px;display:none;"
                                    onclick="C.tg(590,-1,8,event);" onmouseover="C.td(590,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p590" style="top:151px;left:99px;display:none;"
                                    onclick="C.tg(590,1,8,event);" onmouseover="C.td(590,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img594"
                                    style="background-position:-108px -108px;top:173px;left:70px"></div>
                                <div class="trans" id="tr594" style="top:173px;left:70px"></div>
                                <div class="border" id="b594" style="top:170px;left:67px"></div>
                                <div class="t" id="t594" style="top:191px;left:70px;">0</div>
                                <div class="pop" id="pop594" style="top:173px;left:70px;"
                                    onmouseover="C.td(594,event);" onmouseout="C.tf();" onclick="C.ts(594);">
                                </div>
                                <div class="m" id="m594" style="top:203px;left:65px;display:none;"
                                    onclick="C.tg(594,-1,8,event);" onmouseover="C.td(594,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p594" style="top:203px;left:99px;display:none;"
                                    onclick="C.tg(594,1,8,event);" onmouseover="C.td(594,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img598"
                                    style="background-position:-252px -108px;top:225px;left:70px"></div>
                                <div class="trans" id="tr598" style="top:225px;left:70px"></div>
                                <div class="border" id="b598" style="top:222px;left:67px"></div>
                                <div class="t" id="t598" style="top:243px;left:70px;">0</div>
                                <div class="pop" id="pop598" style="top:225px;left:70px;"
                                    onmouseover="C.td(598,event);" onmouseout="C.tf();" onclick="C.ts(598);">
                                </div>
                                <div class="m" id="m598" style="top:255px;left:65px;display:none;"
                                    onclick="C.tg(598,-1,8,event);" onmouseover="C.td(598,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p598" style="top:255px;left:99px;display:none;"
                                    onclick="C.tg(598,1,8,event);" onmouseover="C.td(598,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img587"
                                    style="background-position:-144px -72px;top:69px;left:122px"></div>
                                <div class="trans" id="tr587" style="top:69px;left:122px"></div>
                                <div class="border" id="b587" style="top:66px;left:119px"></div>
                                <div class="t" id="t587" style="top:87px;left:122px;">0</div>
                                <div class="pop" id="pop587" style="top:69px;left:122px;"
                                    onmouseover="C.td(587,event);" onmouseout="C.tf();" onclick="C.ts(587);">
                                </div>
                                <div class="m" id="m587" style="top:99px;left:117px;display:none;"
                                    onclick="C.tg(587,-1,8,event);" onmouseover="C.td(587,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p587" style="top: 99px; left: 151px; display: block;"
                                    onclick="C.tg(587,1,8,event);" onmouseover="C.td(587,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img591"
                                    style="background-position:0px -108px;top:121px;left:122px"></div>
                                <div class="trans" id="tr591" style="top:121px;left:122px"></div>
                                <div class="border" id="b591" style="top:118px;left:119px"></div>
                                <div class="t" id="t591" style="top:139px;left:122px;">0</div>
                                <div class="pop" id="pop591" style="top:121px;left:122px;"
                                    onmouseover="C.td(591,event);" onmouseout="C.tf();" onclick="C.ts(591);">
                                </div>
                                <div class="m" id="m591" style="top:151px;left:117px;display:none;"
                                    onclick="C.tg(591,-1,8,event);" onmouseover="C.td(591,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p591" style="top:151px;left:151px;display:none;"
                                    onclick="C.tg(591,1,8,event);" onmouseover="C.td(591,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img595"
                                    style="background-position:-144px -108px;top:173px;left:122px"></div>
                                <div class="trans" id="tr595" style="top:173px;left:122px"></div>
                                <div class="border" id="b595" style="top:170px;left:119px"></div>
                                <div class="t" id="t595" style="top:191px;left:122px;">0</div>
                                <div class="pop" id="pop595" style="top:173px;left:122px;"
                                    onmouseover="C.td(595,event);" onmouseout="C.tf();" onclick="C.ts(595);">
                                </div>
                                <div class="m" id="m595" style="top:203px;left:117px;display:none;"
                                    onclick="C.tg(595,-1,8,event);" onmouseover="C.td(595,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p595" style="top:203px;left:151px;display:none;"
                                    onclick="C.tg(595,1,8,event);" onmouseover="C.td(595,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img599"
                                    style="background-position:0px -144px;top:225px;left:122px"></div>
                                <div class="trans" id="tr599" style="top:225px;left:122px"></div>
                                <div class="border" id="b599" style="top:222px;left:119px"></div>
                                <div class="t" id="t599" style="top:243px;left:122px;">0</div>
                                <div class="pop" id="pop599" style="top:225px;left:122px;"
                                    onmouseover="C.td(599,event);" onmouseout="C.tf();" onclick="C.ts(599);">
                                </div>
                                <div class="m" id="m599" style="top:255px;left:117px;display:none;"
                                    onclick="C.tg(599,-1,8,event);" onmouseover="C.td(599,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p599" style="top:255px;left:151px;display:none;"
                                    onclick="C.tg(599,1,8,event);" onmouseover="C.td(599,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img585"
                                    style="background-position:-72px -72px;top:17px;left:173px"></div>
                                <div class="trans" id="tr585" style="top:17px;left:173px"></div>
                                <div class="border" id="b585" style="top:14px;left:170px"></div>
                                <div class="t" id="t585" style="top:35px;left:173px;">0</div>
                                <div class="pop" id="pop585" style="top:17px;left:173px;"
                                    onmouseover="C.td(585,event);" onmouseout="C.tf();" onclick="C.ts(585);">
                                </div>
                                <div class="m" id="m585" style="top:47px;left:168px;display:none;"
                                    onclick="C.tg(585,-1,8,event);" onmouseover="C.td(585,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p585" style="top: 47px; left: 202px; display: block;"
                                    onclick="C.tg(585,1,8,event);" onmouseover="C.td(585,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img588"
                                    style="background-position:-180px -72px;top:69px;left:173px"></div>
                                <div class="trans" id="tr588" style="top:69px;left:173px"></div>
                                <div class="border" id="b588" style="top:66px;left:170px"></div>
                                <div class="t" id="t588" style="top:87px;left:173px;">0</div>
                                <div class="pop" id="pop588" style="top:69px;left:173px;"
                                    onmouseover="C.td(588,event);" onmouseout="C.tf();" onclick="C.ts(588);">
                                </div>
                                <div class="m" id="m588" style="top:99px;left:168px;display:none;"
                                    onclick="C.tg(588,-1,8,event);" onmouseover="C.td(588,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p588" style="top:99px;left:202px;display:none;"
                                    onclick="C.tg(588,1,8,event);" onmouseover="C.td(588,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img592"
                                    style="background-position:-36px -108px;top:121px;left:173px"></div>
                                <div class="trans" id="tr592" style="top:121px;left:173px"></div>
                                <div class="border" id="b592" style="top:118px;left:170px"></div>
                                <div class="t" id="t592" style="top:139px;left:173px;">0</div>
                                <div class="pop" id="pop592" style="top:121px;left:173px;"
                                    onmouseover="C.td(592,event);" onmouseout="C.tf();" onclick="C.ts(592);">
                                </div>
                                <div class="m" id="m592" style="top:151px;left:168px;display:none;"
                                    onclick="C.tg(592,-1,8,event);" onmouseover="C.td(592,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p592" style="top:151px;left:202px;display:none;"
                                    onclick="C.tg(592,1,8,event);" onmouseover="C.td(592,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img596"
                                    style="background-position:-180px -108px;top:173px;left:173px"></div>
                                <div class="trans" id="tr596" style="top:173px;left:173px"></div>
                                <div class="border" id="b596" style="top:170px;left:170px"></div>
                                <div class="t" id="t596" style="top:191px;left:173px;">0</div>
                                <div class="pop" id="pop596" style="top:173px;left:173px;"
                                    onmouseover="C.td(596,event);" onmouseout="C.tf();" onclick="C.ts(596);">
                                </div>
                                <div class="m" id="m596" style="top:203px;left:168px;display:none;"
                                    onclick="C.tg(596,-1,8,event);" onmouseover="C.td(596,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p596" style="top:203px;left:202px;display:none;"
                                    onclick="C.tg(596,1,8,event);" onmouseover="C.td(596,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier8">0</div>
                            </div>
                        </div>
                        <div class="cont">
                            <h3>Mystic</h3>
                            <div class="abs tjadeon9">
                                <div class="tjadeon" id="img602"
                                    style="background-position:-108px -144px;top:17px;left:18px"></div>
                                <div class="trans" id="tr602" style="top:17px;left:18px"></div>
                                <div class="border" id="b602" style="top:14px;left:15px"></div>
                                <div class="t" id="t602" style="top:35px;left:18px;">0</div>
                                <div class="pop" id="pop602" style="top:17px;left:18px;"
                                    onmouseover="C.td(602,event);" onmouseout="C.tf();" onclick="C.ts(602);">
                                </div>
                                <div class="m" id="m602" style="top:47px;left:13px;display:none;"
                                    onclick="C.tg(602,-1,9,event);" onmouseover="C.td(602,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p602" style="top: 47px; left: 47px; display: block;"
                                    onclick="C.tg(602,1,9,event);" onmouseover="C.td(602,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img601"
                                    style="background-position:-72px -144px;top:17px;left:124px"></div>
                                <div class="trans" id="tr601" style="top:17px;left:124px"></div>
                                <div class="border" id="b601" style="top:14px;left:121px"></div>
                                <div class="t" id="t601" style="top:35px;left:124px;">0</div>
                                <div class="pop" id="pop601" style="top:17px;left:124px;"
                                    onmouseover="C.td(601,event);" onmouseout="C.tf();" onclick="C.ts(601);">
                                </div>
                                <div class="m" id="m601" style="top:47px;left:119px;display:none;"
                                    onclick="C.tg(601,-1,9,event);" onmouseover="C.td(601,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p601" style="top: 47px; left: 153px; display: block;"
                                    onclick="C.tg(601,1,9,event);" onmouseover="C.td(601,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img605"
                                    style="background-position:-216px -144px;top:69px;left:18px"></div>
                                <div class="trans" id="tr605" style="top:69px;left:18px"></div>
                                <div class="border" id="b605" style="top:66px;left:15px"></div>
                                <div class="t" id="t605" style="top:87px;left:18px;">0</div>
                                <div class="pop" id="pop605" style="top:69px;left:18px;"
                                    onmouseover="C.td(605,event);" onmouseout="C.tf();" onclick="C.ts(605);">
                                </div>
                                <div class="m" id="m605" style="top:99px;left:13px;display:none;"
                                    onclick="C.tg(605,-1,9,event);" onmouseover="C.td(605,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p605" style="top:99px;left:47px;display:none;"
                                    onclick="C.tg(605,1,9,event);" onmouseover="C.td(605,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img604"
                                    style="background-position:-180px -144px;top:69px;left:70px"></div>
                                <div class="trans" id="tr604" style="top:69px;left:70px"></div>
                                <div class="border" id="b604" style="top:66px;left:67px"></div>
                                <div class="t" id="t604" style="top:87px;left:70px;">0</div>
                                <div class="pop" id="pop604" style="top:69px;left:70px;"
                                    onmouseover="C.td(604,event);" onmouseout="C.tf();" onclick="C.ts(604);">
                                </div>
                                <div class="m" id="m604" style="top:99px;left:65px;display:none;"
                                    onclick="C.tg(604,-1,9,event);" onmouseover="C.td(604,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p604" style="top:99px;left:99px;display:none;"
                                    onclick="C.tg(604,1,9,event);" onmouseover="C.td(604,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img603"
                                    style="background-position:-144px -144px;top:69px;left:175px"></div>
                                <div class="trans" id="tr603" style="top:69px;left:175px"></div>
                                <div class="border" id="b603" style="top:66px;left:172px"></div>
                                <div class="t" id="t603" style="top:87px;left:175px;">0</div>
                                <div class="pop" id="pop603" style="top:69px;left:175px;"
                                    onmouseover="C.td(603,event);" onmouseout="C.tf();" onclick="C.ts(603);">
                                </div>
                                <div class="m" id="m603" style="top:99px;left:170px;display:none;"
                                    onclick="C.tg(603,-1,9,event);" onmouseover="C.td(603,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p603" style="top:99px;left:204px;display:none;"
                                    onclick="C.tg(603,1,9,event);" onmouseover="C.td(603,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img609"
                                    style="background-position:-72px -180px;top:121px;left:18px"></div>
                                <div class="trans" id="tr609" style="top:121px;left:18px"></div>
                                <div class="border" id="b609" style="top:118px;left:15px"></div>
                                <div class="t" id="t609" style="top:139px;left:18px;">0</div>
                                <div class="pop" id="pop609" style="top:121px;left:18px;"
                                    onmouseover="C.td(609,event);" onmouseout="C.tf();" onclick="C.ts(609);">
                                </div>
                                <div class="m" id="m609" style="top:151px;left:13px;display:none;"
                                    onclick="C.tg(609,-1,9,event);" onmouseover="C.td(609,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p609" style="top:151px;left:47px;display:none;"
                                    onclick="C.tg(609,1,9,event);" onmouseover="C.td(609,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img608"
                                    style="background-position:-36px -180px;top:121px;left:70px"></div>
                                <div class="trans" id="tr608" style="top:121px;left:70px"></div>
                                <div class="border" id="b608" style="top:118px;left:67px"></div>
                                <div class="t" id="t608" style="top:139px;left:70px;">0</div>
                                <div class="pop" id="pop608" style="top:121px;left:70px;"
                                    onmouseover="C.td(608,event);" onmouseout="C.tf();" onclick="C.ts(608);">
                                </div>
                                <div class="m" id="m608" style="top:151px;left:65px;display:none;"
                                    onclick="C.tg(608,-1,9,event);" onmouseover="C.td(608,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p608" style="top:151px;left:99px;display:none;"
                                    onclick="C.tg(608,1,9,event);" onmouseover="C.td(608,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img607"
                                    style="background-position:0px -180px;top:121px;left:122px"></div>
                                <div class="trans" id="tr607" style="top:121px;left:122px"></div>
                                <div class="border" id="b607" style="top:118px;left:119px"></div>
                                <div class="t" id="t607" style="top:139px;left:122px;">0</div>
                                <div class="pop" id="pop607" style="top:121px;left:122px;"
                                    onmouseover="C.td(607,event);" onmouseout="C.tf();" onclick="C.ts(607);">
                                </div>
                                <div class="m" id="m607" style="top:151px;left:117px;display:none;"
                                    onclick="C.tg(607,-1,9,event);" onmouseover="C.td(607,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p607" style="top:151px;left:151px;display:none;"
                                    onclick="C.tg(607,1,9,event);" onmouseover="C.td(607,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img606"
                                    style="background-position:-252px -144px;top:121px;left:175px"></div>
                                <div class="trans" id="tr606" style="top:121px;left:175px"></div>
                                <div class="border" id="b606" style="top:118px;left:172px"></div>
                                <div class="t" id="t606" style="top:139px;left:175px;">0</div>
                                <div class="pop" id="pop606" style="top:121px;left:175px;"
                                    onmouseover="C.td(606,event);" onmouseout="C.tf();" onclick="C.ts(606);">
                                </div>
                                <div class="m" id="m606" style="top:151px;left:170px;display:none;"
                                    onclick="C.tg(606,-1,9,event);" onmouseover="C.td(606,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p606" style="top:151px;left:204px;display:none;"
                                    onclick="C.tg(606,1,9,event);" onmouseover="C.td(606,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img613"
                                    style="background-position:-216px -180px;top:174px;left:18px"></div>
                                <div class="trans" id="tr613" style="top:174px;left:18px"></div>
                                <div class="border" id="b613" style="top:171px;left:15px"></div>
                                <div class="t" id="t613" style="top:192px;left:18px;">0</div>
                                <div class="pop" id="pop613" style="top:174px;left:18px;"
                                    onmouseover="C.td(613,event);" onmouseout="C.tf();" onclick="C.ts(613);">
                                </div>
                                <div class="m" id="m613" style="top:204px;left:13px;display:none;"
                                    onclick="C.tg(613,-1,9,event);" onmouseover="C.td(613,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p613" style="top:204px;left:47px;display:none;"
                                    onclick="C.tg(613,1,9,event);" onmouseover="C.td(613,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img612"
                                    style="background-position:-180px -180px;top:174px;left:70px"></div>
                                <div class="trans" id="tr612" style="top:174px;left:70px"></div>
                                <div class="border" id="b612" style="top:171px;left:67px"></div>
                                <div class="t" id="t612" style="top:192px;left:70px;">0</div>
                                <div class="pop" id="pop612" style="top:174px;left:70px;"
                                    onmouseover="C.td(612,event);" onmouseout="C.tf();" onclick="C.ts(612);">
                                </div>
                                <div class="m" id="m612" style="top:204px;left:65px;display:none;"
                                    onclick="C.tg(612,-1,9,event);" onmouseover="C.td(612,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p612" style="top:204px;left:99px;display:none;"
                                    onclick="C.tg(612,1,9,event);" onmouseover="C.td(612,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img611"
                                    style="background-position:-144px -180px;top:174px;left:122px"></div>
                                <div class="trans" id="tr611" style="top:174px;left:122px"></div>
                                <div class="border" id="b611" style="top:171px;left:119px"></div>
                                <div class="t" id="t611" style="top:192px;left:122px;">0</div>
                                <div class="pop" id="pop611" style="top:174px;left:122px;"
                                    onmouseover="C.td(611,event);" onmouseout="C.tf();" onclick="C.ts(611);">
                                </div>
                                <div class="m" id="m611" style="top:204px;left:117px;display:none;"
                                    onclick="C.tg(611,-1,9,event);" onmouseover="C.td(611,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p611" style="top:204px;left:151px;display:none;"
                                    onclick="C.tg(611,1,9,event);" onmouseover="C.td(611,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img610"
                                    style="background-position:-108px -180px;top:174px;left:175px"></div>
                                <div class="trans" id="tr610" style="top:174px;left:175px"></div>
                                <div class="border" id="b610" style="top:171px;left:172px"></div>
                                <div class="t" id="t610" style="top:192px;left:175px;">0</div>
                                <div class="pop" id="pop610" style="top:174px;left:175px;"
                                    onmouseover="C.td(610,event);" onmouseout="C.tf();" onclick="C.ts(610);">
                                </div>
                                <div class="m" id="m610" style="top:204px;left:170px;display:none;"
                                    onclick="C.tg(610,-1,9,event);" onmouseover="C.td(610,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p610" style="top:204px;left:204px;display:none;"
                                    onclick="C.tg(610,1,9,event);" onmouseover="C.td(610,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img616"
                                    style="background-position:-36px -216px;top:226px;left:18px"></div>
                                <div class="trans" id="tr616" style="top:226px;left:18px"></div>
                                <div class="border" id="b616" style="top:223px;left:15px"></div>
                                <div class="t" id="t616" style="top:244px;left:18px;">0</div>
                                <div class="pop" id="pop616" style="top:226px;left:18px;"
                                    onmouseover="C.td(616,event);" onmouseout="C.tf();" onclick="C.ts(616);">
                                </div>
                                <div class="m" id="m616" style="top:256px;left:13px;display:none;"
                                    onclick="C.tg(616,-1,9,event);" onmouseover="C.td(616,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p616" style="top:256px;left:47px;display:none;"
                                    onclick="C.tg(616,1,9,event);" onmouseover="C.td(616,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img615"
                                    style="background-position:0px -216px;top:226px;left:70px"></div>
                                <div class="trans" id="tr615" style="top:226px;left:70px"></div>
                                <div class="border" id="b615" style="top:223px;left:67px"></div>
                                <div class="t" id="t615" style="top:244px;left:70px;">0</div>
                                <div class="pop" id="pop615" style="top:226px;left:70px;"
                                    onmouseover="C.td(615,event);" onmouseout="C.tf();" onclick="C.ts(615);">
                                </div>
                                <div class="m" id="m615" style="top:256px;left:65px;display:none;"
                                    onclick="C.tg(615,-1,9,event);" onmouseover="C.td(615,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p615" style="top:256px;left:99px;display:none;"
                                    onclick="C.tg(615,1,9,event);" onmouseover="C.td(615,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img614"
                                    style="background-position:-252px -180px;top:226px;left:122px"></div>
                                <div class="trans" id="tr614" style="top:226px;left:122px"></div>
                                <div class="border" id="b614" style="top:223px;left:119px"></div>
                                <div class="t" id="t614" style="top:244px;left:122px;">0</div>
                                <div class="pop" id="pop614" style="top:226px;left:122px;"
                                    onmouseover="C.td(614,event);" onmouseout="C.tf();" onclick="C.ts(614);">
                                </div>
                                <div class="m" id="m614" style="top:256px;left:117px;display:none;"
                                    onclick="C.tg(614,-1,9,event);" onmouseover="C.td(614,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p614" style="top:256px;left:151px;display:none;"
                                    onclick="C.tg(614,1,9,event);" onmouseover="C.td(614,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tjadeon" id="img617"
                                    style="background-position:-72px -216px;top:278px;left:124px"></div>
                                <div class="trans" id="tr617" style="top:278px;left:124px"></div>
                                <div class="border" id="b617" style="top:275px;left:121px"></div>
                                <div class="t" id="t617" style="top:296px;left:124px;">0</div>
                                <div class="pop" id="pop617" style="top:278px;left:124px;"
                                    onmouseover="C.td(617,event);" onmouseout="C.tf();" onclick="C.ts(617);">
                                </div>
                                <div class="m" id="m617" style="top:308px;left:119px;display:none;"
                                    onclick="C.tg(617,-1,9,event);" onmouseover="C.td(617,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="p" id="p617" style="top:308px;left:153px;display:none;"
                                    onclick="C.tg(617,1,9,event);" onmouseover="C.td(617,event);"
                                    onmouseout="C.tf();"></div>
                                <div class="tiertext" id="tier9">0</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="footer">
        <span>
            Jady Dynasty developed by <a href="http://trutienhonthe.com" target="_blank">Zhuxian - Age of
                Chaos</a><br>
        </span>
    </div>
    <table id="tooltip" style="display: none; left: 498px; top: 3px;">
        <tbody>
            <tr>
                <td class="content" id="tooltipt"><span style="color:#ffffff">Charge　</span><span
                        style="color:#ffcb4a">0/3<br>
                    </span><span style="color:#ffcb4a">A burst of energy allows you to leap forward at high speed,<br>
                        and has a
                        chance to free you from a debilitating Slow effect.<br> </span><span
                        style="color:#ffffff;">Cannot be used
                        while mounted.<br> Instant Cast.</span>
                    <p>Next Rank:</p><span style="color:#ffcb4a">　<br> </span><span style="color:#11aaff">Costs 200
                        Spirit<br>
                    </span><span style="color:#ffffff">Leap forward, with a </span><span
                        style="color:#ffcb4a">15%</span><span style="color:#ffffff"> chance to remove a Slow effect.
                        Cooldown: </span><span style="color:#ffcb4a">23</span><span style="color:#ffffff;">
                        seconds.</span>
                    <p>Requirements:<br>Character Level &gt;= <strong>46</strong><br><strong>Ancient Ice</strong> rank
                        &gt;=
                        <strong>1</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="bgleft"></td>
                <td class="bgbottom"></td>
            </tr>
        </tbody>
    </table>
    <script>
        window.onload = function() {
            var classes = {
                arden: "Liệt Sơn",
                barbe: "Thần Hoàng",
                balo: "Cửu Lê",
                jadeon: "Thanh Vân Môn",
                modo: "Quỷ Đạo",
                skysong: "Thiên Âm Tự",
                lupin: "Hợp Hoan Phái",
                vim: "Quỷ Vương Tông",
                rayan: "Hoài Quang",
                celan: "Thiên Hoa",
                forta: "Thái Hạo",
                incense: "Phần Hương Cốc",
                kytos: "Anh Chiêu",
                psychea: "Khiên Cơ",
                hydran: "Phá Quân",
                seira: "Thanh La",
                gevrin: "Quy Vân",
                sylia: "Hoạ Ảnh",
            };

            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('c');
            const className = myParam ? myParam : "jadeon";
            C.init(className);

        };
    </script>
</body>

</html>
