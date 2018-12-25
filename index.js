class Better_navigation
{
    constructor()
    {
    }

    biggerfyPicture1(event)
    {
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        biggerfiedPicture.style.backgroundImage = "url('walrus2.jpg')";
        biggerfiedPicture.style.backgroundSize = "cover";
        document.body.classList.add('biggerfied-picture-visible');
    }

    biggerfyPicture2(event){
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        biggerfiedPicture.style.backgroundImage = "url('walrus3.jpg')";
        biggerfiedPicture.style.backgroundSize = "cover";
        document.body.classList.add('biggerfied-picture-visible');
    }

    biggerfyPicture3(event){
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        biggerfiedPicture.style.backgroundImage = "url('walrus2.jpg')";
        biggerfiedPicture.style.backgroundSize = "cover";
        document.body.classList.add('biggerfied-picture-visible');
    }

    biggerfyPicture4(event){
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        biggerfiedPicture.style.backgroundImage = "url('walrus3.jpg')";
        biggerfiedPicture.style.backgroundSize = "cover";
        document.body.classList.add('biggerfied-picture-visible');
    }

    biggerfyPicture5(event){
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        biggerfiedPicture.style.backgroundImage = "url('walrus2.jpg')";
        biggerfiedPicture.style.backgroundSize = "cover";
        document.body.classList.add('biggerfied-picture-visible');
    }

    biggerfyPicture6(event){
        let biggerfiedPicture = document.querySelector("#biggerfied-picture");
        biggerfiedPicture.style.backgroundImage = "url('walrus3.jpg')";
        biggerfiedPicture.style.backgroundSize = "cover";
        document.body.classList.add('biggerfied-picture-visible');
    }

    debiggerfyPicture(event){
        document.body.classList.remove('biggerfied-picture-visible');
    }

    giveEventListeners(){
        document.querySelector("#enlarge-btn1").addEventListener("click", this.biggerfyPicture1);
        document.querySelector("#enlarge-btn2").addEventListener("click", this.biggerfyPicture2);
        document.querySelector("#enlarge-btn3").addEventListener("click", this.biggerfyPicture3);
        document.querySelector("#enlarge-btn4").addEventListener("click", this.biggerfyPicture4);
        document.querySelector("#enlarge-btn5").addEventListener("click", this.biggerfyPicture5);
        document.querySelector("#enlarge-btn6").addEventListener("click", this.biggerfyPicture6);
        document.querySelector("#cross").addEventListener("click", this.debiggerfyPicture);
    }
}

// vytvori objekt ktery zlepsi navigaci tak, ze nebudu muset klikat primo na odkaz a ale staci mi kliknout na li


let better_navigation = new Better_navigation();
galeryLogic.giveEventListeners();






