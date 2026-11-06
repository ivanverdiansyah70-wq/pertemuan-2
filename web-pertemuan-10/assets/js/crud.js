document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formMahasiswa");
    if (!form) return;

    const fields = [
        { id: "nim", pesan: "NIM wajib diisi." },
        { id: "nama", pesan: "Nama wajib diisi." },
        { id: "program_studi", pesan: "Program studi wajib diisi." },
        { id: "email", pesan: "Email wajib diisi." },
        { id: "angkatan", pesan: "Angkatan wajib diisi." }
    ];

    // Format email sederhana: teks@teks.teks tanpa spasi
    const polaEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function tampilkanError(input, pesan) {
        document.getElementById("error" + input.id).textContent = pesan;
        input.classList.add("is-invalid");
    }

    function hapusError(input) {
        document.getElementById("error" + input.id).textContent = "";
        input.classList.remove("is-invalid");
    }

    function validasi(item) {
        const input = document.getElementById(item.id);
        const nilai = input.value.trim();
        hapusError(input);

        if (nilai === "") {
            tampilkanError(input, item.pesan);
            return false;
        }
        if (item.id === "email" && !polaEmail.test(nilai)) {
            tampilkanError(input, "Format email tidak valid. Contoh: nama@email.com");
            return false;
        }
        return true;
    }

    form.addEventListener("submit", function (event) {
        let valid = true;
        fields.forEach(function (item) {
            if (!validasi(item)) valid = false;
        });
        if (!valid) event.preventDefault();
    });

    fields.forEach(function (item) {
        document.getElementById(item.id).addEventListener("input", function () {
            validasi(item);
        });
    });
});
