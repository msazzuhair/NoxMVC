    <div id="wrapper">
        <form method="post" action="kasir/add_item">
            <div class="form-group">
                <label for="pembayaran">Jenis Pembayaran</label><br>
                <select name="pembayaran" id="pembayaran">
                    <?php foreach ($pembayaran as $p) :?>
                    <option value="<?= $p['idpembayaran']; ?>" <?= (isset($_SESSION['kasir_pembayaran']) && ($_SESSION['kasir_pembayaran'] == $p['idpembayaran']) ? 'selected' : '') ?>><?= $p['pembayaran_deskripsi']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="customer">Jenis Customer</label><br>
                <select name="customer" id="customer">
                    <?php foreach ($customer as $c) :?>
                    <option value="<?= $c['idcustomer']; ?>" <?= (isset($_SESSION['kasir_customer']) && ($_SESSION['kasir_customer'] == $c['idcustomer']) ? 'selected' : '') ?>><?= $c['customer_deskripsi']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nopol">Nomor Polisi</label><br>
                <input type="text" id="nopol" name="nopol" value="<?= (isset($_SESSION['kasir_nopol']) ? $_SESSION['kasir_nopol'] : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="add_item">Kode Item</label><br>
                <input type="text" id="add_item" name="add_item" autofocus required>
            </div>
            <div class="form-group">
                <label for="qty">Qty</label><br>
                <input type="number" id="qty" name="qty" value=1 required>
                <button type="submit">Tambah</button>
            </div>
        </form>
        <br>
        <div id="table-wrapper">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                <?php
                if(isset($_SESSION['kasir'])): $i=1; foreach($_SESSION['kasir'] as $item):?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $item['Barang_nama']; ?></td>
                    <td class="cur"><?= $item['qty']; ?></td>
                    <td class="cur">Rp <?= number_format($item['Barang_harga']*$item['qty'],2,',','.'); ?></td>
                    <td style="text-align:center;"><a href="<?= site_url('kasir/delete_item/'.$i); ?>">Hapus</a></td>
                </tr>
                <?php $i++;endforeach;endif;?>
            </table>
        </div>
        <div class="return">
            <a href="kasir/cancel">Batal</a>
            <a href="kasir/cetak" target="blank">Cetak</a>
        </div>
    </div>