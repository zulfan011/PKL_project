@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Konsumen
            <a href="{{ route('konsumen.create')}}" class="btn btn-primary float-right">Tambah</a>
        </div>
        <!-- /.card-heading -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No_telepon</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($konsumen as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama}}</td>
                            <td>{{ $data->alamat}}</td>
                            <td>{{ $data->no_telepon}}
                            <td>
                                <form action="{{route('konsumen.destroy', $data->id)}}" method="post">
                                    @method('delete')
                                    @csrf

                                    <a href="{{route('konsumen.edit',$data->id)}}" class="btn btn-success">Ubah</a>
                                    <a href="{{route('konsumen.show',$data->id)}}" class="btn btn-warning">Tampil</a>
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