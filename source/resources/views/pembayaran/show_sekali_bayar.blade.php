@extends('layouts.app')

@section('title')
SPP | Pembayaran
@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <div class="container-sm">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div style="float:right; margin-right:15px">
                                            <div class="row">
                                                <a href="#" style="float:right;color:black"class=" btn btn-success" target="_blank" title="Cetak rekapitulasi {{$financing->nama}}">
                                                <i class="fa fa-print"></i>&nbsp;Cetak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control dt-tb">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">No</th>
                                        <th data-field="name">Nama</th>
                                        <th data-field="kelas">Kelas</th>
                                        <th data-field="total">Akumulasi Biaya</th>
                                        <th data-field="terbayar">Sudah dibayar</th>
                                        <th data-field="tunggakan">Sisa Pembayaran</th>
                                        @if($financing->jenis=="Sekali Bayar")
                                        <th data-field="metode">Metode Pembayaran</th>
                                        @else
                                        <th data-field="banyak">Tunggakan</th>
                                        @endif
                                        <th data-field="status">Status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $siswa)
                                        @php
                                            $besaran = $siswa->akumulasi;
                                            $terbayar = intval(($siswa->terbayar!=0)?$siswa->terbayar:0);
                                            $sisa = $besaran - $terbayar;
                                        @endphp
                                    <tr>
                                        <td></td>
                                        <td>{{$no++}}</td>
                                        <td>{{$siswa->nama}}</td>
                                        <td>{{$siswa->kelas}} - {{$siswa->jurusan}}</td>
                                        <td>
                                            <div style="text-align:right">
                                                {{number_format($siswa->akumulasi,0,',','.')}}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align:right">
                                                {{number_format($terbayar,0,',','.')}}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align:right">
                                                {{number_format($sisa,0,',','.')}}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align:center">
                                            @if($siswa->jenis_pembayaran=="Waiting")
                                                <span class="badge" style="background-color:yellow;color:black">Waiting</span>
                                            @else
                                                {{$siswa->jenis_pembayaran}}
                                            @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align:center">
                                            @if($siswa->jenis_pembayaran=="Waiting")
                                                <span class="badge" style="background-color:yellow;color:black">Waiting</span>
                                            @elseif($siswa->jenis_pembayaran=="Nunggak")
                                                <span class="badge" style="background-color:red">Nunggak</span>
                                            @elseif($siswa->jenis_pembayaran=="Cicilan" && $sisa!=0)
                                                <span class="badge" style="background-color:yellow;color:black">Belum Lunas</span>
                                            @else
                                                <span class="badge" style="background-color:green">Lunas</span>
                                            @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align:center">
                                            @if($siswa->jenis_pembayaran=="Waiting" || $siswa->jenis_pembayaran=="Nunggak")
                                                <button class="btn btn-warning" onclick="addConfirm({{$siswa->id}},{{$siswa->payment_id}})" title="Pilih Metode Pembayaran" style="color:black;  ">
                                                    <i class="fa fa-info-circle"> Metode</i>
                                                </button>
                                            @elseif($siswa->jenis_pembayaran=="Cicilan")
                                                <a href="{{ route('payment.details.cicilan', [$siswa->financing_id, $siswa->id, $siswa->payment_id]) }}" class="btn btn-primary"
                                                title="Cetak Bukti Pembayaran" style="color:white;"><i class="fa fa-eye"> Rincian</i></a>
                                            @else
                                            <a href="#"class=" btn btn-success" target="_blank" title="Cetak kwitansi">
                                                <i class="fa fa-print"></i>&nbsp;Cetak</a>
                                            @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->

<!-- modal add -->
<div class="modal fade bd-example-modal-lg" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="modalAddLabel">Pilih Metode Pembayaran Pembiayaan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('payment.storeMethod') }}" role="form" method="post" id="store">
                {{csrf_field()}}
                <input type="hidden" name="payment_id">
                <input type="hidden" name="financing_category_id" value="{{$financing->id}}">
                <input type="hidden" name="financing_category" value="{{$financing->nama}}">
                <input type="hidden" name="nominal" value="{{$financing->besaran}}">
                <input type="hidden" name="student_id" id="student_id_add" value="">
                <input type="hidden" name="penerima" value="{{ Auth::user()->nama }}">
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-3">
                        Pembiayaan
                    </div>
                    :
                    <strong><span>{{$financing->nama}}</span></strong>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        Nominal Pembayaran
                    </div>
                    : <strong>Rp. <span >{{number_format($financing->besaran,0,',','.')}}</span></strong>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label col-md-4">Metode Pembayaran<kode>*</kode></label>
                    <div class="chosen-select-single mg-b-20">
                        <select class="chosen-select" name="metode_pembayaran" id="metode_pembayaran_add">
                            <option value="Tunai">Tunai</option>
                            <option value="Cicilan">Cicilan</option>
                            <option value="Nunggak">Nunggak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" onclick="confirm()"><i class="fa fa-floppy-o"></i> Submit</button>
                <!-- <button type='submit' class="btn btn-primary"><i class="fa fa-floppy-o"></i> Submit</button> -->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<!-- x-editor CSS  -->
<link rel="stylesheet" href="{{ asset('assets/css/editor/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/editor/datetimepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/editor/bootstrap-editable.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/editor/x-editor-style.css') }}">
<!-- normalize CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/data-table/bootstrap-table.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/data-table/bootstrap-editable.css') }}">
<!-- forms CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/css/form/all-type-forms.css')}}">
<!-- chosen CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/css/chosen/bootstrap-chosen.css')}}">
@endpush

@push('scripts')

<script>
    function closeModal()
    {
        $('.button_add').bind('click');
    }
    function addConfirm(student_id, payment_id) {
      $('input[name=student_id]').attr('value',student_id);
      $('input[name=payment_id]').attr('value',payment_id);
      $('#modalAdd').modal();
    }
    function confirm(){
        event.preventDefault();
        swal({
            title: 'Apakah anda yakin?',
            text: 'Akan mengkonfirmasi pembayaran ini ?',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function (value) {
            if (value) {
                document.getElementById('store').submit();
            } else {
                swal("Pembayaran dibatalkan!");
            }
        });
    }
</script>
<!-- data table JS
		============================================ -->
<script src="{{ asset('assets/js/data-table/bootstrap-table.js') }}"></script>
<script src="{{ asset('assets/js/data-table/tableExport.js') }}"></script>
<script src="{{ asset('assets/js/data-table/data-table-active.js') }}"></script>
<script src="{{ asset('assets/js/data-table/bootstrap-table-editable.js') }}"></script>
<script src="{{ asset('assets/js/data-table/bootstrap-editable.js') }}"></script>
<script src="{{ asset('assets/js/data-table/bootstrap-table-resizable.js') }}"></script>
<script src="{{ asset('assets/js/data-table/colResizable-1.5.source.js') }}"></script>
<script src="{{ asset('assets/js/data-table/bootstrap-table-export.js') }}"></script>
<!--  editable JS
		============================================ -->
<script src="{{ asset('assets/js/editable/jquery.mockjax.js') }}"></script>
<script src="{{ asset('assets/js/editable/mock-active.js') }}"></script>
<script src="{{ asset('assets/js/editable/select2.js') }}"></script>
<script src="{{ asset('assets/js/editable/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/editable/bootstrap-datetimepicker.js') }}"></script>
<script src="{{ asset('assets/js/editable/bootstrap-editable.js') }}"></script>
<script src="{{ asset('assets/js/editable/xediable-active.js') }}"></script>

<!-- chosen JS
    ============================================ -->
<script src="{{ asset('assets/js/chosen/chosen.jquery.js')}}"></script>
<script src="{{ asset('assets/js/chosen/chosen-active.js')}}"></script>
@endpush

@push('breadcrumb-left')
<div class="col-md-1" style="item-align:center">
<a href="{{ url('/payment')}}" class="btn btn-primary" href="#" title="Kembali"><i class="fa fa-arrow-left" ></i></a>
</div>
<div class="col-md-11">
    <div style="margin-left:15px;">
    <h4>Menu Pembayaran {{$financing->nama}}</h4>
    <span class="all-pro-ad">Kategori Pembayaran : <strong>{{$financing->jenis}}</strong></span>
    </div>
</div>
@endpush

@push('breadcrumb-right')
<div style="float:right">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-bottom:0">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/payment')}}">Pembayaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$financing->nama}}</li>
        </ol>
    </nav>
</div>
@endpush