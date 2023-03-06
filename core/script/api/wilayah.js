let selectedProvince;
let selectedRegency;

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
    optionProv.value = p.name;
    optionProv.text = p.name;
    provselect.appendChild(optionProv);
  });
});
const selectProvinsi = document.getElementById('provinsi');

selectProvinsi.addEventListener('change', (e)=> {
  const provinsi = e.target.value;
  fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/provinces.json`)
  .then(response => response.json())
  .then(provinces => {      
    selectedProvince = provinces.find(p => p.name === provinsi);
    fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/regencies/${selectedProvince.id}.json`)
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
        optionKota.value = r.name;
        optionKota.text = r.name;
        kotaselect.appendChild(optionKota);
      });
    });
  });
});  
const selectKota = document.getElementById('kota');

selectKota.addEventListener('change', (e) => {
  const kota = e.target.value;
  fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/regencies/${selectedProvince.id}.json`)
  .then(response => response.json())
  .then(regencies => {
     selectedRegency = regencies.find(r => r.name === kota);
    fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/districts/${selectedRegency.id}.json`)
    .then(response => response.json())
    .then(districts => {
            const selectKec = document.getElementById('kec');
            const selectKel = document.getElementById('kel');
            selectKel.innerHTML = "";
            selectKec.innerHTML = "";
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

            districts.forEach(d => {
              const optionKec = document.createElement("option");
              optionKec.value = d.name;
              optionKec.text = d.name;
              selectKec.appendChild(optionKec);
      });
    });
  });
});  
      const selectkec = document.getElementById('kec');

    selectkec.addEventListener('change', (e) => {
      const kec = e.target.value;
      fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/districts/${selectedRegency.id}.json`)
      .then(response => response.json())
      .then(districts => {
        const selectedDistricts = districts.find(d => d.name === kec);
      fetch(`https://diffarydk.github.io/api-wilayah-indonesia/api/villages/${selectedDistricts.id}.json`)
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
    optionKel.value = k.name;
    optionKel.text = k.name;
    kelselect.appendChild(optionKel);
     });
    });
  });
});  