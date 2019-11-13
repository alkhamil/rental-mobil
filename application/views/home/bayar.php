<?php  

if ($this->session->flashdata('sukses')) {
	$sukses = $this->session->flashdata('sukses');
	echo $sukses;
}

$data = $this->session->userdata('data');
$tagihan = $tagihan;
$detail = $detail;

$harga_per_hari = $tagihan['price'];
$start_date = date('d', strtotime($detail['start_date']));
$end_date = date('d', strtotime($detail['end_date']));
// var_dump($detail);
$durasi = $end_date - $start_date;
$total = $durasi * $harga_per_hari;
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4 mx-auto">
            <table class="table table-sm tabel-">
                <h2 class="text-center">Invoice</h2>
                <thead>
                    <tr>
                        <td>Harga / Hari</td>
                        <td>:</td>
                        <td>Rp. <?= number_format($harga_per_hari) ?></td>
                    </tr>
                    <tr>
                        <td>Durasi Penyewaan</td>
                        <td>:</td>
                        <td><?= $durasi ?> Hari</td>
                    </tr>
                    <tr>
                        <td>Total Tertagih</td>
                        <td>:</td>
                        <td>Rp. <?= number_format($total) ?></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>:</td>
                        <td><?= $tagihan['type'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $tagihan['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Flat Nomor</td>
                        <td>:</td>
                        <td><?= $tagihan['number'] ?></td>
                    </tr>
                </thead>
            </table>
            <div class="form-group">
                <label>Pilih Bank</label>
                <select id="bank" class="form-control">
                    <option>-- Pilih Bank --</option>
                    <option value="1">BCA</option>
                    <option value="2">BNI</option>
                    <option value="3">MANDIRI</option>
                </select>
                <br>
                <div id="show_bank">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#bank').on('change', function(){
            $('#show_bank').html('');
            if ($(this).val() === '1') {
                $('#show_bank').append(postBody('BCA','6777778889'));
            }else if($(this).val() === '2'){
                $('#show_bank').append(postBody('BNI','5644444256'));
            }else if($(this).val() === '3'){
                $('#show_bank').append(postBody('MANDIRI','1330928888'));
            }
        })

        function postBody(bank, norek){
            var body = `<div class="card mx-auto" style="width: 18rem;">
                                <div class="card-body">
                                    <table class="table table-sm">
                                    <tr>
                                        <td>Nama Bank</td>
                                        <td>:</td>
                                        <td>`+bank+`</td>
                                    </tr>
                                    <tr>
                                        <td>No Rekening</td>
                                        <td>:</td>
                                        <td>`+norek+`</td>
                                    </tr>
                                    <tr>
                                        <td>Atas Nama</td>
                                        <td>:</td>
                                        <td>Kelompok V</td>
                                    </tr>
                                    </table>
                                </div>
                            </div>`;
            return body;
        }
    });
</script>