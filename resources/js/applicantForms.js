$(document).ready(()=>{
    // store database query in sesh storage
    if (!sessionStorage.getItem('PH')) {
        $.ajax({
            type: 'GET',
            url: 'Philippines',
            dataType: 'json',
            success: (data)=>{
                sessionStorage.setItem('PH', JSON.stringify(data));
            }
        }) 
      }
})

$(document).ready(function() {
    // set headers for all ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') }
    })

    //get all countries // supply country options
    $.ajax({
        type: 'GET',
        url: 'https://restcountries.com/v3.1/all',
        dataType: 'json',
        success: (data)=>{
            let countryOptions = '<option value="" disabled selected>Select Country</option>';
            const commonNames = {};

                // console.log(country);
                data.forEach(country => {
                    const countryCode = country.cca3;
                    const commonName = country.name.common;
                    commonNames[countryCode] = commonName;
                });
                const sortedCommonNames = Object.values(commonNames).sort();

                sortedCommonNames.forEach(commonName => {
                //   console.log('\n'+commonName);
                  countryOptions += `<option value="${commonName}">${commonName}</option>`;
                });
                $('#formCountry').html(countryOptions);
        }
    })
        


// supply province/state options
    $('#formCountry').change(() => {
        let selectedCountry = $('#formCountry').val();
        let ProvinceOptions = '<option value="" disabled selected>Select Province/State</option>';
        let addedProvinces = [];
      
        if (selectedCountry == 'Philippines') {
          const PH = JSON.parse(sessionStorage.getItem('PH'));
          PH.forEach((record) => {
            if (record.country == 'Philippines' && !addedProvinces.includes(record.major_area)) {
              let majorArea = record.major_area;
              ProvinceOptions += `<option value="${majorArea}">${majorArea}</option>`;
              addedProvinces.push(record.major_area);
            }
          });
          $('#formProvince').html(ProvinceOptions);
        }
      });
      
});

// supply city options
$(document).ready(()=>{
    $('#formProvince').change(() => {
        let selectedProvince = $('#formProvince').val();
        let CityOptions = '<option value="" disabled selected>Select City</option>';
        let addedCity = [];
      
            const PH = JSON.parse(sessionStorage.getItem('PH'));
            PH.forEach((record) => {
                if (record.major_area == selectedProvince && !addedCity.includes(record.city)) {
                    let city = record.city;
                    CityOptions += `<option value="${city}">${city}</option>`;
                    addedCity.push(record.city);
            }});
            $('#formCity').html(CityOptions);
    })
})

// supply barangay options
// $(document).ready(()=>{
//     $('#formCity').change(() => {
//         let selectedCity = $('#formCity').val();
//         let BrgyOptions = '<option value="" disabled selected>Select Barangay</option>';
//         let addedBrgy = [];
      
//             const PH = JSON.parse(sessionStorage.getItem('PH'));
//             PH.forEach((record) => {
//                 if (record.city == selectedCity && !addedBrgy.includes(record.city)) {
//                     let brgy = record.barangay;
//                     BrgyOptions += `<option value="${brgy}">${brgy}</option>`;
//                     addedBrgy.push(record.barangay);
//             }});
//             $('#formBrgy').html(BrgyOptions);
//     })
// })

// supply postal code automatically
$(document).ready(()=>{
    $('#formCity').change(() => {
        let selectedCity = $('#formCity').val();
        let PostalCode ='';
            const PH = JSON.parse(sessionStorage.getItem('PH'));
            PH.forEach((record) => {
                if(record.city == selectedCity){
                    PostalCode = record.zip_code; 
                }
            $('#formPostalCode').val(PostalCode);
            });
    })
})