

    <html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    </head>
    <div class = "container">
    <div class="form-group">
    <form name = "admin" id = "admin" method = "POST" action="/admin/home">


        <div class="form-group">
            {{ csrf_field() }}
            {{--{!! Form::open(['method'=>'POST', 'action'=>'AddMoreController@store','files'=>'true'])!!}--}}
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control name_list" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control name_list" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
        <div/>
    </body>
    </html>