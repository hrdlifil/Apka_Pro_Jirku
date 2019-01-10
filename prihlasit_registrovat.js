let stav = "prihlasit se";

let registracni_formular = document.querySelector("#registracni-formular");
let prihlasovaci_formular = document.querySelector("#prihlasovaci-formular");

let prihlasit_se_btn = document.querySelector(".prihlasit");
let registrovat_se_btn = document.querySelector(".registrovat");

// Prihlasovaci a registracni formular se zobrazuji na stejne strance, prepina se mezi nimi pomoci tlacitek
prihlasit_se_btn.addEventListener("click", zobrazit_prihlasovaci_formular);
registrovat_se_btn.addEventListener("click", zobrazit_registrovaci_formular);

prihlasovaci_formular.addEventListener("submit", zkontrolovat_prihlasovaci_udaje);
registracni_formular.addEventListener("submit", zkontrolovat_registracni_udaje);

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

// Pokud uzivatel zada nejaky nevalidni udaj, je zabraneno odeslani formulare a vypise se mu, co zadal spatne
function zkontrolovat_prihlasovaci_udaje(event)
{
    let username = document.querySelector("#username").value;
    let heslo = document.querySelector("#password").value;

    if(username.length < 5)
    {
        event.preventDefault();
        document.querySelector("#login-spatne-prihlaseni").style.display = "inline";
    }
    else
    {
        document.querySelector("#login-spatne-prihlaseni").style.display = "none";
    }
    if(heslo.length < 5)
    {
        event.preventDefault();
        document.querySelector("#heslo-spatne-prihlaseni").style.display = "inline";
    }
    else
    {
        document.querySelector("#heslo-spatne-prihlaseni").style.display = "none";
    }
}

/*
 * Pokud uzivatel zada nejaky nevalidni udaj, je zabraneno odeslani formulare a vypise se mu, co zadal spatne
 * Jedine jmeno se nekontroluje, protoze je nepovinne
 */
function zkontrolovat_registracni_udaje(event)
{
    let jmeno = document.querySelector("#jmeno").value;
    let prijmeni = document.querySelector("#prijmeni").value;
    let email = document.querySelector("#email").value;
    let telefon_raw = document.querySelector("#telefon-cislo").value;
    let telefon = parseInt(telefon_raw);
    let login = document.querySelector("#login").value;
    let heslo = document.querySelector("#heslo").value;
    console.log(heslo);

    if(prijmeni.length < 2)
    {
        event.preventDefault();
        document.querySelector("#prijmeni-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#prijmeni-spatne").style.display = "none";
    }
    if(email.length < 5 || !email.includes("."))
    {
        event.preventDefault();
        document.querySelector("#email-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#email-spatne").style.display = "none";
    }
    if(telefon_raw.length != 9 || isNaN(telefon))
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
    if(heslo.length < 5)
    {
        event.preventDefault();
        document.querySelector("#heslo-spatne").style.display = "inline";
    }
    else
    {
        document.querySelector("#heslo-spatne").style.display = "none";
    }
}