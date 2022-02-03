//Grabbing the url of the covid 19 data API
let url = "https://services1.arcgis.com/0MSEUqKaxRlEPj5g/arcgis/rest/services/ncov_cases2_v1/FeatureServer/2/query?where=1%3D1&outFields=*&outSR=4326&f=json";

/**
 * 1.Fetch the url of the covid 19 data
 * 2.Send a response in json
 * 3.output the json in the console
 */


fetch(url)
.then(response => response.json())
.then(data => console.log(data.features));


//Grab the search bar element
const search_covid_api = document.getElementById('search_covid_api');

//Grab the select options element
const select_covid_api = document.getElementById('select_covid_api');

//When the user enters information. On each button press we'll check if they have
//Entered an accepted country to scan for Covid 19 information
search_covid_api.addEventListener("keyup", (e)=>{

        //Re-fetching the covid-19 data
        fetch(url)
        .then(response => response.json())
        .then(data => {
            //looping through all the countries until the user enters one correctly
            for(let i = 0; i < 195; i++){
                if(search_covid_api.value == data.features[i].attributes.Country_Region){
                    select_covid_api.disabled = false;
                    return;
                }
                //When the search value isn't equal to any country, the select input stays disabled
                if(search_covid_api.value !== data.features[i].attributes.Country_Region){
                    select_covid_api.disabled = true;
                }
            }
        }
    );
})