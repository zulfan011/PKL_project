@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Pembayaran
            <a href="{{ route('pembayaran.create')}}" class="btn btn-primary float-right">Tambah</a>
        </div>
        <!-- /.card-heading -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id_konsumen</th>
                            <th>id_cucian_keluar</th>
                            <th>Nama</th>
                            <th>No_telepon</th>
                            <th>jenis_laundry</th>
                            <th>qty</th>
                            <th>harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($pembayaran as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->id_konsumen}}</td>
                            <td>{{ $data->id_cucian_keluar}}</td>
                            <td>{{ $data->nama}}</td>
                            <td>{{ $data->no_telepon}}</td>
                            <td>{{ $data->jenis_laundry}}</td>
                            <td>{{ $data->qty}}</td>
                            <td>{{ $data->harga}}</td>
                            <td>
                                <form action="{{route('pembayaran.destroy', $data->id)}}" method="post">
                                    @method('delete')
                                    @csrf

                                    <a href="{{route('pembayaran.edit',$data->id)}}" class="btn btn-success">Ubah</a>
                                    <a href="{{route('pembayaran.show',$data->id)}}" class="btn btn-warning">Tampil</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>
@endsection