var divMain = new Vue({
    el : '#divMain',
    data : {
        titleApps : 'Beranda'
    },
    methods : {
        
    }
});

var divMenu = new Vue({
    el : '#divMenu',
    data : {

    },
    methods : {
        berandaAtc : function()
        {
            divMain.titleApps = "Beranda";
            renderMenu('beranda.php');
        },
        profileAtc : function()
        {
            divMain.titleApps = "Profile Guru";
            renderMenu('profil-guru.php');
        }
    }
});

renderMenu('beranda.php');

function renderMenu(halaman) {
    $('#divUtama').html("Memuat halaman ..");
    $('#divUtama').load(halaman);
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
  