<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
    function submitData(action) {
        $(document).ready(function() {
            let data = {
                action: action,
                id_data: $("#id_data").val(),
                hari: $("#hari").val(),
                slot_waktu: $("#slot_waktu").val(),
                mata_kuliah: $("#mata_kuliah").val(),
                dosen: $("#dosen").val(),
                ruang: $("#ruang").val(),
                kelas: $("#kelas").val(),
                tahun: $("#tahun").val(),
                jumlah_jam: $("#jumlah_jam").val(),
                semester: $("#semester").val(),
            };

            $.ajax({
                url: 'function.php',
                type: 'post',
                data: data,
                success: function(response) {
                    alert(response);
                    if (response == "Deleted Successfully") {
                        $("#" + action).css("display", "none");
                    }
                }
            });
        });
    }
</script>