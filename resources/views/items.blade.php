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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

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
                            <a class="item2" href="/skills?c=jadeon" id="menu1-1-2">Thanh Vân Môn</a>
                            <a class="item2" href="/skills?c=vim" id="menu1-1-0">Quỷ Vương Tông</a>
                            <a class="item2" href="/skills?c=lupin" id="menu1-1-1">Hợp Hoan Phái</a>
                            <a class="item2" href="/skills?c=skysong" id="menu1-1-3">Thiên Âm Tự</a>
                            <a class="item2" href="/skills?c=modo" id="menu1-1-4">Quỷ Đạo</a>
                            <a class="item2" href="/skills?c=incense" id="menu1-1-5">Phần Hương Cốc</a>
                        </div>
                    </td>
                    <td><a class="item1" href="#" id="menu1-1">Thần Duệ</a>
                        <div class="section" id="menu1-1-section"
                            style="top: 88px; left: 100px; visibility: hidden; z-index: -1;">
                            <a class="item2" href="/skills?c=arden" id="menu1-1-6">Liệt Sơn</a>
                            <a class="item2" href="/skills?c=balo" id="menu1-1-7">Cửu Lê</a>
                            <a class="item2" href="/skills?c=rayan" id="menu1-1-8">Hoài Quang</a>
                            <a class="item2" href="/skills?c=celan" id="menu1-1-9">Thiên Hoa</a>
                            <a class="item2" href="/skills?c=forta" id="menu1-1-10">Thái Hạo</a>
                            <a class="item2" href="/skills?c=barbe" id="menu1-1-11">Thần Hoàng</a>
                        </div>
                    </td>
                    <td><a class="item1" href="#" id="menu1-1">Thiên Mạch</a>
                        <div class="section" id="menu1-1-section"
                            style="top: 88px; left: 100px; visibility: hidden; z-index: -1;">
                            <a class="item2" href="/skills?c=psychea" id="menu1-1-12">Khiên Cơ</a>
                            <a class="item2" href="/skills?c=kytos" id="menu1-1-13">Anh Chiêu</a>
                            <a class="item2" href="/skills?c=hydran" id="menu1-1-14">Phá Quân</a>
                            <a class="item2" href="/skills?c=seira" id="menu1-1-15">Thanh La</a>
                            <a class="item2" href="/skills?c=gevrin" id="menu1-1-16">Quy Vân</a>
                            <a class="item2" href="/skills?c=sylia" id="menu1-1-17">Hoạ Ảnh</a>
                        </div>
                    </td>
                    <td><a style="width:auto" class="item1" href="/items" id="menu1-1">Tra Cứu Vật Phẩm</a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <style>
        .desc {
  width: 300px; 
  word-wrap: break-word;
    overflow: hidden;
}

    </style>
    <script type="text/javascript">
        var ddmx = new DropDownMenuX('menu1');
        ddmx.init();
    </script>
    <div id="content">
        <script type="text/javascript" src="/skill/data_pwi.js"></script>
        <script type="text/javascript" src="/skill/lang_pwi.js"></script>
    </div>
    <div class="tableHeader tup" style="margin-top: 30px; margin-bottom:15px"><span>Danh Sách Vật Phẩm</span></div>

    <div class="" style="text-align:center; margin-bottom:20px">
        <form action="" method="get">
            <input type="text" class="txt" name="key" placeholder="ID/Tên">
            <input type="submit" value="Tìm Kiếm" class="btn">
        </form>
    </div>

    <table class="list sortable" style="width:auto">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình Ảnh</th>
                <th width="35%">Tên</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->itemid }}</td>
                    <td><img src="{{ $item->image }}"></td>
                    <td class="tleft"> 
                        &nbsp&nbsp{{ $item->name }} 
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    
    <div id="footer">
        {{ $items->withQueryString()->links() }}
    </div>
    <script></script>
</body>

</html>
