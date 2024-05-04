const csrf = document.head.querySelector("meta[name=csrf-token]").content;
const allBtnDeleteAdmin = document.querySelectorAll(".btn-delete-admin");

allBtnDeleteAdmin.forEach((btnDeleteAdmin) => {
    btnDeleteAdmin.addEventListener("click", () => {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data admin akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                const endpoint = btnDeleteAdmin.dataset.endpoint;
                fetch(endpoint, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrf,
                    },
                })
                    .then((response) => {
                        return response.json();
                    })
                    .then((result) => {
                        if (result.message) {
                            location.reload();
                        }
                    });
            }
        });
    });
});
