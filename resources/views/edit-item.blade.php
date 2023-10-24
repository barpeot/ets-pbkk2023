<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editing Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body class="bg-secondary-subtle p-2">

    <h1>Sedang Mengedit: {{ $item->nama }}</h1>

    <div class="bg-secondary-subtle p-3">
        <form action="/edit-item/{{ $item->id }}" method="POST" enctype="multipart/form-data">
            <div>
            @csrf
            @method('PUT')
            <div class="text-left">
                <label for="nama" class="form-label"><h3>Nama</h3></label>
                <input type="text" name="nama" class="form-control" value={{ $item->nama }}>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="jenis" class="form-label"><h3>Jenis</h3></label>
                <input type="text" name="jenis" class="form-control" value={{ $item->jenis }}>
                @error('jenis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="kondisi" class="form-label"><h3>Kondisi</h3></label>
                <input type="text" name="kondisi" class="form-control" value={{ $item->kondisi }}>
                @error('kondisi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="keterangan" class="form-label"><h3>Keterangan</h3></label>
                <input type="text" name="keterangan" class="form-control" value={{ $item->keterangan }}>
                @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="kecacatan" class="form-label"><h3>Kecacatan</h3></label>
                <input type="text" name="kecacatan" class="form-control" value={{ $item->kecacatan }}>
                @error('kecacatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="jumlah" class="form-label"><h3>Jumlah</h3></label>
                <input type="number" name="jumlah" class="form-control" value={{ $item->jumlah }}>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="gambar" class="form-label"><h3>Gambar</h3></label>
                <input type="file" id="gambar" name="gambar" accept="gambar/*" class="form-control">
                @error('gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror                
            </div>
            <button class="btn btn-primary">Save Post</button>
            </div>
        </form>
    </div>
</body>
</html>