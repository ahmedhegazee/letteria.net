<script>
    function deleteRecord(itemID){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Deleted Successfully',
                            'success'
                                );
                                setTimeout(()=>{
                                    document.getElementById(`delete-form-${itemID}`).submit();
                                },2000);

                            }
            })
        }
</script>
