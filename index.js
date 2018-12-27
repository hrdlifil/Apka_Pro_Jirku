class Better_Navigation
{
    constructor()
    {
    }

    logo1_clicked(event)
    {
        window.location = "prihlasit_registrovat.php"
    }
    logo2_clicked(event)
    {
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        document.body.classList.add('biggerfied-picture-visible');
    }

    logo3_clicked(event){
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        document.body.classList.add('biggerfied-picture-visible');
    }

    logo4_clicked(event)
    {
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        document.body.classList.add('biggerfied-picture-visible');
    }

    logo5_clicked(event)
    {
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        document.body.classList.add('biggerfied-picture-visible');
    }

    logo6_clicked(event)
    {
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        document.body.classList.add('biggerfied-picture-visible');
    }

    /*  debiggerfyPicture(event)
      {
          document.body.classList.remove('biggerfied-picture-visible');
      }*/

    give_event_listeners()
    {
        document.querySelector("#logo1").addEventListener("click", this.logo1_clicked);
        document.querySelector("#logo2").addEventListener("click", this.logo2_clicked);
        document.querySelector("#logo3").addEventListener("click", this.logo3_clicked);
        document.querySelector("#logo4").addEventListener("click", this.logo4_clicked);
        document.querySelector("#logo5").addEventListener("click", this.logo5_clicked);
        document.querySelector("#logo6").addEventListener("click", this.logo6_clicked);
        document.querySelector("#cross").addEventListener("click", this.debiggerfy_picture);
    }

    transform_into_better_navigation()
    {
        let logo1 = document.querySelector("#logo1");
        let element = document.querySelector("#eshop-odkaz");
        let element_parent = element.parentNode;
        element_parent.removeChild(element);
        element_parent.appendChild(logo1);

        let logo2 = document.querySelector("#logo2");
        let element2 = document.querySelector("#ztracene_klice_odkaz");
        let element_parent2 = element2.parentNode;
        element_parent2.removeChild(element2);
        element_parent2.appendChild(logo2);

        let logo3 = document.querySelector("#logo3");
        let element3 = document.querySelector("#otevirani_objektu_a_domu_odkaz");
        let element_parent3 = element3.parentNode;
        element_parent3.removeChild(element3);
        element_parent3.appendChild(logo3);

        let logo5 = document.querySelector("#logo5");
        let element5 = document.querySelector("#autoklice_odkaz");
        let element_parent5 = element5.parentNode;
        element_parent5.removeChild(element5);
        element_parent5.appendChild(logo5);

        let logo4 = document.querySelector("#logo4");
        let element4 = document.querySelector("#cenik_odkaz");
        console.log(element4);
        let element_parent4 = element4.parentNode;
        element_parent4.removeChild(element4);
        element_parent4.appendChild(logo4);

        let logo6 = document.querySelector("#logo6");
        let element6 = document.querySelector("#otevirani_vozidel_odkaz");
        let element_parent6 = element6.parentNode;
        console.log(element_parent6);
        element_parent6.removeChild(element6);
        element_parent6.appendChild(logo6);
    }

    debiggerfy_picture(event)
    {
        document.body.classList.remove('biggerfied-picture-visible');
    }
}

// vytvori objekt ktery zlepsi navigaci tak, ze nebudu muset klikat primo na odkaz a ale staci mi kliknout na li


let better_navigation = new Better_Navigation();
better_navigation.give_event_listeners();
better_navigation.transform_into_better_navigation();






