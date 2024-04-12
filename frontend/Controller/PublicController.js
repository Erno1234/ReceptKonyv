import DataService from "../Model/DataService.js";
import ReceptTablazat from "../View/ReceptTablazat.js";
import Urlap from "../View/Urlap.js";

class PublicController {
  constructor() {
    this.dataService = new DataService();
    this.receptTablazat = null;
    this.dataService.getData("api/receptek", this.megjelenit);
    this.dataService.getData("api/kategoriakList", this.urlapMegjelenit);


    window.addEventListener("filter", (event) => {
      console.log(event.detail);
      if (this.receptTablazat) {
        this.receptTablazat.tablaSzures(event.detail);
      }
    });
  }

  urlapMegjelenit(kategoriak) {
    console.log(kategoriak);  
    new Urlap($(".urlap")[0], kategoriak); 
   }

  megjelenit(lista) {

    
    new ReceptTablazat($(".tablazat"),lista)
  }

}
export default PublicController;