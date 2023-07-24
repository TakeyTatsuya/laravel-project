<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodoListController extends Controller
{
    public function index(Request $request)
    {
        // データベースからテーブル「todolists」にある全レコードを取得
        $todo_lists = Todolist::all();

        // 第一引数には、「どのビューファイルか」
        // ビューに値を渡すときは、このように変数名と値がペアになった連想配列を第2引数に設定します。
        return view('todo_list.index', ['todo_lists' => $todo_lists]);
    
    }
}
