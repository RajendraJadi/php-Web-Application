@extends('layouts.app')

@section('content')

<html>


<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


</head>
<body>
<style>
    table.blueTable {
        border: 1px solid #1C6EA4;
        background-color: #EEEEEE;
        width: 100%;
        text-align: left;
        border-collapse: collapse;
    }
    table.blueTable td, table.blueTable th {
        border: 1px solid #AAAAAA;
        padding: 3px 2px;
    }
    table.blueTable tbody td {
        font-size: 13px;
    }
    table.blueTable tr:nth-child(even) {
        background: #D0E4F5;
    }
    table.blueTable thead {
        background: #1C6EA4;
        background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        border-bottom: 2px solid #444444;
    }
    table.blueTable thead th {
        font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        border-left: 2px solid #D0E4F5;
    }
    table.blueTable thead th:first-child {
        border-left: none;
    }

    table.blueTable tfoot {
        font-size: 14px;
        font-weight: bold;
        color: #FFFFFF;
        background: #D0E4F5;
        background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        border-top: 2px solid #444444;
    }
    table.blueTable tfoot td {
        font-size: 14px;
    }
    table.blueTable tfoot .links {
        text-align: right;
    }
    table.blueTable tfoot .links a{
        display: inline-block;
        background: #1C6EA4;
        color: #FFFFFF;
        padding: 2px 8px;
        border-radius: 5px;
    }
</style>




<div class = "container">
    <Br />
    <br />

    <div class="form-group">
        <form name = "add_name" id = "add_name" method = "POST" action="/search" >
            {{ csrf_field() }}
            {{--{!! Form::open(['method'=>'POST', 'action'=>'AddMoreController@store','files'=>'true'])!!}--}}
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="table-responsive">
            <table class = "table table-hover" id="dynamic_field" >
                <tr>
                    {{ csrf_field() }}
                    <td>
                        <select name="field[]" class="form-control action" id = "field" ><option value="PMID">PMID</option> <option value="Author"> Author</option> <option value="Affiliation">Affiliation</option><option value="Title">Journal</option><option value="DateRevised">DateRevised</option><option value="ArticleTitle">ArticleTitle</option><option value="Abstract">Abstract</option><option value="PubDate">PubDate</option><option value="ArticleId">ArticleId</option></select></td>
                    <td><input type ="text" name="name[]" id="name" class="form-control name_list" value="<?php if(isset($_POST['name[]'])) {echo htmlentities($_POST['name[]']);} ?>"/></td>
                    <td><button type="button" name ="add" id="add" class="btn btn-success"> + </button></td>

                </tr>
            </table>
            </div>
            <button type = "submit" name="submit" id="submit" value="Submit" class="btn btn-info" />
            <span class="glyphicon glyphicon-search"></span>

        </form>
        {{--{!! Form::close() !!}--}}
            </div>
    </div>

    @if(isset($details))

        <h3 align="left">Search results</h3>
        <table class='blueTable' style="width: 95%;color: darkblue" align="center" >
            <thead>
            <tr>
                <th>PMID</th>
                <th>Author</th>
                <th>Affiliation</th>
                <th>Journal <Title></Title></th>
                <th>DateRevised</th>
                <th>ArticleTitle</th>
                <th>Abstract</th>
                <th>PubDate</th>
                <th>ArticleId</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="9">
                    <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
                </td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($details as $result)

            <tr >
                <td> {{ $result->PMID }} </td>
                <td> {{ $result->Author }} </td>
                <td> {{ $result->Affiliation }} </td>
                <td> {{ $result->Title }}  </td>
                <td> {{ $result->DateRevised }}  </td>
                <td> {{ $result->ArticleTitle }} </td>
                <td> <div style="max-height:300px; overflow:auto"> {{ $result->Abstract }}</div> </td>
                <td> {{ $result->PubDate }} </td>
                <td> {{ $result->ArticleId }}  </td>

                </tr>

            {{--$count++;--}}
            @endforeach
            </tbody>
        </table>

    @elseif(isset($message))
        <p>{{$message}}</p>
    @endif



</div>
</body>
</html>
<?php

?>


<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id = "row'+i+'">  <td><select name="field[]" class="form-control name_list" id = "field"><option value="PMID">PMID</option> <option value="Author"> Author</option> <option value="Affiliation">Affiliation</option><option value="Title">Journal</option><option value="DateRevised">DateRevised</option><option value="ArticleTitle">ArticleTitle</option><option value="Abstract">Abstract</option><option value="PubDate">PubDate</option><option value="ArticleId">ArticleId</option></select></td>  <td><input type ="text" name="name[]" id="name" class="form-control name_list" /></td> <td><button name ="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td> </tr>');

        });

        $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        });
        // $(document).on("change", "#field", function() {
        //     alert($(this).find("option:selected").text());
        // });
        var form_data = $(this).serialize();
        $('#submit').click(function(){
            $.ajax({
                //url:'fetch.php',
                method:"POST",
                data :form_data,
                //data:$('#add_name').serialize(),
                success:function(data)
            {

                alert(data);
                //$('#add_name')[0].reset();
                // if(data == 'ok'){
                //     $('#field').find("tr:gt(0)").remove();
                // }
            }
            });

        });

    });
</script>