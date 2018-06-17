
<html>


<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


</head>
<body>
{{ csrf_field() }}
<div class = "container">
    <Br />
    <br />

    <div class="form-group">
<div class="list-group" >
    <a href="#" class="list-group-item disabled">
       Admin Roles
    </a>
    <a href="/files" class="list-group-item">Add Files</a>
    <a href="/admin/list_users" class="list-group-item">List Users</a>
    <a href="/register" class="list-group-item">Add Users</a>

</div>
    </div>
</div>
        @if(isset($details))

            <h3 align="left">Users list </h3>
            <table class='blueTable' style="width: 90%;color: black" align="center" >
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>remember_token</th>
                    <th>created_at </th>
                    <th>updated_at</th>
                    <th>delete</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="8">
                        <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
                    </td>
                </tr>
                </tfoot>
                <tbody>
                @foreach($details as $result)

                    <tr id = "row">
                        <td> {{ $result->id }} </td>
                        <td> {{ $result->name }} </td>
                        <td> {{ $result->email }} </td>
                        <td> {{ $result->password }} </td>
                        <td> {{ $result->remember_token }} </td>
                        <td> {{ $result->created_at }}  </td>
                        <td> {{ $result->updated_at }}  </td>
                        <td> <input type="button" name="remove" class="btn btn-danger btn_remove" value="delete"></td>


                    </tr>

                    {{--$count++;--}}
                @endforeach
                </tbody>
            </table>
        @endif
<style>
    table.blueTable {
        border: 1px solid #1C6EA4;
        background-color: whitesmoke;
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
        background: #999999;
        /*background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);*/
        /*background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);*/
        /*background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);*/
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
        background: #cbb956;
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
        background: indianred;
        color: black;
        padding: 2px 8px;
        border-radius: 5px;
    }
</style>


</body>
</html>

<script>
    $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });
</script>
