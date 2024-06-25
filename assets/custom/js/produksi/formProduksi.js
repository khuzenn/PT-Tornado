const barangDitaroInput = document.getElementById('barang_ditaro');
const penyokInput = document.getElementById('penyok');
const packingInput = document.getElementById('packing');
const rejectInput = document.getElementById('reject');

barangDitaroInput.addEventListener('input', updateReject);
penyokInput.addEventListener('input', updateReject);
packingInput.addEventListener('input', updateReject);

function updateReject() {
    const barangDitaro = parseInt(barangDitaroInput.value) || 0;
    const penyok = parseInt(penyokInput.value) || 0;
    const packing = parseInt(packingInput.value) || 0;

    const reject = barangDitaro - penyok - packing;

    rejectInput.value = reject < 0 ? 0 : reject;
}

updateReject();