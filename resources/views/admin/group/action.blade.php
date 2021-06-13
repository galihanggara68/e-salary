<a href="{{ route('admin.group.edit', $model) }}" class="btn btn-warning">Edit</a>

<button href="{{ route('admin.group.destroy', $model) }}" class="btn btn-danger" id="delete">Hapus</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();

        var href = $(this).attr('href');

        Swal.fire({
        title: 'Apakah Yakin Hapus Data?',
        text: "Data yang sudah dihapus tidak bisa dikembalikan !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
        }).then((result) => {
        if (result.value) {

            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();

            Swal.fire(
            'Terhapus',
            'Data kamu berhasil dihapus',
            'success'
            )
        }
    })

    })
</script>
