<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.db_create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // echo " craete";
      //  return view('add_more');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        foreach($request->get('field') as $name) {
//
//            echo $name;
//
//        }
        //$tmp =null;
        $pmid = null;
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
           // print_r($c);

            foreach ($c as $key=>$value){
                //echo $key." :".$value;
                //echo $c[$key];
                if($key=='PMID'){
                    $pmid = $value;

                }
                if($key=='Author'){
                    $author = $value;

                }
                if($key=='Affiliation'){
                    $affiliation = $value;

                }
                if($key=='Title'){
                    $title = $value;

                }
                if($key=='DateRevised'){
                    $dateRevised = $value;

                }
                if($key=='ArticleTitle'){
                    $articleTitle = $value;

                }
                if($key=='Abstract'){
                    $abstract = $value;

                }
                if($key=='PubDate'){
                    $pubDate = $value;

                }
                if($key=='ArticleId'){
                    $articleId = $value;

                }


            }
        echo $pmid ;
        echo "<br>";
        echo $author ;
        echo "<br>";
        echo $affiliation ;
        echo "<br>";
        echo $title ;
        echo "<br>";
        echo $dateRevised ;
        echo "<br>";
        echo $articleTitle ;
        echo "<br>";
        echo $abstract;
        echo "<br>";
        echo $pubDate ;
        echo "<br>";
        echo $articleId;

    }



        //echo "store";


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
