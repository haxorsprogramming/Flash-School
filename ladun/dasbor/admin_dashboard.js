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
        kursusAtc : function()
        {
            divMain.titleApps = "Manajemen Kursus";
            renderMenu('kursus.php');
        },
        guruAtc : function()
        {
            divMain.titleApps = "Manajemen Guru";
            renderMenu('guru.php');
        },
        dataPemesanan : function()
        {
            divMain.titleApps = "Data Pemesanan";
            renderMenu('data-pemesanan.php');
        },
        dataRegistrasiSiswa : function()
        {
            divMain.titleApps = "Data Registrasi Siswa";
            renderMenu('data-registrasi-siswa.php');
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
  