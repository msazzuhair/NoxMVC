<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
</head>
<body>
    <pre style="font-size:0.8em;">
        <table width="100%">
            <tr>
                <td colspan=6><img src="<?= asset_url('img/logo.png'); ?>" width="300px"><br></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="width:7%">No faktur</td>
                <td style="width:26.33333%">: #</td>
                <td style="width:7%">Customer</td>
                <td style="width:26.33333%">: <?= $customer[$_SESSION['kasir_customer']-1]['customer_deskripsi'];?></td>
                <td style="width:7%">Tanggal</td>
                <td style="width:26.33333%">: <?= strftime(DATETIME_FORMAT) ?></td>
            </tr>
            <tr>
                <td>Pembayaran</td>
                <td>: <?= $pembayaran[$_SESSION['kasir_pembayaran']-1]['pembayaran_deskripsi'];?></td>
                <td>No. Polisi</td>
                <td>: <?= $_SESSION['kasir_nopol']; ?></td>
                <td>Operator</td>
                <td>: <?= $_SESSION['user_data']['pegawai_nama']; ?></td>
            </tr>
        </table>
        <table style="width:100%; padding:10px 0; text-align:left; border-top:1px solid black;border-bottom:1px solid black">
            <tr>
                <th style="width:2%">No</th>
                <th style="width:60%">Nama Item</th>
                <th style="width:8%">Quantity</th>
                <th style="width:30%">Subtotal</th>
            </tr>
            <?php
            if(isset($_SESSION['kasir'])): $i=1; $tqty=0; $ttrans = 0; foreach($_SESSION['kasir'] as $item):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $item['Barang_nama']; ?></td>
                <td><?= $item['qty']; ?></td>
                <td>Rp <?= number_format($item['Barang_harga']*$item['qty'],2,',','.'); ?></td>
            </tr>
            <?php $tqty+=$item['qty']; $ttrans+=$item['Barang_harga']*$item['qty']; $i++;endforeach;endif;?>
        </table>
        <table style="width:100%; padding:10px 0; text-align:left; border-top:1px solid black;border-bottom:1px solid black">
            <tr>
                <th width="50%"></th>
                <th>Total Item</th>
                <th>Total Transaksi</th>
            </tr>
            <tr>
                <td></td>
                <td><?= $tqty; ?></td>
                <td>Rp <?= number_format($ttrans,2,',','.'); ?></td>
            </tr>
        </table>
        <table width="100%">
            <tr style="text-align:center;">
                <td>Customer<br><br><br><br><br>(&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;)</td>
                <td>Diperiksa Oleh:<br><br><br><br><br>(&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;)</td>
                <td>Sales<br><br><br><br><br>(&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;)</td>
            </tr>
        </table>
    </pre>
    <script>
        window.print();
    </script>
</body>
</html>