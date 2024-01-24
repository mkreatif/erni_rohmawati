function toggleCardClass(index) {
    var path = "dashboard";
    switch (index) {
        case 0:
            path = "data-distributor";
            break;
        case 1:
            path = "data-perhitungan";
            break;
        case 2:
            path = "eigen-vektor";
            break;
        case 3:
            path = "kriteria";
            break;
        case 4:
            path = "rekomendasi-jalur";
            break;
        case 5:
            path = "bobot-kriteria";
            break;

        default:
            path += "?index="+index;
    }
    window.location.href = base_url + path;
}

$(document).ready(function () {
    $('#sign-out').click(function (event) {
        event.preventDefault();
        showConfrim("Anda Akan Sign-Out?", function (value) {
            if(value){
                window.location.href = base_url + 'login';
            }
            
        });
        
    })
});