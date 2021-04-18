// Route 
var rToLogin = server + "proses_login.php";

// vue object 
var loginApp = new Vue({
    el : '#login-app',
    data : {
        developer : 'Iis Rokhmatul Khasanah'
    },
    methods : {
        loginAtc : function()
        {
            let username = document.querySelector("#txtUsername").value;
            let password = document.querySelector("#txtPassword").value;
            let ds = {'username':username, 'password':password}
            $.post(rToLogin, ds, function(data){
                let obj = JSON.parse(data);
                let status = obj.status;
                let tipe_user = obj.tipe_user;
                if(status === 'user_tidak_ada'){
                    pesanUmumApp('warning', 'Gagal login!!!', 'Username & password salah !!!');
                }else{
                    if(tipe_user === 'siswa'){

                    }else if(tipe_user === 'guru'){

                    }else{
                        window.location.assign('admin_app/admin.php');
                    }
                }
                console.log(obj);
            });
        }
    }
});

// inisialisasi 
document.querySelector('#txtUsername').focus();

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}