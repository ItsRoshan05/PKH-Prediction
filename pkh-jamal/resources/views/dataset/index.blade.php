@extends('adminlte::page')

@section('title', 'Dataset')

@section('content_header')
    <h1>Dataset</h1>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">CSV Data</h3>
        </div>
        <div class="card-body">
            @if(empty($data) || !is_array($data))
                <p>No data available or invalid data format.</p>
            @else
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>NIK</th>
                            <th>ALAMAT</th>
                            <th>JUMLAH KELUARGA</th>
                            <th>PENGHASILAN</th>
                            <th>PENDIDIKAN TERTINGGI</th>
                            <th>STATUS RUMAH</th>
                            <th>PEKERJAAN</th>
                            <th>KONDISI KESEHATAN</th>
                            <th>STATUS PENERIMA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item['NAMA'] ?? 'N/A' }}</td>
                                <td>{{ $item['NIK'] ?? 'N/A' }}</td>
                                <td>{{ $item['ALAMAT'] ?? 'N/A' }}</td>
                                <td>{{ $item['JUMLAH_KELUARGA'] ?? 'N/A' }}</td>
                                <td>{{ $item['PENGHASILAN'] ?? 'N/A' }}</td>
                                <td>{{ $item['PENDIDIKAN_TERTINGGI'] ?? 'N/A' }}</td>
                                <td>{{ $item['SETATUS_RUMAH'] ?? 'N/A' }}</td>
                                <td>{{ $item['PEKERJAAN'] ?? 'N/A' }}</td>
                                <td>{{ $item['KONDISI_KESEHATAN'] ?? 'N/A' }}</td>
                                <td>{{ $item['SETATUS_PENERIMA'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
        $('#example').DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection