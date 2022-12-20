<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertanyaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    
    <div class="container col-6 mx-auto my-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center ">Pertanyaan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('kondisi.status.save', ['id' => Auth::user()->id]) }}">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaan[]" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Pernah menderita Hepatitis B
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaan[]" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Dalam jangka waktu 6 bulan sesudah kontak erat dengan penderita hepatitis
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaan[]" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Dalam jangka waktu 6 bulan sesudah mendapat transfusi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaan[]" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Dalam jangka waktu 72 jam sesudah operasi gigi
                        </label>
                    </div>
                    <div class="d-grid mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>