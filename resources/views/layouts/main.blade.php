<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm" style="background-color: #14c38e">
        <div class="container fluid">
          <a class="navbar-brand" href="#">TodoApp</a>
        </div>
    </nav>

    @includeIf('layouts.create')
    @includeIf('layouts.detail')

    <div class="container my-4" style="position: relative; padding-top: 70px;">
        @include('layouts.index')
        <div class="position-sticky text-end" style="position: absolute; bottom: 10px; right: 10px;">
            <button class="btn btn-success btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#create"><i class="bi bi-bookmark-check"> Create Task</i></button>
        </div>
    </div>
        

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
