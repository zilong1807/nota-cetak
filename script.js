var counter = 1;

function tambahBaris() {
    var newRow = `
        <tr>
    <td>${counter}</td>
    <td><input type="text" name="nama_barang[]" class="input-text" placeholder="Nama Barang" required></td>
    <td><input type="number" name="jumlah[]" class="input-number" min="1" oninput="hitungTotal(this)" placeholder="Jumlah" required></td>
    <td><input type="number" name="satuan[]" class="input-number" min="1" oninput="hitungTotal(this)" placeholder="Satuan" required></td>
    <td><input type="number" name="total[]" class="input-number" min="0" readonly placeholder="Total"></td>
</tr>

    `;
    document.querySelector('table tbody').insertAdjacentHTML('beforeend', newRow);
    counter++;
}

function hitungTotal(inputElement) {
    var tr = inputElement.parentNode.parentNode;
    var satuan = tr.querySelector('input[name="satuan[]"]').value;
    var jumlah = tr.querySelector('input[name="jumlah[]"]').value;
    var total = satuan * jumlah;
    tr.querySelector('input[name="total[]"]').value = total;
}
