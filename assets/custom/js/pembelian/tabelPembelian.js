$(document).ready(function () {
    let table = $('#kt-tabel').DataTable({
        drawCallback: function () {
            var api = this.api();
        
            var totalColumn4 = 0;
            
            api.column(4, { page: 'current' }).data().each(function (value) {
                var numericValue = removeRupiahFormat(value);
                totalColumn4 += numericValue;
            });
        
            var formattedColumn4 = 'Rp. ' + totalColumn4.toLocaleString(undefined, { minimumFractionDigits: 2 });
        
            $(api.column(4).footer()).html(formattedColumn4);
        }
    });

    let minDate = null;
    let maxDate = null;

    DataTable.ext.search.push(function (settings, data, dataIndex) {
        if (
            (minDate === null && maxDate === null) ||
            (minDate === null && Date.parse(data[1]) <= maxDate) ||
            (minDate <= Date.parse(data[1]) && maxDate === null) ||
            (minDate <= Date.parse(data[1]) && Date.parse(data[1]) <= maxDate)
        ) {
            return true;
        }
        return false;
    });

    let minDateInput = document.getElementById('min');
    let maxDateInput = document.getElementById('max');

    function filterTable() {
        minDate = minDateInput.value ? Date.parse(minDateInput.value) : null;
        maxDate = maxDateInput.value ? Date.parse(maxDateInput.value) : null;
        table.draw();
    }

    minDateInput.addEventListener('change', filterTable);
    maxDateInput.addEventListener('change', filterTable);

    minDateInput.addEventListener('input', function () {
        if (!this.value) {
            minDate = null;
            filterTable();
        }
    });

    maxDateInput.addEventListener('input', function () {
        if (!this.value) {
            maxDate = null;
            filterTable();
        }
    });

    function updateTotal() {
        let total = table.column(5).data().sum();
        $('#total_pembelian').text(formatRupiah(total));
    }

    table.on('draw', function () {
        updateTotal();
    });

    function removeRupiahFormat(value) {
        if (value.startsWith("Rp")) {
            value = value.replace(/[^\d,-]/g, '');
        }
        return parseFloat(value);
    }
});