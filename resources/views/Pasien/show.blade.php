<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PMI</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <div class="d-flex">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="container col-8 mx-auto my-5">
        <form action="{{ route('kondisi.store', ['id' => $user->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" disabled value="{{ $user->nama }}">
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label>
              <input type="text" class="form-control" id="gender" name="gender" disabled value="{{ $user->jenis_kelamin }}">
            </div>
            <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" disabled value="{{ $user->tanggal_lahir }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat" disabled>{{ $user->alamat }}</textarea>
            </div>
            <div class="mb-3">
              <label for="berat_badan" class="form-label">Berat badan</label>
              <input type="number" class="form-control" id="berat_badan" name="berat_badan" step="0.01">
            </div>
            <div class="mb-3">
              <label for="temperature" class="form-label">Temperature</label>
              <input type="number" class="form-control" id="temperature" name="temperature" step="0.01">
            </div>
            <div class="mb-3">
              <label for="sistole" class="form-label">Tekanan darah (sistole)</label>
              <input type="number" class="form-control" id="sistole" name="sistole" step="0.01">
            </div>
            <div class="mb-3">
              <label for="diastole" class="form-label">Tekanan darah (diastole)</label>
              <input type="number" class="form-control" id="diastole" name="diastole" step="0.01">
            </div>
            <div class="mb-3">
              <label for="denyut_nadi" class="form-label">Denyut nadi</label>
              <input type="number" class="form-control" id="denyut_nadi" name="denyut_nadi">
            </div>
            <div class="mb-3">
              <label for="hemoglobin" class="form-label">Hemoglobin</label>
              <input type="number" class="form-control" id="hemoglobin" name="hemoglobin">
            </div>
            @if ($selisih == 17)  
              Surat izin orang tua
              <div class="form-check">
                <input class="form-check-input" type="radio" name="izin" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Ya
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="izin" value="2" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Tidak
                </label>
              </div>
            @elseif($selisih > 17)
              <input type="hidden" name="izin" value="1">
            @else
              <input type="hidden" name="izin" value="2">
            @endif
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>