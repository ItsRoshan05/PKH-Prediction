@extends('adminlte::page')

@section('title', 'Dataset')

@section('content_header')
    <h1>Dataset</h1>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/chart.js/Chart.min.css') }}">
<style>
    .card-custom-header {
        background-color: #343a40;
        color: white;
        padding: 10px;
    }
    .card-title-custom {
        font-size: 1.5rem;
        margin: 0;
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
    pre {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
    <!-- CSV Data Card -->
    <div class="card mt-3">
        <div class="card-header card-custom-header">
            <h3 class="card-title-custom">Data Testing</h3>
        </div>
        <div class="card-body">
            @if(empty($data) || !is_array($data))
                <div class="alert alert-warning" role="alert">
                    <strong>Warning!</strong> No data available or invalid data format.
                </div>
            @else
                <table id="example" class="table table-bordered table-striped">
                    <thead class="thead-dark">
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
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>
        $(function () {
        $('#example').DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    })
</script>

@endsection
