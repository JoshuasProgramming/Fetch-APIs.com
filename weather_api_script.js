//API key 21ed8138dc4749ff97381453220402

//Grabbing output text area/element
const output_text = document.getElementById('output_text');

//Grabbing the country weather input area
const country_weather = document.getElementById('country_weather');

//Grabbing select element
const select_weather_api = document.getElementById('select_weather_api');

//Once the user inputs a letter ('keyup')
country_weather.addEventListener("keyup", (e)=>{
    //creating a variable to store the country the user has entered
    let country = country_weather.value;

    //weather api url witch concatenate
    let url = "http://api.weatherapi.com/v1/current.json?key=21ed8138dc4749ff97381453220402&q=" + country +"&aqi=no";

    /**
     * 1.Fetch the url of the weather data
     * 2.Send a response in json
     * 3.output the json in the console
     */
    fetch(url)
    .then(response => response.json())
    .then(data => {

        //When the user has entered a location that does exist
        //1.We'll turn the select option element on
        //2.We'll allow the user to select options from the "select_weather_api's" childern
        //3.We'll output the text element depending on what user selected
        if(data.current !== undefined){
            select_weather_api.disabled = false;

            select_weather_api.addEventListener("click", (e)=>{
                //Temperature(f)
                if(select_weather_api.value == "Temperature(f)"){
                    output_text.innerText = "Temperature(f) in " + country + " is " + data.current.temp_f;

                //Temperature(c)
                } else if(select_weather_api.value == "Temperature(c)"){
                    output_text.innerText = "Temperature(c) in " + country + " is " + data.current.temp_c;
                    console.log(data.current);

                //Wind (mph)
                } else if(select_weather_api.value == "wind (mph)"){
                    output_text.innerText = "wind (mph) in " + country + " is " +data.current.wind_mph;

                //wind (kph)
                } else if(select_weather_api.value == "wind (kph)"){
                    output_text.innerText = "wind (kph) in " + country + " is " + data.current.wind_kph;

                //humidity
                } else if(select_weather_api.value == "humidity"){
                    output_text.innerText = "humidity in " + country + " is " + data.current.humidity;

                //uv
                } else if(select_weather_api.value == "uv"){
                    output_text.innerText = "uv in " + country + " is " + data.current.uv;

                //condition
                } else if(select_weather_api.value == "Condition"){
                    output_text.innerText = "Condition in " + country + " is " + data.current.condition.text;

                //Lats update
                } else if(select_weather_api.value == "Last Updated"){
                    output_text.innerText = "Last update for " + country + " was " + data.current.last_updated;

                //empty
                } else if(select_weather_api.value == "select"){
                    output_text.innerText = "";
                } 
            }  
            //When the user has entered a location that doesn't exist
            //1.We'll turn the select option element off
            //2.We'll reset the select option element to 'select'
            //3.We'll reset the output text element to NOTHING
        )} else if(data.current == undefined){
            select_weather_api.disabled = true;
            select_weather_api.value = "select";
            output_text.innerText = "";
        }

        //When the user interacts with the 'X' for delete button on the search bar
        //We'll delete the output value and reset the select option to 'select'
        country_weather.addEventListener("search", (e)=>{

            if(country_weather.value == ""){
                output_text.innerText = "";
                select_weather_api.value = "select";
                select_weather_api.disabled = true;
            }
        });
});

});