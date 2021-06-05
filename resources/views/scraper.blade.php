<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index data file</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="row mt-5">
            <h3 class="mx-2">Hello Scraper</h3>
             <a href="{{route('scraper')}}" class="btn btn-primary">Scraper</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
        @endif

        
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="row mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Link</th>
                    </tr>
                </thead>
                @foreach ($allData as $value)  
                <tbody>
                    <tr>
                        <th>{{$value->title}}</th>
                        <th><a href="{{$value->link}}" target="_blank">{{$value->link}}</a></th>
                    </tr>
                </tbody>         
              @endforeach   
            </table>      
        </div> 
        <div class="d-flex justify-content-center">
            {!! $allData->links() !!}
        </div>
    </div>

    
</body>
</html>