<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin_login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        echo "am home";
        //
        return view('admin_home');
    }
    public function create()
    {
        //echo "am admin create";
        //
        return view('posts.admin_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Author='';
        $Affiliation='';                                                                                                                                                                                                                                                                                                                                                                                                             
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        if ($file = $request->file('file')) {
            $filename = $file->getClientOriginalName();
            $xml_file = $filename;
            $xml = simplexml_load_file($xml_file);
            $xml_file = $filename;
            try {
            foreach($xml->PubmedArticle as $key => $item) {
                $PMID = $item->MedlineCitation->PMID;
                // $Author = $item->MedlineCitation->Article->AuthorList->Author->LastName . ' ' . $item->MedlineCitation->Article->AuthorList->Author->ForeName . ' ' . $item->MedlineCitation->Article->AuthorList->Author->Initials;
                // $Affiliation = $item->MedlineCitation->Article->AuthorList->Author>AffiliationInfo->Affiliation;
                  foreach($item->MedlineCitation as $MedlineCitation)
                {
                    foreach($MedlineCitation->Article as $Article)
                    {   
                        foreach($Article->AuthorList as $Author)
                        {
                            foreach($Author->Author as $A)
                            {
                                foreach($A->AffiliationInfo as $Aff)
                                {
                                    
                                $Affiliation = $Aff->Affiliation;
                                
                                }
                                $AuthorLN = $A->LastName; 
                                $AuthorFN = $A->ForeName; 
                                $AuthorIN = $A->Initials;
                                $AuthorName = $AuthorLN." ".$AuthorFN." ".$AuthorIN; 
                              $Author = $Author."\n".$AuthorName;  

                    }

                }}}    


                $Title = $item->MedlineCitation->Article->Journal->Title;
                $DateRevised = $item->MedlineCitation->DateRevised->Year . '-' . $item->MedlineCitation->DateRevised->Month . '-' . $item->MedlineCitation->DateRevised->Day;
                $ArticleTitle = $item->MedlineCitation->Article->ArticleTitle;
                $Abstract = $item->MedlineCitation->Article->Abstract->AbstractText;
                $PubDate = $item->MedlineCitation->Article->Journal->JournalIssue->PubDate->Year . '-' . $item->MedlineCitation->Article->Journal->JournalIssue->PubDate->Month . '-' . $item->MedlineCitation->Article->Journal->JournalIssue->PubDate->Day;
                $ArticleId = $item->PubmedData->ArticleIdList->ArticleId[0];

                //$Author = $lastname . ' ' . $firstname;

                    //DB::delete('delete from pubda                                                                                         ta');

                    DB::insert('insert IGNORE into pubdata(PMID,Author,Affiliation,Title,DateRevised,ArticleTitle,Abstract,PubDate,ArticleId) values(?,?,?,?,?,?,?,?,?) ', [$PMID, $Author, $Affiliation, $Title, $DateRevised, $ArticleTitle, $Abstract, $PubDate, $ArticleId]);

                    //DB::insert('insert ignore into pubdata set PMID=?, set Author = ?, set Affiliation = ?, set Title = ?, set DateRevised= ?, set ArticleTitle=?, set Abstract=?, set PubDate=?, set ArticleId=?', [$PMID, $Author, $Affiliation, $Title, $DateRevised, $ArticleTitle, $Abstract, $PubDate, $ArticleId]);
                
            }
            } catch (\Illuminate\Database\QueryException $ex) {
//                    dd($ex->getMessage());
//                    var_dump($ex->errorInfo);

            }
            return view('posts.admin_create')->withMessage("File uploaded successfully.!");

        }

//        echo "<div '>          File uploaded successfully..!!       </div>";


    }


    public function show($id)
    {
        $result = DB::select('select * from users');

        if(count($result) > 0)
            return view('admin_home')->withDetails($result);
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
