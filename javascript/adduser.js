function checkusername()
{
    let word = document.getElementById('username');
    let messagep = document.getElementById('messagep');
    let username = word.value;
    // console.log(username);

    var xhr = new XMLHttpRequest();
    xhr.open("GET","helpers/checkusername.php?username="+username);
    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status === 200)
        {
            var data = JSON.parse(xhr.responseText);
            if(data.message == "true")
            {
                word.setAttribute("style","background: rgb(241, 196, 196)");
                messagep.setAttribute("style","display: block");
                messagep.setAttribute("style","height: 1.4em");
                messagep.setAttribute("style","font-size: small");
                messagep.setAttribute("style","color: red");
            }
        }
    };
    xhr.send();

}

function resetuserbackground()
{
    let word = document.getElementById('username');
    let messagep = document.getElementById('messagep');
    word.setAttribute("style","background: white");
    messagep.setAttribute("style","display: none");
}

function checkemail()
{
    let word = document.getElementById('email');
    let emailp = document.getElementById('emailp');
    let email = word.value;
    // console.log(email);
    var xhr = new XMLHttpRequest();
    xhr.open("GET","helpers/checkemail.php?email="+email);
    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status === 200)
        {
            var data = JSON.parse(xhr.responseText);
            // console.log(data.message);
            if(data.message == "true")
            {
                word.setAttribute("style","background: rgb(241, 196, 196)");
                messagep.setAttribute("style","display: block");
                messagep.setAttribute("style","height: 1.4em");
                messagep.setAttribute("style","font-size: small");
                messagep.setAttribute("style","color: red");
            }
        }
    };
    xhr.send();
}

function resetemailbackground()
{
    let word = document.getElementById('email');
    let messagep = document.getElementById('emailp');
    word.setAttribute("style","background: white");
    messagep.setAttribute("style","display: none");
}

// let word = document.getElementById('username');

// word.addEventListener("keyup",)