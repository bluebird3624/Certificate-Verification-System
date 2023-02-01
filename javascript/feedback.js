function getmessage()
{
    let div = document.getElementById('msg1');
    let url = new URL(window.location.href);
    let params = new URLSearchParams(url.search);
    let msg = params.get('msg');

    if(msg)
    {
        alert(msg);
    }
}
getmessage();