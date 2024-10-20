<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = [
            "arden" => "Liệt Sơn",
            "barbe" => "Thần Hoàng",
            "balo" => "Cửu Lê",
            "jadeon" => "Thanh Vân Môn",
            "modo" => "Quỷ Đạo",
            "skysong" => "Thiên Âm Tự",
            "lupin" => "Hợp Hoan Phái",
            "vim" => "Quỷ Vương Tông",
            "rayan" => "Hoài Quang",
            "celan" => "Thiên Hoa",
            "forta" => "Thái Hạo",
            "incense" => "Phần Hương Cốc",
            "kytos" => "Anh Chiêu",
            "psychea" => "Khiên Cơ",
            "hydran" => "Phá Quân",
            "seira" => "Thanh La",
            "gevrin" => "Quy Vân",
            "sylia" => "Hoạ Ảnh",
        ];
        return view("skill.index", ["classes" => $classes]);
    }
}
