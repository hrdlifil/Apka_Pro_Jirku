let stav = "prihlasit se";

let formular = document.querySelector("#registracni-formular");

let prihlasit_se_btn = document.querySelector(".prihlasit");
let registrovat_se_btn = document.querySelector(".registrovat");

prihlasit_se_btn.addEventListener("click", zobrazit_prihlasovaci_formular);
registrovat_se_btn.addEventListener("click", zobrazit_registrovaci_formular);

formular.addEventListener("submit", zkontrolovat_udaje);

function zobrazit_prihlasovaci_formular(event)
{
    if (stav === "prihlasit se")
    {

    }
    else
    {
        document.querySelector("#registracni-formular").style.display = "none";
        document.querySelector("#prihlasovaci-formular").style.display = "flex";

        stav = "prihlasit se";
    }
}

function zobrazit_registrovaci_formular(event)
{
    if (stav === "registrovat se")
    {

    }
    else
    {
        document.querySelector("#prihlasovaci-formular").style.display = "none";
        document.querySelector("#registracni-formular").style.display = "flex";


        stav = "registrovat se";
    }

}

function zkontrolovat_udaje(event)
{
    let jmeno = document.querySelector("#jmeno").value;
    let prijmeni = document.querySelector("#prijmeni").value;
    let email = document.querySelector("#email").value;
    let telefon_raw = document.querySelector("#telefon-cislo").value;
    let telefon = parseInt(telefon_raw);
    let login = document.querySelector("#login").value;
    let heslo = document.querySelector("#heslo").value;
    console.log(heslo);

    if(jmeno.length < 2)
    {
        event.preventDefault();
        document.querySelector("#jmeno-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#jmeno-spatne").style.display = "none";
    }
    if(prijmeni.length < 2)
    {
        event.preventDefault();
        document.querySelector("#prijmeni-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#prijmeni-spatne").style.display = "none";
    }
    if(email.length < 5 || check_email(email) === false)
    {
        event.preventDefault();
        document.querySelector("#email-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#email-spatne").style.display = "none";
    }
    if(/*telefon < 100000000 || telefon > 999999999*/ telefon_raw.length != 9 || isNaN(telefon))
    {
        event.preventDefault();
        document.querySelector("#telefon-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#telefon-spatne").style.display = "none";
    }
    if(login.length < 5)
    {
        event.preventDefault();
        document.querySelector("#login-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#login-spatne").style.display = "none";
    }
    if(heslo.length < 6)
    {
        event.preventDefault();
        document.querySelector("#heslo-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#heslo-spatne").style.display = "none";
    }
}

function check_email(email)
{
    let a = 0;

    let containsAt = false;
    let containsDot = false;

    for(let i = 0; i < toString(email).length; i++)
    {
        if(email.charAt(i) === '@')
        {
            containsAt = true;
            a = i;
            break;
        }
    }

    for(let i = a; i < toString(email).length; i++)
    {
        if(email.charAt(i) === '.')
        {
            containsDot = true;
            break;
        }
    }

    if(containsAt === false || containsDot === false)
    {
        return false;
    }

    return true;
}