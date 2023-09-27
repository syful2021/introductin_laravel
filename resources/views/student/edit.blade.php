

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-10 my-5">
                <div class="card">
                    <div class="card-header">
                        <h1 class="float-start" > Edit Student</h1>
                         <a href="{{route('student.index')}}" class="btn btn-outline-info btn-sm float-end">Back</a>
                    </div>
                    <div class="card-body ">
                         <form action="" method="POST" >
                            @csrf    
                            {{dd($student)}} 
                            <input type="text" class="form-control mb-3 " value="{{$student->name}}" name="name" placeholder="enter name">
                            <input type="text" class="form-control mb-3 " value="{{$student->roll}}" name="roll" placeholder="enter roll">
                            <input type="text" class="form-control mb-3 " value="{{$student->registration}}" name="reg" placeholder="enter registration">
                            <input type="email"class="form-control mb-3 " value="{{$student->email}}" name="email" placeholder="enter valid email">
                            <input type="submit" class="btn btn-outline-success w-100">
                         </form>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>