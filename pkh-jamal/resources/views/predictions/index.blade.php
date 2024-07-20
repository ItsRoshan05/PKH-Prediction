@extends('adminlte::page')

@section('title', 'DataTable')

@section('content_header')
    <h1>Data Prediksi</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Prediksi</h3>    
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Jumalah Keluarga</th>
                    <th>Penghasilan</th>
                    <th>Pendidikan</th>
                    <th>Status Rumah</th>
                    <th>Pekerjaan</th>
                    <th>Kondisi Kesehatan</th>
                    <th>Prediksi Naive Bayes</th>
                    <th>Prediksi C4.5</th>
                    <th>Score Naive Bayes</th>
                    <th>Score C4.5</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($predictions as $data)
                <tr>
                    <th>{{ $data->JUMLAH_KELUARGA }}</th>
                    <th>{{ $data->PENGHASILAN }}</th>
                    <th>{{ $data->PENDIDIKAN_TERTINGGI }}</th>
                    <th>{{ $data->SETATUS_RUMAH }}</th>
                    <th>{{ $data->PEKERJAAN }}</th>
                    <th>{{ $data->KONDISI_KESEHATAN }}</th>
                    <th>{{ $data->prediction_nb }}</th>
                    <th>{{ $data->prediction_c45 }}</th>
                    <th>{{ $data->score_nb }}</th>
                    <th>{{ $data->score_c45 }}</th>
                    <td>
                        <form action="{{ route('prediction.destroy', $data->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                <th>Jumalah Keluarga</th>
                    <th>Penghasilan</th>
                    <th>Pendidikan</th>
                    <th>Status Rumah</th>
                    <th>Pekerjaan</th>
                    <th>Kondisi Kesehatan</th>
                    <th>Prediksi Naive Bayes</th>
                    <th>Prediksi C4.5</th>
                    <th>Score Naive Bayes</th>
                    <th>Score C4.5</th>
                    <th>Aksi</th>
                </tr>
            </tfoot> -->
        </table>
    </div>
</div>

<!-- Modal for adding new user -->
@stop

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
