let max = 0;
let dalsi = document.querySelector(".dalsi");
dalsi.addEventListener("click" , fetch_users);

// Ziska z XHR JSON, ktery obsahuje jmena uzivatelu, ta vypise do divu s id vypis
function fetch_users()
{
    max +=4;
    let xhr = new XMLHttpRequest();
    xhr.open("GET","paginace.php?max=" + max, true );
    xhr.onload = function ()
    {
        if (xhr.status === 200)
        {
            let result = JSON.parse(xhr.responseText);
            let na_vypis = "";
            for (let i = 0; i <result.length; i++)
            {
                na_vypis += html_entities(result[i] )+ "<br>";
            }
            document.getElementById("vypis").innerHTML = na_vypis;
            console.log(result.length);
        }
    };
    xhr.send();


}

function html_entities(str)
{
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
