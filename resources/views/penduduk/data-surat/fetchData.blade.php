<?php
    use \App\Http\Controllers\PendudukLetterActivity;
    use \Carbon\Carbon;
?>
@if (!$letterTracking->isEmpty())
<ul class="list-unstyled base-timeline activity-timeline">
    @foreach ($letterTracking as $lt)
        <?php
            $tanggal = Carbon::parse($lt->created_at)->locale('id')
        ?>
        <li class="text-uppercase weight700 f12 text-purple"> {{ $tanggal->isoFormat('dddd, Do MMMM YYYY') }} </li>
        @if($lt->status == '-1')
            @include('penduduk/data-surat/tracking-components.delivered')
        @elseif($lt->status == 'D')
            @include('penduduk/data-surat/tracking-components.operator-received')
        @elseif($lt->status == 'KBD')
            @include('penduduk/data-surat/tracking-components.kelian-process')
        @elseif($lt->status == 'KD')
            @include('penduduk/data-surat/tracking-components.kepala-desa-process')
        @elseif($lt->status == 'S')
            @include('penduduk/data-surat/tracking-components.completed')
        @endif
    @endforeach
</ul>
@else
<ul class="list-unstyled base-timeline activity-timeline">
    <li class="">
        Saat ini belum ada surat yang diajukan.
    </li>
</ul>
@endif
