fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/provinces.json`)
.then(response => response.json())
.then(provinces => {
  data = provinces;
  const provselect = document.querySelector("#provinsi");
  provselect.innerHTML = "";
  const optionProv = document.createElement("option");
      optionProv.value = "";
      optionProv.text = "Pilih Provinsi";
      optionProv.selected = true;
      provselect.appendChild(optionProv);

  data.forEach(p => {
    const optionProv = document.createElement("option");
    optionProv.value = p.id;
    optionProv.text = p.name;
    provselect.appendChild(optionProv);
  });
});
  const selectProvinsi = document.getElementById('provinsi');

      selectProvinsi.addEventListener('change', (e)=> {
        const provinsi = e.target.value;
        fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
.then(response => response.json())
.then(regencies => {
  data = regencies;
  const kotaselect = document.querySelector("#kota");
  const selectKec = document.getElementById('kec');
  const selectKel = document.getElementById('kel');
  selectKel.innerHTML = "";
  kotaselect.innerHTML = "";
  selectKec.innerHTML = "";
  const optionKota = document.createElement("option");
  optionKota.value = "";
      optionKota.text = "Pilih Kabupaten/Kota";
      optionKota.selected = true;
      kotaselect.appendChild(optionKota);
  const optionKec = document.createElement("option");
    optionKec.value = "";
    optionKec.text = "Pilih Kecamatan";
    optionKec.selected = true;
    selectKec.appendChild(optionKec);
  const optionKel = document.createElement("option");
  optionKel.value = "";
  optionKel.text = "Pilih Kelurahan";
  optionKel.selected = true;
  selectKel.appendChild(optionKel);

  data.forEach(r => {
    const optionKota = document.createElement("option");
    optionKota.value = r.id;
    optionKota.text = r.name;
    kotaselect.appendChild(optionKota);
    });
  });
});
  const selectKota = document.getElementById('kota');

      selectKota.addEventListener('change', (e) => {
        const kota = e.target.value;
        fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
.then(response => response.json())
.then(districts => {
  data = districts;
  const kecselect = document.querySelector("#kec");
  const selectKel = document.getElementById('kel');
  selectKel.innerHTML = "";
  kecselect.innerHTML = "";
  const optionKec = document.createElement("option");
  optionKec.value = "";
      optionKec.text = "Pilih Kecamatan";
      optionKec.selected = true;
      kecselect.appendChild(optionKec);
  const optionKel = document.createElement("option");
  optionKel.value = "";
  optionKel.text = "Pilih Kelurahan";
  optionKel.selected = true;
  selectKel.appendChild(optionKel);
      
  data.forEach(k => {
    const optionKec = document.createElement("option");
    optionKec.value = k.id;
    optionKec.text = k.name;
    kecselect.appendChild(optionKec);
    });
  });
});
  const selectkec = document.getElementById('kec');

    selectkec.addEventListener('change', (e) => {
      const kec = e.target.value;
      fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/villages/${kec}.json`)
.then(response => response.json())
.then(villages =>{
  data = villages;
  const kelselect = document.querySelector("#kel");
  kelselect.innerHTML = "";
  const optionKel = document.createElement("option");
  optionKel.value = "";
      optionKel.text = "Pilih Kelurahan";
      optionKel.selected = true;
      kelselect.appendChild(optionKel);
      
  data.forEach(k => {
    const optionKel = document.createElement("option");
    optionKel.value = k.id;
    optionKel.text = k.name;
    kelselect.appendChild(optionKel);
    });
});
    });