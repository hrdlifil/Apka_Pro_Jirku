let stav = "prihlasit se";

let prihlasit_se_btn = document.querySelector(".prihlasit");
let registrovat_se_btn = document.querySelector(".registrovat");

prihlasit_se_btn.addEventListener("click", zobrazit_prihlasovaci_formular);
registrovat_se_btn.addEventListener("click", zobrazit_registrovaci_formular);

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

