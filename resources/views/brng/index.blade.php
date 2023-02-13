@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD QWORD</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('brng.create') }}"> Input barang</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>NIS</th>
            <th width="280px"class="text-center">Nama barang</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($brng as $barang)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $barang->kd_barang }}</td>
            <td>{{ $barang->nm_barang }}</td>
            <td>{{ $barang->tipe }}</td>
            <td class="text-center">
                <form action="{{ route('brng.destroy',$barang->kd_barang) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('brng.show',$barang->kd_barang) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('brng.edit',$barang->kd_barang) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $brng->links() !!}

@endsection