@extends('pemesanan.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pemesanan Kendaraan Perusahaan</h2>
            </div>
            <div class="pull-right">
                <p class="mt-2 text-center"><a href="/kendaraan">Menu Kendaraan</a></p>
                <a class="btn btn-success" href="{{ route('pemesanan.create') }}"> Input Data</a>
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
        @foreach ($pemesanan as $bio)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $bio->name }}</td>
            <td>{{ $bio->status }}</td>
            <td>{{ $bio->kendaraan_id }}</td>
            <td>
                <form action="{{ route('pemesanan.destroy',$bio->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $pemesanan->links() !!}
      
@endsection