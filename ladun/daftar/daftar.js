// route 
var rToDaftar = server + "proses_daftar.php";

// vue object 
var loginApp = new Vue({
    el : '#daftar-app',
    data : {
        developer : 'Iis Rokhmatul Khasanah'
    },
    methods : {
        daftarAtc : function()
        {
            let namaLengkap = document.querySelector("#txtNamaLengkap").value;
            let username = document.querySelector("#txtUsername").value;
            let password = document.querySelector("#txtPassword").value;
            let tipeUser = document.querySelector("#txtTipeUser").value;
            if(username === '' || password === '' || tipeUser === 'none'){
                pesanUmumApp('warning', 'Isi field!!!', 'Harap isi semua field !!!');
            }else{
                let ds = {'username':username, 'password':password, 'tipeUser':tipeUser, 'namaLengkap':namaLengkap}
                document.querySelector("#btnMasuk").classList.add('disabled');
                $.post(rToDaftar, ds, function(data){
                    let obj = JSON.parse(data);
                    let status = obj.status;
                    if(status === 'sukses'){
                        pesanUmumApp('success', 'Sukses', 'Berhasil melakukan pendaftaran user. Akan dialihkan ke halaman login dalam beberapa detik.');
                        setTimeout(function(){
                            window.location.assign('login.php');
                        }, 3000);
                    }else{
                        document.querySelector("#txtPassword").value = "";
                        document.querySelector('#txtUsername').focus();
                        pesanUmumApp('warning', 'Gagal', 'Username sudah terdaftar!!!, periksa kembali ...');
                        document.querySelector("#btnMasuk").classList.remove('disabled');
                    }
                });
            }
            
        }
    }
});

// inisialisasi 
document.querySelector('#txtNamaLengkap').focus();

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}