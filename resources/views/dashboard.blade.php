<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Website Barang</title>
</head>
<body>
    <h1 class="m-2 pb-3">Selamat datang, {{ auth()->user()->name }}</h1>

    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

    <div class="mx-auto p-3 bg-secondary-subtle w-50">
        <div class="mx-3">
            <div class="text-center">
                <h2>Create a new Item</h2>
            </div>
            <form action="/create-item" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-left">
                    <label for="nama" class="form-label"><h3>Nama</h3></label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama...">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="jenis" class="form-label"><h3>Jenis</h3></label>
                    <input type="text" name="jenis" class="form-control" placeholder="Masukkan jenis...">
                    @error('jenis')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="kondisi" class="form-label"><h3>Kondisi</h3></label>
                    <input type="text" name="kondisi" class="form-control" placeholder="Masukkan kondisi...">
                    @error('kondisi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="keterangan" class="form-label"><h3>Keterangan</h3></label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan...">
                    @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="kecacatan" class="form-label"><h3>Kecacatan</h3></label>
                    <input type="text" name="kecacatan" class="form-control" placeholder="Masukkan kecacatan...">
                    @error('kecacatan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="jumlah" class="form-label"><h3>Jumlah</h3></label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah...">
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
            </form>
        </div>
    </div>

    <div>
        <h2>List semua barang</h2>

        <div class="">                
            <table class="table">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Kecacatan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Options</th>
                </tr>
                <tr>
                    @foreach ($allItems as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->kondisi }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->kecacatan }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td><img class="mt-2 px-3 rounded" src="{{ asset('storage/gambar/'.$item->gambar) }}" style="height: 100px; width: auto;"></td>
                            <td>
                                <div>
                                    <form action="/edit-item/{{ $item->id }}" method="GET">
                                        <button class="btn btn-warning">Edit</button>
                                    </form>
                                </div>

                                <div>
                                    <form action="/delete-item/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    <form action="/profile" method="POST">
        @csrf
        <button class="btn btn-danger">Log out</button>
    </form>
</body>
</html>