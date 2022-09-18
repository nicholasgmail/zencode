<?php

namespace App\Http\Controllers;

use App\Models\Commentators;
use Illuminate\Http\Request;

class CommentatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Commentators::get();
        return view('comment.index', compact('comment'));
    }
}
