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
            console.log("halo");
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