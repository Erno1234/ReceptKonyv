class Urlap {
  #adat = [];
  constructor(szuloElem, adat) {
    this.szuloElem = szuloElem;
    this.#adat = adat;
    this.szuloElem.innerHTML = `
          <form>
          <div class="mb-3 mt-3">
          <label for="kategoria">Kategória</label>
          <select id="kategoria" name="kategoria">
            <option value="kategoria"></option>
          </select>
          <div class="text-center">
            <button type="submit" class="btn btn-primary w-100" id="submit">Szűrés</button>
          </div>
        </form>
          `;
    this.formElem = this.szuloElem.querySelector("form");
    this.submitElem = this.formElem.querySelector("#submit");
    this.submitElem.addEventListener("click", this.onSubmit.bind(this));

    let selectElem = this.formElem.querySelector("#kategoria");
    for (let item of this.#adat) {
      let option = document.createElement("option");
      option.value = item.id;
      option.text = item.nev;
      selectElem.add(option);
    }
  }

  onSubmit(event) {
    event.preventDefault();
    this.#adatGyujt();
    this.#esemenyTrigger("filter");
  }

  #adatGyujt() {
    const selectElem = document.getElementById("kategoria");
    this.#adat = selectElem.options[selectElem.selectedIndex].text;
  }
  #esemenyTrigger(esemenyNev) {
    console.log(this.#adat);
    const esemeny = new CustomEvent(esemenyNev, { detail: this.#adat });
    window.dispatchEvent(esemeny);
  }
}

export default Urlap;
