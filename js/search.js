function initialize() {
    const input = document.getElementById("pac-input");
    const searchBox = new google.maps.places.SearchBox(input);
}

function getArea()
{
    let daerah = document.querySelector('#pac-input').value;
    window.location.assign('cari2.php?kata_cari='+daerah);

}