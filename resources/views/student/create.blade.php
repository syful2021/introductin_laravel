
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
                        <h1 class="float-start" >Add Student</h1>
                         <a href="{{route('student.index')}}" class="btn btn-outline-info btn-sm float-end">Back</a>
                    </div>
                    <div class="card-body ">
                         <form action="{{route('student.store')}}"  method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="text" class="form-control mb-3 " value="{{old('name')}}" name= "name" placeholder= "Enter name" >
                           @if($errors->has('name'))
                               <span class="text-danger" role="alert">{{ $errors->first('name')}}</span>
                           @endif
                                    {{--for image --}}
                            <input type="file" accept="image/*" class="form-control mb-3 " name= "image" >
                           @if($errors->has('image'))
                               <span class="text-danger" role="alert">{{ $errors->first('image')}}</span>
                           @endif
                            <input type="text" class="form-control mb-3 " value="{{old('roll')}}" name= "roll" placeholder= "Enter roll">
                            @if($errors->has('roll'))
                                <span class="text-danger" role="alert">{{ $errors->first('roll')}}</span>
                            @endif
                             <input type="text" class="form-control mb-3 " value="{{old('reg')}}" name= "reg" placeholder= "Enter registration">
                            @if($errors->has('reg'))
                                <span class="text-danger" role="alert">{{ $errors->first('reg')}}</span>
                            @endif
                             <input type="email"class="form-control mb-3 " value="{{old('email')}}"  name= "email" placeholder= "enter valid email">
                            @if($errors->has('email'))
                                <span class="text-danger" role="alert">{{ $errors->first('email')}}</span>
                            @endif
                             <input type="submit"   name="submit" class="btn btn-outline-success w-100" value= "save">
                         </form>
                    </div>
                </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
