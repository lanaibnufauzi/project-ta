@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h1>Bayar Denda</h1>
                    </div>
                    <div class="mb-3">
                        <ul>
                            Total Bayar = Rp. {{ number_format($total_denda, 0, ',', '.') }}
                        </ul>
                        <ul>
                            @if ($transaksi->status_pembayaran == "Belum Pilih Pembayaran")
                            <button id="pay-button" class="btn btn-success">Bayar</button>
                            @else
                            <ul>
                                <li>Status Pembayaran: {{ $transaksi->status_pembayaran }}</li>
                                <li>Metode Pembayaran: {{ $transaksi->bank }}</li>
                                <li>No Va Bank: {{ $transaksi->no_va }}</li>
                            </ul>

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-T7tGstPTu1xNiEG7"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('{{ $snapToken }}');
    };

</script>
@endsection
