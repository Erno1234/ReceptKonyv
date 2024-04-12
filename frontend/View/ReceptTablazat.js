import ReceptSor from "./ReceptSor.js";
class ReceptTablazat {
  #lista;
  constructor(szuloElem, lista) {
    this.szuloElem = szuloElem;
    this.#lista = lista;
    console.log(this.#lista);
    this.tablaMegjelenit();
    console.log(this.#lista);
  }

  tablaSzures(ertek) {
    let rows = Array.from(this.tableElem.rows);
    rows.shift();

    for (let row of rows) {
      let cella = row.cells[1].innerText;
      if (cella !== ertek) {
        row.style.display = "none";
      } else {
        row.style.display = "";
      }
    }
  }

  tablaMegjelenit() {
    let txt = '<table class="table table-bordered"></table>';
    this.szuloElem.append(txt);
    this.tableElem = this.szuloElem.children("table");
    this.tableElem.append(
      "<thead><tr><th>Név</th><th>Kategória</th><th>Kép</th><th>Leírás</th></tr></thead>"
    );

    for (const key in this.#lista) {
      new ReceptSor(this.#lista[key], this.tableElem);
    }
  }
}
export default ReceptTablazat;
