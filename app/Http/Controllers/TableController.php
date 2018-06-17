<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // return view('posts.db_create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_more');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pmid = null ;
        $author = null;
        $affiliation = null;
        $title = null;
        $dateRevised = null;
        $articleTitle = null;
        $abstract =null;
        $pubDate =null;
        $articleId = null;



        $a = ($request->get('field'));
        $b = ($request->get('name'));

        $c = array_combine($a, $b);


        foreach ($c as $key=>$value){
            //echo $key." :".$value;
            //echo $c[$key];
            if($key=='PMID'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $articleId = $value;

            }
            if($key=='Author'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $author = $value;
            }
            if($key=='Affiliation'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $affiliation = $value;
            }
            if($key=='Title'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $title = $value;
            }
            if($key=='DateRevised'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $dateRevised = $value;
            }
            if($key=='ArticleTitle'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $articleTitle = $value;
            }
            if($key=='Abstract'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $abstract = $value;
            }
            if($key=='PubDate'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $pubDate = $value;
            }
            if($key=='ArticleId'){
                if(is_null($value))
                    return view('add_more')->withMessage("No results found");
                else
                    $articleId = $value;
            }
        }

        if(isset($author)){
            $author = "'".$author."'";
            $result = DB::select('select * from pubdata where MATCH(Author) against( ? IN BOOLEAN MODE ) and DateRevised like ? and Abstract like ? and ArticleTitle like ? and Affiliation like ? and Title like ? and PubDate like ? or ArticleId = ? or PMID =?', ["$author","%$dateRevised%", "%$abstract%", "%$articleTitle%", "%$affiliation%", "%$title%","%$pubDate%","$articleId","$articleId"]);

        }else {
           $result = DB::select('select * from pubdata where DateRevised like ? and Abstract like ? and ArticleTitle like ? and Affiliation like ? and Title like ? and PubDate like ? or ArticleId = ? or PMID =? ', ["%$dateRevised%", "%$abstract%", "%$articleTitle%", "%$affiliation%", "%$title%","%$pubDate%","$articleId","$articleId"]);
        }

        if(count($result) > 0)
            return view('add_more')->withDetails($result);
        else
            return view('add_more')->withMessage("No results found");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
