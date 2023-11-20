/**
 * @see https://youtu.be/YX8AnjsjV5Q?si=yBWJymrt7EqNM-vV
 * @see https://countrystatecity.in/
 * @type {{cUrl: string, ckey: string}}
 */

var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
}


var countrySelect = document.querySelector('#pais'),
    stateSelect = document.querySelector('#estado'),
    citySelect = document.querySelector('#ciudad')


function loadCountries() {

    let apiEndPoint = config.cUrl

    fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
        .then(Response => Response.json())
        .then(data => {
            // console.log(data);

            data.forEach(country => {
                const option = document.createElement('option')
                option.value = country.iso2
                option.textContent = country.name
                countrySelect.appendChild(option)
            })
        })
        .catch(error => console.error('Error loading countries:', error))

    stateSelect.disabled = true
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'none'
    citySelect.style.pointerEvents = 'none'
}


function loadStates() {
    stateSelect.disabled = false
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'auto'
    citySelect.style.pointerEvents = 'none'

    const selectedCountryCode = countrySelect.value
    console.log(selectedCountryCode);
    stateSelect.innerHTML = '<option value="">Selecciona el estado</option>' // for clearing the existing states
    citySelect.innerHTML = '<option value="">Selecciona la ciudad</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states`, {headers: {"X-CSCAPI-KEY": config.ckey}})
        .then(response => response.json())
        .then(data => {
            // console.log(data);

            data.forEach(state => {
                const option = document.createElement('option')
                option.value = state.iso2
                option.textContent = state.name
                stateSelect.appendChild(option)
            })
        })
        .catch(error => console.error('Error loading countries:', error))
}


function loadCities() {
    citySelect.disabled = false
    citySelect.style.pointerEvents = 'auto'

    const selectedCountryCode = countrySelect.value
    const selectedStateCode = stateSelect.value
    console.log(selectedCountryCode, selectedStateCode);

    citySelect.innerHTML = '<option value="">Selecciona la ciudad</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {headers: {"X-CSCAPI-KEY": config.ckey}})
        .then(response => response.json())
        .then(data => {
            // console.log(data);

            data.forEach(city => {
                const option = document.createElement('option')
                option.value = city.name
                option.textContent = city.name
                citySelect.appendChild(option)
            })
        })
}

window.onload = loadCountries
