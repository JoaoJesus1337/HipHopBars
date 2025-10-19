document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('albumFilter');
    const clearBtn = document.getElementById('clearAlbumFilter');
    const rows = Array.from(document.querySelectorAll('tbody tr[data-album-title]'));

    function applyFilter() {
        const val = input.value.trim().toLowerCase();
        if (!val) {
            rows.forEach(r => r.style.display = 'table-row');
            return;
        }

        rows.forEach(r => {
            const title = (r.dataset.albumTitle || '').toLowerCase();
            if (title.includes(val)) r.style.display = 'table-row'; else r.style.display = 'none';
        });
    }

    if (input) input.addEventListener('input', applyFilter);
    if (clearBtn) clearBtn.addEventListener('click', function () { input.value = ''; applyFilter(); });
});
