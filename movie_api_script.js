//Api key https://api.themoviedb.org/3/movie/550?api_key=705b3276eaab818976e45618bf036919

//Grabbing the image area element from the DOM=> here we will appended the random movie 
//image
const image1 = document.getElementById('image1');

//By default the image visibility will be set to hidden
//(Once the movie has been appended, we'll switch it to visible)
image1.style.visibility = "hidden";

//Grabbing the movie title name element
const movie_image_title = document.getElementById('movie_image_title');

//Grabbing the random movie button and adding an event listener to it
//Once the button is pressed, we'll fetch the API link with a random 
//movie id
const random_movie_btn = document.getElementById('random_movie_btn').addEventListener("click",(e)=>{

    //There are 996 movie ids from 'themoviedb.org' website
    //We are randomly generating a number from 1 - 996
    let random_move_id = Math.floor(Math.random() * 996); //550

    //We then put the random number from 1 - 996 into the url for selecting
    //a random movie
    let url = ("https://api.themoviedb.org/3/movie/" + random_move_id + "?api_key=705b3276eaab818976e45618bf036919");
    
    /**
     * 1.Fetch the url of the movie api data
     * 2.Send a response in json
     * 3.output the json in the console
     * 4.If you wish to get everything just do ".then (data => { console.log(data) })"
     */
    fetch(url)
    .then(response => response.json())
    .then(data => { 

        //Some movies from the movie api haven't just an image (they are undefined)
        //There, if it is undefined, we'll turn the visibility off (to 'hidden')
        //and set the innerText to nothing
        if(data.backdrop_path == undefined){
            image1.style.visibility = "hidden";
            movie_image_title.innerText = "";

        //When there is an image associated to a movie
        //We'll set the visibility to 'visible', and add a source (src) of the movie's 
        //image. From there we'll add the movie title underneath
        } else if(data.backdrop_path !== undefined){

            image1.style.visibility = "visible";
            image1.src = "https://www.themoviedb.org/t/p/original" + data.backdrop_path;
            movie_image_title.innerText = "Title: " +data.original_title;
        }
    }); 
});
