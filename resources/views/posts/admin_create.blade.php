<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<body>
</head>
<div class = "container">
    <div class="form-group">
    <h1> Add Files </h1>
    <div class="container" style="padding: 0px; margin: auto;max-width: 20%;">


        {!! Form::open(['method'=>'POST', 'action'=>'AdminController@store','files'=>'true','onsubmit' => 'return ConfirmDelete()'])!!}


        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('File Upload') }}
            {!! Form::file('file',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('submit',['class'=>'btn btn-success' ]) !!}


        </div>



    {!! Form::close() !!}
    </div>

        <div/>
        @if(isset($message))
            <h4>{{$message}}</h4>
        @endif
        </div>
        </div>
    </body>
</html>


<script>

    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to upload?");
        if (x)
            return true;
        else
            return false;
    }

</script>

