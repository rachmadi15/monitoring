@extends('kendaraan.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kendaraan Perusahaan</h2>
            </div>
            <div class="pull-right">
                <p class="mt-2 text-center"><a href="/pemesanan">Menu Pemesanan</a></p>
                <a class="btn btn-success" href="{{ route('kendaraan.create') }}"> Input Data</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($kendaraan as $bio)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $bio->name }}</td>
            <td>{{ $bio->kode }}</td>
            <td>
                <form action="{{ route('kendaraan.destroy',$bio->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('kendaraan.edit',$bio->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $kendaraan->links() !!}
      
@endsection