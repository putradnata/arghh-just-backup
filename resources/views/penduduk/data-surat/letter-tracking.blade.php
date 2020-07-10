@extends('layouts.base')

@section('addressTitle','Lacak Surat')

@section('contentHere')
<div class="row">
    <!-- Status Surat -->
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-danger">
                    <div class="custom-title">Status Surat</div>
                    <div class=" widget-action-link">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-5">
                    @if ($allLetter->isEmpty())
                        Tidak Ada Surat
                    @else
                        <div class="form-group">
                            <label>Pilih Surat</label>
                            <select class="form-control" id="pilihSurat" name="pilihSurat">
                                    <option value=""> ---</option>
                                @foreach ($allLetter as $al)
                                    <option value="{{ $al->noSurat }}">{{ $al->noSurat }} - {{ $al->namaPenduduk }} - {{ $al->jenisSurat }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
                <br>
                <div class="fetched-data">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptPlace')
    {{-- init select for surat --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#pilihSurat").select2();
        });
    </script>

    {{-- change when kelaurga click --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#pilihSurat").change(function(){
                var suratPassed = $("#pilihSurat").val();

                $.get('/penduduk/data-surat/fetchData/'+suratPassed, function(data){
                    $(".fetched-data").html(data);
                });

            });
        });
    </script>
@endsection
