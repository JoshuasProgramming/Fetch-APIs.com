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

//Grab the output area where we'll show the user the information
const output_text = document.getElementById('output_text');

//When the user enters information. On each button press we'll check if they have
//Entered an accepted country to scan for Covid 19 information
search_covid_api.addEventListener("keyup", (e)=>{

        //Re-fetching the covid-19 data
        fetch(url)
        .then(response => response.json())
        .then(data => {
            //looping through all the countries until the user enters one correctly
            for(let i = 0; i < 195; i++){
                //If the country the user has entered is in the api turn on the select options
                //element
                //The 'trim()' method will remove any blank white space
                if(search_covid_api.value.trim() == data.features[i].attributes.Country_Region){
                    select_covid_api.disabled = false;

                    //Once the select option has been clicked, something happens
                    select_covid_api.addEventListener("click", (e)=>{
                        //output covid deaths
                        if(select_covid_api.value == "covid_deaths"){
                            output_text.innerText = "Covid deaths in " + search_covid_api.value + ": " + data.features[i].attributes.Deaths.toLocaleString('en-US');
                            
                            //output covid cases
                        } else if(select_covid_api.value == "covid_cases"){
                            output_text.innerText = "Covid cases in " + search_covid_api.value + ": " + data.features[i].attributes.Confirmed.toLocaleString('en-US');


                        //Output the covid incident rate
                        } else if(select_covid_api.value == "incident_rate"){
                            output_text.innerText = "Covid incident rate in " + search_covid_api.value + ": " + data.features[i].attributes.Incident_Rate.toLocaleString('en-US');


                        //Output the covid mortality rate
                        } else if(select_covid_api.value == "mortality_rate"){
                            output_text.innerText = "Covid mortality rate in " + search_covid_api.value + ": " + data.features[i].attributes.Mortality_Rate.toFixed(1).toLocaleString('en-US');

                        //Output nothing when user selects 'select'/nothing
                        } else {
                            output_text.innerText = "";
                            
                        }
                    });

                    return;
                }

                //When the search value isn't equal to any country, the select input stays disabled
                if(search_covid_api.value !== data.features[i].attributes.Country_Region){
                    output_text.innerText = "";
                    select_covid_api.value = "select";
                    select_covid_api.disabled = true;
                }

            }
        }
    );

    //When the user interacts with the 'X' for delete button on the search bar
    //We'll delete the output value and reset the select option to 'select'
    search_covid_api.addEventListener("search", (e)=>{

        if(search_covid_api.value == ""){
            output_text.innerText = "";
            select_covid_api.value = "select";

        }
    });

});
