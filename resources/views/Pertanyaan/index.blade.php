<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    
    <div class="container col-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center ">Register</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pasien.status.save', ['id' => Auth::user()->id]) }}">
                    @csrf
                    @foreach ($pertanyaan as $jawaban)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="pertanyaan[]" value="{{ $jawaban->id }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$jawaban->nama}}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>