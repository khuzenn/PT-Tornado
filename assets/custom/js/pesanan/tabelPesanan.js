jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
    return this.flatten().reduce( function ( a, b ) {
        var x = parseFloat(a) || 0;
        var y = parseFloat($(b).attr('data-order')) || 0;
        return x + y
    }, 0 );
} );
$(document).ready(function () {
    let table = $('#kt-tabel').DataTable({
        drawCallback: function () {
            var api = this.api();
        
            var totalColumn4 = 0;
            var totalColumn5 = 0;
            var totalColumn6 = 0;
            
            api.column(4, { page: 'current' }).data().each(function (value) {
                var numericValue = removeRupiahFormat(value);
                totalColumn4 += numericValue;
            });
            api.column(5, { page: 'current' }).data().each(function (value) {
                var numericValue = removeRupiahFormat(value);
                totalColumn5 += numericValue;
            });

            api.column(6, { page: 'current' }).data().each(function (value) {
                var numericValue = removeRupiahFormat(value);
                totalColumn6 += numericValue;
            });
        
            var formattedColumn4 = totalColumn4.toLocaleString();
            var formattedColumn5 = 'Rp. ' + totalColumn5.toLocaleString(undefined, { minimumFractionDigits: 2 });
            var formattedColumn6 = 'Rp. ' + totalColumn6.toLocaleString(undefined, { minimumFractionDigits: 2 });
        
            $(api.column(4).footer()).html(formattedColumn4);
            $(api.column(5).footer()).html(formattedColumn5);
            $(api.column(6).footer()).html(formattedColumn6);
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
        let total = table.column(5).data();
        $('#total_pesanan').text(formatRupiah(total));
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