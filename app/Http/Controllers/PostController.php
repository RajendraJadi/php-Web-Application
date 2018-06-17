<?php

namespace App\Http\Controllers;
use App\Post;


use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            return view('posts.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //return view('posts.db_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        return view('posts.create');
        $search = $request->get('search');
        $file = $request->file('file');




        //if ($request->hasFile($file)) {
            $filename = $file->getClientOriginalName();
        //}
            $XML_FILE_UPLOAD_PATH = $file->getPath();


    $search = $search;
    $xml_file = $filename;

    $arr = (explode(" ", $search));
    $arr_count = count($arr);

    if ($search != '' && (strlen($search) >= 3)) {
        $xml = simplexml_load_file($xml_file);
        $count = 0;
        echo "<h1> XML search Result </h1>";
        echo "<table class='table' border='1' bgcolor = #f5f5dc>";
        echo "<thead>
                            <tr>
                                <th>PMID</th>
                                <th>Author</th>
                                <th>Affiliation</th>
                                <th>Title</th>
                                <th>DateRevised</th>
                                <th>ArticleTitle</th>
                                <th>Abstract</th>
                                <th>PubDate</th>
                                <th>ArticleId</th>
                            </tr>
                          </thead>
                          <tbody border='0'>";

        foreach ($xml->PubmedArticle as $key => $item) {
            $PMID = $item->MedlineCitation->PMID;
            $Author = $item->MedlineCitation->Article->AuthorList->Author->LastName . ' ' . $item->MedlineCitation->Article->AuthorList->Author->ForeName . ' ' . $item->MedlineCitation->Article->AuthorList->Author->Initials;
            $Affiliation = $item->MedlineCitation->Article->AuthorList->Author->AffiliationInfo->Affiliation;
            $Title = $item->MedlineCitation->Article->Journal->Title;
            $DateRevised = $item->MedlineCitation->DateRevised->Year . '-' . $item->MedlineCitation->DateRevised->Month . '-' . $item->MedlineCitation->DateRevised->Day;
            $ArticleTitle = $item->MedlineCitation->Article->ArticleTitle;
            $Abstract = $item->MedlineCitation->Article->Abstract->AbstractText;
            $PubDate = $item->MedlineCitation->Article->Journal->JournalIssue->PubDate->Year . '-' . $item->MedlineCitation->Article->Journal->JournalIssue->PubDate->Month . '-' . $item->MedlineCitation->Article->Journal->JournalIssue->PubDate->Day;
            $ArticleId = $item->PubmedData->ArticleIdList->ArticleId[0];
            for ($i = 0; $i < $arr_count; $i++) {
                if ((strchr($PMID, $arr[$i])) || (strchr($Author, $arr[$i])) || (strchr($Affiliation, $arr[$i])) || (strchr($Title, $arr[$i])) || (strchr($DateRevised, $arr[$i])) || (strchr($ArticleTitle, $arr[$i])) || (strchr($Abstract, $arr[$i])) || (strchr($PubDate, $arr[$i])) || (strchr($ArticleId, $arr[$i]))) {
                    echo "<tr>";
                    echo "<td>" . $PMID . " </td> ";
                    echo "<td>" . $Author . " </td> ";
                    echo "<td>" . $Affiliation . " </td> ";
                    echo "<td>" . $Title . " </td> ";
                    echo "<td>" . $DateRevised . " </td> ";
                    echo "<td>" . $ArticleTitle . " </td> ";
                    echo "<td>" . $Abstract . " </td> ";
                    echo "<td>" . $PubDate . " </td> ";
                    echo "<td>" . $ArticleId . " </td> ";
                    echo "</tr>";
                   $count++;
                }
            }
        }
        echo "</tbody></table>";
        echo $count;
        }

    }

    /**
     * Display the specified resource.
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }


//    public function show($id)
//    {
//        //
//        return view('welcome');
//    }

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


    public function show_post($id,$id1,$id2)
    {
        #return view('post')->with('id',$id);
         return view('post',compact('id','id1','id2'));
    
    }
}
